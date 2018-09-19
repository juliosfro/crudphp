<?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    include("../model/ModelProduto.php");
    include("../_generic/Globals.php");

    $operacao = $_POST['operacao'];
    $dados = json_decode($_POST['envio']);
    $retorno = array();
    $globals = new Globals();
    $modelProduto = new ModelProduto();

// Esta fazendo as operacões de crud.
    if ($operacao == 'c'){
      print json_encode(cadastrarEditarProduto($modelProduto,$globals,$dados));
    } elseif ($operacao == 'p') {
      print json_encode(pesquisarProduto($modelProduto,$dados));
    } elseif ($operacao == 'd') {
      print json_encode(excluirProduto($modelProduto,$globals,$dados));
    }
  }

  function cadastrarEditarProduto($modelProduto,$globals,$dados){
    if ($dados->idEnvioJson != null){
      if ($modelProduto->updateProduto($dados)){
        return $globals->retornoPadrao(1,"Editado com sucesso");
      } else{
        return $globals->retornoPadrao(0,"Problemas ao editar");
      }
    } else{
      if ($modelProduto->setProdutos($dados)){
        return $globals->retornoPadrao(1,"Cadastro efetuado com sucesso");
      } else{
        return $globals->retornoPadrao(0,"Problemas ao cadastrar");
      }
    }
  }

  function pesquisarProduto($modelProduto,$dados){
    if (null == $dados){
      return $modelProduto->getProdutos();
    } else{
      return $modelProduto->getProdutos($dados->idEnvioJson);
    }
  }

  function excluirProduto($modelProduto,$globals,$dados){
    if ($modelProduto->deleteProduto($dados->idEnvioJson)){
      return $globals->retornoPadrao(1,"Exclusão efetuada com sucesso");
    } else{
      return $globals->retornoPadrao(0,"Problemas ao excluir");
    }
  }
