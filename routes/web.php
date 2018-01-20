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

use App\Menu;
use App\User;
use App\Profile;

Route::get('/', 'LoginController@form')->name('login.form');
Route::post('/attempt', 'LoginController@attempt')->name('login.attempt');
Route::get('/signOut', 'LoginController@logout')->name('login.logout');
Route::get('/home', function() {
	$menus = Menu::where('parent_id', 0)->get();
	$allMenu = Menu::pluck('name', 'id')->all();
	return view('layout', compact('menus', 'allMenu'));
});
Route::resource('/setup_app', 'menuController');
Route::resource('/group_role', 'GrouproleController');
Route::resource('/addAccess', 'AccessController');
