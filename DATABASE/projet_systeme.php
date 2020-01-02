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
	
	$requete->closeCursor();	
	
	$requete = $bdd->query('SELECT * FROM creer_projet');
		
	while($donnee = $requete->fetch())
	{
		if($donnee['nom_projet'] == $projet)
		{
			$_SESSION['id_projet'] = $donnee['id_projet'];
			$_SESSION['nom_projet'] = $donnee['nom_projet'];
			$_SESSION['likes'] = $donnee['likes_projet'];
			$_SESSION['followers'] = $donnee['followers_projet'];
			
			$requete->closeCursor();
			
			header('Location: ../atelier.php');
		}
	}
?>