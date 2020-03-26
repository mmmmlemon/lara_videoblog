<?php

use Illuminate\Support\Facades\Route;
use Carbon\Carbon;

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
    return view('home');
});

Route::get('/videos', function () {
    return view('videos');
});

Route::get('/gallery', function () {
    return view('gallery');
});

Route::get('/about', function () {
    return view('about');
});

Route::group(['middleware' => ['auth', 'admin']], function(){
    Route::get('/control', 'ControlPanelController@index')->name('control');
    Route::post('/control/update_settings', 'ControlPanelController@update_settings');
    Route::post('/control/update_social', 'ControlPanelController@update_social');
    Route::post('/control/change_user_type', 'ControlPanelController@change_user_type');
    Route::post('/control/update_profile', 'ControlPanelController@update_profile');
    Route::get('/control/create_post', function(){
        $current_date = Carbon::now();
        return view('control_panel/create_post', compact('current_date'));
    });
    Route::get('/control/control_panel/create_new_post', 'ControlPanelController@create_post');

    Route::get('/control/posts', function(){
        $posts = App\Post::orderBy('date','desc')->paginate(10);
        $page='normal';
        return view('control_panel/posts', compact('posts','page'));
    
    });
    Route::get('/control/posts/date', function(){
        $posts = App\Post::orderBy('date','asc')->paginate(10);
        $page = 'date_desc';
        return view('control_panel/posts', compact('posts', 'page'));
    });
    Route::get('/control/post_status/{id}/{status}', 'ControlPanelController@change_post_status');
    Route::post('/control/post_status/{id}/{status}', 'ControlPanelController@change_post_status');
    Route::get('/control/delete_post/{id}', 'ControlPanelController@delete_post');
    Route::delete('/control/delete_post/{id}', 'ControlPanelController@delete_post');

});


Auth::routes();


