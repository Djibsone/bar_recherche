<?php 
    require './search_articles.php'; 
    //require './jointuree.php';
    //$data = $articles->fetch();
    //var_dump($articles)

    //var_dump($r);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Articles</title>
</head>
<body>
  <h1>Récherchez un article</h1>

  <form action="" method="get">
    <input type="search" name="q" placeholder="Recherche...">
    <button type="submit">OK</button>
  </form>

  <?php if ($articles): ?>
    <h2>
      Résultats :
      <hr> 
      
      <small><?= $searchResult['hits'] ?> résultat(s) en <?= $searchResult['execution_time'] ?></small>

    </h2> 

    <ul>
      <?php foreach($articles as $article): ?>
          <li>
            <h3>[#<?= $article['id'] ?>] <?= $article['name'] ?></h3>
            <?= $article['description'] ?>
          </li>
      <?php endforeach; ?>
    </ul>
  <?php endif; ?>

</body>
</html>