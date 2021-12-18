<?php

use App\Http\Controllers\ovs\canva\OVSCanvaAdminController;
use App\Http\Controllers\ovs\canva\CanvaRequestController;
use App\Http\Controllers\ovs\admin\VotingPeriodController;
use App\Http\Controllers\ovs\admin\CandidateLimitController;
use App\Http\Controllers\ovs\admin\CandidateController;
use App\Http\Controllers\ovs\admin\AmendmentController;
use App\Http\Controllers\ovs\MemberController; 
    
Route::group(['middleware' => ['auth', 'role:canv-officer']], function() {
    Route::get('ovs/canva/profile', [OVSCanvaAdminController::class, 'layoutProfile'])->name('CanvaProfile.layout');
    Route::get('ovs/canva/settings', [OVSCanvaAdminController::class, 'layoutSettings'])->name('CanvaSettings.layout');
    Route::get('ovs/canva/bstatus', [OVSCanvaAdminController::class, 'bstatus'])->name('CanvaBstatus.layout');
    Route::get('ovs/canva/request', [OVSCanvaAdminController::class, 'layoutRequest'])->name('CanvaRequest.layout');
    Route::get('ovs/canva/reports', [OVSCanvaAdminController::class, 'reports'])->name('CanvaReports.layout');
    
    Route::post('ovs/canva/request/list', [CanvaRequestController::class, 'requestList'])->name('canva.request.list'); 
    Route::get('ovs/canva/request/edit', [CanvaRequestController::class, 'editRequest'])->name('canva.request.edit'); 
    Route::get('ovs/canva/request/view', [CanvaRequestController::class, 'viewRequest'])->name('canva.request.view');   
    Route::get('ovs/canva/request/update', [CanvaRequestController::class, 'updateRequest'])->name('canva.request.update'); 

    //for dashboard
    Route::get('ovs/canva/candidatelist/default', [CandidateController::class, 'defaultCandidate'])->name('canva.candidate.default');
    Route::get('ovs/canva/votingperiod/default', [VotingPeriodController::class, 'defaultVotingPeriod'])->name('canva.votingPeriod.default');
    Route::get('ovs/canva/candidatelimit/default', [CandidateLimitController::class, 'defaultCandidateLimit'])->name('canva.candidateLimit.default');
    Route::get('ovs/ba/amendmentlist/dashboard', [AmendmentController::class, 'dashboardAmendment'])->name('canva.amendment.dashboard');
    
    //for register migs
    Route::get('ovs/canva/votingperiod/select2', [VotingPeriodController::class, 'listVotingPeriodSelect2'])->name('canva.votingPeriod.select2');
    Route::get('ovs/canva/member/list', [MemberController::class, 'listMember'])->name('canva.member.list');
    Route::get('ovs/canva/member/register', [MemberController::class, 'registerMember'])->name('canva.member.register');
});


    ?>