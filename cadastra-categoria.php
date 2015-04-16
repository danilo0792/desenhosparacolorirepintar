<?php
require_once("banco-categoria.php");
require_once("wideimage/WideImage.php");
require_once("logica-usuario.php");

$nome = $_POST["nome"];
$descricao = $_POST["descricao"];
$url = $_POST["url"];
$keywords = $_POST["keywords"];
$imagem = $_FILES['imagem']['name'];
$caminho = "desenhos/".$imagem;

if ($_FILES['imagem']['error'] == 0 && isset($nome) && isset($descricao) && isset($url) && isset($keywords)) {
  if(move_uploaded_file($_FILES['imagem']['tmp_name'],$caminho)){
    $image = WideImage::load($caminho);
    $image = $image->resize(163,215);
    $image->saveToFile('thumbs/'.$imagem);
    if (cadastraCategoria($conexao, $nome, $descricao, $url, $imagem, $keywords)) {
        $_SESSION["success"] = "Categoria Cadastrada com sucesso";
        header("Location:nova-categoria");
        die();
    }else{
        $msg = mysqli_error($conexao);
        $_SESSION["danger"] = "Houve um erro ao cadastrar a categoria, ERRO:".$msg;
        header("Location:nova-categoria");
        die();
    }
  }else{
    $_SESSION["danger"] = "Houve um erro ao fazer upload da imagem";
    header("Location:nova-categoria");
    die();
  }
}else{
    $_SESSION["danger"] = "Todos os campos precisam ser preenchidos";
    header("Location:novo-desenho");
    die();
}

?>