<?php
require_once("banco-categoria.php");
$categorias = listaCategoriasMenu($conexao);
?>
<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
  <ul class="nav navbar-nav">
    <?php foreach ($categorias as $categoria): ?>
      <li>
        <a href="/categoria/<?=$categoria['url']?>"><?=$categoria['nome'];?></a>
      </li>
    <?php endforeach ?>
  </ul>
  <!-- form-pesquisa -->
  <form class="navbar-form navbar-left pull-right form-dcp" method="post" role="search" action="/resultado-da-busca">
      <div class="form-group">
          <input type="text" name="pesquisa" class="form-control" placeholder="Pesquisar">
      </div>
      <button type="submit" class="btn btn-pesquisar">Pesquisar</button>
  </form>
  <!-- /form-pesquisa -->
</div>
<!-- /.navbar-collapse -->