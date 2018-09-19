<?php
  include("../_generic/Conexao.php");

  class ModelCliente
  {
    public function getClientes($id = null){
      $conexao = new Conexao();
      $clientes = array();

      $where = '';
      if ($id != null){
        $where = ' where id = '.$id;
      }
      $sql = mysqli_query($conexao->connect(),"select * from cliente ".$where);
      while ($cliente = mysqli_fetch_assoc($sql)) {
          $clientes[] = $cliente;
      }

      return $clientes;
    }

    public function setClientes($cliente){
      $conexao = new Conexao();
      $sql = mysqli_query($conexao->connect(),
      'insert into cliente values("","'.$cliente->nomeEnvioJson.'",'.$cliente->idadeEnvioJson.')');

      return $sql;
    }

    public function updateCliente($cliente){
      $conexao = new Conexao();
      $sql = mysqli_query($conexao->connect(),
      'update cliente set nome = "'.$cliente->nomeEnvioJson.'", idade = '.$cliente->idadeEnvioJson.'
                    where id = '.$cliente->idEnvioJson);

      return $sql;
    }

    public function deleteCliente($id){
      $conexao = new Conexao();
      $sql = mysqli_query($conexao->connect(),
      'delete from cliente where id = '.$id);

      return $sql;
    }
  }
