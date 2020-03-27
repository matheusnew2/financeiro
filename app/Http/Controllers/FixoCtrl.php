<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FixoModel;
class FixoCtrl extends Controller
{
    public function index(){
        $fixo = new FixoModel();
        $contas = $fixo::paginate(20);
        return view("fixo.listaFixo",compact('contas'));
    }
    
    public function cadastrar(Request $request,$id = ""){
       
        $fixo = new FixoModel();
        try{
            if($request->input('id_fixo') !== NULL){
                $id = $request->input('id_fixo');
                $fixo = $fixo->find($id);
                $fixo->valor = $request->input('valor');
                $fixo->nome = $request->input('nome');
                $fixo->tipo_id_tipo = 1;

                $fixo->save();

            }else{
                $fixo->valor = $request->input('valor');
                $fixo->nome = $request->input('nome');
                $fixo->tipo_id_tipo = 1;

                $fixo->save();
                $id = $fixo->id_fixo;
            }
            return redirect()->route("ContaFixa",["id"=>$id]);
        }catch(Exception $e){

        }
        
        
    }
    
    public function carregar($id = ""){
        $mensagem = "";
        $result = NULL;
        if($id != ""){
            $fixo = new FixoModel();
            $result = $fixo->find($id);
            if($result == null){
                $mensagem = "Código não encontrado";
            }
        }
        return view("fixo.Cadastrarfixo",compact('result','mensagem'));
    }
}
