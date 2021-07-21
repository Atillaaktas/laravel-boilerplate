<?php
       
namespace App\Http\Controllers;
      
use App\Models\Order;
use App\Models\Inorder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DataTables;
       
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    function __construct()
    {
         $this->middleware('permission:order-list|order-create|order-edit|order-delete', ['only' => ['index','show']]);
         $this->middleware('permission:order-create', ['only' => ['create','store']]);
         $this->middleware('permission:order-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:order-delete', ['only' => ['destroy']]);
    }


    public function index(Request $request )
    {
        if ($request->ajax()) {
            $data = Order::select('*');
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                           $btn = "<a href='/orders/$row->id' class='edit btn btn-info btn-sm'>Göster</a>";
                        //    $btn = $btn.'<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">Edit</a>';
                        //    $btn = $btn.'<a href="javascript:void(0)" class="edit btn btn-danger btn-sm">Delete</a>';
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('orders.index');
    }
    
    
    public function showOrdersProducs(Inorder $inorders ,$id) 
    
    { 

        $inorders = Inorder::join('products','inorders.product_id', '=', 'products.id')
        ->get(["inorders.*","products.name as product_name"]);
        
    
        return view('orders.show',['inorders' => Inorder::where('order_id','=',$id)->get()],compact('inorders')); }

    
    
    
    public function create(Order $order)
    {
        return view('orders.create');
    }
    public function store(Request $request)
    {
        $cart = session()->get('cart', []);
        $id = Auth::id();
        $postOrder= ["user_id" => $id,"status_id"=>1];
        $order = Order::create($postOrder);
        foreach ($cart as $key => $product) {
            
            $postOrderProduct= ["product_id" => $key ,"order_id"=>$order->id, "quantity"=>$product['quantity'],"price"=>$product['price'],"total_price"=>($product['quantity']*$product['price']) ];
            Inorder::create($postOrderProduct);
        }
        
     
        return redirect()->route('orders')
                        ->with('success','Order created successfully.');
    }

    public function edit(Order $order)
    {
        return view('orders.index');
    }
    
}