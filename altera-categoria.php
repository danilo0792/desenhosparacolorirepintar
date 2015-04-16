<?php
require_once("logica-usuario.php");
require_once("banco-categoria.php");
require_once("wideimage/WideImage.php");

$id = $_POST["id"];
$nome = $_POST["nome"];
$keywords = $_POST["keywords"];
$url = $_POST["url"];
$imagem = $_FILES['imagem']['name'];
$descricao = $_POST["descricao"];
$categoriaImagemAtual = $_POST["categoriaImagemAtual"];


if ($_FILES['imagem']['error'] == 0 && isset($nome) && isset($keywords) && isset($url) && isset($descricao) && isset($categoriaImagemAtual) && isset($id)) {
  $caminho = "desenhos/".$categoriaImagemAtual;
  $caminhoThumb = "thumbs/".$categoriaImagemAtual;

  if (file_exists($caminho) && file_exists($caminhoThumb)) {
    unlink($caminho);
    unlink($caminhoThumb);
  }else{
    $_SESSION["danger"] = "Não existia desenho cadastrado";
  }

  $caminho = "desenhos/".$imagem;

  if(move_uploaded_file($_FILES['imagem']['tmp_name'],$caminho)){
    $image = WideImage::load($caminho);
    $image = $image->resize(163,215);
    $image->saveToFile('thumbs/'.$imagem);
  }

  if(atualizaCategoria($conexao, $id, $nome, $descricao, $url, $imagem, $keywords)){
    $_SESSION["success"] = "Categoria alterada com sucesso";
    header("Location:categorias-cadastradas");
    die();
  }else{
    $msg = mysqli_error($conexao);
    $_SESSION["danger"] = "Erro ao alterar o categoria, ERRO:".$msg;
    header("Location:categorias-cadastradas");
    die();
  }
}
?>