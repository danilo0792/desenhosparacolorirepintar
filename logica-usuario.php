<?php
session_start();

function logaUsuario($email){
  $_SESSION["usuario-logado"] = $email;
}

function logout(){
  session_destroy();
  session_start();
}

function verificaUsuario(){
    if(!usuarioEstaLogado()){
      $_SESSION['danger'] = "Você não tem acesso a esta funcionalidade.";
      header("Location:admin");
      die();
    }
  }

function usuarioEstaLogado(){
  return isset($_SESSION["usuario-logado"]);
}