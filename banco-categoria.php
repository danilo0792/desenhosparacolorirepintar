<?php
require_once("conexao.php");

function cadastraCategoria($conexao, $nome, $descricao, $url, $imagem, $keywords){
  $nome = mysqli_real_escape_string($conexao, $nome);
  $descricao = mysqli_real_escape_string($conexao, $descricao);
  $url = mysqli_real_escape_string($conexao, $url);
  $imagem = mysqli_real_escape_string($conexao, $imagem);
  $keywords = mysqli_real_escape_string($conexao, $keywords);
  $query = "insert into categorias(nome, descricao, url, imagem, keywords) values('{$nome}', '{$descricao}', '{$url}', '{$imagem}', '{$keywords}');";
  return mysqli_query($conexao,$query);
}

function listaCategorias($conexao){
  $categorias = array();
  $query = "select * from categorias";
  $resultado = mysqli_query($conexao, $query);

  while ($categoria = mysqli_fetch_assoc($resultado)) {
    array_push($categorias, $categoria);
  }
  return $categorias;
}

function listaCategoriasMenu($conexao){
  $categorias = array();
  $query = "select * from categorias limit 4";
  $resultado = mysqli_query($conexao, $query);

  while ($categoria = mysqli_fetch_assoc($resultado)) {
    array_push($categorias, $categoria);
  }
  return $categorias;
}

function buscaCategoria($conexao, $url){
  $query = "select * from categorias where url = '{$url}'";
  $resultado = mysqli_query($conexao, $query);
  if(!empty($resultado)){
    $categoria = mysqli_fetch_assoc($resultado);
  }else{
    $_SESSION['danger'] = "URL não encontrada";
    header("Location:/");
    die();
  }
  return $categoria;
}

function deletarCategoria($conexao, $id){
  $query = "delete from categorias where id = '{$id}';";
  return mysqli_query($conexao, $query);
}

function atualizaCategoria($conexao, $id, $nome, $descricao, $url, $imagem, $keywords){
  $query = "update categorias set nome = '{$nome}', descricao = '{$descricao}', url = '{$url}', imagem = '{$imagem}', keywords = '{$keywords}' WHERE id = {$id};";
  return mysqli_query($conexao,$query);
}

function pesquisarCategoria($conexao, $valor){
  $items = array();
  $valor = mysqli_real_escape_string($conexao, $valor);
  $query = "select * from categorias where nome like _utf8'%{$valor}%' COLLATE utf8_general_ci";

  $resultado = mysqli_query($conexao, $query);
  while ($item = mysqli_fetch_assoc($resultado)) {
    array_push($items, $item);
  }
  return $items;
}