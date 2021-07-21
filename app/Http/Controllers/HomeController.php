<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Tag;
use App\Models\Order;
use App\Models\Brand;
use App\Models\Unit;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Hash;
use Carbon\Carbon;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       
        $bestSellingThisMonth = DB::table('inorders')
        ->join('products', 'products.id', '=', 'inorders.product_id')
        ->whereMonth('inorders.created_at', date('m'))
        ->whereYear('inorders.created_at', date('Y'))
        ->selectRaw('sum(inorders.quantity) as total, inorders.product_id, products.name')
        ->groupBy('inorders.product_id')
        ->orderBy('total', 'desc')
        ->first();

        $bestSellingThisYear = DB::table('inorders')
        ->join('products', 'products.id', '=', 'inorders.product_id')
        ->whereYear('inorders.created_at', date('Y'))
        ->selectRaw('sum(inorders.quantity) as total, inorders.product_id, products.name')
        ->groupBy('inorders.product_id')
        ->orderBy('total', 'desc')
        ->first();

        $bestSellingCategoryThisMonth = DB::table('inorders')
        ->join('products', 'products.id', '=', 'inorders.product_id')
        ->join('categories', 'categories.id', '=', 'products.category_id')
        ->whereMonth('inorders.created_at', date('m'))
        ->whereYear('inorders.created_at', date('Y'))
        ->selectRaw('sum(inorders.quantity) as total, inorders.product_id, categories.id, categories.name')
        ->groupBy('inorders.product_id')
        ->orderBy('total', 'desc')
        ->first();

        $bestSellingCategoryThisYear = DB::table('inorders')
        ->join('products', 'products.id', '=', 'inorders.product_id')
        ->join('categories', 'categories.id', '=', 'products.category_id')
        ->whereYear('inorders.created_at', date('Y'))
        ->selectRaw('sum(inorders.quantity) as total, inorders.product_id, categories.id, categories.name')
        ->groupBy('inorders.product_id')
        ->orderBy('total', 'desc')
        ->first();


        
        $bestSellingBrandThisMonth = DB::table('inorders')
        ->join('products', 'products.id', '=', 'inorders.product_id')
        ->join('brands', 'brands.id', '=', 'products.brand_id')
        ->whereMonth('inorders.created_at', date('m'))
        ->whereYear('inorders.created_at', date('Y'))
        ->selectRaw('sum(inorders.quantity) as total, inorders.product_id, brands.id, brands.name')
        ->groupBy('inorders.product_id')
        ->orderBy('total', 'desc')
        ->first();

        $bestSellingBrandThisYear = DB::table('inorders')
        ->join('products', 'products.id', '=', 'inorders.product_id')
        ->join('brands', 'brands.id', '=', 'products.brand_id')
        ->whereYear('inorders.created_at', date('Y'))
        ->selectRaw('sum(inorders.quantity) as total, inorders.product_id, brands.id, brands.name')
        ->groupBy('inorders.product_id')
        ->orderBy('total', 'desc')
        ->first();


        
        $weekCustomerCount =DB::table('users')->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
        $monthCustomerCount =DB::table('users')-> whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->count();

        // 
        $todayOrderCount =DB::table('orders')->whereDate('created_at', Carbon::today())->count();
        $weekOrderCount =DB::table('orders')->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
        $monthOrderCount =DB::table('orders')-> whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->count();
        $yearOrderCount =DB::table('orders')->whereYear('created_at', date('Y'))->count();
        
        $users = DB::table('users')->count();
        $products = DB::table('products')->count();
        $orders = DB::table('orders')->count();
        return view('home',compact('users','products','orders',
        'todayOrderCount','weekOrderCount','monthOrderCount','yearOrderCount','bestSellingThisMonth',
        'bestSellingThisYear','bestSellingCategoryThisMonth',
        'bestSellingCategoryThisYear','bestSellingBrandThisMonth','bestSellingBrandThisYear',
        'weekCustomerCount','monthCustomerCount'));

    }
}
