<?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    include("../model/ModelCliente.php");
    include("../_generic/Globals.php");

    $operacao = $_POST['operacao'];
    $dados = json_decode($_POST['envio']);
    $retorno = array();
    $globals = new Globals();
    $modelCliente = new ModelCliente();

// Esta fazendo as operacões de crud.
    if ($operacao == 'c'){
      print json_encode(cadastrarEditarCliente($modelCliente,$globals,$dados));
    } elseif ($operacao == 'p') {
      print json_encode(pesquisarCliente($modelCliente,$dados));
    } elseif ($operacao == 'd') {
      print json_encode(excluirCliente($modelCliente,$globals,$dados));
    }
  }

  function cadastrarEditarCliente($modelCliente,$globals,$dados){
    if ($dados->idEnvioJson != null){
      if ($modelCliente->updateCliente($dados)){
        return $globals->retornoPadrao(1,"Editado com sucesso");
      } else{
        return $globals->retornoPadrao(0,"Problemas ao editar");
      }
    } else{
      if ($modelCliente->setClientes($dados)){
        return $globals->retornoPadrao(1,"Cadastro efetuado com sucesso");
      } else{
        return $globals->retornoPadrao(0,"Problemas ao cadastrar");
      }
    }
  }

  function pesquisarCliente($modelCliente,$dados){
    if (null == $dados){
      return $modelCliente->getClientes();
    } else{
      return $modelCliente->getClientes($dados->idEnvioJson);
    }
  }

  function excluirCliente($modelCliente,$globals,$dados){
    if ($modelCliente->deleteCliente($dados->idEnvioJson)){
      return $globals->retornoPadrao(1,"Exclusão efetuada com sucesso");
    } else{
      return $globals->retornoPadrao(0,"Problemas ao excluir");
    }
  }
