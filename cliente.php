<?php include("_menu.php"); ?>
  <div class="row">
    <div class="col-sm-4 offset-4">
      <div id="alertMessage"></div>
      <br>
      <h6 class="text-center">Cadastro de cliente</h6>
      <form id="formCadastroCliente" >
        <input type="hidden" class="form-control" id="id">
        <div class="form-group">
          <label for="nome">Nome *</label>
          <input type="text" class="form-control" id="nome" placeholder="Nome">
        </div>
        <div class="form-group">
          <label for="idade">Idade *</label>
          <input type="number" class="form-control" id="idade" placeholder="Idade">
        </div>
        <button type="submit" class="btn btn-primary">Gravar</button>
        <button type="button" id="btn-cancelar" class="btn btn-secondary">Cancelar</button>
      </form>
    </div>
  </div>
  <br>
  <h6 class="text-center">Lista de clientes</h6>
  <br>
  <div id="listaCliente"></div>
  <script src="libs/js/ajaxJsonCliente.js"></script>
<?php include("_footer.php"); ?>
