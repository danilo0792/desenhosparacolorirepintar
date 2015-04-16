<?php
require_once("logica-usuario.php");
require_once("styles.php");

if(isset($_SESSION["danger"])){
?>
  <p class="alert-danger"><?=utf8_decode($_SESSION["danger"]);?></p>
<?php
  unset($_SESSION["danger"]);
}

if(isset($_SESSION["success"])){
?>
  <p class="alert-success"><?=utf8_decode($_SESSION["success"]);?></p>
<?php
  unset($_SESSION["success"]);
}
?>
<div class="container">
  <div class="panel panel-default col-sm-offset-4 col-md-offset-4 col-lg-offset-4 col-xs-offset-4 col-sm-4 col-md-4 col-lg-4 col-xs-4">
    <div class="panel-body ">
      <div class="row">
        <div class="col-sm-offset-3 col-md-offset-3 col-lg-offset-3 col-xs-offset-3 col-sm-4 col-md-4 col-lg-4 col-xs-4">
          <img src="images/logo.png" alt="">
        </div>
      </div>
      <form method="post" action="login.php">
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
            <label for="inputEmail">Email</label>
            <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Email">
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
            <br />
            <label for="inputSenha">Senha</label>
            <input type="password" name="senha" class="form-control" id="inputSenha" placeholder="Senha">
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
            <br />
            <button type="submit" class="btn btn-primary">Entrar</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require_once("scripts.php");?>