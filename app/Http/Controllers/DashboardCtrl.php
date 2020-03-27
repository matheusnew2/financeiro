<?php

namespace App\Http\Controllers;
use App\Models\MovimentacaoModel;
use App\Models\ContaModel;
use Illuminate\Http\Request;
class DashboardCtrl extends Controller{

    public function index(){
        $movimentacao = new MovimentacaoModel();
        $contas = $this->getContas();
        $lucro = 0;
        $despesa = 0;
        $saldoPositivo = $this->getSaldo(date("Y-m")."01", date("Y-m-t"), "L");
        $saldoNegativo = $this->getSaldo(date("Y-m")."01", date("Y-m-t"), "D");
        $saldo = $saldoPositivo-$saldoNegativo;
        return view('dashboard.dashboard',compact('lucro','despesa','contas','saldo'));
    }
    private function getContas(){
        $conta = new ContaModel();
        $contas = $conta->get();
        return $contas;
    }



    private function getSaldo($data_inicio,$data_fim,$tipo,$id_conta = ''){
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
        return $total;
    }
}

