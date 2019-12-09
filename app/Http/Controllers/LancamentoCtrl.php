<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LancamentoCtrl extends Controller
{
    public function index(){
        return view('lancamento.lancamento',
                    array("title"=>"Lançamento"));
    }   
}
