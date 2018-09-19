$(document).ready(function(){
  $("#formlogin").submit(function(e){
    var nome = $("#nome").val();
    var senha = $("#senha").val();
    
    var pacoteEnvio = JSON.stringify({'nomeEnvioJson':nome,'senhaEnvioJson':senha, 'idEnvioJson':id});

    $.ajax({
      url: "app/controller/controllerLogin.php",
      dataType: 'json',
      data: {'envio':pacoteEnvio},
      type: 'post',
      success: function(data, textStatus, jqxhr){
        if (data.codigo === 1){
          redirectUrlPadrao("home.php");
        }else{
          $("#alertMessage").html(retornoAlert('danger', data.mensagem));
        }
      },
      error:function(jqxhr, textStatus, error){
        console.log(jqxhr.responseText);
      },
    });
    e.preventDefault();
  });
});
