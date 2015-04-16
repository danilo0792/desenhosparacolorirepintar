<?php
require_once("banco-desenho.php");
require_once("wideimage/WideImage.php");
require_once("logica-usuario.php");

$nome = $_POST["nome"];
$description = $_POST["description"];
$url = $_POST["url"];
$keywords = $_POST["keywords"];
$desenho = $_FILES['desenho']['name'];
$idCategoria = $_POST['idCategoria'];

$caminho = "desenhos/".$desenho;

if (isset($nome) && isset($description) && isset($url) && isset($keywords) && isset($idCategoria) && $_FILES['desenho']['error'] == 0) {
  if(move_uploaded_file($_FILES['desenho']['tmp_name'],$caminho)){

    $image = WideImage::load($caminho);
    $image = $image->resize(163,215);
    $image->saveToFile('thumbs/'.$desenho);

    if (cadastraDesenho($conexao, $nome, $idCategoria, $description, $url, $desenho, $keywords)) {
        $_SESSION["success"] = "Desenho Cadastrado com sucesso";
        header("Location:novo-desenho");
        die();
    }else{
    $msg = mysqli_error($conexao);
    $_SESSION["danger"] = "Houve um erro ao cadastrar o desenho Erro:".$msg;
    header("Location:novo-desenho");
    die();
    }

  }else{
    $_SESSION["danger"] = "Houve um erro ao fazer upload da imagem";
    header("Location:novo-desenho");
    die();
  }
}else{
    $_SESSION["danger"] = "Todos os campos precisam ser preenchidos";
    header("Location:novo-desenho");
    die();
}
?>