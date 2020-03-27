<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MovimentacaoModel;
use App\Models\ContaModel;
class ExtratoCtrl extends Controller
{
    public function index(){
        $contas = $this->getContas();
        $movimentacoes = $this->todasmov('2020-02-01', '2020-02-29',1);
        return view("extrato.extrato",compact('contas'));
    }
    public function relatorio(Request $request){
        $form = array();
        parse_str($request->input('form'),$form);
        switch($form['tipo']){
            case 1:
                $data_inicio = $form['inicio'];
                $data_fim = $form['fim'];
                $id_conta = $form['id_conta'];
                $movimentacoesDespesa = $this->getMovimentacoes($data_inicio, $data_fim,"D",$id_conta);
                $movimentacoesLucro = $this->getMovimentacoes($data_inicio, $data_fim,"L",$id_conta);
                if(count($movimentacoesDespesa[0]) > 0 || count($movimentacoesLucro[0]) > 0){
                    die (json_encode((object)array('resultado'=>[$movimentacoesDespesa[0],$movimentacoesLucro[0]],"tipo"=>"Grafico","total"=>[$movimentacoesDespesa[1],$movimentacoesLucro[1]],'mensagem'=>"S",'titulo'=>["Total de despesas","Total de lucros"])));
                }else{
                    die (json_encode((object)array('mensagem'=>"N",'titulo'=>["Nao encontrado"])));
                }
        
        
                break;
            case 2:
                $data_inicio = $form['inicio'];
                $data_fim = $form['fim'];
                $id_conta = $form['id_conta'];
                $movimentacoes = $this->todasmov($data_inicio, $data_fim,$id_conta);
                die(json_encode((object)array('resultado'=>$movimentacoes,"tipo"=>"Extrato","mensagem"=>"S","titulo"=>['Extrato'])));
                break;
        }
    }
    private function getMovimentacoes($data_inicio,$data_fim,$tipo,$id_conta = ''){
        $movimentacao = new MovimentacaoModel();
        $movimentacoes = array();
        if($id_conta == ''){
            $resultado = $movimentacao::where("tipo","=",$tipo)->where("situacao","=","A")->whereBetween('data_movimentacao', [$data_inicio,$data_fim])->get();
        }else{
            $resultado = $movimentacao::where("tipo","=",$tipo)->where('conta_id_conta',"=",$id_conta)->where("situacao","=","A")->whereBetween('data_movimentacao', [$data_inicio,$data_fim])->get();
        }
        $total = 0;
        foreach($resultado as $r){
            $total += $r->valor;
            $movimentacoes[] = (object) array('nome'=>$r->titulo,'valor'=>$r->valor); 
        }
        return [$movimentacoes,$total];
    }
    
     
    private function todasmov($data_inicio,$data_fim,$id_conta = ''){
      
        $movimentacoes =array();
        $movimentacao = new MovimentacaoModel();
        if($id_conta == ''){
            $resultado = $movimentacao->join('conta','movimentacao.conta_id_conta','=','conta.id_conta')->select("movimentacao.*","conta.id_conta","conta.nome")->whereBetween('data_movimentacao', [$data_inicio,$data_fim])->get();
        }else{
            $resultado = $movimentacao->join("conta","movimentacao.conta_id_conta","=","conta.id_conta")->select("movimentacao.*","conta.id_conta","conta.nome")->where('conta_id_conta',"=",$id_conta)->whereBetween('data_movimentacao', [$data_inicio,$data_fim])->get();
        }
        foreach($resultado as $r){
            if($r->situacao == "I"){
                $movimentacoes[] = (object) array('nome'=>$r->titulo,"observacao"=>$r->observacao,'valor'=>"<div style='text-decoration: line-through;display: inline-block;'>R$ $r->valor</div><div style='display: inline-block;'> (Cancelado)</div>",'data'=>date("d/m/Y",strtotime($r->data_movimentacao)),'conta'=>$r->id_conta." - ".$r->nome,'cor'=>"grey"); 
            }else{
                $cor = "";
                if($r->tipo == "D"){
                    $cor = "red";
                }else if($r->tipo == "L"){
                    $cor = "#00de00";
                }
                $movimentacoes[] = (object) array('nome'=>$r->titulo,"observacao"=>$r->observacao,'valor'=> "R$ ".number_format($r->valor, 2, ",","."),'data'=>date("d/m/Y",strtotime($r->data_movimentacao)),'conta'=>$r->id_conta." - ".$r->nome,'cor'=>$cor); 
            }
        }
        return $movimentacoes;
    }
        
    private function getContas(){
        $contas = new ContaModel();
        return $contas::all();
    }
}