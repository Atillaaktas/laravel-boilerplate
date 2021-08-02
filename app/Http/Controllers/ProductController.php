<?php
    
namespace App\Http\Controllers;
    
use App\Models\Product;
use App\Models\Tag;
use App\Models\Order;
use App\Models\Brand;
use App\Models\Unit;
use App\Models\Category;
use App\Models\Refundable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Exports\ProductsExport;
use App\Imports\ProductsImport;
use Maatwebsite\Excel\Facades\Excel;
use DataTables;


    
class ProductController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index','show']]);
         $this->middleware('permission:product-create', ['only' => ['create','store']]);
         $this->middleware('permission:product-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:product-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request )
    {
        if ($request->ajax()) {
            
        $data = Product::join('categories','products.category_id', '=', 'categories.id')
        ->Join('tags','products.tag_id', '=', 'tags.id')
        ->Join('brands','products.brand_id', '=', 'brands.id')
        ->Join('units','products.unit_id', '=', 'units.id')
        ->Join('refundables','products.refundable_id', '=', 'refundables.id')
        ->get( array("products.*","categories.name as category_name","tags.name as tag_name","brands.name as brand_name","units.name as unit_name","refundables.name as refundable_name"));
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                           $btn = "<a href='/products/$row->id' class='show btn btn-info btn-sm'>Göster</a>";
                            $btn = $btn."<a href='/products/$row->id/edit' class='edit btn btn-info btn-sm'>Edit</a>";
                            $btn = $btn." <form action='{{ route('product.destroy',$row->id) }}' method='POST'>
                            @csrf
                            @method('DELETE')
                            @can('product-delete')
                            <button type='submit' class='btn btn-danger'>Sil</button>
                            @endcan
                        </form>";
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        
        
       
       
        return view('products.index');         
    }
    public function products()
    {
        $products = Product::all();
        return view('product', compact('products'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        $brands = Brand::all();
        $units = Unit::all();
        $refundables = Refundable::all();
        
       
        
 
        return view('products.create',compact('tags','categories','brands','units','refundables'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:users', 'alpha_dash'],
            'detail' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'price' =>"required|regex:/^\d+(\.\d{1,2})?$/",
            'stock' =>"required|regex:/^\d+(\.\d{1,2})?$/"

        ]);

  
        $input = $request->all();

        $input['deci'] = ($input['width'] * $input['height'] * $input['weight']) / 3000;
  
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
    
        Product::create($input);
     
        return redirect()->route('products.index')
                        ->with('success','Product created successfully.');
    }
    
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
  public function show($id)
     {

        $product = Product::join('categories', 'categories.id', '=', 'products.category_id')
        ->join('tags', 'tags.id', '=', 'products.tag_id')
        ->Join('brands','products.brand_id', '=', 'brands.id')
        ->Join('units','products.unit_id', '=', 'units.id')
        ->Join('refundables','products.refundable_id', '=', 'refundables.id')
        ->where('products.id', '=', $id)
        ->select('products.*', 'categories.name as category_name','tags.name as tag_name'
        ,'brands.name as brand_name','units.name as unit_name','refundables.name as refundable_name')
        ->first();
       
         return view('products.show',compact('product'));
     }
     
   
  
    public function edit(Product $product)
    {
        $categories = Category::all();
        $tags = Tag::all();
        $brands = Brand::all();
        $units = Unit::all();
        $refundables = Refundable::all();

 
        return view('products.edit',compact('product','tags','categories','brands','units','refundables'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */

    public function update2(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }
    public function update(Request $request, Product $product)
    {

        $request->validate([
            'name' => 'required',
            'detail' => 'required'
        ]);
  
        $input = $request->all();
  
        $input['deci'] = ($input['width'] * $input['height'] * $input['weight']) / 3000;
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }else{
            unset($input['image']);
        }
          
        $product->update($input);
    
       

        return redirect()->route('products.index')
                        ->with('success','Product updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Respo
     */
    public function destroy(Product $product)
    {
        $product->delete();
    
        return redirect()->route('products.index')
                        ->with('success','Product deleted successfully');
    }

    public function addToCart($id)
    {
        $product = Product::findOrFail($id);
          
        $cart = session()->get('cart', []);
  
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image
            ];
        }
          
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }
    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }

    public function cart()
    {
        return view('cart');
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function importExportView()
    {
       return view('products.index');
    }
     
    /**
    * @return \Illuminate\Support\Collection
    */
    public function export() 
    {
        return Excel::download(new ProductsExport, 'products.xlsx');
    }
     
    /**
    * @return \Illuminate\Support\Collection
    */
    public function import() 
    {
        Excel::import(new ProductsImport,request()->file('file'));
             
        return back();
    }
     
}
