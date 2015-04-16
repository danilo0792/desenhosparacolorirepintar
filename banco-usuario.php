<?php
require_once("conexao.php");

function buscaUsuario($conexao, $email, $senha){
  $email = mysqli_real_escape_string($conexao, $email);
  $senha = mysqli_real_escape_string($conexao, $senha);
  $query = "select id,email,senha from usuarios where email = '{$email}' and senha = '{$senha}'";
  $resultado = mysqli_query($conexao, $query);
  $usuario = mysqli_fetch_assoc($resultado);
  return $usuario;
}