<?php

require_once('dbconnection.php');

$response = $bdd->prepare('SELECT * FROM Articles a INNER JOIN Images i ON i.id = a.id');
$response->execute();
$products = $response->fetchAll(PDO::FETCH_ASSOC);

 ?>
