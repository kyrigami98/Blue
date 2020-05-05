<?php

try
{
	$bdd = new PDO('mysql:host=localhost;dbname=blue2;charset=utf8','root','');
}
catch(Exception $e)
{
	die('Erreur : '.$e->getMessage());
}

$extensions_autorisees = array('jpg', 'jpeg', 'png', 'bmp', 'jpeg', 'gif', 'JPG', 'JPEG', 'PNG', 'BMP', 'JPEG', 'GIF');

$taille_max = 4000000;

?>
