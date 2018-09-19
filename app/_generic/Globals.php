<?php
  class Globals
  {
    public function validarSessionUsuarioRedirect(){
      session_start();
      if (!$_SESSION['usuario_nome']){
        $this->redirectUrlPadrao();
      }
    }

    public function redirectUrlPadrao($pagina = null){
      header("location: ".$this->stringUrlPadrao().$pagina);
    }

    public function stringUrlPadrao($pagina = null){
      return '/sistema/'.$pagina;
    }

    public function retornoPadrao($codigo, $mensagem){
      $retornoPadrao = array(
        'codigo' => $codigo,
        'mensagem' => $mensagem,
      );

      return $retornoPadrao;
    }
  }
