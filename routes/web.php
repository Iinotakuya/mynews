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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*012-2【応用】11章で /admin/profile/create にアクセスしたら ProfileController の add Action に割り当てるように設定しました。 ログインしていない状態で /admin/profile/create にアクセスした場合にログイン画面にリダイレクトされるように設定しましょう。*/
/*012-3【応用】同様に 11章で /admin/profile/edit にアクセスしたら ProfileController の edit Action に割り当てるように設定しました。ログインしていない状態で /admin/profile/edit にアクセスした場合にログイン画面にリダイレクトされるように設定しましょう。*/
/*013-3【応用】 routes/web.php を編集して、 admin/profile/create に postメソッドでアクセスしたら ProfileController の create Action に割り当てるように設定してください。*/
/*013-6【応用】 routes/web.php を編集して、 admin/profile/edit に postメソッドでアクセスしたら ProfileController の update Action に割り当てるように設定してください。*/
Route::group(['prefix' => 'admin', 'middleware' => 'auth'],function() {
    Route::get('profile/create', 'Admin\ProfileController@add');
    Route::get('profile/edit', 'Admin\ProfileController@edit');
    Route::post('profile/create', 'Admin\ProfileController@create'); 
    Route::post('profile/edit','Admin\ProfileController@update');
});

/*019-2.【応用】 routes/web.phpを編集して、 /profile にアクセスが来たら ProfileController/index Action に渡すように設定してください。*/
    Route::get('/profile','ProfileController@index');


Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
     Route::get('news/create', 'Admin\NewsController@add');
     Route::post('news/create', 'Admin\NewsController@create'); 
     Route::get('news','Admin\NewsController@index');
     Route::get('news/edit','Admin\NewsController@edit');
     Route::post('news/edit','Admin\NewsController@update');
     Route::get('news/delete','Admin\NewsController@delete');
});


     Route::get('/', 'NewsController@index');




