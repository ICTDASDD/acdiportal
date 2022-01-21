<?php

namespace App\Http\Controllers\ovs\elecom;
use App\Models\ovs\admin\UserLog;
use Illuminate\Support\Facades\Auth;
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

            $save_userlog = new UserLog();
            $save_userlog->emp_id = Auth::user()->emp_id; 
            $save_userlog->process = 'Viewed "Request" Tab';
            $save_userlog->save();

            return view('ovs.elecom.request',['title' => 'General Request', 'activeparents' => 'Monitoring']);
        }

        public function layoutReports(){
            return view('ovs.elecom.reports',['title' => 'Reports', 'activeparents' => 'Monitoring']);
        }

        public function bstatus(){

            $save_userlog = new UserLog();
            $save_userlog->emp_id = Auth::user()->emp_id; 
            $save_userlog->process = 'Viewed "Branch Status" Tab';
            $save_userlog->save();

            return view('ovs.elecom.bstatus',['title' => 'Branch Status', 'activeparents' => 'User']);
        }

        //------------- Navigation End-----------------//

        //----------------------------------------------------  End ------------------------------------------//
}
