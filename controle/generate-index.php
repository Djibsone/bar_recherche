<?php
require_once '../config/db.php';

use TeamTNT\TNTSearch\TNTSearch;

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

$indexer = $tnt->createIndex('./packages/articles.index');
$indexer->query('SELECT id, name, description FROM articles;');
$indexer->setLanguage('french');
$indexer->run();
