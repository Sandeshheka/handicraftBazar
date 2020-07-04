<?php
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
// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'HomeController@landing');
Route::get('/about', function () {
    return view('front/about');
});
Route::get('/contact', function () {
    return view('front/contact');
});
Route::get('/products', function () {
    return view('front/shop');
});
Route::get('/product_details/{id}', 'HomeController@product_details');
Route::get('/cart', 'CartController@index');
Route::get('/cart/addItem/{id}', 'CartController@addItem');
Route::get('/shop', function () {
    return view('front/shop');
});
Route::get('/shop', 'HomeController@shop');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/contact', 'HomeController@contact')->name('contactus');
Route::post('addToWishList', 'HomeController@wishList')->name('addToWishList');
Route::get('/WishList', 'HomeController@View_wishList');
Route::get('/removeWishList/{id}', 'HomeController@removeWishList');
Route::get('/cart/update/{id}', 'CartController@update');
Route::get('selectSize', 'HomeController@selectSize');
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/', function () {
        return view('admin.index');
    })->name('admin.index');
    Route::POST('/admin/store', 'AdminController@store');
    Route::get('/admin', 'AdminController@index');
    Route::resource('product', 'ProductsController');
    Route::resource('category', 'CategoriesController');
    Route::get('ProductEditForm/{id}', 'ProductsController@ProductEditForm')->name('ProductEditForm');
    Route::post('editProducts/{id}', 'ProductsController@editProducts')->name('editProducts');
    Route::get('EditImage/{id}', 'ProductsController@ImageEditForm')->name('ImageEditForm');
    // Route::get('ImageEditForm/{id}', 'ProductsController@ImageEditForm')->name('ImageEditForm');
    Route::post('editProImage', 'ProductsController@editProImage')->name('editProImage');
    Route::resource('admin/product', 'ProductsController', ['names' => ['index' => 'admin.product.index',
    // 'create'=>'admin.posts.create',
    // 'store'=>'admin.posts.store',
    // 'update'=>'admin.product.update'
    // Route::PATCH('editProducts', 'ProductsController@editProduct')->name('editProducts');
    ]]);
    Route::get('/addProperty{id}', 'ProductsController@addProperty')->name('addProperty');
    Route::post('sumbitProperty', 'ProductsController@sumbitProperty')->name('sumbitProperty');
    Route::post('editProperty', 'ProductsController@editProperty');
    Route::get('addSale', 'ProductsController@addSale');
});
Route::get('/cart/addItem/{id}', 'HomeController@product_details');
Route::get('/cart/addItem/{id}', 'CartController@addItem');
Route::get('/cart/remove/{id}', 'CartController@destroy');
Route::put('/cart/update/{id}', 'CartController@update');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('/newArrival', 'HomeController@newArrival');
//Star Wars
Route::group(['middleware' => 'auth'], function () {
    Route::get('/checkout', 'CheckoutController@index');
    Route::post('/formvalidate', 'CheckoutController@formvalidate');
    Route::get('/orders', 'ProfileController@orders');
    Route::get('/address', 'ProfileController@address');
    Route::post('/updateAddress', 'ProfileController@UpdateAddress');
    Route::get('/password', 'ProfileController@Password');
    Route::post('/updatePassword', 'ProfileController@updatePassword');
    Route::get('/profile', function () {
        return view('profile.index');
    });
    Route::get('/thankyou', function () {
        return view('profile.thankyou');
    });
});
Route::post('addReview', 'HomeController@addReview');
Route::get('/cart/update/{id}', 'CartController@update');
Route::post('/search', 'HomeController@search');

Route::post('image-upload', 'CategoriesController@store')->name('category.store');

Route::get('/delete/{id}', 'CategoriesController@destroy');
Route::get('/catupdate/{id}', 'CategoriesController@update');
Route::get('category.updatecategory/{id}', 'CategoriesController@updatecategory');

Route::get('/deletepro/{id}', 'ProductsController@destroy');

// Banner
Route::get('/addSliderBanner/create', 'ProductsController@addBanner')->name('addBanner');
Route::post('/addSliderBanner', 'ProductsController@createBanner')->name('createBanner');
Route::get('/admin/showSliderBanner', 'ProductsController@showBanner')->name('showBanner');
