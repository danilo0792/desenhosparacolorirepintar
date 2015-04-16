<?php
require_once("header.php");
require_once("banco-categoria.php");
$categorias = listaCategorias($conexao);
$imagePath = "http://".$_SERVER['SERVER_NAME'];
if(isset($_SESSION["danger"])){
?>
  <p class="alert-danger"><?=$_SESSION["danger"];?></p>
<?php
  unset($_SESSION["danger"]);
}
?>

  <div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12">
      <h1>Desenhos para colorir e pintar</h1>
      <p>Este é o maior portal de desenhos para pintar, colorir e imprimir. Divirta-se colorindo seus personagens preferidos, faça uma busca ou navegue entre as nossas categorias.Temos desenhos da peppa pig, desenhos da turma da mônica, desenhos do ben 10 entre outros.Faça sua impressão e divirta-se.</p>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-8 col-md-8 col-lg-8">
      <?php require_once("lista-categorias.php"); ?>
    </div>
    <div class="col-sm-4 col-md-4 col-lg-4">
      <h1 class="text-center title-sidebar">Categorias</h1>
      <ul class="list-group">
        <?php foreach($categorias as $key=>$categoria) : ?>
          <a href="categoria/<?=$categoria['url']?>" class="list-group-item">
            <p><?=$categoria['nome']?></p>
          </a>
        <?php endforeach ?>
      </ul>
    </div>
  </div>
<?php require_once("footer.php"); ?>