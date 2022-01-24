<?php

use App\Http\Controllers\ovs\elecom\OVSElecomAdminController;
use App\Http\Controllers\ovs\elecom\ElecomRequestController;
use App\Http\Controllers\ovs\elecom\ElecomReportsController;
use App\Http\Controllers\ovs\admin\VotingPeriodController;
use App\Http\Controllers\ovs\admin\CandidateLimitController;
use App\Http\Controllers\ovs\admin\CandidateController;
use App\Http\Controllers\ovs\admin\AmendmentController;
use App\Http\Controllers\ovs\admin\BranchController;
    
Route::group(['middleware' => ['auth', 'role:elecom-admin']], function() {
    Route::get('ovs/elecom/profile', [OVSElecomAdminController::class, 'layoutProfile'])->name('ElecomProfile.layout');
    Route::get('ovs/elecom/settings', [OVSElecomAdminController::class, 'layoutSettings'])->name('ElecomSettings.layout');
    Route::get('ovs/elecom/bstatus', [OVSElecomAdminController::class, 'bstatus'])->name('ElecomBstatus.layout');
    Route::get('ovs/elecom/request', [OVSElecomAdminController::class, 'layoutRequest'])->name('ElecomRequest.layout');
    Route::get('ovs/elecom/reports', [OVSElecomAdminController::class, 'layoutReports'])->name('ElecomReports.layout');

    //reports
    Route::POST('ovs/elecom/reports/summary', [ElecomReportsController::class, 'summaryList'])->name('summary.report');
    Route::get('ovs/elecom/select2', [VotingPeriodController::class, 'listVotingPeriodSelect2'])->name('elecom.votingPeriod.select2');
    //Route::POST('ovs/elecom/votingperiod/list', [VotingPeriodController::class, 'listVotingPeriod'])->name('elecom.votingPeriod.list');

    Route::get('ovs/elecom/request/list', [ElecomRequestController::class, 'requestList'])->name('elecom.request.list');
    Route::get('ovs/elecom/request/add', [ElecomRequestController::class, 'addRequest'])->name('elecom.request.add');   
    Route::get('ovs/elecom/request/edit', [ElecomRequestController::class, 'editRequest'])->name('elecom.request.edit'); 
    Route::get('ovs/elecom/request/view', [ElecomRequestController::class, 'viewRequest'])->name('elecom.request.view');  
    Route::get('ovs/elecom/request/update', [ElecomRequestController::class, 'updateRequest'])->name('elecom.request.update');   
    Route::get('ovs/elecom/request/delete', [ElecomRequestController::class, 'removeRequest'])->name('elecom.request.delete'); 
    
    //for dashboard
    Route::get('ovs/elecom/branch/select2', [BranchController::class, 'listBranchSelect2'])->name('elecom.branch.select2'); 
    Route::get('ovs/elecom/candidatelist/default', [CandidateController::class, 'defaultCandidate'])->name('elecom.candidate.default');
    Route::get('ovs/elecom/votingperiod/default', [VotingPeriodController::class, 'defaultVotingPeriod'])->name('elecom.votingPeriod.default');
    Route::get('ovs/elecom/candidatelimit/default', [CandidateLimitController::class, 'defaultCandidateLimit'])->name('elecom.candidateLimit.default');
    Route::get('ovs/elecom/amendmentlist/dashboard', [AmendmentController::class, 'dashboardAmendment'])->name('elecom.amendment.dashboard');
    
});


    ?>