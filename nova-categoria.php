<?php
require_once("header.php");
verificaUsuario();

if(isset($_SESSION["danger"])){
?>
  <p class="alert-danger"><?=utf8_decode($_SESSION["danger"]);?></p>
<?php
  unset($_SESSION["danger"]);
}

if(isset($_SESSION["success"])){
?>
  <p class="alert-success"><?=utf8_decode($_SESSION["success"]);?></p>
<?php
  unset($_SESSION["success"]);
}
?>

<form method="post" action="cadastra-categoria.php" enctype="multipart/form-data" class="nova-categoria">
  <div class="form-group">
    <label for="inputNomeCategoria">Nome da Categoria</label>
    <input type="text" name="nome" class="form-control" id="inputNomeCategoria" placeholder="Nome da categoria" required>
  </div>
  <div class="form-group">
    <label for="inputKeywords">Keywords</label>
    <input type="text" class="form-control" name="keywords" id="inputKeywords" placeholder="Password" required>
  </div>
  <div class="form-group">
    <label for="inputURL">Url</label>
    <input type="text" class="form-control" name="url" id="inputURL" placeholder="Url" required>
  </div>
  <div class="form-group">
    <label for="inputImagem">Imagem</label>
    <input type="file" id="inputImagem" name="imagem" required>
  </div>
  <div class="form-group">
    <label for="inputDescricao">Descrição</label>
    <textarea name="descricao" class="form-control" id="inputDescricao" cols="30" rows="10" required></textarea>
  </div>
  <button type="submit" class="btn btn-default">Cadastrar</button>
</form>
<?php require_once("footer.php");?>
