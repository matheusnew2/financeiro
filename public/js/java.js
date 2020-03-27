$(document).ready(function(){
    $('#form').submit(function(){
       event.preventDefault();
       var url = $('#form').attr("action");
       $.ajax({
           url:url,
           datatype:'JSON',
           type:'POST',
           data:{'form':$('#form').serialize()},
           success: function(msg){
               console.log(msg);
               var obj = jQuery.parseJSON(msg);
               if(obj.tipo == "S"){
                   tipo_modal("sucesso");
                   $('#myModal').modal('show');
                   $('#mensagem').html(obj.mensagem);
                   $('#myModal').on('hidden.bs.modal', function () {
                    if(obj.id != null){
                        window.location.href = (url+"/"+obj.id);
                    }
                   });
               }else{
                   alert('Mee');
               }
           },   error: function (request, status, error) {
                console.log(request);
            }
       });
    });
    $('#form_relatorio').submit(function(){
        event.preventDefault();
        $('.graficos').empty();
        var url = $('#form_relatorio').attr("action");
        $.ajax({
           url:url,
           datatype:'JSON',
           type:'POST',
           data:{'form':$('#form_relatorio').serialize()},
           success: function(obj){
                var result = jQuery.parseJSON(obj);
                var titulo = result.titulo[0];
                if(result['mensagem'] == 'S'){
                    if(result['tipo'] == "Grafico"){
                        var teste = [];
                        for(var i = 0;i<(result['resultado'][0].length);i++){

                            teste[i] = [result['resultado'][0][i]['nome'],result['resultado'][0][i]['valor']];
                        }
                        gerar_grafico('despesa',titulo,true,result['total'][0]);
                        grafico(teste,'despesa'); 

                        var teste = [];
                        for(var i = 0;i<(result['resultado'][1].length);i++){

                            teste[i] = [result['resultado'][1][i]['nome'],result['resultado'][1][i]['valor']];
                        }
                        var titulo = result.titulo[1];
                        gerar_grafico('lucro',titulo,true,result['total'][1]);
                        grafico(teste,'lucro'); 

                        gerarGraficoBarra(1,(result['total'][1] - result['total'][0]));
                        graficoBar(result['total'][1],result['total'][0],1);

                    }else if(result['tipo'] == "Extrato"){
                        for(var i = 0;i<(result['resultado'].length);i++){
                            var resultado = result['resultado'][i];
                            extrato(i,resultado['valor'],resultado['nome'],resultado['cor'],resultado['cor'],resultado['data'],resultado['conta'],resultado['observacao']);
                        }
                    }
                }else{
                        gerar_grafico(1,titulo,false);
                }
                
           }
        });
    });
});
function cancelar(id,rota,atual){
    var url = rota;
    $.ajax({
       url:url,
       datatype:'JSON',
       type:'POST',
       data:{'id':id},
       success: function(msg){
           var obj = jQuery.parseJSON(msg);
               if(obj.tipo == "S"){
                   
               
           tipo_modal("sucesso");
            $('#myModal').modal('show');
            $('#mensagem').html(obj.mensagem);
            $('#myModal').on('hidden.bs.modal', function () {
             if(obj.id != null){
                 window.location.href = (atual+"/"+obj.id);
             }
            });
            }
 
        }
    });
                
                
}