<?php include("_header.php"); ?>
  <div class="row">
    <div class="col-md-6 offset-3">
      <div id="alertMessage"></div>
      <br><h6 class="text-center">Login</h6>
      <form id="formlogin" >
        <div class="form-group">
          <label for="nome">Nome</label>
          <input type="text" class="form-control" id="nome" placeholder="Nome">
        </div>
        <div class="form-group">
          <label for="senha">Senha</label>
          <input type="password" class="form-control" id="senha" placeholder="Senha">
        </div>
        <button type="submit" class="btn btn-primary">Acessar</button>
        <button type="reset" class="btn btn-secondary">Limpar</button>
      </form>
    </div>
  </div>
  <script src="libs/js/ajaxJsonLogin.js"></script>
<?php include("_footer.php"); ?>
