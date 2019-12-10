<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoModel;
use App\Models\LancamentoModel;
class LancamentoCtrl extends Controller
{
    public function index(){
        return view('lancamento.lancamento',['tipos' => $this->tipos()]);
    }   
    public function cadastrar(Request $request){
        $tipo = new LancamentoModel();
        if($request->input('id_lancamento') !== NULL){
            $id =$request->input('id_lancamento');
            $tipo = $tipo->find($id);
            $tipo->tipo_id_tipo = $request->input('id_tipo');
            $tipo->valor = $request->input('valor');
            $tipo->descricao = $request->input('descricao');
            $tipo->investimento = $request->input('investimento');
            $tipo->periodo = $request->input('periodo');
            $tipo->save();
        }else{
            $tipo->tipo_id_tipo = $request->input('id_tipo');
            $tipo->valor = $request->input('valor');
            $tipo->descricao = $request->input('descricao');
            $tipo->investimento = $request->input('investimento');
            $tipo->periodo = $request->input('periodo');
            $tipo->save();
            $id = $tipo->id_lancamento;
        }
        return redirect()->route('lancamento',['id'=>$id]);
    }
    public function carregar($id = ""){
        if($id != ""){
            $lancamento = new LancamentoModel();
            $result = $lancamento->find($id);
            if($result == null){
                $result = (object) array('nome'=>"",'valor'=>"");
                $mensagem = "Código não encontrado";
            }
        }
        $tipos = $this->tipos();
        return view("lancamento.lancamento",compact('result','mensagem','tipos'));
    }
    private function tipos(){
        $tipo = new TipoModel();
        $tipos = $tipo::all();
        return $tipos;
    }
}
