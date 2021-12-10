    <?php

use App\Http\Controllers\OVSAdminController;
use App\Http\Controllers\ovs\MemberController;
use App\Http\Controllers\ovs\admin\BranchController;
use App\Http\Controllers\ovs\admin\CandidateController;
use App\Http\Controllers\ovs\admin\CandidateLimitController;
use App\Http\Controllers\ovs\admin\CandidateTypeController;
use App\Http\Controllers\ovs\admin\VotingPeriodController;
use App\Http\Controllers\ovs\admin\UserController;
use App\Http\Controllers\ovs\admin\AmendmentController;
use App\Http\Controllers\ovs\admin\AdminRequestController;
    
    Route::group(['middleware' => ['auth', 'role:ictd-admin']], function() {
        Route::get('ovs/adm/profile', [OVSAdminController::class, 'profile'])->name('OVSAdminProfile');
        Route::get('ovs/adm/settings', [OVSAdminController::class, 'settings'])->name('OVSAdminSettings');
        Route::get('ovs/adm/bstatus', [OVSAdminController::class, 'bstatus'])->name('OVSAdminBstatus');
    
        //change this with the value of brcode
        Route::get('ovs/adm/bstatus-id', [OVSAdminController::class, 'bstatusid'])->name('OVSAdminBstatus-id');
    
        Route::get('ovs/adm/systemlog', [OVSAdminController::class, 'systemlog'])->name('OVSAdminSystemLog');
        Route::get('ovs/adm/request', [OVSAdminController::class, 'request'])->name('OVSAdminRequest');
    
        Route::get('ovs/adm/candidatelist', [OVSAdminController::class, 'layoutCandidate'])->name('candidate.layout');
        Route::get('ovs/adm/votingconfiguration', [OVSAdminController::class, 'layoutVotingConfiguration'])->name('votingConfiguration.layout');
        Route::get('ovs/adm/users', [OVSAdminController::class, 'layoutUser'])->name('users.layout');    
        
        Route::get('ovs/adm/candidatetype/select2', [CandidateTypeController::class, 'listCandidateTypeSelect2'])->name('candidateType.select2');
        Route::get('ovs/adm/candidatetype/list', [CandidateTypeController::class, 'listCandidateType'])->name('candidateType.list');
        Route::get('ovs/adm/candidatetype/add', [CandidateTypeController::class, 'addCandidateType'])->name('candidateType.add');
        Route::get('ovs/adm/candidatetype/edit', [CandidateTypeController::class, 'editCandidateType'])->name('candidateType.edit');
        Route::get('ovs/adm/candidatetype/update', [CandidateTypeController::class, 'updateCandidateType'])->name('candidateType.update');
        Route::get('ovs/adm/candidatetype/delete', [CandidateTypeController::class, 'removeCandidateType'])->name('candidateType.delete');
        
        Route::get('ovs/adm/candidatelimit/list', [CandidateLimitController::class, 'listCandidateLimit'])->name('candidateLimit.list');
        Route::get('ovs/adm/candidatelimit/add', [CandidateLimitController::class, 'addCandidateLimit'])->name('candidateLimit.add');
        Route::get('ovs/adm/candidatelimit/edit', [CandidateLimitController::class, 'editCandidateLimit'])->name('candidateLimit.edit');
        Route::get('ovs/adm/candidatelimit/update', [CandidateLimitController::class, 'updateCandidateLimit'])->name('candidateLimit.update');
        Route::get('ovs/adm/candidatelimit/delete', [CandidateLimitController::class, 'removeCandidateLimit'])->name('candidateLimit.delete');
        Route::get('ovs/adm/candidatelimit/default', [CandidateLimitController::class, 'defaultCandidateLimit'])->name('candidateLimit.default');
        
        Route::get('ovs/adm/votingperiod/select2', [VotingPeriodController::class, 'listVotingPeriodSelect2'])->name('votingPeriod.select2');
        Route::get('ovs/adm/votingperiod/list', [VotingPeriodController::class, 'listVotingPeriod'])->name('votingPeriod.list');
        Route::get('ovs/adm/votingperiod/add', [VotingPeriodController::class, 'addVotingPeriod'])->name('votingPeriod.add');
        Route::get('ovs/adm/votingperiod/edit', [VotingPeriodController::class, 'editVotingPeriod'])->name('votingPeriod.edit');
        Route::get('ovs/adm/votingperiod/update', [VotingPeriodController::class, 'updateVotingPeriod'])->name('votingPeriod.update');
        Route::get('ovs/adm/votingperiod/delete', [VotingPeriodController::class, 'removeVotingPeriod'])->name('votingPeriod.delete');
        Route::get('ovs/adm/votingperiod/default', [VotingPeriodController::class, 'defaultVotingPeriod'])->name('votingPeriod.default');
        
        Route::get('ovs/adm/candidatelist/list', [CandidateController::class, 'listCandidate'])->name('candidate.list');
        Route::POST('ovs/adm/candidatelist/add', [CandidateController::class, 'addCandidate'])->name('candidate.add');
        Route::get('ovs/adm/candidatelist/edit', [CandidateController::class, 'editCandidate'])->name('candidate.edit');
        Route::POST('ovs/adm/candidatelist/update', [CandidateController::class, 'updateCandidate'])->name('candidate.update');
        Route::get('ovs/adm/candidatelist/delete', [CandidateController::class, 'removeCandidate'])->name('candidate.delete');
        Route::get('ovs/adm/candidatelist/default', [CandidateController::class, 'defaultCandidate'])->name('candidate.default');
        
        Route::get('ovs/adm/users/select2', [UserController::class, 'listBranchSelect2'])->name('users.select2'); 
        Route::get('ovs/adm/users/list', [UserController::class, 'listUser'])->name('users.list');   
        Route::post('ovs/adm/users/add', [UserController::class, 'addUser'])->name('users.add');   
        Route::get('ovs/adm/users/edit', [UserController::class, 'editUser'])->name('users.edit');   
        Route::post('ovs/adm/users/update', [UserController::class, 'updateUser'])->name('users.update');   
        Route::get('ovs/adm/users/delete', [UserController::class, 'removeUser'])->name('users.delete');   
       
        Route::get('ovs/adm/amendmentlist/list', [AmendmentController::class, 'listAmendment'])->name('amendment.list');
        Route::post('ovs/adm/amendmentlist/add', [AmendmentController::class, 'addAmendment'])->name('amendment.add');
        Route::get('ovs/adm/amendmentlist/edit', [AmendmentController::class, 'editAmendment'])->name('amendment.edit');
        Route::post('ovs/adm/amendmentlist/update', [AmendmentController::class, 'updateAmendment'])->name('amendment.update');
        Route::get('ovs/adm/amendmentlist/delete', [AmendmentController::class, 'removeAmendment'])->name('amendment.delete');
    
        Route::get('ovs/adm/branch/select2', [BranchController::class, 'listBranchSelect2'])->name('branch.select2'); 
        Route::get('ovs/adm/branch/list', [BranchController::class, 'listBranch'])->name('branch.list');   
        Route::get('ovs/adm/branch/locking', [BranchController::class, 'lockingBranch'])->name('branch.locking');   

      //  Route::get('ovs/adm/amendmentlist', [OVSAdminController::class, 'alist'])->name('OVSAdminAmendmentList');
        
        Route::get('ovs/adm/bblocking', [OVSAdminController::class, 'bblocking'])->name('OVSAdminBranchBlocking');    
        Route::get('ovs/adm/member/list', [MemberController::class, 'listMember'])->name('member.list');   
        Route::get('ovs/adm/member/register', [MemberController::class, 'registerMember'])->name('member.register');
    
        Route::get('ovs/adm/eblocking', [OVSAdminController::class, 'eblocking'])->name('OVSAdminEntryBlocking');    
        Route::get('ovs/adm/memlist', [OVSAdminController::class, 'memlist'])->name('OVSAdminMemberList');
        
        Route::get('ovs/adm/adduser', [OVSAdminController::class, 'adduser'])->name('OVSAdminAdduser');


        Route::get('ovs/adm/request/list', [AdminRequestController::class, 'requestList'])->name('adm.request.list'); 
        Route::get('ovs/adm/request/edit', [AdminRequestController::class, 'editRequest'])->name('adm.request.edit');
        Route::get('ovs/adm/request/view', [AdminRequestController::class, 'viewRequest'])->name('adm.request.view');   
        Route::get('ovs/adm/request/update', [AdminRequestController::class, 'updateRequest'])->name('adm.request.update'); 


        Route::get('ovs/adm/profile', [OVSAdminController::class, 'profile'])->name('OVSAdminProfile');
        Route::get('ovs/adm/settings', [OVSAdminController::class, 'settings'])->name('OVSAdminSettings');
        Route::get('ovs/adm/bstatus', [OVSAdminController::class, 'bstatus'])->name('OVSAdminBstatus');
    
        //change this with the value of brcode
        Route::get('ovs/adm/bstatus-id', [OVSAdminController::class, 'bstatusid'])->name('OVSAdminBstatus-id');
    
        Route::get('ovs/adm/systemlog', [OVSAdminController::class, 'systemlog'])->name('OVSAdminSystemLog');
        Route::get('ovs/adm/request', [OVSAdminController::class, 'request'])->name('OVSAdminRequest');
    
        Route::get('ovs/adm/candidatelist', [OVSAdminController::class, 'layoutCandidate'])->name('candidate.layout');
        Route::get('ovs/adm/votingconfiguration', [OVSAdminController::class, 'layoutVotingConfiguration'])->name('votingConfiguration.layout');
        Route::get('ovs/adm/users', [OVSAdminController::class, 'layoutUser'])->name('users.layout');    
       
        Route::get('ovs/adm/amendmentlist', [OVSAdminController::class, 'alist'])->name('OVSAdminAmendmentList');
        Route::get('ovs/adm/bblocking', [OVSAdminController::class, 'bblocking'])->name('OVSAdminBranchBlocking');    
        Route::get('ovs/adm/eblocking', [OVSAdminController::class, 'eblocking'])->name('OVSAdminEntryBlocking');    
        Route::get('ovs/adm/memlist', [OVSAdminController::class, 'memlist'])->name('OVSAdminMemberList');
    
        Route::get('ovs/adm/adduser', [OVSAdminController::class, 'adduser'])->name('OVSAdminAdduser');
    });


    ?>