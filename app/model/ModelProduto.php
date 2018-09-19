<?php
  include("../_generic/Conexao.php");

  class ModelProduto
  {
    public function getProdutos($id = null){
      $conexao = new Conexao();
      $produtos = array();

      $where = '';
      if ($id != null){
        $where = ' where id = '.$id;
      }
      $sql = mysqli_query($conexao->connect(),"select * from produto ".$where);
      while ($produto = mysqli_fetch_assoc($sql)) {
          $produtos[] = $produto;
      }

      return $produtos;
    }

    public function setProdutos($produto){
      $conexao = new Conexao();
      $sql = mysqli_query($conexao->connect(),
      'insert into produto values("","'.$produto->produtoEnvioJson.'",'.$produto->valorEnvioJson.')');

      return $sql;
    }

    public function updateProduto($produto){
      $conexao = new Conexao();
      $sql = mysqli_query($conexao->connect(),
      'update produto set descricao = "'.$produto->produtoEnvioJson.'", valor = '.$produto->valorEnvioJson.'
                    where id = '.$produto->idEnvioJson);

      return $sql;
    }

    public function deleteProduto($id){
      $conexao = new Conexao();
      $sql = mysqli_query($conexao->connect(),
      'delete from produto where id = '.$id);

      return $sql;
    }
  }
