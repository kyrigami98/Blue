<?php
session_start();

include "../INCLUSION/redirection2.php";

include "fonctions.php";

include "connexion.php";


if (isset($_POST['formulaire'])) {
	if ($_POST['formulaire'] == "creer") {
		$projet = $_POST['projet'];
		if(isset($_POST['visibilite']))
		{
			$visibilite = "public";
		}
		else
		{
			$visibilite = "privé";
		}

		$requete = $bdd->prepare('INSERT INTO `projet`(`id_projet`, `titre_projet`, `visibilite`, `id_utilisateur`)VALUES(NULL, :nom, :visibilite, :id)');

		$requete->execute(array('nom' => $projet, 'visibilite' => $visibilite, 'id' => $_SESSION['id']));

		$requete->closeCursor();

		$requete = $bdd->query('SELECT * FROM projet WHERE titre_projet = :titre AND id_utilisateur = id');

		$requete->execute(array('titre' => $projet, 'id' => $_SESSION['id']));

		while ($donnee = $requete->fetch()) {
			$_SESSION['id_projet'] = $donnee['id_projet'];
			$_SESSION['titre_projet'] = $donnee['titre_projet'];
			$_SESSION['likes'] = $donnee['likes_projet'];
			$_SESSION['followers'] = $donnee['followers_projet'];
			$_SESSION['visibilite'] = $donnee['visibilite'];
		}

		$requete->closeCursor();

		historique($projet, "PROJET", "CREATION", $_SESSION['id_projet'], $_SESSION['id']);

		$requete = $bdd->prepare('UPDATE `utilisateur` SET `projet_en_cours` = :id_projet WHERE `id_utilisateur` = :id_utilisateur');

		$requete->execute(array('id_projet' => $_SESSION['id_projet'], 'id_utilisateur' => $_SESSION['id']));

		$requete->closeCursor();

		header('Location: ../atelier.php');
	} 
	elseif($_POST['formulaire'] == "visibilite") 
	{
		if(isset($_POST['id']))
		{
			$requete = $bdd->prepare('UPDATE projet SET visibilite = :visibilite WHERE id_projet = :id_projet');

			$requete->execute(array('visibilite' => $_POST['visibilite'], 'id_projet' =>$_POST['id']));

			$requete->closeCursor();

			$_SESSION['visibilite'] = $_POST['visibilite'];

			historique($_POST['visibilite'], "CONFIDENTIALITE", "MODIFICATION", $_POST['id'], $_SESSION['id']);
		}
		else
		{
			$requete = $bdd->prepare('UPDATE projet SET visibilite = :visibilite WHERE id_projet = :id_projet');

			$requete->execute(array('visibilite' => $_POST['visibilite'], 'id_projet' =>$_SESSION['id_projet']));

			$requete->closeCursor();

			$_SESSION['visibilite'] = $_POST['visibilite'];

			historique($_POST['visibilite'], "CONFIDENTIALITE", "MODIFICATION", $_SESSION['id_projet'], $_SESSION['id']);
		}
	}
	elseif($_POST['formulaire'] == "update_projet")
	{

		if(isset($_FILES['image']) and $_FILES['image']['error'] == 0)
		{
			if($_FILES['image']['size'] <= $taille_max)
			{
				$image = pathinfo($_FILES['image']['name']);
				$extension = $image['extension'];

				if(in_array($extension, $extensions_autorisees))
				{
					$image = $_SESSION['pseudo'].basename($_FILES['image']['name']);
					move_uploaded_file($_FILES['image']['tmp_name'], '../IMAGES/PROJETS/'.$image);
				}
			}
		}
		else
		{
			$image = "";
		}

		if($image == "")
		{
			$requete = $bdd->prepare('UPDATE projet SET titre_projet = :titre, description_projet = :description WHERE id_projet = :id');

			$requete->execute(array('titre' => $_POST['titre'], 'description' => $_POST['synopsis'], 'id' => $_SESSION['id_projet']));
		}
		else
		{
			$requete = $bdd->prepare('UPDATE projet SET titre_projet = :titre, description_projet = :description, image_projet = :image WHERE id_projet = :id');

			$requete->execute(array('titre' => $_POST['titre'], 'description' => $_POST['synopsis'], 'image' => $image, 'id' => $_SESSION['id_projet']));

			$_SESSION['image_projet'] = $image;
		}
		$_SESSION['titre_projet'] = $_POST['titre'];

		$_SESSION['synopsis'] = $_POST['synopsis'];

		$requete->closeCursor();

		historique("Informations du projet", "Projet", "MODIFICATION", $_SESSION['id_projet'], $_SESSION['id']);
		
		header('Location: ../atelier.php');
	}
} 
else 
{

}
