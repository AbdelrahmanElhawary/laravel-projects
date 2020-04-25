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
    return view('auth.login');
});

Auth::routes();
Route::post('/login/custom',[
    'uses'=>'LoginController@login',
    'as'=>'login.custom'
]);

Route::get('/Category/create','CategoryController@create');
Route::post('/Category/store','CategoryController@store');
Route::get('/Category/{category}','CategoryController@show');
Route::get('/Category/{category}/edit','CategoryController@edit');
Route::get('/Category/{category}/delete','CategoryController@delete');
Route::patch('/Category/{category}','CategoryController@update');


Route::get('/Product/create','ProductController@create');
Route::post('/Product/store','ProductController@store');
Route::get('/Product/finished','ProductController@finished');
Route::post('/Product/add/{product}','ProductController@add');
Route::get('/Product/{product}/delete','ProductController@delete');
Route::get('/Product/{product}/edit','ProductController@edit');
Route::patch('/Product/{product}','ProductController@update');

Route::group(['middleware'=>['auth','web']],function(){
    route::get('/home',function(){
        $data=App\Category::all();
        return view('home',['data'=>$data]);
    })->name('home');
    route::get('/dashboard',function(){
        $data=App\Category::all();
        return view('admin/dashboard',['data'=>$data]);
    })->name('dashboard');
    Route::get('/home/Product/addtocart/{product}','CartController@add');
    Route::get('/home/Product/buycart','CartController@buy');
    Route::get('/home/Product/removefromcart/{product}','CartController@remove');
    Route::get('/home/cart','CartController@show');
    Route::get('/home/history','HomeController@history');
    Route::get('/home/{category}','HomeController@show');
});