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
    Route::post('/company/primarydetails','CompanyController@store');
    Route::get('/company/primarydetails/edit', 'CompanyController@edit');
    Route::put('/company/primarydetails/update','CompanyController@update');
    Route::post('/company/address','CompanyAddressController@store');
    Route::get('/company/address/edit', 'CompanyAddressController@edit');
    Route::put('/company/address/update', 'CompanyAddressController@update');
    Route::post('/company/additionaldetails','CompanyAdditionalDetailsController@store');
    Route::get('/company/additionaldetails/edit','CompanyAdditionalDetailsController@edit');
    Route::put('/company/additionaldetails/update','CompanyAdditionalDetailsController@update');
    Route::get('/company/address/countrysearch','CountriesController@getCountries');
    Route::get('/company/address/statesearch','StatesController@getStates');
    Route::get('/company/address/citysearch','CitiesController@getCity');
    Route::post('/company/socialmedialinks','CompanySocialMediaController@store');
    Route::get('/company/socialmedialinks/edit','CompanySocialMediaController@edit');
    Route::put('/company/socialmedialinks/update','CompanySocialMediaController@update');
    
    Route::get('/admin/users/list','AdminUsersController@index')->middleware('Admin');
    Route::get('/admin/users/sort','AdminUsersController@sortByStatus')->middleware('Admin');
    Route::get('/admin/internships/index','AdminInternshipPostsController@index')->middleware('Admin');
    Route::get('/admin/verifycompanies','VerifyCompanyController@index')->middleware('Admin');
    Route::put('/admin/verifycompanies/changeverify','VerifyCompanyController@changeVerified');
    Route::get('/company/verify/access','VerifyCompanyController@getAccess');


    Route::get('/company/{company_id}/socialmedialinks', 'CompanySocialMediaController@show');
    Route::get('/company/edit/{company_id}/socialmedialinks', 'CompanySocialMediaController@edit');
    Route::put('/company/update/{company_id}/socialmedialinks', 'CompanySocialMediaController@update');

    Route::get('/company/address/check', 'CompanyAddressController@check');
    Route::get('/company/additionaldetails/check', 'CompanyAdditionalDetailsController@check');
    Route::get('/company/socialmedialinks/check','CompanySocialMediaController@check');
    Route::get('/company/dashboard/check','CompanySocialMediaController@checkForDashboard');



    Route::get('/internships/profiles','CompanyPostInternshipController@getProfiles');
    Route::get('/internships/citysearch','CompanyPostInternshipController@getCity');
    Route::get('/internships/skills','CompanyPostInternshipController@getSkills');
    Route::post('/company/postinternship','CompanyPostInternshipController@store');
    Route::get('/company/view/internships','CompanyViewPostedInternshipsController@index');
    Route::get('/company/view/{id}/applications','CompanyViewApplicationsController@index');
    Route::get('/company/view/{id}/applications/sort','CompanyViewApplicationsController@sortByStatus');
    Route::get('/company/view/{id}/response','CompanyViewApplicationsController@getStudent');
    Route::post('/applicant/status/change','ApplicantsSelectionStatusController@changeStatus');

    Route::post('/student/primarydetails','StudentPrimaryDetailsController@store');
    Route::get('/student/internships/fields','InternshipPreferencesController@getFields');
    Route::get('/student/internships/citysearch','InternshipPreferencesController@getCity');
    Route::post('/student/internshippreferences','InternshipPreferencesController@store');
    Route::get('/student/dashboard/check','InternshipPreferencesController@checkForDashboard');
    Route::get('/student/internships/check','InternshipPreferencesController@check');
    Route::post('/student/graduationdetails','StudentGraduationDetailsController@store');
    Route::get('/student/graduationdetails/edit','StudentGraduationDetailsController@edit');
    Route::post('/student/postgraduationdetails','StudentPostGradDetailsController@store');
    Route::get('/student/postgraduationdetails/edit','StudentPostGradDetailsController@edit');
    Route::post('/student/tenthdetails','StudentTenthDetailsController@store');
    Route::get('/student/tenthdetails/edit','StudentTenthDetailsController@edit');
    Route::post('/student/twelthdetails','StudentTwelthDetailsController@store');
    Route::get('/student/twelthdetails/edit','StudentTwelthDetailsController@edit');
    Route::post('/student/diplomadetails','StudentDiplomaDetailsController@store');
    Route::get('/student/diplomadetails/edit','StudentDiplomaDetailsController@edit');
    Route::post('/student/phddetails','StudentPhdDetailsController@store');
    Route::get('/student/phddetails/edit','StudentPhdDetailsController@edit');
    Route::post('/student/jobdetails','StudentJobDetailsController@store');
    Route::post('/student/internshipdetails','StudentInternshipDetailsController@store');
    Route::post('/student/positionofresponsibility','StudentPositionOfRespDetailsController@store');
    Route::post('/student/trainingdetails','StudentTrainingDetailsController@store');
    Route::post('/student/projectdetails','StudentProjectDetailsController@store');
    Route::post('/student/additionaldetails','StudentAdditionalDetailsController@store');
    Route::get('/student/additionaldetails/edit','StudentAdditionalDetailsController@edit');
    Route::post('/student/links','StudentLinksController@store');
    Route::get('/student/links/edit','StudentLinksController@edit');
    Route::get('/student/skillsearch','StudentSkillsDetailsController@getSkills');
    Route::post('/student/skilldetails','StudentSkillsDetailsController@store');
    Route::get('/student/skilldetails/edit','StudentSkillsDetailsController@edit');
    Route::get('/student/internship/{id}/details','CompanyPostInternshipController@show');
    Route::get('/student/internship/{id}/assessment/questions','InternshipAssessmentAnswersController@getQuestions');
    Route::post('/student/internship/assessment','InternshipAssessmentAnswersController@store');
    Route::get('/student/resume/view', 'StudentViewResumeController@viewResume');

    Route::get('/student/internships/main', 'StudentViewInternshipsController@index');

    Route::get('/student/collegesearch','CollegesController@getCollege');
    Route::get('/student/degreesearch','DegreesController@getDegree');
    Route::get('/student/streamsearch','StreamsController@getStream');

});
