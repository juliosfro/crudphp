$(document).ready(function(){
  $("#formProduto").submit(function(e){
    var produto = $("#produto").val();
    var valor = $("#valor").val();
    var id =$("#id").val();

    var pacoteEnvio = JSON.stringify({'produtoEnvioJson':produto,'valorEnvioJson':valor,'idEnvioJson':id});


    $.ajax({
      url: "app/controller/controllerProduto.php",
      dataType: 'json',
      data: {'envio':pacoteEnvio, 'operacao':'c'},
      type: 'post',
      success: function(data, textStatus, jqxhr){
        if (data.codigo === 1){
          $("#alertMessage").html(retornoAlert('success',data.mensagem));
                buscarProdutos();
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

function excluirProduto(id){
  var pacoteEnvio = JSON.stringify({'idEnvioJson':id});

  jQuery.ajax({
    url: "app/controller/controllerProduto.php",
    dataType: 'json',
    data: {'envio':pacoteEnvio,'operacao':'d'},
    type: 'post',
    success: function(data, textStatus, jqxhr){
      if (data.codigo === 1){
        $("#alertMessage").html(retornoAlert('success',data.mensagem));
      }else{
        $("#alertMessage").html(retornoAlert('danger',data.mensagem));
      }
      buscarProdutos();
    },
    error:function(jqxhr, textStatus, error){
      console.log(jqxhr.responseText);
    },
  });
}

function limparCamposFormulario(){
  $("#id").val("");
  $("#produto").val("");
  $("#valor").val("");
}

function buscarProduto(id){
  var pacoteEnvio = JSON.stringify({'idEnvioJson':id});

  jQuery.ajax({
    url: "app/controller/controllerProduto.php",
    dataType: 'json',
    data: {'envio':pacoteEnvio,'operacao':'p'},
    type: 'post',
    success: function(data, textStatus, jqxhr){
      $("#btn-cancelar").show();
      $("#formCadastroProduto").addClass("mudar-cor-editar");
      $("#id").val(data[0].id);
      $("#produto").val(data[0].descricao);
      $("#valor").val(data[0].valor);
    },
    error:function(jqxhr, textStatus, error){
      console.log(jqxhr.responseText);
    },
  });
}

function buscarProdutos(){
  jQuery.ajax({
    url: "app/controller/controllerProduto.php",
    // contentType: 'application/x-www-form-urlencoded',
    dataType: 'json',
    data: {'envio':null,'operacao':'p'},
    type: 'post',
    success: function(data, textStatus, jqxhr){
      if (data){
        table = '<div class="table-responsive "col-md-4 offset-4">';
        table += "<table class='table table-striped table-sm'>";
        table += "<thead>";
        table += "<tr><th>#</th><th>Produto</th><th>Valor</th><th>Opções</th></tr>";
        table += "</thead>";
        table += "<tbody>";
        for (var i = 0; i < data.length; i++) {
          table += "<tr>";
          table += "<td>"+data[i].id+"</td>";
          table += "<td class='alterar-largura-coluna-percentual-60'>"+data[i].descricao+"</td>";
          table += "<td>"+data[i].valor+"</td>";
          table += "<td>";
          table += "<a class='btn btn-primary alterar-altura-btn-relatorio' onclick='buscarProduto("+data[i].id+")'>";
          table += "<span class='alterar-cor-branco'>Editar</span>";
          table += "</a>";
          table += "<a class='btn btn-danger alterar-altura-btn-relatorio' onclick='excluirProduto("+data[i].id+")'>";
          table += "<span class='alterar-cor-branco'>Excluir</span>";
          table += "</a>";
          table += "</td>";
          table += "</tr>";
        }
        table += "</tbody>";
        table += "</table>";
        table += '</div>';
        $("#listaProduto").html(table);
      }
    },
    error:function(jqxhr, textStatus, error){
      console.log(jqxhr.responseText);
    },
  });
}

  buscarProdutos();
  $("#btn-cancelar").hide();

  $("#btn-cancelar").click(function(e){
    $("#formCadastroProduto").removeClass("mudar-cor-editar");
    $("#btn-cancelar").hide();

    limparCamposFormulario();
  });

  $("#formCadastroProduto").submit(function(e){
    var id = $("#id").val();
    var produto = $("#produto").val();
    var valor = $("#valor").val();

    var pacoteEnvio = JSON.stringify({'idEnvioJson':id,'produtoEnvioJson':produto,'valorEnvioJson':valor});

    $.ajax({
      url: "app/controller/controllerProduto.php",
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
        $("#formCadastroProduto").removeClass("mudar-cor-editar");
        $("#btn-cancelar").hide();
        buscarProdutos();
        limparCamposFormulario();
      },
      error:function(jqxhr, textStatus, error){
        console.log(jqxhr);
      },
    });
    e.preventDefault();
  });
