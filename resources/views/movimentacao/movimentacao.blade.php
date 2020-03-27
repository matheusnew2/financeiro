@extends('layout.header')
@section('title')
Lançamento
@endsection
@section('content')
<div class="container-fluid">
    @if((isset($tela->situacao) && $tela->situacao != 'I') || !isset($tela->situacao))
    <form method="POST" action="{{asset('Movimentacao')}}" id="form" class="form-row form-group">
    @endif
        @isset($tela->id_movimentacao)
        <input type="hidden" value="{{$tela->id_movimentacao}}" name="id_movimentacao">
        @endisset
        @if(isset($tela->situacao) && $tela->situacao == 'I')
        <div class="col-sm-6">
            <div class="form-group col-sm-12">
                <input type="text" class="form-control" style="background-color: red;color:white" disabled value="Movimentacao cancelada">
            </div>
        </div>
        @endif
        <div class="col-sm-6">
            <div class="form-group col-sm-12">
                <label for="titulo">Titulo*</label>
                <input type="text" class="form-control" name="titulo" @if(isset($tela->titulo) && $tela->titulo == 'I') disabled @endif value="@if(isset($tela->data_movimentacao)){{$tela->titulo}}@endif">
            </div>
            <div class="form-group col-sm-12">
                <label for="tipo">Tipo*</label>
                <select class="form-control" @if(isset($tela->situacao) && $tela->situacao == 'I')style='text-decoration: line-through;'@endif name="tipo" required>
                    <option value="">Selecione</option>
                    <option value="L" @if($tela->tipo == "L") selected @endif >Lucro</option>
                    <option value="D" @if($tela->tipo == "D") selected @endif >Despesa</option>
                </select>
            </div>
            <div class="form-group col-sm-12">
                <label for="conta_id_conta">Conta*</label>
                <select class="form-control" @if(isset($tela->situacao) && $tela->situacao == 'I')style='text-decoration: line-through;'@endif name="conta_id_conta" required>
                    <option value="">Selecione</option>
                    @foreach($contas as $conta)


                    <option value="{{$conta->id_conta}}" 
                        @if($conta->id_conta == $tela->conta_id_conta)
                            selected
                        @endif 
                    >{{$conta->id_conta.' - '.$conta->nome}}</option>
                    @endforeach

                </select>
            </div>
            <div class="form-group col-sm-12">
                <label for="valor">Valor*</label>
                <input type="text" name="valor" @if(isset($tela->situacao) && $tela->situacao == 'I')style='text-decoration: line-through;'@endif value="@if(isset($tela->valor)){{$tela->valor}}@endif" required class="form-control">
            </div>
            <div class="form-group col-sm-12">
                <label for="data_movimentacao">Data movimentacao*</label>
                <input type="date" name="data_movimentacao" @if(isset($tela->situacao) && $tela->situacao == 'I') disabled @endif value="@if(isset($tela->data_movimentacao)){{$tela->data_movimentacao}}@endif" 
                required class="form-control">
            </div>

            <div class="form-group col-sm-12">
                <label for="observacao">Observacao*</label>
                <textarea name="observacao" required @if(isset($tela->situacao) && $tela->situacao == 'I') style='text-decoration: line-through;'}@endif class="form-control">@if(isset($tela->observacao)){{$tela->observacao}}@endif </textarea>
            </div>


            <div class="col-sm-12">
                @if((isset($tela->situacao) && $tela->situacao != 'I') || !isset($tela->situacao))
                <input type="submit" class="btn btn-success">
                @endif
                @if(isset($tela->id_movimentacao) && $tela->id_movimentacao != '' && (isset($tela->situacao) && ($tela->situacao != 'I' || $tela->situacao == 'A')))
                <a onclick="cancelar({{$tela->id_movimentacao}},'{{asset('Movimentacao/Cancelar/'.$tela->id_movimentacao)}}','{{asset('Movimentacao')}}')"><input type="button" name="cancelar"  value="Cancelar" class="btn btn-danger"></a>
                @endif
                <input type="button" onclick="window.location.href='{{asset('ListaMovimentacao')}}'" value="Voltar" class="btn btn-warning">
                
            </div>
        </div>
    @if((isset($tela->situacao) && $tela->situacao != 'I') || !isset($tela->situacao))
    </form>
    @endif
</div>
@endsection
@section('extras')

@if(isset($mensagem) && $mensagem != "")
<script type="text/javascript">
    alert('{{$mensagem}}');
</script>
@endif
@endsection