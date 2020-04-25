<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('auth')->group(function () {
    Route::post('register', 'AuthController@register');
    Route::post('login', 'AuthController@login');
    Route::get('refresh', 'AuthController@refresh');

    Route::group(['middleware' => 'auth:api'], function(){
        Route::get('user', 'AuthController@user');
        Route::post('logout', 'AuthController@logout');

    });
});

Route::group(['middleware' => 'auth:api'], function(){
    // Users
    Route::get('users', 'UserController@index')->middleware('Admin');
    Route::get('users/{id}', 'UserController@show');
    Route::get('roles','RolesController@index')->middleware('Admin');
    Route::post('roles/store','RolesController@store')->middleware('Admin');
    Route::get('roles/edit/{id}','RolesController@edit')->middleware('Admin');
    Route::put('roles/update/{id}','RolesController@update')->middleware('Admin');
    Route::get('roles/delete/{id}','RolesController@delete')->middleware('Admin');
    Route::get('profile', 'ProfileController@index');
    Route::get('/profile/edit', 'ProfileController@edit');
    Route::put('/profile/update','ProfileController@update');
    Route::get('/mobileOtpVerified',['uses'=>'UserController@mobileOtpVerified','as'=>'mobile-otp-verified']);
    Route::get('/company/{id}', 'CompanyController@show');
    Route::get('/company/edit', 'CompanyController@edit');
    Route::put('/company/update','CompanyController@update');
    Route::post('/company/primarydetails','CompanyController@store');
    Route::post('/company/address','CompanyAddressController@store');
    Route::post('/company/additionaldetails','CompanyAdditionalDetailsController@store');
    Route::get('/company/address/countrysearch','CountriesController@getCountries');
    Route::get('/company/address/statesearch','StatesController@getStates');
    Route::get('/company/address/citysearch','CitiesController@getCity');
    Route::post('/company/socialmedialinks','CompanySocialMediaController@store');
    
    Route::get('/company/{company_id}/socialmedialinks', 'CompanySocialMediaController@show');
    Route::get('/company/edit/{company_id}/socialmedialinks', 'CompanySocialMediaController@edit');
    Route::put('/company/update/{company_id}/socialmedialinks', 'CompanySocialMediaController@update');

});
