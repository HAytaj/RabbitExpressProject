<?php
use \App\Http\Middleware\Admin;
use App\User;
// use Illuminate\Support\Facades\Route;
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

Route::get('/',"FrontController@index")->name("/");
Route::get('/shirts/{id?}',"FrontController@shirts");
Route::get('/shirt/{id}',"FrontController@shirt");
Route::match(['put', 'patch'],"/front/changeSize/{id}","FrontController@changeSize")->name("front.changeSize");
Auth::routes();

Route::get('/logout', 'auth\LoginController@logout');
Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');


Route::group(['prefix'=>"admin","middleware"=>["auth","admin"]], function(){
    Route::get('/',function(){
        return view("admin.index");
    })->name("admin.index");
    Route::get('/users',function(){
        return view("admin.users")->with("users",User::all());
    })->name("admin.users");
    Route::resource("product","ProductsController");
    Route::resource("city","CitiesController");
    Route::resource("country","CountriesController");
    Route::resource("categories","CategoriesController");
    //Orders
    Route::get("/orders/index/{type?}","OrdersController@index");
    Route::post("/orders/changeOrderStatus/{id}","OrdersController@changeOrderStatus")->name("orders.changeOrderStatus");
    
    //Address
    Route::delete("/address/destroy/{id}","AddressesController@destroy");
    Route::get("/address/{id}","AddressesController@show");
    Route::match(['put', 'patch'],"/address/{id}","AddressesController@update");
    Route::get("/address/{id}/edit","AddressesController@edit");
    Route::get("/address","AddressesController@index");
});


Route::group(["middleware"=>["auth"]], function(){
    Route::get('/profile/index',"ProfileController@index")->name("profile.index");

    // Cart
    Route::get("/cart/store/{id}","CartController@store");
    Route::get("/cart/cartItems","CartController@cartItems");
    Route::get("/cart/checkout","CartController@checkOut");
    Route::get("/cart/emptyCart","CartController@emptyCart");
    Route::post("/cart/payment","CartController@payment");
    Route::match(['put', 'patch'],"/cart/quantityUpdate/{id}","CartController@quantityUpdate")->name("cart.quantityUpdate");
    Route::post("/cart/destroy/{id}","CartController@destroy")->name("cart.destroy");
    Route::match(['put', 'patch'],"/cart/updateSize/{id}","CartController@updateSize")->name("cart.updateSize");

    Route::post("/profile/storeReview","ProfileController@storeReview")->name("profile.storeReview");
    Route::delete("/profile/destroy/{id}","ProfileController@destroy")->name("profile.destroy");

    // Shipping
    Route::get("/address/create","AddressesController@create");
    Route::post("/address/store","AddressesController@store");
    Route::post("/address/appropriateCities/{id}","AddressesController@appropriateCities");
    

});


Route::get('images/{filename}', function ($filename)
{
 $path = public_path() . '/product_images'.'/'.$filename;

 $file = File::get($path);
 $type = File::mimeType($path);

 $response = Response::make($file, 200);
 $response->header("Content-Type", $type);

 return $response;
 })->name('image');
