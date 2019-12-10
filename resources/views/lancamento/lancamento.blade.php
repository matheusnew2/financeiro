@extends('layout.header')
@section('title')
Lançamento
@endsection
@section('content')
<div class="container-fluid">
        <form method="POST" action="{{asset('lancamento')}}" class="form-row form-group">
            @csrf
            @isset($result)
                @if($result->id_lancamento !== NULL)
            <input type="hidden" value="{{$result->id_lancamento}}" name="id_lancamento">
                @endif
            @endisset
            <div class="col-sm-6">
                <div class="form-group col-sm-12">
                    <label for="tipo">Tipo</label>
                    <select class="form-control" name="id_tipo" required>
                        <option value="">Selecione</option>
                        @foreach($tipos as $tipo)
                        <option value="{{$tipo->id_tipo}}" @if(isset($result->tipo_id_tipo)) @if($tipo->id_tipo == $result->tipo_id_tipo){{'selected'}}@endif @endif >{{$tipo->nome}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-sm-12">
                    <label for="valor">Valor</label>
                    <input type="text" name="valor" value="@if(isset($result->valor)){{$result->valor}}@endif" required class="form-control">
                </div>
                <div class="form-group col-sm-12">
                    <label for="descricao">Descrição</label>
                    <textarea name="descricao" required  class="form-control">@if(isset($result->descricao)){{$result->descricao}}@endif</textarea>
                </div>
                <div class="form-group col-sm-12">
                    <label for="descricao">Periodo</label>
                    <input type="date" name="periodo" value="@if(isset($result->periodo)){{$result->periodo}}@endif" required class="form-control">
                </div>
                <div class="form-group col-sm-12">
                    <label for="descricao">Investimento</label>
                    <div class="row">
                        <div class=" col-sm-2">
                            <label class="form-check-label" style="padding-top:10px">
                                <input type="radio" class="form-check-inline" required name="investimento" @isset($result) @if($result->investimento == 'S'){{'checked'}}@endif @endisset value="S">Sim
                            </label>
                        </div>
                         <div class=" col-sm-2">
                             <label class="form-check-label" style="padding-top:10px">
                                <input type="radio" class="form-check-inline" name="investimento" @isset($result) @if($result->investimento == 'N'){{'checked'}}@endif @endisset value="N">Não
                            </label>
                        </div>
                    </div>
                </div>
                
                <div class="col-sm-12">
                    <input type="submit" class="btn btn-success">
                    <input type="button" onclick="window.location.href='{{asset('ListaContaFixa')}}'" value="Voltar" class="btn btn-danger">
                </div>
            </div>
        </form>
</div>
@endsection