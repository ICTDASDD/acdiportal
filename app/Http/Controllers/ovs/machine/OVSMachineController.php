<?php

namespace App\Http\Controllers\ovs\machine;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use Response;

class OVSMachineController extends Controller
{
    //---------------------------------------------------- Online Voting System Branch Admin ------------------------------------------//

        //------------- Navigation -----------------//

        //Profile nav
        public function layoutVoting(){
            return view('ovs.machine.voting',['title' => 'Onine Voting System', 'activeparents' => 'Profile']);
        }

        //------------- Navigation End-----------------//

        //----------------------------------------------------  End -------------------------------------------//
}
