<?php

try
{
	$bdd = new PDO('mysql:host=localhost;dbname=u117858692_blue2;charset=utf8','u117858692_kyrigami','Kyrigami98@');
}
catch(Exception $e)
{
	die('Erreur : '.$e->getMessage());
}

$extensions_autorisees = array('jpg', 'jpeg', 'png', 'bmp', 'jpeg', 'gif', 'JPG', 'JPEG', 'PNG', 'BMP', 'JPEG', 'GIF');

$taille_max = 4000000;

?>
