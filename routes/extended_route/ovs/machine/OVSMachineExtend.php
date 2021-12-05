<?php

use App\Http\Controllers\ovs\machine\OVSMachineController;
use App\Http\Controllers\ovs\admin\VotingPeriodController;
use App\Http\Controllers\ovs\admin\CandidateLimitController;
use App\Http\Controllers\ovs\admin\CandidateController;
    
Route::group(['middleware' => ['auth', 'role:branch-machine']], function() {
    Route::get('ovs/machine/voting', [OVSMachineController::class, 'layoutVoting'])->name('Votinglayout');
    
    Route::get('ovs/machine/votingperiod/default', [VotingPeriodController::class, 'defaultVotingPeriod'])->name('machine.votingPeriod.default');
    Route::get('ovs/adm/candidatelimit/default', [CandidateLimitController::class, 'defaultCandidateLimit'])->name('machine.candidateLimit.default');
    Route::get('ovs/adm/candidatelist/default', [CandidateController::class, 'defaultCandidate'])->name('machine.candidate.default');
    Route::get('ovs/machine/login', [OVSMachineController::class, 'memberLogin'])->name('machine.memberLogin');
     
});


    ?>