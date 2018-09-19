<?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    include("../model/ModelLogin.php");

    $dados = json_decode($_POST['envio']);
    $retorno = array();
    $modelLogin = new ModelLogin();

    if ($modelLogin->getUsuario($dados) > 0){
      session_start();
      $_SESSION['usuario_nome'] = $dados->nomeEnvioJson;
      $retorno = array(
        'codigo' => 1,
        'mensagem' => "OK!",
      );
    } else{
      $retorno = array(
        'codigo' => 0,
        'mensagem' => "Usuário não cadastrado",
      );
    }

    print json_encode($retorno);
  }
