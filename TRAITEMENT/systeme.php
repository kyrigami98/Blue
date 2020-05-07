<?php
session_start();

include "connexion.php";

include "fonctions.php";

if (isset($_POST['formulaire'])) {
	if ($_POST['formulaire'] == "connexion") {
		include("signin.php");
	} elseif ($_POST['formulaire'] == "inscription") {
		include("signup.php");
	} elseif ($_POST['formulaire'] == "profil") {
		include("profile.php");
	} else if ($_POST['formulaire'] == "image") {
		include("image.php");
	} elseif ($_POST['formulaire'] == "suivre") {
		$requete = $bdd->prepare('INSERT INTO suivre(`id_artiste`, `id_abonne`) VALUES (:artiste, :abonne)');

		$requete->execute(array('artiste' => $_POST['id'], 'abonne' => $_SESSION['id']));
	} elseif ($_POST['formulaire'] == "ne_plus_suivre") {
		$requete = $bdd->prepare('DELETE FROM suivre WHERE id_artiste = :artiste AND id_abonne = :abonne');

		$requete->execute(array('artiste' => $_POST['id'], 'abonne' => $_SESSION['id']));
	}
} else {
	session_destroy();
	header("Location: ../index.php");
}
