<?php

use App\Http\Controllers\ovs\elecom\OVSElecomAdminController;
    
Route::group(['middleware' => ['auth', 'role:elecom-admin']], function() {
    Route::get('ovs/elecom/profile', [OVSElecomAdminController::class, 'layoutProfile'])->name('ElecomProfile.layout');
    Route::get('ovs/elecom/settings', [OVSElecomAdminController::class, 'layoutSettings'])->name('ElecomSettings.layout');
    Route::get('ovs/elecom/bstatus', [OVSElecomAdminController::class, 'bstatus'])->name('ElecomBstatus.layout');
    Route::get('ovs/elecom/request', [OVSElecomAdminController::class, 'layoutRequest'])->name('ElecomRequest.layout');
    
});


    ?>