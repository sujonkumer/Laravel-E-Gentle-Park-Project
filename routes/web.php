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

/*Route::get('/', function () {
    return view('welcome');
});*/



/*Admin Page Routes Section Start*/

 Route::group(['prefix' => 'admin'], function(){
    // Admin page show
    Route::get('/','Backend\PagesController@index')->name('dashboard');
    


     /*
    |--------------------------------------------------------------------------
    | Product Section Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register web routes for your application. These
    | routes are loaded by the RouteServiceProvider within a group which
    | contains the "web" middleware group. Now create something great!
    |
    */
    //============== Product serction start=======================================
 Route::group(['prefix' => 'product'], function(){
     // Product related all page show Routes
    Route::get('/createproduct','Backend\ProductsController@CreateProduct')->name('Backend.pages.product.createproduct');
    Route::get('/manageproduct','Backend\ProductsController@ManageProduct')->name('Backend.pages.product.manageproduct');
    Route::get('/editproduct/{id}','Backend\ProductsController@EditProduct')->name('Backend.pages.product.editproduct');
    
    //  Product Backend Routes
    // StorePruduct
    Route::post('/storeproduct','Backend\ProductsController@StoreProduct')->name('storeproduct');
    // Edit Product
    Route::post('/updateproduct/{id}','Backend\ProductsController@ProductUpdate')->name('productupdate');
    //Delete Product
    Route::post('/deleteproduct/{id}','Backend\ProductsController@DeletePorduct')->name('deleteproduct');
   
});
// ================== Product section end=========================================
    


    /*
    |--------------------------------------------------------------------------
    | Category Section Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register web routes for your application. These
    | routes are loaded by the RouteServiceProvider within a group which
    | contains the "web" middleware group. Now create something great!
    |
    */
// ================== Category Section Start =====================================
Route::group(['prefix' => 'category'],function(){
    // Category related all page show routes
    Route::get('/createcategory', 'Backend\CategoryController@CreateCategory')->name('createcategory');
    Route::get('/managecategory','Backend\CategoryController@ManageCategory')->name('managecategory');
    Route::get('/editcategory/{id}','Backend\CategoryController@EditCategory')->name('editcategory');

    // Category Releted Backend Routes
    Route::post('/storecategory','Backend\CategoryController@StoreCategory')->name('storecategory');
    Route::post('/editcategory/{id}','Backend\CategoryController@UpdateCategory')->name('');
    Route::post('/categorydelete/{id}','Backend\CategoryController@DeleteCategory')->name('deletecategory');
});


 });
 
/*Admin Page Routes Section End*/
