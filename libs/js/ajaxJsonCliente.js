function excluirCliente(id){
  var pacoteEnvio = JSON.stringify({'idEnvioJson':id});

  jQuery.ajax({
    url: "app/controller/controllerCliente.php",
    dataType: 'json',
    data: {'envio':pacoteEnvio,'operacao':'d'},
    type: 'post',
    success: function(data, textStatus, jqxhr){
      if (data.codigo === 1){
        $("#alertMessage").html(retornoAlert('success',data.mensagem));
      }else{
        $("#alertMessage").html(retornoAlert('danger',data.mensagem));
      }
      buscarClientes();
    },
    error:function(jqxhr, textStatus, error){
      console.log(jqxhr.responseText);
    },
  });
}

function limparCamposFormulario(){
  $("#id").val("");
  $("#nome").val("");
  $("#idade").val("");
}


function buscarCliente(id){
  var pacoteEnvio = JSON.stringify({'idEnvioJson':id});

  jQuery.ajax({
    url: "app/controller/controllerCliente.php",
    dataType: 'json',
    data: {'envio':pacoteEnvio,'operacao':'p'},
    type: 'post',
    success: function(data, textStatus, jqxhr){
      $("#btn-cancelar").show();
      $("#formCadastroCliente").addClass("mudar-cor-editar");
      $("#id").val(data[0].id);
      $("#nome").val(data[0].nome);
      $("#idade").val(data[0].idade);
    },
    error:function(jqxhr, textStatus, error){
      console.log(jqxhr.responseText);
    },
  });
}

function buscarClientes(){
  jQuery.ajax({
    url: "app/controller/controllerCliente.php",
    // contentType: 'application/x-www-form-urlencoded',
    dataType: 'json',
    data: {'envio':null,'operacao':'p'},
    type: 'post',
    success: function(data, textStatus, jqxhr){
      if (data){
        table = '<div class="table-responsive "col-md-4 offset-4">';
        table += "<table class='table table-striped table-sm'>";
        table += "<thead>";
        table += "<tr><th>#</th><th>Nome</th><th>Idade</th><th>Opções</th></tr>";
        table += "</thead>";
        table += "<tbody>";
        for (var i = 0; i < data.length; i++) {
          table += "<tr>";
          table += "<td>"+data[i].id+"</td>";
          table += "<td class='alterar-largura-coluna-percentual-60'>"+data[i].nome+"</td>";
          table += "<td>"+data[i].idade+"</td>";
          table += "<td>";
          table += "<a class='btn btn-primary alterar-altura-btn-relatorio' onclick='buscarCliente("+data[i].id+")'>";
          table += "<span class='alterar-cor-branco'>Editar</span>";
          table += "</a>";
          table += "<a class='btn btn-danger alterar-altura-btn-relatorio' onclick='excluirCliente("+data[i].id+")'>";
          table += "<span class='alterar-cor-branco'>Excluir</span>";
          table += "</a>";
          table += "</td>";
          table += "</tr>";
        }
        table += "</tbody>";
        table += "</table>";
        table += '</div>';
        $("#listaCliente").html(table);
      }
    },
    error:function(jqxhr, textStatus, error){
      console.log(jqxhr.responseText);
    },
  });
}

$(document).ready(function(){

  /*
  * BUSCAR CLIENTE
  */
  buscarClientes();
  $("#btn-cancelar").hide();

  $("#btn-cancelar").click(function(e){
    $("#formCadastroCliente").removeClass("mudar-cor-editar");
    $("#btn-cancelar").hide();
    limparCamposFormulario();
  });

  $("#formCadastroCliente").submit(function(e){
    var id = $("#id").val();
    var nome = $("#nome").val();
    var idade = $("#idade").val();

    var pacoteEnvio = JSON.stringify({'idEnvioJson':id,'nomeEnvioJson':nome,'idadeEnvioJson':idade});

    $.ajax({
      url: "app/controller/controllerCliente.php",
      // contentType: 'application/x-www-form-urlencoded',
      dataType: 'json',
      data: {'envio':pacoteEnvio,'operacao':'c'},
      type: 'post',
      success: function(data, textStatus, jqxhr){
        if (data.codigo === 1){
          $("#alertMessage").html(retornoAlert('success',data.mensagem));
        }else{
          $("#alertMessage").html(retornoAlert('danger',data.mensagem));
        }
        $("#formCadastroCliente").removeClass("mudar-cor-editar");
        $("#btn-cancelar").hide();
        buscarClientes();
        limparCamposFormulario();
      },
      error:function(jqxhr, textStatus, error){
        console.log(jqxhr);
      },
    });
    e.preventDefault();
  });


});
