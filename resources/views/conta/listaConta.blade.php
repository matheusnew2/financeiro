@extends('layout.header')
@section('title')
Lista de tipos
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <table class="table table-bordered">
                <tr>
                    <th>Nome</th>
                    <th>Saldo</th>
                </tr>
                @foreach($contas as $conta)
                <tr>
                    <td><a href="Conta/{{$conta->id_conta}}" >{{$conta->nome}}</a></td>
                    <td>
                        {{$conta->saldo}}
                    </td>
                </tr>
                @endforeach

            </table>
            {!!$contas->links()!!}
        </div>
        <div class="col-sm-12">
            <input type="button" class="btn btn-success" onclick="window.location.href = '{{asset('Conta')}}'" value="Novo">
        </div>
    </div>
</div>
@endsection