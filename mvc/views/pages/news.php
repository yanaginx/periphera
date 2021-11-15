<h2>
  <?php
    if ( isset($data["articles"]) ) {
      $articles = json_decode($data["articles"], true);
      foreach ($articles as $article) {
        echo '<br/>';
        echo '<a href="./news/details/' .$article["id"]. '">' . $article["title"] . "</a>";
        echo '<br/>';
      }
    }
    // print_r($data);
  ?>
</h2>

<?php 
if ( isset($data["article"]) ) {
  $articles = json_decode($data["article"], true);
  foreach ($articles as $article) {
      echo $article["title"] . "<br/>" . "<br/>";
      echo $article["content"] . "<br/>" . "<br/>";
  }
}
?>