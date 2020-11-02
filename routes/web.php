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

Route::get('/', 'IndexController@index');

Route::get('/about', function () {
    return view('about');
});


Route::get('/contact', function () {
    return view('contact');
});


Route::get('/gallery', function () {
    return view('gallery');
});
Route::post('/contact','ContactController@store')->name('contact.submit');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->group(function() {

    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');

});

Route::get('/blog', 'BlogController@index');
Route::get('/blog/{blog}', 'BlogController@show');
Route::get('/create/blog', 'CreateBlogController@create')->name('admin.create.blog');
Route::post('/create/blog/submit', 'CreateBlogController@store')->name('admin.create.blog.submit');

Route::get('/project/{project}','AdminProjectController@show')->name('admin.projects');
Route::get('/projects','AdminProjectController@index')->name('admin.projects');
Route::get('/projects/{project}','AdminProjectController@approved')->name('admin.projects.update');
Route::get('/projects/reject/{project}','AdminProjectController@reject')->name('admin.projects.reject');


Route::get('/create/project', 'ProjectController@index')->name('create.project');
Route::post('/create/project/submit', 'ProjectController@create')->name('create.project.submit');

Route::get('/volunteer', 'VolunteerController@index')->name('volunteer');
Route::post('/volunteer/submit', 'VolunteerController@create')->name('volunteer.submit');
Route::post('/volunteer/telemedicine/submit', 'VolunteerController@createtele')->name('volunteer.telemedicine.submit');
Route::get('/volunteer/{project}/submit','VolunteerController@storeEach')->name('volunteer.each.submit');

Route::get('/donate', 'DonateController@index')->name('donate');
Route::post('/donate/submit', 'DonateController@paymentWithpaypal')->name('donate.submit');
Route::get('/donate/status', 'DonateController@getPaymentStatus')->name('donate.status');

Route::post('/donate/equipment/submit', 'DonateController@createequip')->name('donate.equipment.submit');

Route::get('/donate/money/{donate}','DonateController@indexEach')->name('donate.money.each');
Route::get('/donate/equipment/{donate}','DonateController@indexequipEach')->name('donate.equipment.each');


