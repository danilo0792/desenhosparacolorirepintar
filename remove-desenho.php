<?php
require_once("logica-usuario.php");
require_once("banco-desenho.php");

$id = $_POST["id"];

if (deletarDesenho($conexao, $id)) {
  $_SESSION["success"] = "Desenho deletado com sucesso";
  header("Location:/desenhos-cadastrados");
  die();
}else{
  $msg = mysqli_error($conexao);
  $_SESSION["danger"] = "O Desenho não foi deletado devido ao erro:".$msg;
  header("Location:/desenhos-cadastrados");
  die();
}
?>