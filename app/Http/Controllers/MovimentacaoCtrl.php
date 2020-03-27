<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoModel;
use App\Models\MovimentacaoModel;
use App\Models\ContaModel;
class MovimentacaoCtrl extends Controller
{
    public function index(){
        return view('movimentacao.movimentacao');
    }   
    public function cadastrar(Request $request){
        $tipo = new MovimentacaoModel();
        $mensagem = "";
        $form = array();
        parse_str($request->input('form'),$form);
            

        if(isset($form['id_movimentacao'])){
            $id = $form['id_movimentacao'];
            $tipo = $tipo->find($id);
            $tipo->titulo = $form['titulo'];
            $tipo->tipo = $form['tipo'];
            $tipo->valor = $form['valor'];
            $tipo->observacao = $form['observacao'];
            $tipo->conta_id_conta = $form['conta_id_conta'];
            $tipo->data_movimentacao = $form['data_movimentacao'];
            $mensagem = "Atualizado com sucesso.";
            $tipo->save();
        }
        else{
            $tipo->titulo = $form['titulo'];
            $tipo->tipo = $form['tipo'];
            $tipo->valor = $form['valor'];
            $tipo->situacao = "A";
            $tipo->observacao = $form['observacao'];
            $tipo->conta_id_conta = $form['conta_id_conta'];
            $tipo->data_movimentacao = $form['data_movimentacao'];

            $tipo->save();
            $id = $tipo->id_movimentacao;
            $mensagem = "Cadastrado com sucesso.";
        }
        
        die(json_encode(['id'=>$id,"tipo"=>"S",'mensagem'=>$mensagem]));
        //return redirect()->route('movimentacao',);
    }
    public function carregar($id = ""){
        $mensagem = "";
        $tela = null;
        if($id != ""){
            $movimentacao = new MovimentacaoModel();
            $tela = $movimentacao->find($id);
            if($tela == null){
                $tela = (object) array('nome'=>"",'valor'=>"",'tipo'=>"");
                $mensagem = "Código não encontrado";
            }
        }else{
            $tela = (object) array('nome'=>"",'valor'=>"",'tipo'=>"",'conta_id_conta'=>"");
        }
        $contas = $this->getContas();
        return view("movimentacao.movimentacao",compact('tela','mensagem','contas'));
    }
    public function lista(){
        $movimentacao = new MovimentacaoModel();
        $movimentacoes = $movimentacao->paginate(10);
        return view("movimentacao.listaMovimentacao",compact('movimentacoes'));
    }
    private function getContas(){
        $contas = new ContaModel();
        return $contas::all();
    }
    public function cancelar(Request $request,$id=''){
        $movimentacao = new MovimentacaoModel();
        $movimentacao::where("id_movimentacao",$id)->update(['situacao'=>'I']);
        $mensagem = "Movimentaçao cancelada com sucesso.";
        die(json_encode(['id'=>$id,"tipo"=>"S",'mensagem'=>$mensagem]));
    }
}
