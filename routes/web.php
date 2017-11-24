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

Route::get('/', 'WebController@index');
Route::get('/tentang_kami', 'WebController@tentang_kami');
Route::get('/booking-guide', 'WebController@cara');

Auth::routes();
Route::get('admin_login', 'AdminAuth\LoginController@showLoginForm');
Route::post('admin_login', 'AdminAuth\LoginController@login');
Route::post('admin_logout', 'AdminAuth\LoginController@logout');
Route::post('admin_password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail');
Route::get('admin_password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm');
Route::post('admin_password/reset', 'AdminAuth\ResetPasswordController@reset');
Route::get('admin_password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');

Route::group(['middleware' => ['web']], function(){

	Route::get('/admin_home', 'AdminHomeController@index');
	Route::get('/jadwal-wedding', 'AdminHomeController@jadwalWedding');
	Route::get('/cara-booking', ['uses'=> 'AdminHomeController@caraBooking', 'as' => 'cara.index']);
	Route::get('/cara-booking/{id}/edit', ['uses' => 'AdminHomeController@caraBookingEdit', 'as' => 'cara.edit']);
	Route::put('/cara-booking/{id}', ['uses' => 'AdminHomeController@caraBookingUpdate', 'as' => 'cara.update']);
	Route::resource('admintentang', 'AboutController');
	Route::resource('portofolio', 'AdminPortofolio');
	Route::resource('adminbooking', 'AdminBookController');
});

Route::get('/home', 'HomeController@index');
/*
Route::get('/portofolio', 'AdminPortofolio@show');
Route::get('/portofolio/create', 'AdminPortofolio@index');
Route::post('/portofolio/create', 'AdminPortofolio@upload');
Route::post('portofolio/{id}/edit', 'AdminPortofolio');*/

//adminbooking
Route::get('konfpembayaran/{id}', ['uses'=>'AdminBookController@show', 'as' => 'konfpembayaran.show']);

Route::put('konfpembayaran/{id}', ['uses'=>'AdminBookController@pembayaran', 'as' => 'konfpembayaran.pembayaran']);

//booking
Route::get('booking', ['uses' => 'BookingController@index', 'as' => 'booking.index']);
Route::post('booking', 'BookingController@store');
Route::get('booking/status', ['uses' => 'BookingController@status', 'as' => 'booking.status']);
Route::get('booking/{id}/edit', ['uses' => 'BookingController@edit', 'as' => 'booking.edit']);
Route::put('booking/{id}', ['uses' => 'BookingController@update', 'as' => 'booking.update']);
Route::delete('booking/{id}', ['uses' => 'BookingController@destroy', 'as' => 'booking.destroy']);


//pembayaran
Route::get('pembayaran/{id}', ['uses' => 'PembayaranController@index', 'as' => 'pembayaran.index']);

Route::get('pembayaran/{id}/edit', ['uses' => 'PembayaranController@edit', 'as' => 'pembayaran.edit']);

Route::put('pembayaran/{id}', ['uses' => 'PembayaranController@update', 'as' => 'pembayaran.update']);

Route::post('pembayaran/{booking_id}', ['uses' => 'PembayaranController@store', 'as' => 'pembayaran.store']);

Route::get('nota/{id}', ['uses' => 'PembayaranController@cetak', 'as' => 'pembayaran.cetak']);

//pembayaran 2
Route::get('pembayaran2/{id}', ['uses' => 'Pembayaran2Controller@index', 'as' => 'pembayaran2.index']);

Route::get('pembayaran2/{id}/edit', ['uses' => 'Pembayaran2Controller@edit', 'as' => 'pembayaran2.edit']);

Route::put('pembayaran2/{id}', ['uses' => 'Pembayaran2Controller@update', 'as' => 'pembayaran2.update']);

Route::post('pembayaran2/{booking_id}', ['uses' => 'Pembayaran2Controller@store', 'as' => 'pembayaran2.store']);


//paket
Route::resource('paket-wedding', 'WeddingPaketController');

//pages
Route::get('paket', 'WebController@paket');
Route::get('paket/{id}', 'WebController@getPaketId');



