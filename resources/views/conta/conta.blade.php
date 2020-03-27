@extends('layout.header')
@section('title')
Tipo
@endsection
@section('content')
<div class="container-fluid">
    <form method="POST" action="{{asset('Conta')}}" id="form" class="form-row form-group">
        @isset($tela->id_conta)
        <input type="hidden" value="{{$tela->id_conta}}" name="id_movimentacao">
        @endisset
        
        <div class="col-sm-6">
           
            <div class="form-group col-sm-12">
                <label for="valor">Nome</label>
                <input type="text" name="nome" value="@if(isset($tela->nome)){{$tela->nome}}@endif" required class="form-control">
            </div>
            <div class="form-group col-sm-12">
                <label for="descricao">Tipo</label>
                <select class="form-control" name="tipo">
                    <option value="P" @if(isset($tela->tipo)) @if($tela->tipo == 'P') {{'selected'}} @endif @endif >Principal</option>
                    <option value="F" @if(isset($tela->tipo)) @if($tela->tipo == 'F') {{'selected'}} @endif @endif>Fundo</option>
                </select>
            </div>
            

            <div class="col-sm-12">
                <input type="submit" class="btn btn-success">
                @if(isset($tela->id_conta) && $tela->id_conta != '')
                <input type="button" onclick="window.location.href='{{asset('ListaMovimentacao')}}'" value="Cancelar" class="btn btn-danger">
                @endif
                <input type="button" onclick="window.location.href='{{asset('ListaConta')}}'" value="Voltar" class="btn btn-warning">
            </div>
        </div>
    </form>
</div>
@endsection
@section('extras')
@if(isset($mensagem) && $mensagem != "")
<script type="text/javascript">
    alert('{{$mensagem}}');
</script>
@endif
@endsection