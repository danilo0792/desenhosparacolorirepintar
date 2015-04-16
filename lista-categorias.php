<?php foreach($categorias as $key=>$categoria) : ?>
  <div class="col-sm-3 col-md-3 col-lg-3 col-margin">
    <a href="categoria/<?=$categoria['url']?>">
      <img src="<?=$imagePath."/thumbs/".$categoria['imagem'];?>" alt="<?=$categoria['imagem'];?>" title="<?=$categoria['nome'];?>" class="img-thumbnail size-default">
    </a>
    <p class="text-center"><strong><?=$categoria['nome']?></strong></p>
  </div>
<?php endforeach ?>