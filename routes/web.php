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
//client portfolio
Route::get('/design/portfolio', 'PortfolioController@designPortfolio')->middleware('auth');
Route::post('/portfolio/store', 'PortfolioController@savePortfolio')->name('storePortfolio')->middleware('auth');
Route::get('/portfolio/preview', 'PortfolioController@previewPortfolio')->middleware('auth');
Route::get('/portfolio/{sysid}', 'PortfolioController@displayPortfolio');
//consultant routes
Route::get('/consultant/auth', 'ConsultantController@auth')->name('consAuth');
Route::post('/consultant/login', 'ConsultantController@authenticate')->name('consAuthenticate');
Route::get('/consultant/signup', 'ConsultantController@signupForm')->name('consReg');
Route::post('/consultant/authenticate', 'ConsultantController@logInCons')->name('logInCons');
Route::post('/consultant/register', 'ConsultantController@register')->name('registerCons');
Route::get('/consultant/dashboard', 'ConsultantController@home')->middleware('consultant');
Route::get('/consultant/work', 'ConsultantController@work')->middleware('consultant');
Route::get('/consultant/work/history', 'ConsultantController@history')->middleware('consultant');
Route::get('/consultant/work/ongoing', 'ConsultantController@inProgress')->middleware('consultant');
Route::get('/consultant/work/task/view/{id}', 'OrdersController@ConsultantView')->middleware('consultant');
Route::get('/consultant/work/handle/{id}', 'OrdersController@adoptOrder')->middleware('consultant');
Route::get('/consultant/work/task/{id}', 'ConsultantController@workOnTask')->middleware('consultant');

//chat
Route::get('/fetch/messages/{id}', 'MessageController@fetch')->middleware('auth');
Route::post('/store/message', 'MessageController@stores')->middleware('auth');
Route::get('/test/chat', 'MessageController@test')->middleware('auth');

//admin stuff
Route::get('/manage/admin/register', 'AdminauthController@register');
Route::post('/admin/registration', 'AdminauthController@adminRegistering');
Route::post('/admin/store', 'AdminauthController@adminStore');
Route::get('/manage/admin/login', 'AdminauthController@loginForm');
Route::post('/manage/admin/logingin', 'AdminauthController@startSession');

Route::get('/admin/dash', 'AdminController@dashBoard')->middleware('admin'); 

//admin assign task
Route::put('/order/asign-writer', 'OrdersController@assignTask');
