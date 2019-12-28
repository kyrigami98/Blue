<?php
	session_start();
	
	$projet = $_POST['projet'];
	
	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=blue;charset=utf8','root','');
	}
	catch(Exception $e)
	{
		die('Erreur : '.$e->getMessage());
	}
	
	$requete = $bdd->prepare('INSERT INTO `creer_projet`(`id_projet`, `nom_projet`, `id_user`)VALUES(NULL, :nom, :id)');
	
	$requete->execute(array('nom' => $projet, 'id' => $_SESSION['id']));
	
	echo "le projet a ete cree avec succes";
	
?>