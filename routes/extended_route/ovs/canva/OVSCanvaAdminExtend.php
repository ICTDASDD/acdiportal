<?php

use App\Http\Controllers\ovs\canva\OVSCanvaAdminController;
    
Route::group(['middleware' => ['auth', 'role:canv-officer']], function() {
    Route::get('ovs/canva/profile', [OVSCanvaAdminController::class, 'layoutProfile'])->name('CanvaProfile.layout');
    Route::get('ovs/canva/settings', [OVSCanvaAdminController::class, 'layoutSettings'])->name('CanvaSettings.layout');
    Route::get('ovs/canva/bstatus', [OVSCanvaAdminController::class, 'bstatus'])->name('CanvaBstatus.layout');
    Route::get('ovs/canva/request', [OVSCanvaAdminController::class, 'layoutRequest'])->name('CanvaRequest.layout');
    
});


    ?>