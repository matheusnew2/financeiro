@extends('layout.header')
@section('content')

<div class="container-fluid">

    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4 col-md-6" style="padding:0px;max-width: 535px;">
                <form action="Extrato" method="POST" id="form_relatorio">
                    <div class="card-header" >
                        Relatórios
                    </div>
                    <div class="card-body row">
                        <div class="col-lg-12 form-group">
                            <label for='tipo'>Modalidade de relatório</label>
                            <select class="form-control" name="tipo"> 
                                <option value="1">Relatório de balanço no periodo</option>
                                <option value="2">Extrato</option>
                            </select>
                        </div>
                        <div class="col-lg-12 form-group">
                            <label for='tipo'>Conta</label>
                            <select class="form-control" name="id_conta"> 
                                <option value="">Selecione a conta</option>
                                @foreach($contas as $conta)
                                <option value="{{$conta->id_conta}}">{{$conta->id_conta." - ".$conta->nome}}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="col-lg-6 form-group">
                            <label for='inicio'>Início</label>
                            <input type="date" name="inicio" id="inicio" class="form-control"> 
                        </div>
                        <div class="col-lg-6 form-group">
                            <label for='fim'>Fim</label>
                            <input type="date" name="fim" id="fim" class="form-control"> 
                        </div>
                        <div class="col-lg-12 form-group">
                            <input type="submit" class="btn btn-success" value="Gerar">
                        </div>
                    </div>
                </form>
            </div>
            <div class="graficos row">
                
            </div>



        </div>
        @endsection
        @section('javascript')
        <script type="text/javascript">
        $(document).ready(function(){
           $('.tst').click(function(){
               $('.obs').fadeIn(2000);
           }) ;
        });
                </script>

        @endsection
        @section('extras')
        <script src="js/demo/chart-pie-demo.js"></script>
        <script src="js/demo/chart-bar-demo.js"></script>
        <script src="js/graficos.js"></script>
        @endsection
