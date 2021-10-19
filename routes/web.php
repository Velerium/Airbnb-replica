<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/', 'HomeController@index')->name('homepage');

/* Apt for city */
Route::get('ByCity/{string}','ApartmentsByCityController@index' )->name('AptByCity');
Route::resource('ByCity', 'ApartmentsByCityController');
 
Route::resource('userApartments', 'UserApartmentsController');

Route::resource('searchApartments', 'SearchApartmentsController');

Route::get('/statistics/{userApartment}', 'StatisticsController@show')->name('statistics');

// BRAINTREE ROUTES
Route::get('/sponsorship', 'BraintreeController@index')->name('sponsorship'); // get the request
Route::post('/sponsorship/payment', 'BraintreeController@payment')->name('payment'); // post the 'answer'


