@extends('layout.header')
@section('title')
Listagem de contas fixas
@endsection
@section('content')
<div class="container-fluid">
    
        <form method="POST" action="{{asset('CadastrarContaFixa')}}">
            @csrf
            @if(isset($result))
                @if(($result->id_fixo) !== NULL)
            <input type="hidden" name="id_fixo" value="{{$result->id_fixo}}">
                @endif
            @endif
            <div class="row">
                <div class="form-group col-sm-12">
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" id="nome" value="@if(isset($result->nome)){{$result->nome}} @endif" required class="form-control">
                </div>
                <div class="form-group col-sm-3">
                    <label for="valor">Valor</label>
                    <input type="text" name="valor" id="valor" value="@if(isset($result->valor)){{$result->valor}} @endif" class="form-control">
                </div>
                <div class="col-sm-12">
                    <input type="submit" class="btn btn-success">
                    <input type="button" onclick="window.location.href='{{asset('ListaContaFixa')}}'" value="Voltar" class="btn btn-danger">

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