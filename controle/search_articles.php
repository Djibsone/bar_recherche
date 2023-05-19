<?php 
require_once './config/db.php';

use TeamTNT\TNTSearch\TNTSearch;
 
$articles = [];

if (isset($_GET['q']) && !empty($_GET['q'])) {
    $q = htmlspecialchars($_GET['q']);

    $tnt = new TNTSearch;

    $tnt->loadConfig([
        'driver'    => 'mysql',
        'host'      => 'localhost',
        'database'  => 'ecomm',
        'username'  => 'djibril',
        'password'  => 'tamou',
        'storage'   => '.',
        'stemmer'   => \TeamTNT\TNTSearch\Stemmer\PorterStemmer::class//optional
    ]);
    $tnt->selectIndex('./packages/articles.index');

    $searchResult = $tnt->search($q, 10);
    //var_dump($searchResult);
    $ids = implode(',', $searchResult['ids']);
    //var_dump($ids);

    $articles = searchArticles($ids);
}