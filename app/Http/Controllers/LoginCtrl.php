<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FixoModel;
class LoginCtrl extends Controller
{
    public function index(){
        
        return view("login.login");
    }
    public function logar(Request $request){
        if($request->login == 'autumn' && $request->senha == "Matanza10"){
            $request->session()->put('key', true);
            return redirect( route('/'));
        }
         
    }
}