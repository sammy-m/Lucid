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

Route::get('/manage/register', 'ClientauthController@orderRegister');
Route::post('/register/ordering', 'ClientauthController@orderwRegistering');
Route::get('/order/login', 'ClientauthController@orderLogin');
Route::post('/order/logingin', 'ClientauthController@startSession');
//Route::post('/register/ordering', 'PagesController@orderwRegistering');

Route::get('/order/details', 'PagesController@orderDetails');
Route::post('/order/detailss', 'PagesController@postOrderDetails');
Route::get ('/order/instructions', 'PagesController@orderInstructions');
Route::post('/order/instructionss', 'PagesController@postOrderInstructions');

Route::get('/order/preview', 'PagesController@previewOrder');

//pay with paypal
Route::post('/pay/with/paypal', 'paymentController@payWithpaypal');
Route::get('status', 'paymentController@getPaymentStatus');

//client dashboard
Route::get('/manage/dashboard', 'ClientsController@dashboard');
Route::get('dashboard/orderhist', 'ClientsController@History');

//order instance
Route::get('/dashboard/myorders/{id}', 'OrdersController@showOrder');
Route::get('/admin/view-order/{id}', 'OrdersController@adminShowOrder')->middleware('admin');

//consultant routes
Route::get('/consultant/auth', 'ConsultantController@auth');
Route::post('/consultant/login', 'ConsultantController@authenticate')->name('consAuthenticate');
Route::get('/consultant/signup', 'ConsultantController@signupForm');

//admin stuff
Route::get('/manage/admin/register', 'AdminauthController@register');
Route::post('/admin/registration', 'AdminauthController@adminRegistering');
Route::post('/admin/store', 'AdminauthController@adminStore');
Route::get('/manage/admin/login', 'AdminauthController@loginForm');
Route::post('/manage/admin/logingin', 'AdminauthController@startSession');

Route::get('/admin/dash', 'AdminController@dashBoard')->middleware('admin'); 

//admin assign task
Route::put('/order/asign-writer', 'OrdersController@assignTask');
