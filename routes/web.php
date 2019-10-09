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
	$tasks =[ 
		'Goto Market',
		'Goto store',
		'Goto Work'
	];
    return view('welcome')->withTasks($tasks);
});

// Route::get('/post/{post}', function($post) {
//     $posts =[
//     	'my-first-blog' => 'Hello! This is my first blog post.',
//     	'my-second-blog' => 'Hello! This is my second blog post.'
//     ];

//     if (!array_key_exists($post,$posts)) {
//     	abort(404,'Soorry that post is not found.');
//     }

//     return view('post',[
//     	'post'=> $posts[$post]
//     ]);
// });

// Route::get('/', function () {
// 	$name = request('name');
//     return view('test',[
//     	'name'=>$name]);
// });

Route::get('/hey', function () {
    return '<h1>  hey </h1>';
});

Route::get('hi', function () {
    return '<h1>  hi </h1>';
});
Route::get('/about', function(){
	return view('pages.about');
});

Route::get('/', 'PagesController@index');
//Route::post('/', 'PostsController@store');
// for dynamic link
// Route::get('/users/{id}/{name} ', function ($id,$name) {
//     return 'This is user '.$name. ' with an id of '.$id;
// });
Route::get('/about','PagesController@about');

Route::get('/services','PagesController@services');
Route::resource('posts','PostsController');
Route::get('/posts','PostsController@index');
Route::post('/posts','PostsController@store')->name('posts.store');
Route::post('/posts/{id}', 'PostsController@update')->name('posts.update');
Route::get('/posts/create','PostsController@create')->name('posts.create');
Route::get('/posts/{id}','PostsController@show');
Route::get('posts/{id}/edit', 'PostsController@edit')->name('posts.edit');
Route::delete('posts/{id}','PostsController@destroy')->name('posts.destroy');

Route::get('/products/view','ProductsController@view');
Route::get('/products/','ProductsController@index');
Route::post('/products/','ProductsController@store')->name('products.store');
Route::get('/products/create', 'ProductsController@create')->name('products.create');
Route::get('/products/{id}', 'ProductsController@show')->name('products.show');
Route::get('/products/{id}/edit', 'ProductsController@edit')->name('products.edit');
Route::post('/products/{id}', 'ProductsController@update')->name('products.update');
Route::delete('/products/{id}', 'ProductsController@destroy')->name('products.destroy');

Route::get('/tickets', 'TicketsController@index');
Route::get('tickets/create', 'TicketsController@create')->name('tickets.create');
Route::post('/tickets/','TicketsController@store')->name('tickets.store');
Route::post('/tickets/update', 'TicketsController@update')->name('tickets.update');
Route::get('/tickets/{id}/edit', 'TicketsController@edit')->name('tickets.edit');
Route::get('/tickets/{id}', 'TicketsController@show')->name('tickets.show');
Route::delete('/tickets/{id}', 'TicketsController@destroy')->name('tickets.destroy');

Route::post('/tasks/{task}', 'PostTaskController@update');
Route::post('/tasks/{post}/tasks', 'PostTaskController@store');

//Datatables
Route::get('users', 'UsersController@index');

Route::get('users-list', 'UsersController@usersList'); 

//image
Route::get('image', 'PostsController@view');
Route::get('imagedemo', 'PostsController@demo');