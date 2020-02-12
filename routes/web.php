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
    return view('welcome');
});

Route::get('/', function () {
    return redirect(app()->getLocale());
});

Route::get('/admin', function () {
    return redirect(app()->getLocale().'/admin');
});

Route::get('/home', function () {
    return redirect(app()->getLocale().'/home');
});

Route::get('/login', function () {
    return redirect(app()->getLocale().'/login');
});


Route::group([
    'prefix' => '{locale}', 
    'where' => ['locale' => '[a-zA-Z]{2}'], 
    'middleware' => 'setlocale'], function() {

    Route::get('/', 'FaqController@index')->name('home');
    
    //Auth::routes();
    
    Route::get('/home', 'HomeController@index')->name('home');

    
});

Route::group(['prefix' => '{locale}/admin','middleware' => ['setlocale','auth']], function() {
    
    Route::get('/', function (){
        return view('admin/dashboard');
    })->name('admin');

    //Auth::routes();

    Route::resource('faq', 'Admin\FaqController',['as'=>'admin']);


});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
