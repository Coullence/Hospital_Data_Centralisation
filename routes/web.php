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
use App\Tracker;

Route::get('/', function () {
    
    //number of user connected or viewed
    Tracker::firstOrCreate([
        'ip'   => $_SERVER['REMOTE_ADDR']],
        ['ip'   => $_SERVER['REMOTE_ADDR'],
        'current_date' => date('Y-m-d')])->save();

    return view('welcome');
})->name('welcome');

Route::group(['middleware' => ['role:admin']], function () {
    Route::resource('permissions', 'Admin\PermissionsController');
	Route::resource('manage_hospitals', 'Admin\HospitalController');
    Route::resource('roles', 'Admin\RolesController');
    Route::resource('users', 'Admin\UsersController');
    Route::resource('getPatientsRecords', 'PatientRecordController');
    
    Route::get('login-activities',[
        'as' => 'login-activities',
        'uses' => 'Admin\UsersController@indexLoginLogs'
    ]);    
});

<<<<<<< HEAD
Route::group(['middleware' => ['role:doctor']], function () {
    Route::resource('manage_patients', 'Users\PatientsRecordController');
    Route::resource('patient_medical_history', 'Users\PatientHistoryController');
    
});

=======
>>>>>>> a1d01fb8c8ea8548a05020991aed9db15afac60f
Route::group(['middleware' => ['role:user']], function () {
    
});

Route::group(['middleware' => ['auth']], function () {
    Route::resource('profile','Users\ProfileController');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');