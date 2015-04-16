<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
  <ul class="nav navbar-nav">
    <li>
      <a href="/nova-categoria">Adicionar Categoria</a>
    </li>
    <li>
      <a href="/novo-desenho">Adicionar Desenho</a>
    </li>
    <li>
      <a href="/desenhos-cadastrados">Desenhos cadastrados</a>
    </li>
    <li>
      <a href="/categorias-cadastradas">Categorias cadastradas</a>
    </li>
  </ul>
  <!-- Drodown Usuário logado -->
  <div class="collapse navbar-collapse pull-right" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
          <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?=$_SESSION["usuario-logado"];?> <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                  <li><a href="logout.php">Sair</a></li>
              </ul>
          </li>
      </ul>
  </div>
  <!-- /Drodown Usuário logado -->
</div>
<!-- /.navbar-collapse -->