function gerar_grafico(id,titulo,encontrado,total){
    if(encontrado){
        var texto = '<div class="card shadow mb-12 col-md-4" style="padding: 0;    margin: 5px;    max-width: 550px;">        <!-- Card Header - Dropdown -->        <div class="card-header py-3">            <h6 class="m-0 font-weight-bold text-primary">'+titulo+'</h6>         </div>        <!-- Card Body -->        <div class="card-body">            <div class="chart-pie pt-4">                <canvas id="myPieChart'+id+'"></canvas>    </div><div>  <h6 class="m-0 font-weight-bold " style="text-align:left;padding-top:10%">Total: R$ '+total+'</h6>      </div>        </div>    </div>';
        $('.graficos').append(texto);
    }
    else{
        var texto = '<div class="card shadow mb-12 col-md-4" style="padding: 0;    margin: 5px;    max-width: 550px;">        <!-- Card Header - Dropdown -->        <div class="card-header py-3">            <h6 class="m-0 font-weight-bold text-primary">'+titulo+'</h6>        </div>        <!-- Card Body -->        <div class="card-body">            <div class="chart-pie pt-4">               <p style="text-align: center;font-size: 18px;padding-top:5%"> Nenhuma ocorrencia no periodo </p>           </div>        </div>    </div>';
        $('.graficos').append(texto);
    }

}
function gerarGraficoBarra(id,total){
    var texto = '<div class="card shadow mb-4 col-md-4" style="margin: 5px;padding:0px;max-width: 550px;">                 <div class="card-header py-3">                    <h6 class="m-0 font-weight-bold text-primary">Diferença</h6>                </div>                <div class="card-body">                    <div class="chart-bar">                        <canvas id="myBarChart'+id+'"></canvas>        </div><div>  <h6 class="m-0 font-weight-bold " style="text-align:left;padding-top:15px">Diferença: R$ '+total+'</h6>            </div>                                    </div>            </div>        ';
    $('.graficos').append(texto);
    }  
function extrato(id,valor,nome,cor,cor_texto,data,conta,observacao){
    var texto = '<div class="col-md-12 " style="padding:0px"><div class="col-xl-7  mb-4" style="max-width:560px">                    <div class="card shadow h-100 py-2 " id="exibicao'+id+'" onclick="mostrar('+id+')" style="border-left: .25rem solid '+cor+'!important;">                        <div class="card-body" style="padding: 0.5rem;">                            <div class="row no-gutters align-items-center">                                <div class="col mr-2">                                    <div class="text-xs font-weight-bold text-uppercase mb-1" style="    color: '+cor_texto+'!important;">'+nome+'</div>                                    <div class="h5 mb-0 font-weight-bold text-gray-800">'+valor+'</div>         <p style="font-size:10px;text-align:left;margin: 0px;">Conta: '+conta+'</p>  <p style="font-size:10px;text-align:right;margin: 0px;">Data movimentaçao: '+data+'</p>  <p style="display:none;font-size: 12px;padding-top: 10px;" id="obs'+id+'">'+observacao+'</p>                    </div>                                <div class="col-auto">                                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>                                </div>                            </div>                        </div>                    </div>                </div></div>';
    $('.graficos').append(texto);
}
function mostrar(id){
    $('#obs'+id).fadeIn(800);
    $('#obs'+id).removeAttr("onclick");
    $('#exibicao'+id).attr("onclick","esconder("+id+")");
    
}
function esconder(id){
    $('#obs'+id).fadeOut(200);
    $('#obs'+id).removeAttr("onclick");
    $('#exibicao'+id).attr("onclick","mostrar("+id+")");
}