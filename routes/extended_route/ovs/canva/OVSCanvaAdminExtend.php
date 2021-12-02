<?php

use App\Http\Controllers\ovs\canva\OVSCanvaAdminController;
use App\Http\Controllers\ovs\canva\CanvaRequestController;
    
Route::group(['middleware' => ['auth', 'role:canv-officer']], function() {
    Route::get('ovs/canva/profile', [OVSCanvaAdminController::class, 'layoutProfile'])->name('CanvaProfile.layout');
    Route::get('ovs/canva/settings', [OVSCanvaAdminController::class, 'layoutSettings'])->name('CanvaSettings.layout');
    Route::get('ovs/canva/bstatus', [OVSCanvaAdminController::class, 'bstatus'])->name('CanvaBstatus.layout');
    Route::get('ovs/canva/request', [OVSCanvaAdminController::class, 'layoutRequest'])->name('CanvaRequest.layout');
    
    Route::get('ovs/canva/request/list', [CanvaRequestController::class, 'requestList'])->name('canva.request.list'); 
    Route::get('ovs/canva/request/edit', [CanvaRequestController::class, 'editRequest'])->name('canva.request.edit');   
    Route::get('ovs/canva/request/update', [CanvaRequestController::class, 'updateRequest'])->name('canva.request.update'); 
});


    ?>