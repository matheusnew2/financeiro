function tipo_modal(tipo){
    
    if(tipo == "sucesso"){
         $('#myModal').html('<div class="modal-dialog modal-confirm " style="margin: 0 auto;    margin-top: 150px;"><div class="modal-content"><div class="modal-header"><div class="icon-box"><i class="material-icons">&#xE876;</i></div><h4 class="modal-title">Sucesso!</h4>	</div><div class="modal-body"><p class="text-center" id="mensagem"></p></div><div class="modal-footer"><button class="btn btn-success btn-block" data-dismiss="modal">OK</button></div></div></div>');
    }else{
        $('#myModal').html('<div class="modal-dialog modal-confirm" style="margin: 0 auto;    margin-top: 150px;"><div class="modal-content"><div class="modal-header"><div class="icon-box" style="background:#ef513a"><i class="material-icons">&#xE5CD;</i></div><h4 class="modal-title">Desculpe</h4></div><div class="modal-body"><p id="mensagem" class="text-center">Your transaction has failed. Please go back and try again.</p></div><div class="modal-footer"><button style="background:#ef513a" class="btn btn-danger btn-block" data-dismiss="modal">OK</button></div></div></div>');
    }
    return true;
}
