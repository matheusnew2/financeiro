<?php

namespace App\Http\Controllers;

class DashboardCtrl extends Controller{
    public function index(){
        return view('dashboard.dashboard',
                    array("title"=>"Dashboard"));
    }
}

