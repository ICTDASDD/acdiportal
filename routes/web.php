<?php

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

Route::get('/', function () {
    return view('home');
});

/* old route
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
*/

//auth route for both 
Route::group(['middleware' => ['auth']], function() { 
    Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard');
});

//auth route for superadmin 
Route::group(['middleware' => ['auth', 'role:superadministrator']], function() { 
    //Route::get('users', 'App\Http\Controllers\DashboardController@activeusers')->name('superadmin.users');
    Route::get('spadmin/users', 'App\Http\Controllers\DashboardController@activeusers')->name('superadmin.users');
    Route::get('spadmin/reports', 'App\Http\Controllers\DashboardController@spadminreports')->name('superadmin.reports');
    Route::get('spadmin/freedomwall', 'App\Http\Controllers\DashboardController@spwall')->name('superadmin.wall');
    Route::get('spadmin/adduser', 'App\Http\Controllers\DashboardController@adduser')->name('superadmin.adduser');
    Route::get('spadmin/accessrequest', 'App\Http\Controllers\DashboardController@accessrequest')->name('superadmin.accessrequest');
    Route::get('spadmin/profile', 'App\Http\Controllers\DashboardController@spadminprofile')->name('superadmin.profile');
    Route::get('spadmin/settings', 'App\Http\Controllers\DashboardController@spadminsetings')->name('superadmin.settings');
    Route::get('spadmin/ahris', 'App\Http\Controllers\DashboardController@ahris')->name('superadmin.ahris');
});

//auth route for ahris admin
Route::group(['middleware' => ['auth', 'role:admin-ahris']], function() {
    Route::get('ahris/admin/profile', 'App\Http\Controllers\AhrisAdminController@profile')->name('ahris/admin/profile');
    Route::get('ahris/admin/settings', 'App\Http\Controllers\AhrisAdminController@settings')->name('ahris/admin/settings');
    Route::get('ahris/admin/reports', 'App\Http\Controllers\AhrisAdminController@reports')->name('ahris/admin/reports');
    Route::get('ahris/admin/freedomwall', 'App\Http\Controllers\AhrisAdminController@wall')->name('ahris/admin/freedomwall');
    Route::get('ahris/admin/users', 'App\Http\Controllers\AhrisAdminController@activeusers')->name('ahris/admin/users');
    Route::get('ahris/admin/adduser', 'App\Http\Controllers\AhrisAdminController@adduser')->name('ahris/admin/adduser');
    Route::get('ahris/admin/accessrequest', 'App\Http\Controllers\AhrisAdminController@accessrequest')->name('ahris/admin/accessrequest');
    
});


//auth route for ahris access
Route::group(['middleware' => ['auth', 'role:admin-access']], function() {
    Route::get('/profile', 'App\Http\Controllers\AhrisAccessController@profile')->name('profile');
    Route::get('/settings', 'App\Http\Controllers\AhrisAccessController@settings')->name('settings');
    Route::get('/reports', 'App\Http\Controllers\AhrisAccessController@reports')->name('reports');
    Route::get('/freedomwall', 'App\Http\Controllers\AhrisAccessController@wall')->name('freedomwall');
    Route::get('/users', 'App\Http\Controllers\AhrisAccessController@activeusers')->name('users');
    Route::get('/adduser', 'App\Http\Controllers\AhrisAccessController@adduser')->name('adduser');
    Route::get('/accessrequest', 'App\Http\Controllers\AhrisAccessController@accessrequest')->name('accessrequest');
    
});




require __DIR__.'/auth.php';