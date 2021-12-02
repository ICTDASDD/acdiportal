<?php

use App\Http\Controllers\ovs\ba\OVSBranchAdminController;
use App\Http\Controllers\ovs\ba\RequestController;
use App\Http\Controllers\ovs\ba\BAUserController;
    
    Route::group(['middleware' => ['auth', 'role:branch-officer']], function() {

        //Page Link and Layout
        Route::get('ovs/ba/profile', [OVSBranchAdminController::class, 'layoutProfile'])->name('BAprofile.layout');
        Route::get('ovs/ba/settings', [OVSBranchAdminController::class, 'layoutSettings'])->name('BAsetting.layout');
        Route::get('ovs/ba/request', [OVSBranchAdminController::class, 'layoutRequest'])->name('BArequest.layout');   
        Route::get('ovs/ba/users', [OVSBranchAdminController::class, 'layoutUser'])->name('BAusers.layout');
        Route::get('ovs/ba/memlist', [OVSBranchAdminController::class, 'layoutMemlist'])->name('BAmemlist.layout');

        Route::get('ovs/ba/request/list', [RequestController::class, 'requestList'])->name('request.list');
        Route::get('ovs/ba/request/add', [RequestController::class, 'addRequest'])->name('request.add');   
        Route::get('ovs/ba/request/edit', [RequestController::class, 'editRequest'])->name('request.edit');
        Route::get('ovs/ba/request/view', [RequestController::class, 'viewRequest'])->name('request.view');  
        Route::get('ovs/ba/request/update', [RequestController::class, 'updateRequest'])->name('request.update');   
        Route::get('ovs/ba/request/delete', [RequestController::class, 'removeRequest'])->name('request.delete'); 
        //for approve(elecom) 
        // Route::get('ovs/ba/request/editStatus', [RequestController::class, 'editStatus'])->name('request.edit.status');
        // Route::get('ovs/ba/request/updateStatus', [RequestController::class, 'updateStatus'])->name('request.update.status');

        Route::get('ovs/ba/users/select2', [BAUserController::class, 'listBranchSelect2'])->name('ba.users.select2'); 
        Route::get('ovs/ba/users/list', [BAUserController::class, 'listUser'])->name('ba.users.list');   
        Route::get('ovs/ba/users/add', [BAUserController::class, 'addUser'])->name('ba.users.add');   
        Route::get('ovs/ba/users/edit', [BAUserController::class, 'editUser'])->name('ba.users.edit');   
        Route::get('ovs/ba/users/update', [BAUserController::class, 'updateUser'])->name('ba.users.update');   
        Route::get('ovs/ba/users/delete', [BAUserController::class, 'removeUser'])->name('ba.users.delete'); 

    });


    ?>