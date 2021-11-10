<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;




class EmpController extends Controller
{
    //---------------------------------------------------- Access Manager ------------------------------------------//

        //------------- Admin Navigation -----------------//

        //Profile nav
        public function profile(){
            return view('emp.profile',['title' => 'Emp Profile', 'activeparents' => 'Profile']);
        }
        public function settings(){
            return view('emp.settings',['title' => 'Emp Settings', 'activeparents' => 'Profile']);
        }

        //Dashboard nav
        public function benefits(){
            return view('emp.benefits',['title' => 'Benefits Monitoring', 'activeparents' => 'Monitoring']);
        }
        public function leavecredential(){
            return view('emp.leavecredential',['title' => 'Leave Credential', 'activeparents' => 'Monitoring']);
        }

        public function wall(){
            return view('emp.wall',['title' => 'Freedom Wall', 'activeparents' => 'Monitoring']);
        }
        //------------- Super Admin Navigation End-----------------//

        //---------------------------------------------------- Super Admin End ------------------------------------------//
}