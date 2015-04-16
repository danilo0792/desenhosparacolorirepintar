<?php
require_once("header.php");
require_once("banco-categoria.php");
$imagePath = "http://".$_SERVER['SERVER_NAME'];
$pesquisa = $_POST['pesquisa'];
$categorias = pesquisarCategoria($conexao, $pesquisa);
?>
<div class="row">
  <div class="col-sm-8 col-md-8 col-lg-8">
  <?php
  if (empty($categorias)) { ?>
  <p class="alert-warning">Não foram encontrados desenhos com este valor. Por favor, faça uma nova pesquisa.</p>
  <?php }else{
  foreach($categorias as $categoria){ ?>
    <div class="col-sm-3 col-md-3 col-lg-3 col-margin">
      <a href="categoria/<?=$categoria['url']?>">
        <img src="<?=$imagePath."/thumbs/".$categoria['imagem'];?>" alt="<?=$categoria['imagem'];?>" title="<?=$categoria['nome'];?>" class="img-thumbnail size-default">
      </a>
      <p class="text-center"><strong><?=$categoria['nome']?></strong></p>
    </div>
  <?php
  }
    } ?>
  </div>
</div>
<?php require_once("footer.php"); ?>


