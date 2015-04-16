<?php
require_once("logica-usuario.php");
logout();
$_SESSION["success"] = "deslogado com sucesso";
header("Location:admin");
die();
?>