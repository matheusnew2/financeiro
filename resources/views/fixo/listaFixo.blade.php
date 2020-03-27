@extends('layout.header')
@section('title')
Listagem de contas fixas
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <table class="table table-bordered">
                <tr>
                    <th>Nome</th>
                    <th>Valor</th>
                    <th>Tipo</th>
                </tr>
                @foreach($contas as $conta)
                <tr>
                    <td><a href="ContaFixa/{{$conta->id_fixo}}" >{{$conta->nome}}</a></td>
                    <td>{{$conta->valor}}</td>
                    <td>{{$conta->tipo_id_tipo}}</td>
                </tr>
                @endforeach

            </table>
            {!!$contas->links()!!}
        </div>
        <div class="col-sm-12">
            <input type="button" class="btn btn-success" onclick="window.location.href = '{{asset('ContaFixa')}}'" value="Novo">
        </div>
    </div>
</div>
@endsection