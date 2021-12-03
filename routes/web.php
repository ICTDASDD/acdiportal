<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AhrisAdminController;
use App\Http\Controllers\AhrisAccessController;
use App\Http\Controllers\OVSAdminController;
use App\Http\Controllers\ovs\admin\CandidateController;
use App\Http\Controllers\ovs\admin\CandidateLimitController;
use App\Http\Controllers\ovs\admin\CandidateTypeController;
use App\Http\Controllers\ovs\admin\VotingPeriodController;
use App\Http\Controllers\ovs\admin\UserController;
use App\Http\Controllers\ovs\ba\RequestController;
use App\Http\Controllers\OVSElecomController;
use App\Http\Controllers\ovs\canva\OVSCanvaController;
use App\Http\Controllers\EmpController;
use App\Http\Controllers\ovs\elecom\ElecomRequestController;

//use App\Http\Controllers\dsbAdminController;
//use App\Http\Controllers\dsbCreatorController;
//use App\Http\Controllers\dsbReportController;
//use App\Http\Controllers\DivHeadController;

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
    Route::get('/logout', 'App\Http\Controllers\DashboardController@logout')->name('logout');
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



//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////// ------- AHRIS ------- ////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//auth route for ahris admin
Route::group(['middleware' => ['auth', 'role:ahris-admin']], function() {
    Route::get('ahris/adm/profile', [AhrisAdminController::class, 'profile'])->name('AhrisAdminProfile');
    Route::get('ahris/adm/settings', [AhrisAdminController::class, 'settings'])->name('AhrisAdminSettings');
    Route::get('ahris/adm/reports', [AhrisAdminController::class, 'reports'])->name('AhrisAdminReports');
    Route::get('ahris/adm/freedomwall', [AhrisAdminController::class, 'wall'])->name('AhrisAdminFreedomwall');
    Route::get('ahris/adm/users', [AhrisAdminController::class, 'activeusers'])->name('AhrisAdminUsers');
    Route::get('ahris/adm/adduser', [AhrisAdminController::class, 'adduser'])->name('AhrisAdminAdduser');
    Route::get('ahris/adm/accessrequest', [AhrisAdminController::class, 'accessrequest'])->name('AhrisAdminAccessrequest');
    
});


//auth route for ahris access
Route::group(['middleware' => ['auth', 'role:ahris-access']], function() {
    Route::get('ahris/acc/profile', [AhrisAccessController::class,'profile'])->name('AhrisAccessProfile');
    Route::get('ahris/acc/settings', [AhrisAccessController::class,'settings'])->name('AhrisAccessSettings');
    Route::get('ahris/acc/reports', [AhrisAccessController::class,'reports'])->name('AhrisAccessReports');
    Route::get('ahris/acc/freedomwall', [AhrisAccessController::class,'wall'])->name('AhrisAccessFreedomwall');
    Route::get('ahris/acc/users', [AhrisAccessController::class,'activeusers'])->name('AhrisAccessUsers');
    Route::get('ahris/acc/adduser', [AhrisAccessController::class,'adduser'])->name('AhrisAccessAdduser');
    Route::get('ahris/acc/accessrequest', [AhrisAccessController::class,'accessrequest'])->name('AhrisAccessAccessrequest');
    //Route::get('ahris/access/finddata', [AhrisAccessController::class,'finddata'])->name('ahris/access/finddata');;
    //Route::get('ahris/access/join', [AhrisAccessController::class,'join'])->name('ahris/access/join');;

});




//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////// ------- AHRIS  END ------- ///////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////






//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////// ------- EMP LOG------- ////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


//auth route for Emp Log
Route::group(['middleware' => ['auth', 'role:emp']], function() {
    Route::get('emp/profile', [EmpController::class,'profile'])->name('EmpProfile');
    Route::get('emp/settings', [EmpController::class,'settings'])->name('EmpSettings');
    Route::get('emp/benefits', [EmpController::class,'benefits'])->name('EmpBenefits');
    Route::get('emp/leavecredential', [EmpController::class,'leavecredential'])->name('EmpLeaveCredential');
    Route::get('emp/freedomwall', [EmpController::class,'wall'])->name('EmpWall');

});





//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////// ------- EMP LOG END ---- ////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////// ------- Online Voting System------- ////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//auth route for ovs admin
Route::group(['middleware' => ['auth', 'role:ictd-admin']], function() {
    Route::get('ovs/adm/profile', [OVSAdminController::class, 'profile'])->name('OVSAdminProfile');
    Route::get('ovs/adm/settings', [OVSAdminController::class, 'settings'])->name('OVSAdminSettings');
    Route::get('ovs/adm/bstatus', [OVSAdminController::class, 'bstatus'])->name('OVSAdminBstatus');

    //change this with the value of brcode
    Route::get('ovs/adm/bstatus-id', [OVSAdminController::class, 'bstatusid'])->name('OVSAdminBstatus-id');

    Route::get('ovs/adm/systemlog', [OVSAdminController::class, 'systemlog'])->name('OVSAdminSystemLog');
    Route::get('ovs/adm/request', [OVSAdminController::class, 'request'])->name('OVSAdminRequest');

    Route::get('ovs/adm/candidatelist', [OVSAdminController::class, 'layoutCandidate'])->name('candidate.layout');
    Route::get('ovs/adm/votingconfiguration', [OVSAdminController::class, 'layoutVotingConfiguration'])->name('votingConfiguration.layout');
    Route::get('ovs/adm/users', [OVSAdminController::class, 'layoutUser'])->name('users.layout');    
   
    Route::get('ovs/adm/amendmentlist', [OVSAdminController::class, 'alist'])->name('OVSAdminAmendmentList');
    Route::get('ovs/adm/bblocking', [OVSAdminController::class, 'bblocking'])->name('OVSAdminBranchBlocking');    
    Route::get('ovs/adm/eblocking', [OVSAdminController::class, 'eblocking'])->name('OVSAdminEntryBlocking');    
    Route::get('ovs/adm/memlist', [OVSAdminController::class, 'memlist'])->name('OVSAdminMemberList');

    Route::get('ovs/adm/adduser', [OVSAdminController::class, 'adduser'])->name('OVSAdminAdduser');
});


//auth route for ovs elecom


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////// ------- Online Voting System  END ------- ///////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

@include(base_path('routes/extended_route/ovs/admin/OVSadminExtend.php'));
@include(base_path('routes/extended_route/ovs/elecom/OVSElecomAdminExtend.php'));
@include(base_path('routes/extended_route/ovs/ba/OVSBranchAdminExtend.php'));
@include(base_path('routes/extended_route/ovs/canva/OVSCanvaAdminExtend.php'));
//@include(base_path('routes/extended_route/ba/RequestRoutes.php'));
/*
Route::group(['middleware' => ['auth', 'role:branch-officer']], function() {

    //Page Link and Layout
    
   
    Route::get('ovs/ba/request/list', [RequestController::class, 'requestList'])->name('request.list');
    Route::get('ovs/ba/request/add', [RequestController::class, 'addUser'])->name('request.add');   
    Route::get('ovs/ba/request/edit', [RequestController::class, 'editUser'])->name('request.edit');   
    Route::get('ovs/ba/request/update', [RequestController::class, 'updateUser'])->name('request.update');   
    Route::get('ovs/ba/request/delete', [RequestController::class, 'removeUser'])->name('request.delete'); 

  



});
*/


require __DIR__.'/auth.php';