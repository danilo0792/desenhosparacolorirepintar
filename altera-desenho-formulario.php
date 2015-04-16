<?php
require_once("header.php");
verificaUsuario();
require_once("banco-categoria.php");
require_once("banco-desenho.php");
$categorias = listaCategorias($conexao);
$url = $_GET['url'];
$desenho = buscarDesenho($conexao, $url);
$imagePath = "http://".$_SERVER['SERVER_NAME'];
?>
<h1>Altera Desenho</h1>
<form method="post" action="/altera-desenho.php" enctype="multipart/form-data" class="nova-categoria">
  <input type="hidden" name="id" value="<?=$desenho['id'];?>">
  <input type="hidden" name="desenhoAtual" value="<?=$desenho['desenho'];?>">
  <div class="form-group">
    <label for="inputNomeDesenho">Nome do desenho</label>
    <input type="text" name="nome" class="form-control" id="inputNomedesenho" value="<?=$desenho['nome'];?>" placeholder="Nome do desenho" required>
  </div>
  <div class="form-group">
    <label for="inputNomeDesenho">Categoria</label>
    <select name="idCategoria" id="selectIdCategoria" class="form-control" required>
      <?php foreach ($categorias as $categoria):
        $essaEhACategoria = $desenho['idCategoria'] == $categoria['id'];
        $selecao = $essaEhACategoria ? "selected='selected'" : "";
      ?>
        <option value="<?=$categoria['id']?>"<?=$selecao;?>><?=$categoria['nome']?></option>
      <?php endforeach ?>
    </select>
  </div>
  <div class="form-group">
    <label for="inputKeywords">Keywords</label>
    <input type="text" class="form-control" name="keywords" id="inputKeywords" placeholder="Password" value="<?=$desenho['keywords'];?>" required>
  </div>
  <div class="form-group">
    <label for="inputURL">Url</label>
    <input type="text" class="form-control" name="url" id="inputURL" placeholder="Url" value="<?=$desenho['url'];?>" required>
  </div>
  <div class="form-group">
    <label for="inputImagem">Desenho</label>
    <input type="file" id="inputImagem" name="desenho" required>
  </div>
  <div class="form-group">
    <label for="inputDesenho">&nbsp;</label>
    <img src="<?=$imagePath."/thumbs/".$desenho['desenho'];?>" height="100" width="100" alt="desenho para colorir" class="thumbnail">
  </div>
  <div class="form-group">
    <label for="inputDescricao">Descrição</label>
    <textarea name="description" class="form-control" id="inputDescricao" cols="30" rows="10" required><?=$desenho['description'];?></textarea>
  </div>
  <button type="submit" class="btn btn-default">Alterar</button>
</form>
<?php require_once("footer.php");?>