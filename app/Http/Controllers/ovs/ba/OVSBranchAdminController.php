<?php

namespace App\Http\Controllers\ovs\ba;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use Response;

class OVSBranchAdminController extends Controller
{
    //---------------------------------------------------- Online Voting System Branch Admin ------------------------------------------//

        //------------- Navigation -----------------//

        //Profile nav
        public function layoutProfile(){
            return view('ovs.ba.profile',['title' => 'Admin Profile', 'activeparents' => 'Profile']);
        }
        public function layoutSettings(){
            return view('ovs.ba.settings',['title' => 'Admin Settings', 'activeparents' => 'Profile']);
        }

        public function layoutRequest(){
            return view('ovs.ba.request',['title' => 'General Request', 'activeparents' => 'Monitoring']);
        }

        public function layoutUser(){
            return view('ovs.ba.users',['title' => 'User List', 'activeparents' => 'User']);
        }

        public function layoutMemlist(){
            return view('ovs.ba.memberlist',['title' => 'Voting Member List', 'activeparents' => 'Memlist']);
        }
        Route::get('ovs/ba/amendmentlist/dashboard', [AmendmentController::class, 'dashboardAmendment'])->name('ba.amendment.dashboard');

        //------------- Navigation End-----------------//

        //----------------------------------------------------  End ------------------------------------------//
}
