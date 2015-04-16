<?php require_once("header.php"); ?>
<div class="row">
<?php
require_once("banco-categoria.php");
require_once("banco-desenho.php");
$url = $_GET["url"];
$categoria = buscaCategoria($conexao,$url);
$categorias = listaCategorias($conexao);
$desenhos = buscaDesenhoPelaCategoria($conexao, $categoria);
$imagePath = "http://".$_SERVER['SERVER_NAME'];
?>
<h1><?=$categoria['nome']?></h1>
<p><?=$categoria['descricao']?></p>
<div class="col-sm-8 col-md-8 col-lg-8">
<?php
foreach($desenhos as $desenho) :
?>
    <div class="col-sm-3 col-md-3 col-lg-3 col-margin">
      <a href="/categoria/<?=$desenho['urlCategoria']?>/desenho/<?=$desenho['url']?>"><img src="<?=$imagePath."/thumbs/".$desenho['desenho'];?>" alt="desenhos para colorir" class="img-thumbnail size-default"></a>
    </div>
<?php endforeach ?>
  </div>
  <div class="col-sm-4 col-md-4 col-lg-4">
    <h1 class="text-center title-sidebar">Categorias</h1>
    <ul class="list-group">
      <?php foreach($categorias as $key=>$categoriaDesenho) : ?>
        <a href="/categoria/<?=$categoriaDesenho['url']?>" class="list-group-item">
          <p><?=$categoriaDesenho['nome']?></p>
        </a>
      <?php endforeach ?>
    </ul>
  </div>
</div>
<?php require_once("footer.php"); ?>