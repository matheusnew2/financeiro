<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AutenticarCtrl extends Controller {
    public function AutenticarCtrl(Request $request)  {
        print_r($request);
        if(!$request->session()->get('key') !== NULL){
            redirect(base_url("/"));
        }
        exit;
    }
    public function logar($login,$senha,Request $request){
        if($login =="slotnew2" && $senha == "1574"){
            $request->session()->put('key', true);
        } 
    }
}

