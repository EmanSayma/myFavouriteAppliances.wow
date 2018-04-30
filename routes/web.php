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

Route::get('/', function () {
    return view('website.index');
});

Auth::routes();

Route::get('/admin', 'AdminController@index')->name('admin');

//////////////////////////////Admin Dashboard Routes///////////////////////////////////////////////

Route::namespace('Admin')->group(function(){
      Route::get('/admin/products','ProductsController@index');

     Route::get('/admin/products/getProducts','ProductsController@getProducts');

     Route::post('/admin/products/postProduct','ProductsController@postProduct');

     Route::get('/admin/products/fetchProduct','ProductsController@fetchProduct');

     Route::get('/admin/products/deleteProduct','ProductsController@deleteProduct');
    
     Route::get('/admin/products/deleteMultipleProducts','ProductsController@deleteMultipleProducts');

     Route::get('/admin/products/{product_id}','ProductsController@show');

    Route::get('/admin/products/checkSlugUnique','ProductsController@ckeckSlugUnique');
 

///////////////////////////////////////////////////////////////////////////////////////////////////////
    Route::get('/admin/categories','CategoryController@index');

    Route::post('/admin/categories','CategoryController@store');

    Route::get('/admin/categories/show','CategoryController@show');

    Route::get('/admin/categories/fetchCategories','CategoryController@fetchCategories');
    
     Route::get('/admin/categories/checkUnique','CategoryController@checkUnique');

     Route::get('/admin/categories/getCategories','CategoryController@getCategories');

});


  ///////////////////////////////Website Routes//////////////////////////////////////////////   
Route::namespace('Website')->group(function(){
   Route::get('/products/{cat_slug}/{slug}','ProductsController@show')
            ->where('slug','[\w\d\-\_]+')
            ->where('cat_slug','[\w\d\-\_]+');

   Route::get('/products/{name}','ProductsController@index');

  Route::post('/products/addToWishlist','WishlistController@store');


    Route::get('/wishlist','WishlistController@index');


});   