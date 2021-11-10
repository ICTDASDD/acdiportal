<?php

namespace App\Http\Controllers;

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
        public function reports(){
            return view('emp.reports',['title' => 'Reports', 'activeparents' => 'Dashboard']);
        }
        public function wall(){
            return view('emp.wall',['title' => 'Freedom Wall', 'activeparents' => 'Dashboard']);
        }
        //------------- Super Admin Navigation End-----------------//

        //---------------------------------------------------- Super Admin End ------------------------------------------//
}
