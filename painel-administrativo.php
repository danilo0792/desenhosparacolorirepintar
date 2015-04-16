<?php
require_once("logica-usuario.php");
verificaUsuario();
require_once("banco-categoria.php");
require_once("banco-desenho.php");
ob_start();
$description = "Este é o maior portal de desenhos para pintar, colorir e imprimir. Divirta-se colorindo seus personagens preferidos, faça uma busca ou navegue entre as nossas categorias.Temos desenhos da peppa pig, desenhos da turma da mônica, desenhos do bem 10 entre outros.Faça sua impressão e divirta-se.";
$keywords = "desenhos para colorir, desenhos para pintar, imprimir desenhos";
$title = "Desenhos para colorir e pintar";
$metaTags = array();

if (isset($_GET['urlDesenho'])) {
    $url = $_GET['urlDesenho'];
    $desenho = buscarDesenho($conexao, $url);
    $metaTags['description'] = $desenho['description'];
    $metaTags['keywords'] = $desenho['keywords'];
    $metaTags['title'] = $desenho['nome'];
}else if (isset($_GET['url'])) {
    $url = $_GET['url'];
    $categoria = buscaCategoria($conexao, $url);
    $metaTags['description'] = $categoria['descricao'];
    $metaTags['keywords'] = $categoria['keywords'];
    $metaTags['title'] = $categoria['nome'];
}else{
    $metaTags['description'] = $description;
    $metaTags['keywords'] = $keywords;
    $metaTags['title'] = $title;
}
$indexar = $_SESSION["usuario-logado"] ? "<meta name='ROBOTS' content='noindex,nofollow' />" : "<meta name='ROBOTS' content='index,follow' />";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?=$metaTags['description']?>">
    <meta name="keywords" content="<?=$metaTags['keywords']?>">
    <meta name="author" content="">
    <?=$indexar;?>
    <title><?=$metaTags['title']?></title>
    <!-- Bootstrap Core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="/css/custom-style.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?php include_once("analyticstracking.php") ?>
    <style type="text/css" media="print">
    @page 
    {
        size: auto;   /* auto is the initial value */
        margin: 0mm;  /* this affects the margin in the printer settings */
    }
</style>

</head>

<body class="bg-warning">
    <!-- Navigation -->
    <nav class="navbar-dcp navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">
                    <img src="/images/logo.png" alt="">
                </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <?php require_once("links-menu-admin.php");?>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container principal">

<?php if(isset($_SESSION["danger"])){ ?>
  <p class="alert-danger"><?=$_SESSION["danger"];?></p>
<?php
  unset($_SESSION["danger"]);
}

if(isset($_SESSION["success"])){
?>
  <p class="alert-success"><?=$_SESSION["success"];?></p>
<?php
  unset($_SESSION["success"]);
}
?>
<h1>Bem Vindo</h1>
<?php require_once("footer.php");
?>
