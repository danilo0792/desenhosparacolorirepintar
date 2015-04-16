<?php
require_once("logica-usuario.php");
require_once("banco-usuario.php");

$email = $_POST["email"];
$senha = md5($_POST["senha"]);

$usuario = buscaUsuario($conexao, $email, $senha);

if ($usuario == null) {
  $_SESSION["danger"] = "Usuário ou senha inválidos";
  verificaUsuario();
}else{
  logaUsuario($usuario["email"]);
  $_SESSION["success"] = "Bem Vindo(a)".$_SESSION["usuario-logado"];
  header("Location: painel-administrativo");
}
die();
?>