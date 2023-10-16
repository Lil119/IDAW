<?php
require_once('../connexion.php');

$sql = file_get_contents("sql/create_db.sql");
$request = $pdo->prepare($sql);
$request->execute();


/*** close the database connection ***/
$pdo = null;
