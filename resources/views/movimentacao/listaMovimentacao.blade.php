@extends('layout.header')
@section('title')
Lista de lançamentos
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <table class="table tab ">
                <tr >
                    <th class="table-responsive-md">Titulo</th>
                    <th >Tipo</th>
                    <th>Valor</th>
                    <th>Situaçao</th>
                    <th>Observaçao</th>
                </tr>
                @foreach($movimentacoes as $movimentacao)
                <tr>
                    <td @if(isset($movimentacao->situacao) && $movimentacao->situacao == 'I')style='text-decoration: line-through;'@endif>{{$movimentacao->titulo}}</td>
                    <td width="15%" @if(isset($movimentacao->situacao) && $movimentacao->situacao == 'I')style='text-decoration: line-through;'@endif><a href="Movimentacao/{{$movimentacao->id_movimentacao}}" >
                                        @if($movimentacao->tipo == 'L')
                                            {{'Lucro'}}
                                        @elseif($movimentacao->tipo == 'D')
                                            {{'Despesa'}}
                                        @endif
                                    </a>
                    </td>
                    <td width="15%" @if(isset($movimentacao->situacao) && $movimentacao->situacao == 'I')style='text-decoration: line-through;'@endif>{{$movimentacao->valor}}</td>
                    <td width="15%" >
                        @if($movimentacao->situacao == 'A')
                            Ativo
                        @elseif($movimentacao->situacao == 'I') 
                            Inativo
                        @endif
                    </td>
                    <td @if(isset($movimentacao->situacao) && $movimentacao->situacao == 'I')style='text-decoration: line-through;'@endif>{{$movimentacao->observacao}}</td>
                </tr>
                @endforeach

            </table>
            {!!$movimentacoes->links()!!}
        </div>
        <div class="col-sm-12">
            <input type="button" class="btn btn-success" onclick="window.location.href = '{{asset('Movimentacao')}}'" value="Novo">
        </div>
    </div>
</div>
@endsection