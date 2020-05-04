<?php
session_start();

include "../INCLUSION/redirection2.php";

if (isset($_POST['formulaire'])) {
	if ($_POST['formulaire'] == "creer") {
		$projet = $_POST['projet'];
		if(isset($_POST['visibilite']))
		{
			$visibilite = "public";
		}
		else
		{
			$visibilite = "private";
		}

		include("connexion.php");

		$requete = $bdd->prepare('INSERT INTO `projet`(`id_projet`, `titre_projet`, `visibilite`, `id_utilisateur`)VALUES(NULL, :nom, :visibilite, :id)');

		$requete->execute(array('nom' => $projet, 'visibilite' => $visibilite, 'id' => $_SESSION['id']));

		$requete->closeCursor();

		$requete = $bdd->query('SELECT * FROM projet');

		while ($donnee = $requete->fetch()) {
			if ($donnee['titre_projet'] == $projet) {
				$_SESSION['id_projet'] = $donnee['id_projet'];
				$_SESSION['titre_projet'] = $donnee['titre_projet'];
				$_SESSION['likes'] = $donnee['likes_projet'];
				$_SESSION['followers'] = $donnee['followers_projet'];
				$_SESSION['visibilite'] = $donnee['visibilite'];

				$requete->closeCursor();

				$requete = $bdd->prepare('UPDATE `utilisateur` SET `projet_en_cours` = :id_projet WHERE `id_utilisateur` = :id_utilisateur');

				$requete->execute(array('id_projet' => $_SESSION['id_projet'], 'id_utilisateur' => $_SESSION['id']));

				$requete->closeCursor();

				header('Location: ../atelier.php');
			}
		}
	} else {
	}
} else {
}
