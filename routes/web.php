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

Route::get('/', 'HomeController@doLogin');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/post', 'PostController@post')->name('post');
// Route::get('/recipe', 'RecipeController@index')->name('recipe');
Route::get('profile', 'ProfileController@profile')->name('profile');
Route::post('profile', 'ProfileController@add_profile_pic');
Route::resource('/recipes', 'RecipeController');
Route::resource('/overviews', 'OverviewController');

Route::resource('users', 'UserController');
// Route::resource('users', 'UserController');
Route::get('addWatermark', function()
{
    $img = Image::make(public_path('images/main.jpg'));
   
    /* insert watermark at bottom-right corner with 10px offset */
    $img->insert(public_path('images/favicon.png'), 'bottom-right', 10, 10);
   
    $img->save(public_path('images/main-new.jpg')); 
   
    dd('saved image successfully.');
});
Route::get('userExp', 'ExportController@export');

use App\User;
use App\Http\Resources\User as UserResource;
use App\Http\Resources\UserCollection;


Route::get('/api/user', function () {
    return UserResource::collection(User::all()->keyBy->id);
});

Route::get('/api/users', function () {
    return new UserCollection(User::all());
});




// Route::resource('/recipes/create', 'RecipeController@create');