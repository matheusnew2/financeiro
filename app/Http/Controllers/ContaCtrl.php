<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContaModel;

class ContaCtrl extends Controller
{
    public function index(){
        
    }
    public function __construct() {
    }
    public function cadastrar(Request $request){
        $conta = new ContaModel();
        $arr = array();
        parse_str($request->input('form'),$arr);
        if(isset($arr['id_tipo'])){
            $id = $arr['id_tipo'];
            $conta = $conta->find($id);
            $conta->nome = $arr['nome'];
            $conta->tipo = $arr['tipo'];
            $conta->save();
            die(json_encode(array("mensagem"=>"Alterado com sucesso","tipo"=>"S")));
        }else{
            $conta->nome = $arr['nome'];
            $conta->tipo = $arr['tipo'];
            $conta->saldo = 0;
            $conta->id_usuario = 1;
            $conta->save();
            $id = $conta->id_conta;
            die(json_encode(array("mensagem"=>"Cadastrado com sucesso","tipo"=>"S","id"=>$id)));
        }
       // return redirect()->route('Tipo',['id'=>$id]);
    }
    public function carregar($id = ""){
        if($id != ""){
            $conta = new ContaModel();
            $tela = $conta::find($id);
            return view('conta.conta',compact('tela'));
        }else{
            return view('conta.conta');    
        }
    }
    public function lista(){
        $conta = new ContaModel();
        $contas = $conta->paginate(10);
        return view('conta.listaConta',compact('contas'));
    }
}
