<?php
session_start();

include "../INCLUSION/redirection2.php";

include "connexion.php";

include "fonctions.php";

if ($_POST['formulaire'] == "projet") {
	$id = $_POST['id'];

	$requete = $bdd->prepare('SELECT * FROM projet WHERE id_projet = :id');

	$requete->execute(array('id' => $id));

	$donnee = $requete->fetch();

	$_SESSION['id_projet'] = $donnee['id_projet'];
	$_SESSION['titre_projet'] = $donnee['titre_projet'];
	$_SESSION['likes'] = $donnee['likes_projet'];
	$_SESSION['followers'] = $donnee['followers_projet'];
	$_SESSION['visibilite'] = $donnee['visibilite'];
	if($donnee['image_projet'] != "")
	{
		$_SESSION['image_projet'] = $donnee['image_projet'];
	}

	$requete->closeCursor();

	$requete = $bdd->prepare('UPDATE `utilisateur` SET `projet_en_cours` = :id_projet WHERE `id_utilisateur` = :id_utilisateur');

	$requete->execute(array('id_projet' => $_SESSION['id_projet'], 'id_utilisateur' => $_SESSION['id']));

	$requete->closeCursor();

	header('Location: ../atelier.php');
} elseif($_POST['formulaire'] == "collaborer"){
	include "ajouter_collaborateur.php";
} else {
	$nom = $_POST['nom'];
	$desc = $_POST['description'];

	if ($_POST['formulaire'] == "chapitre") {
		include("ajouter_chapitre.php");
	} elseif ($_POST['formulaire'] == "personnage") {
		include("ajouter_personnage.php");
	} elseif ($_POST['formulaire'] == "creature") {
		include("ajouter_creature.php");
	} elseif ($_POST['formulaire'] == "lieu") {
		include("ajouter_lieu.php");
	} elseif ($_POST['formulaire'] == "cle") {
		include("ajouter_terme.php");
	} elseif ($_POST['formulaire'] == "illustration") {
		include("ajouter_illustration.php");
	}
}

?>