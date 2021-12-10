<?php

namespace App\Http\Controllers\ovs\canva;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use Response;

class OVSCanvaAdminController extends Controller
{
    //---------------------------------------------------- Online Voting System Branch Admin ------------------------------------------//

        //------------- Navigation -----------------//

        //Profile nav
        public function layoutProfile(){
            return view('ovs.canva.profile',['title' => 'Admin Profile', 'activeparents' => 'Profile']);
        }
        public function layoutSettings(){
            return view('ovs.canva.settings',['title' => 'Admin Settings', 'activeparents' => 'Profile']);
        }

        public function layoutRequest(){
            return view('ovs.canva.request',['title' => 'General Request', 'activeparents' => 'Monitoring']);
        }

        public function reports(){
            return view('ovs.canva.reports',['title' => 'Reports', 'activeparents' => 'Dashboard']);
        }

        public function bstatus(){
            return view('ovs.canva.bstatus',['title' => 'Branch Status', 'activeparents' => 'User']);
        }

        //------------- Navigation End-----------------//

        //----------------------------------------------------  End ------------------------------------------//
}
