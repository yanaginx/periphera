<?php if (isset($data["articles"])) : ?>
<?php 
  $articles = json_decode($data["articles"], true); 
?>
<div class="m-5">
  <nav aria-label="breadcrumb">
  <ol class="breadcrumb justify-content-center">
    <li class="breadcrumb-item"><a href=".">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">News</li>
  </ol>
  </nav>
</div>
<?php
  foreach ($articles as $article) :
?>

<section class="border-bottom pb-4 my-5">
  <div class="row gx-5">
    <div class="col-md-6 mb-4">
      <div class="bg-image shadow-2-strong rounded-5" style="height:200px;">
        <img src="<?= $article["image"]?>" class="w-100 img-fluid" />
        <a href="./news/details/<?= $article["id"]?>">
          <div class="mask" style="background-color: rgba(251, 251, 251, 0.10);"></div>
        </a>
      </div>
    </div>

    <div class="col-md-6 mb-4">
      <h4><strong> <?= $article["title"]?> </strong></h4>
      <p class="text-muted text-truncate">
        <?= $article["content"] ?>
      </p>
      <a href="./news/details/<?= $article["id"]?>"><button type="button" class="btn btn-primary">Read more</button></a>
    </div>
  </div>
</section>
<?php endforeach; ?>
<?php endif; ?>


<?php
if ( isset($data["article"]) ) :
?>
<?php 
  $articles = json_decode($data["article"], true);
  if (!empty($articles)) :
    foreach ($articles as $article) :
?>
  <div class="container-lg mx-auto article-content">
    <h2 class="my-5 text-center"><?= $article["title"] ?></h3>
    <img class="mb-5 w-100" src="<?= $article["image"] ?>" alt="article-illustrate">
    <p class="mb-5"> <?= nl2br($article["content"]) ?> </p>
  </div>
<?php endforeach; ?>
<?php else: ?>
  <div class="fs-lg display-6 text-center my-5">ARTICLE NOT FOUND</div>
<?php endif; ?>
<?php endif; ?>