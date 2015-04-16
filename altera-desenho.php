<?php
require_once("banco-desenho.php");
require_once("wideimage/WideImage.php");
require_once("logica-usuario.php");

$nome = $_POST["nome"];
$idCategoria = $_POST["idCategoria"];
$keywords = $_POST["keywords"];
$url = $_POST["url"];
$description = $_POST["description"];
$desenhoAtual = $_POST["desenhoAtual"];
$id = $_POST["id"];
$desenho = $_FILES['desenho']['name'];


if ($_FILES['desenho']['error'] == 0 && isset($nome) && isset($idCategoria) && isset($keywords) && isset($url) && isset($description) && isset($desenhoAtual) && isset($id)) {
  $caminho = "desenhos/".$desenhoAtual;
  $caminhoThumb = "thumbs/".$desenhoAtual;

  if (file_exists($caminho) && file_exists($caminhoThumb)) {
    unlink($caminho);
    unlink($caminhoThumb);
  }else{
    $_SESSION["danger"] = "Não existia desenho cadastrado";
  }

  $caminho = "desenhos/".$desenho;

  if(move_uploaded_file($_FILES['desenho']['tmp_name'],$caminho)){
    $image = WideImage::load($caminho);
    $image = $image->resize(163,215);
    $image->saveToFile('thumbs/'.$desenho);
  }

  if(atualizaDesenho($conexao, $id, $nome, $idCategoria, $description, $url, $desenho, $keywords)){
    $_SESSION["success"] = "Desenho alterado com sucesso";
    header("Location:desenhos-cadastrados");
    die();
  }else{
    $msg = mysqli_error($conexao);
    $_SESSION["danger"] = "Erro ao alterar o desenho, ERRO:".$msg;
    header("Location:desenhos-cadastrados");
    die();
  }
}
?>