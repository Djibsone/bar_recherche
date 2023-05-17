<?php
require './vendor/autoload.php';

function dbConnect() {
    $db = new PDO('mysql:host=127.0.0.1;dbname=ecomm;charset=utf8','djibril','tamou');
    return $db;
}

function searchArticles($ids) {
    $db = dbConnect();
    //$req = $db->query("SELECT * FROM articles WHERE CONCAT(name, description) LIKE '%" .$q. "%'");
    $req = $db->query("SELECT * FROM articles WHERE id IN ($ids) ORDER BY FIELD(id, $ids)");
    //$data = $req->fetch();
    return $req;
}


function jointure($champ,$table, $values, $data){
    $db = dbConnect();
    $req = $db->query("SELECT '.$champ.' FROM .'$table.' WHERE '.$values.' '=' '.$data.'");
    return $req;
}