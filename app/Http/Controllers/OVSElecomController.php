<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OVSElecomController extends Controller
{
   
    //---------------------------------------------------- Online Voting System Admin ------------------------------------------//

        //------------- Navigation -----------------//

        //Profile nav
        public function profile(){
            return view('ovs.elecom.profile',['title' => 'Admin Profile', 'activeparents' => 'Profile']);
        }
        public function settings(){
            return view('ovs.elecom.settings',['title' => 'Admin Settings', 'activeparents' => 'Profile']);
        }

        //Dashboard nav
        public function reports(){
            return view('ovs.elecom.reports',['title' => 'Reports', 'activeparents' => 'Dashboard']);
        }

        public function bstatus(){
            return view('ovs.elecom.bstatus',['title' => 'Branch Status', 'activeparents' => 'Monitoring']);
        }


        //this will be change to bstatus($id)
        public function bstatusid(){
            return view('ovs.elecom.bstatusid',['title' => 'Branch Status', 'activeparents' => 'Monitoring']);
        }

        public function systemlog(){
            return view('ovs.elecom.systemlog',['title' => 'System Log', 'activeparents' => 'Monitoring']);
        }

        public function request(){
            return view('ovs.elecom.request',['title' => 'General Request', 'activeparents' => 'Monitoring']);
        }

        public function clist(){
            return view('ovs.elecom.candidatelist',['title' => 'Candidate List', 'activeparents' => 'BODs & Amendments']);
        }

        public function alist(){
            return view('ovs.elecom.amendmentlist',['title' => 'Amendment List', 'activeparents' => 'BODs & Amendments']);
        }

        public function bblocking(){
            return view('ovs.elecom.bblocking',['title' => 'Branch Blocking', 'activeparents' => 'Voting Tools']);
        }

        public function eblocking(){
            return view('ovs.elecom.eblocking',['title' => 'Entry Blocking', 'activeparents' => 'Voting Tools']);
        }

        public function memlist(){
            return view('ovs.elecom.memberlist',['title' => 'Voting Member List', 'activeparents' => 'Memlist']);
        }



        public function wall(){
            return view('ovs.elecom.wall',['title' => 'Freedom Wall', 'activeparents' => 'Dashboard']);
        }

        // Users nav
        public function activeusers(){
            return view('ovs.elecom.users',['title' => 'Active User', 'activeparents' => 'User']);
        }
        public function adduser(){
            return view('ovs.elecom.adduser',['title' => 'Add User', 'activeparents' => 'User']);
        }
        public function accessrequest(){
            return view('ovs.elecom.accessrequest',['title' => 'Access Request', 'activeparents' => 'User']);
        }

        //------------- Navigation End-----------------//

        //----------------------------------------------------  End ------------------------------------------//
}
