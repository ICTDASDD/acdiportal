<?php

use App\Http\Controllers\ovs\ba\OVSBranchAdminController;
    
    Route::group(['middleware' => ['auth', 'role:branch-officer']], function() {

        //Page Link and Layout
        Route::get('ovs/ba/profile', [OVSBranchAdminController::class, 'layoutProfile'])->name('BAprofile.layout');
        Route::get('ovs/ba/settings', [OVSBranchAdminController::class, 'layoutSettings'])->name('BAsetting.layout');
        Route::get('ovs/ba/request', [OVSBranchAdminController::class, 'layoutRequest'])->name('BArequest.layout');
        Route::get('ovs/ba/users', [OVSBranchAdminController::class, 'layoutUser'])->name('BAusers.layout');
        Route::get('ovs/ba/memlist', [OVSBranchAdminController::class, 'layoutMemlist'])->name('BAmemlist.layout');
    });


    ?>