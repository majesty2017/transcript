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

// User Ends
Route::get('/', function () {
    return view('auth.login');
});

Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/how-to-use', 'HomeController@howToUse')->name('how-to-uses');

Route::get('/checkstatus', 'HomeController@checkstatus')->name('checkstatus');

Route::post('/checkstatus', 'HomeController@checkMe')->name('checkme');

// Transcripts
Route::get('/transcript', 'HomeController@getApplyForTranscript')->name('transcript');

Route::post('/transcript', 'HomeController@generateToken')->name('generate');

Route::post('/transcript/{id}', 'HomeController@applyForTranscript')->name('apply');

Route::get('/transcript/my-transcript/{id}', 'HomeController@getTranscript')->name('my-transcript');

Route::post('/transcript/my-transcript/{id}', 'HomeController@printTranscript')->name('print');

// Admin ends
Route::prefix('/admins')->group(function () {

//    Admin Login
    Route::get('/', 'Admin\LoginController@showLoginForm')->name('admin.login');

    Route::get('/logout', 'Admin\LoginController@adminLogout')->name('admin.logout');

    Route::post('/', 'Admin\LoginController@adminLogin')->name('admin.login.submit');

//    Admin Register
    Route::get('/register', 'Admin\RegisterController@showRegistrationForm')->name('admin.register');

    Route::post('/register', 'Admin\RegisterController@adminRegister')->name('admin.register.submit');

//    Admin Dashboard
    Route::get('/dashboard', 'AdminDashboardController@showAdminDashboard')->name('admin.dashboard');

//    Students
    Route::get('/students', 'AdminDashboardController@getStudent')->name('admin.student');

    Route::post('/students', 'AdminDashboardController@createStudent')->name('admin.student.create');

    Route::post('/student/update', 'AdminDashboardController@updateStudent')->name('admin.student.update');

    Route::post('/student/delete', 'AdminDashboardController@deleteStudent')->name('admin.student.delete');

//    Lecturers
    Route::get('/lecturers', 'AdminDashboardController@getLecturer')->name('admin.lecturer');

    Route::post('/lecturers', 'AdminDashboardController@createLecturer')->name('admin.lecturer.create');

    Route::post('/lecturer/update', 'AdminDashboardController@updateLecturer')->name('admin.lecturer.update');

    Route::post('/lecturer/delete', 'AdminDashboardController@deleteLecturer')->name('admin.lecturer.delete');

//    HODs
    Route::get('/hods', 'AdminDashboardController@getHod')->name('admin.hod');

    Route::post('/hods', 'AdminDashboardController@createHod')->name('admin.hod.create');

    Route::post('/hod/update', 'AdminDashboardController@updateHod')->name('admin.hod.update');

    Route::post('/hod/delete', 'AdminDashboardController@deleteHod')->name('admin.hod.delete');

//    Results
    Route::get('/results', 'AdminDashboardController@getResult')->name('admin.results');

    Route::post('/results', 'AdminDashboardController@postResult')->name('admin.results.post');

    Route::post('/results/update', 'AdminDashboardController@updateResult')->name('admin.results.update');

    Route::post('/results/delete', 'AdminDashboardController@deleteResult')->name('admin.results.delete');
});

// Lecturer Ends
Route::prefix('/lecturer')->group(function () {

//    Lecturer Login
    Route::get('/', 'Lecturer\LoginController@showLoginForm')->name('lecturer.login');

    Route::get('/logout', 'Lecturer\LoginController@lecturerLogout')->name('lecturer.logout');

    Route::post('/', 'Lecturer\LoginController@lecturerLogin')->name('lecturer.login.submit');

    //    Lecturer Dashboard
    Route::get('/dashboard', 'LecturerDashboardController@showLecturerDashboard')->name('lecturer.dashboard');

//    Students
    Route::get('/students', 'LecturerDashboardController@getStudent')->name('lecturer.student');

//    Results
    Route::get('/results', 'LecturerDashboardController@getResult')->name('lecturer.results');

    Route::post('/results', 'LecturerDashboardController@postResult')->name('lecturer.results.post');

    Route::post('/results/update', 'LecturerDashboardController@updateResult')->name('lecturer.results.update');

    Route::post('/results/delete', 'LecturerDashboardController@deleteResult')->name('lecturer.results.delete');
});

// Hod Ends
Route::prefix('/hod')->group(function () {

//    Hod Login
    Route::get('/', 'Hod\LoginController@showLoginForm')->name('hod.login');

    Route::get('/logout', 'Hod\LoginController@hodLogout')->name('hod.logout');

    Route::post('/', 'Hod\LoginController@lecturerLogin')->name('hod.login.submit');

    //    Hod Dashboard after authentication
    Route::get('/dashboard', 'HodDashboardController@showHodDashboard')->name('hod.dashboard');

//    Students
    Route::get('/students', 'HodDashboardController@getStudent')->name('hod.student');

//    Results
    Route::get('/results', 'HodDashboardController@getResult')->name('hod.result');

    Route::post('/results', 'HodDashboardController@postResult')->name('hod.results.post');

    Route::post('/results/update', 'HodDashboardController@updateResult')->name('hod.results.update');

    Route::post('/results/delete', 'HodDashboardController@deleteResult')->name('hod.results.delete');
});
