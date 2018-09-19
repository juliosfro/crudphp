<?php
  class Conexao
  {
    private $servidor = 'localhost';
    private $usuario = 'root';
    private $senha = '';
    private $db = 'database';

    public function connect(){
      $conexao = mysqli_connect($this->servidor,$this->usuario,$this->senha,$this->db);
      return $conexao;
    }
  }
