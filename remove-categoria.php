<?php
require_once("logica-usuario.php");
require_once("banco-categoria.php");

$id = $_POST["id"];

if (deletarCategoria($conexao, $id)) {
  $_SESSION["success"] = "Categoria deletada com sucesso";
  header("Location:/categorias-cadastradas");
  die();
}else{
  $msg = mysqli_error($conexao);
  $_SESSION["danger"] = "A Categoria não foi deletada devido ao erro:".$msg;
  header("Location:/categorias-cadastradas");
  die();
}
?>