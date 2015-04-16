<?php
require_once("header.php");
verificaUsuario();
require_once("banco-categoria.php");
$categorias = listaCategorias($conexao);

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

<form method="post" action="cadastra-desenho.php" enctype="multipart/form-data" class="nova-categoria">
  <div class="form-group">
    <label for="inputNomeDesenho">Nome do desenho</label>
    <input type="text" name="nome" class="form-control" id="inputNomedesenho" placeholder="Nome do desenho" required>
  </div>
  <div class="form-group">
    <label for="inputNomeDesenho">Categoria</label>
    <select name="idCategoria" id="selectIdCategoria" class="form-control" required>
      <?php foreach ($categorias as $categoria): ?>
      <option value="<?=$categoria['id']?>"><?=$categoria['nome']?></option>
      <?php endforeach ?>
    </select>
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
    <label for="inputImagem">File input</label>
    <input type="file" id="inputImagem" name="desenho" required>
  </div>
  <div class="form-group">
    <label for="inputDescricao">Descrição</label>
    <textarea name="description" class="form-control" id="inputDescricao" cols="30" rows="10" required></textarea>
  </div>
  <button type="submit" class="btn btn-default">Cadastrar</button>
</form>
<?php require_once("footer.php"); ?>
