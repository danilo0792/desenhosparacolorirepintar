<?php
require_once("header.php");
verificaUsuario();
require_once("banco-desenho.php");
$desenhos = listaDesenhos($conexao);
$imagePath = "http://".$_SERVER['SERVER_NAME'];
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
<h1>Desenhos Cadastrados</h1>
<table class="table table-bordered table-striped">
  <tr>
    <th>Nome</th>
    <th>Desenho</th>
    <th>Description</th>
    <th>Keywords</th>
    <th colspan="2">Ações</th>
  </tr>
  <?php
  foreach($desenhos as $desenho) :
    ?>
  <tr>
    <td><?= $desenho['nome']; ?></td>
    <td><img src="<?=$imagePath."/desenhos/".$desenho['desenho'];?>" class="img-thumbnail size-default"></td>
    <td><?= substr($desenho['description'], 0,40); ?></td>
    <td><?= $desenho['keywords']; ?></td>
    <td><a class="btn btn-primary" href="altera-desenho-formulario/<?=$desenho['url']?>">alterar</a></td>
    <td>
      <form method="post" action="/remove-desenho/<?=$desenho['id'];?>">
        <input type="hidden" name="id" value="<?=$desenho['id'];?>">
        <button class="btn btn-danger">Remover</button>
      </form>
    </td>
  </tr>
  <?php
  endforeach
  ?>
</table>
<?php require_once("footer.php"); ?>