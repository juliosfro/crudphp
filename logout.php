<?php
  session_start();
  session_destroy();
  include("app/_generic/Globals.php");
  $globals = new Globals();
  $globals->redirectUrlPadrao();
