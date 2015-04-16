<?php
require_once("banco-desenho.php");
require_once("banco-categoria.php");
$categorias = listaCategorias($conexao);
echo '<?xml version="1.0" encoding="UTF-8"?>';
$data = date('Y-m-d');
?>
<urlset
xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
<url>
    <loc>http://www.desenhosparacolorirepintar.com.br</loc>
    <lastmod><?=$data;?></lastmod>
    <changefreq>weekly</changefreq>
    <priority>0.8</priority>
  </url>
<?php foreach ($categorias as $categoria) : ?>
  <url>
    <loc><?="http://www.desenhosparacolorirepintar.com.br/categoria/".$categoria['url']?></loc>
    <lastmod><?=$data;?></lastmod>
    <changefreq>weekly</changefreq>
    <priority>0.8</priority>
  </url>
  <?php
  $desenhos = buscaDesenhoPelaCategoria($conexao, $categoria);
  foreach($desenhos as $desenho) : ?>
    <url>
      <loc><?="http://www.desenhosparacolorirepintar.com.br/categoria/".$desenho['urlCategoria']."/desenho/".$desenho['url']?></loc>
      <lastmod><?=$data;?></lastmod>
      <changefreq>weekly</changefreq>
      <priority>0.8</priority>
    </url>
  <?php endforeach ?>
<?php endforeach ?>
</urlset>

