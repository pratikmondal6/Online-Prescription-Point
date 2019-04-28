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

/*
|--------------------------------------------------------------------------
| Login Routes
|--------------------------------------------------------------------------
*/
Route::get('/login','LoginController@index')->name('login.index');
Route::post('/login','LoginController@check');

/*
|--------------------------------------------------------------------------
| Forgot password Routes
|--------------------------------------------------------------------------
*/

Route::get('/change-password', 'ForgotPasswordController@index')->name('forgotPassword.index');
Route::post('/change-password', 'ForgotPasswordController@changePassword');
/*
|--------------------------------------------------------------------------
| Signup Routes & AJAX
|--------------------------------------------------------------------------
*/

Route::get('/register','SignupController@index')->name('signup.index');
Route::post('/register','SignupController@create');
Route::get('/register/ajax/{value}','SignupController@getEmail')->name('signup.getEmail');

Route::group(['middleware' => 'authSession'], function () {

/*
|--------------------------------------------------------------------------
| Additional info Routes
|--------------------------------------------------------------------------
*/
Route::get('/register/additional-info','SignupController@additionalInfo')->name('signup.additionalInfo');
Route::post('/register/additional-info','SignupController@insertAdditionalInfo');

/*
|--------------------------------------------------------------------------
| Doctor Routes
|--------------------------------------------------------------------------
*/
Route::get('/doctor', 'DoctorController@index')->name('doctor.index');
Route::get('/doctor/edit-profile', 'DoctorController@editProfile')->name('doctor.editProfile');
Route::post('/doctor/edit-profile', 'DoctorController@updateInfo');

Route::get('/doctor/create-prescription', 'DoctorController@createPrescription')->name('doctor.createPrescription');
Route::post('/doctor/create-prescription', 'DoctorController@storePrescription');

Route::get('/doctor/show-notification', 'DoctorController@showNotification')->name('doctor.showNotification');
Route::post('/doctor/update-medicine/{id}', 'DoctorController@updateMedicine')->name('doctor.updateMedicine');

/*
|--------------------------------------------------------------------------
| Pharmacy Routes
|--------------------------------------------------------------------------
*/
Route::post('/pharmacy/request/{id}', 'PharmacyController@storeRequest')->name('pharmacy.storeRequest');
Route::resource('/pharmacy', 'PharmacyController');

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::get('/admin/user_list','AdminController@showAllUser')->name('admin.showAllUser');
Route::post('/admin/{id}/edit-user_account','AdminController@editUser')->name('admin.editUser');

Route::get('/admin/patient_list','AdminController@showAllPatient')->name('admin.showAllPatient');
Route::post('/admin/{id}/edit-patient_account','AdminController@editPatient')->name('admin.editPatient');

Route::post('/admin/delete-User/{id}','AdminController@deleteUser')->name('admin.deleteUser');

Route::post('/admin/delete-patient/{id}','AdminController@deletePatient')->name('admin.deletePatient');

Route::resource('/admin', 'AdminController');
/*
|--------------------------------------------------------------------------
| Patient Routes
|--------------------------------------------------------------------------
*/
Route::resource('/patient', 'PatientController');

/*
|--------------------------------------------------------------------------
| Logout Routes
|--------------------------------------------------------------------------
*/
Route::get('/logout','LogoutController@index')->name('logout.index');
});
