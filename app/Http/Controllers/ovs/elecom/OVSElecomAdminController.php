<?php

namespace App\Http\Controllers\ovs\elecom;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use Response;

class OVSElecomAdminController extends Controller
{
    //---------------------------------------------------- Online Voting System Branch Admin ------------------------------------------//

        //------------- Navigation -----------------//

        //Profile nav
        public function layoutProfile(){
            return view('ovs.elecom.profile',['title' => 'Admin Profile', 'activeparents' => 'Profile']);
        }
        public function layoutSettings(){
            return view('ovs.elecom.settings',['title' => 'Admin Settings', 'activeparents' => 'Profile']);
        }

        public function layoutRequest(){
            return view('ovs.elecom.request',['title' => 'General Request', 'activeparents' => 'Monitoring']);
        }

        public function bstatus(){
            return view('ovs.elecom.bstatus',['title' => 'Branch Status', 'activeparents' => 'User']);
        }

        //------------- Navigation End-----------------//

        //----------------------------------------------------  End ------------------------------------------//
}
