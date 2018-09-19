<?php
  include("../_generic/Conexao.php");

  class ModelLogin
  {
    public function getUsuario($dados){
      $conexao = new Conexao();

      $sql = mysqli_query($conexao->connect(),"select * from usuario
                  where nome = '".$dados->nomeEnvioJson."'
                  and senha = '".md5($dados->senhaEnvioJson)."'");
      $qtdeUsuario = mysqli_num_rows($sql);

      return $qtdeUsuario;
    }
  }
