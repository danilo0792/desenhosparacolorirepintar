<?php
require_once("header.php");
require_once("banco-desenho.php");
$url = $_GET["urlDesenho"];
$desenho = buscarDesenho($conexao, $url);
$imagePath = "http://".$_SERVER['SERVER_NAME'];
if(empty($desenho)){
  $_SESSION['danger'] = "URL não encontrada";
    header("Location:/");
    die();
}
?>
<div class="row">
  <div class="col-md-12 text-center">
    <button id="printpagebutton" onclick="printpage()" class="btn btn-default btn-lg">
      <span>Imprimir</span>
      <span class="glyphicon glyphicon-print" aria-hidden="true"></span>
    </button>
  </div>
</div>
<br>
<div class="row">
  <div class="col-md-12">
    <img src="<?=$imagePath."/desenhos/".$desenho['desenho'];?>" height="800" width="571" alt="desenho para colorir" class="thumbnail img-center">
  </div>
</div>
<?php require_once("footer.php"); ?>