<?php
  
use Illuminate\Support\Facades\Route;
  
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\StatusController;


  
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
  
Route::get('/', function () {
    return view('welcome');
});
Route::get('/productlist', [ProductController::class, 'products'])->name('productlist');  
Route::get('cart', [ProductController::class, 'cart'])->name('cart');
Route::get('add-to-cart/{id}', [ProductController::class, 'addToCart'])->name('add.to.cart');
Route::patch('update2-cart', [ProductController::class, 'update2'])->name('update2.cart');
Route::delete('remove-from-cart', [ProductController::class, 'remove'])->name('remove.from.cart');
Route::get('orders', [ProductController::class, 'cardAddOrder'])->name('addorders');
Route::get('order-add', [OrderController::class, 'store'])->name('order.add');
Route::get('importExportView', [ProductController::class, 'importExportView']);
Route::get('export', [ProductController::class, 'export'])->name('export');
Route::post('import', [ProductController::class, 'import'])->name('import');


Auth::routes();
  
Route::get('/home', [HomeController::class, 'index'])->name('home');
  
Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('brands', BrandController::class);
    Route::resource('units', UnitController::class);
    Route::resource('status', StatusController::class);

});

Route::get('/orders', [OrderController::class, 'index'])->name('orders');

Route::get('/orders/{id}',  [OrderController::class, 'showOrdersProducs'])->name('ordersproducts');




