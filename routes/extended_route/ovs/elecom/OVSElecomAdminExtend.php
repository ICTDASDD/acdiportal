<?php

use App\Http\Controllers\ovs\elecom\OVSElecomAdminController;
use App\Http\Controllers\ovs\elecom\ElecomRequestController;
use App\Http\Controllers\ovs\elecom\ElecomReportsController;
    
Route::group(['middleware' => ['auth', 'role:elecom-admin']], function() {
    Route::get('ovs/elecom/profile', [OVSElecomAdminController::class, 'layoutProfile'])->name('ElecomProfile.layout');
    Route::get('ovs/elecom/settings', [OVSElecomAdminController::class, 'layoutSettings'])->name('ElecomSettings.layout');
    Route::get('ovs/elecom/bstatus', [OVSElecomAdminController::class, 'bstatus'])->name('ElecomBstatus.layout');
    Route::get('ovs/elecom/request', [OVSElecomAdminController::class, 'layoutRequest'])->name('ElecomRequest.layout');
    Route::get('ovs/elecom/reports', [OVSElecomAdminController::class, 'layoutReports'])->name('ElecomReports.layout');

    //reports
    Route::POST('ovs/elecom/reports/summary', [ElecomReportsController::class, 'summaryList'])->name('summary.report');
    
    Route::get('ovs/elecom/request/list', [ElecomRequestController::class, 'requestList'])->name('elecom.request.list');
    Route::get('ovs/elecom/request/add', [ElecomRequestController::class, 'addRequest'])->name('elecom.request.add');   
    Route::get('ovs/elecom/request/edit', [ElecomRequestController::class, 'editRequest'])->name('elecom.request.edit'); 
    Route::get('ovs/elecom/request/view', [ElecomRequestController::class, 'viewRequest'])->name('elecom.request.view');  
    Route::get('ovs/elecom/request/update', [ElecomRequestController::class, 'updateRequest'])->name('elecom.request.update');   
    Route::get('ovs/elecom/request/delete', [ElecomRequestController::class, 'removeRequest'])->name('elecom.request.delete'); 
    
});


    ?>