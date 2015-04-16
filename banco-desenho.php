<?php
require_once("conexao.php");
require_once("logica-usuario.php");

function buscaDesenhoPelaCategoria($conexao, $categoria){
  $desenhos = array();
  $query = "select desenhos.id,desenhos.keywords,desenhos.description, desenhos.url, desenhos.idCategoria,desenhos.desenho,desenhos.nome,categorias.url as urlCategoria FROM desenhos INNER JOIN categorias ON desenhos.idCategoria = {$categoria['id']} && categorias.id = {$categoria['id']};";
  $resultado = mysqli_query($conexao, $query);
  if(!empty($resultado)){
    while ($desenho = mysqli_fetch_assoc($resultado)) {
      array_push($desenhos, $desenho);
    }
  }else{
    $_SESSION['danger'] = "URL não encontrada";
    header("Location:/");
    die();
  }

  return $desenhos;
}

function buscarDesenho($conexao, $url){
  $query = "select * from desenhos where url = '{$url}'";
  $resultado = mysqli_query($conexao, $query);
  if(!empty($resultado)){
    $desenho = mysqli_fetch_assoc($resultado);
  }else{
    $_SESSION['danger'] = "URL não encontrada";
    header("Location:/");
    die();
  }
  return $desenho;
}

function listaDesenhos($conexao){
  $desenhos = array();
  $query = "select * from desenhos";
  $resultado = mysqli_query($conexao, $query);

  while ($desenho = mysqli_fetch_assoc($resultado)) {
    array_push($desenhos, $desenho);
  }

  return $desenhos;
}

function cadastraDesenho($conexao, $nome, $idCategoria, $description, $url, $desenho, $keywords){
  $nome = mysqli_real_escape_string($conexao, $nome);
  $description = mysqli_real_escape_string($conexao, $description);
  $url = mysqli_real_escape_string($conexao, $url);
  $desenho = mysqli_real_escape_string($conexao, $desenho);
  $keywords = mysqli_real_escape_string($conexao, $keywords);
  $query = "insert into desenhos(nome, idCategoria, description, url, desenho, keywords) values('{$nome}', {$idCategoria}, '{$description}', '{$url}', '{$desenho}', '{$keywords}');";
  return mysqli_query($conexao,$query);
}

function atualizaDesenho($conexao, $id, $nome, $idCategoria, $description, $url, $desenho, $keywords){
  $query = "update desenhos set nome = '{$nome}', idCategoria = {$idCategoria}, description = '{$description}', url = '{$url}', desenho = '{$desenho}', keywords = '{$keywords}' WHERE id = {$id};";
  return mysqli_query($conexao,$query);
}

function deletarDesenho($conexao, $id){
  $query = "delete from desenhos where id = '{$id}';";
  return mysqli_query($conexao, $query);
}

?>