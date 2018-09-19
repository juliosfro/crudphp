
<?php include("_header.php"); ?>
  <div class="row">
    <div class="col-md-6 offset-3">
      <div id="alertMessage"></div>
      <br><h6 class="text-center">Produto</h6>
      <form id="formProduto" >
        <input type="hidden" class="form-control" id="id">
        <div class="form-group">
          <label for="nome">Produto</label>
          <input type="text" class="form-control" id="produto" placeholder="Produto">
        </div>
        <div class="form-group">
          <label for="valor">Valor</label>
          <input type="number" class="form-control" id="valor" placeholder="Valor">
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
        <button type="reset" class="btn btn-secondary">Limpar</button>
      </form>
    </div>
  </div>
  <h6 class="text-center">Lista de produtos</h6>
  <div id="listaProduto"></div>
  <script src="libs/js/ajaxProduto.js"></script>
<?php include("_footer.php"); ?>
