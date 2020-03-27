@extends('layout.header')
@section('title')
Dashboard
@endsection
@section('content')
@section('javascript')
<script type="text/javascript">
    function cobrir(from,to){
        event.preventDefault();
        $('#'+from).removeAttr("onclick");
        $('#'+from).attr("onclick",'descobrir("'+from+'","'+to+'")');
        $('#'+to).fadeOut(800);
        
        
    }
    function descobrir(from,to){
        event.preventDefault();
        $('#'+from).removeAttr("onclick");
        $('#'+from).attr("onclick",'cobrir("'+from+'","'+to+'")');
        $('#'+to).fadeIn(500);
    }
        
    
</script>
@endsection
<div class="container-fluid">
    
    <div class="row">
        <div class="col-md-12 row">
            @foreach($contas as $conta)
            <div class="col-xl-4 col-md-6 mb-4" style="padding-right: 0px">
                <div class="card shadow h-100 py-2"  style="border-left: .25rem solid @if($conta->saldo >= 0)green @elseif($conta->saldo < 0) red @endif !important;">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold  text-uppercase mb-1" style="color:black">Conta: {{$conta->id_conta." - ".$conta->nome}} </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"  id='conta{{$conta->id_conta}}'>R$ <div style="display: inline-block;;color: @if($conta->saldo >= 0)green @elseif($conta->saldo < 0) red @endif"> {{number_format($conta->saldo,2,",",".")}}</div></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-eye fa-2x text-gray-300" id='olho{{$conta->id_conta}}' onclick="cobrir({{"'olho".$conta->id_conta."','conta".$conta->id_conta."'"}})"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="col-xl-4 col-md-6 mb-4" style="padding-right: 0px">
                <div class="card shadow h-100 py-2"  style="border-left: .25rem solid green !important;">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold  text-uppercase mb-1" style="color:black">Saldo mes atual</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"  id="saldo" >R$ <div style="display: inline-block;;color: green">{{number_format($saldo,2,",",".")}}</div></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-eye fa-2x text-gray-300" id='olhoMes' onclick="cobrir('olhoMes','saldo')"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         
    </div>
</div>

@endsection
@section('extras')
<!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>
  <script src="js/demo/chart-bar-demo.js"></script>
@endsection