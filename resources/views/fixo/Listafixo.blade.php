@extends('layout.header')
@section('title')
Listagem de contas fixas
@endsection
@section('content')
<div class="container-fluid">
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
@endsection