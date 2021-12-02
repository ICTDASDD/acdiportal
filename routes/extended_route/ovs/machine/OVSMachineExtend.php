<?php

use App\Http\Controllers\ovs\machine\OVSMachineController;
    
Route::group(['middleware' => ['auth', 'role:branch-machine']], function() {
    Route::get('ovs/machine/voting', [OVSMachineController::class, 'layoutVoting'])->name('Voting.layout');
    
});


    ?>