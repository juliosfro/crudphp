function redirectUrlPadrao(pagina){
  window.location = pagina;
}

function retornoAlert(paramTipoAlert, paramMensagem){
  return '<div class="alert alert-'+paramTipoAlert+
  '" role="alert">'+paramMensagem+'</div>';
}
