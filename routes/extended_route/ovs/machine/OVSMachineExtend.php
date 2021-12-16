<?php

use App\Http\Controllers\ovs\machine\OVSMachineController;
use App\Http\Controllers\ovs\admin\VotingPeriodController;
use App\Http\Controllers\ovs\admin\CandidateLimitController;
use App\Http\Controllers\ovs\admin\CandidateController;
use App\Http\Controllers\ovs\admin\AmendmentController;
use App\Http\Controllers\ovs\admin\BranchController;
    
Route::group(['middleware' => ['auth', 'role:branch-machine']], function() {
    Route::get('ovs/machine/voting', [OVSMachineController::class, 'layoutVoting'])->name('Votinglayout');
    Route::get('ovs/machine/submitVote', [OVSMachineController::class, 'submitVote'])->name('submitVote');
    
    Route::get('ovs/machine/votingperiod/default', [VotingPeriodController::class, 'defaultVotingPeriod'])->name('machine.votingPeriod.default');
    Route::get('ovs/machine/candidatelimit/default', [CandidateLimitController::class, 'defaultCandidateLimit'])->name('machine.candidateLimit.default');
    Route::get('ovs/machine/candidatelist/default', [CandidateController::class, 'defaultCandidate'])->name('machine.candidate.default');
    Route::get('ovs/machine/amendment/default', [AmendmentController::class, 'defaultAmendment'])->name('machine.amendment.default');
    Route::get('ovs/machine/login', [OVSMachineController::class, 'memberLogin'])->name('machine.memberLogin');
    Route::get('ovs/machine/branch/locking', [BranchController::class, 'checkBranchLocking'])->name('machine.branch.locking');
    
});


    ?>