<?php
session_start();

include("connexion.php");

if ($_POST['formulaire'] == "projet") {
	$id = $_POST['id'];

	$requete = $bdd->prepare('SELECT * FROM projet WHERE id_projet = :id');

	$requete->execute(array('id' => $id));

	$donnee = $requete->fetch();

	$_SESSION['id_projet'] = $donnee['id_projet'];
	$_SESSION['titre_projet'] = $donnee['titre_projet'];
	$_SESSION['likes'] = $donnee['likes_projet'];
	$_SESSION['followers'] = $donnee['followers_projet'];

	$requete->closeCursor();

	$requete = $bdd->prepare('UPDATE `utilisateur` SET `projet_en_cours` = :id_projet WHERE `id_utilisateur` = :id_utilisateur');

	$requete->execute(array('id_projet' => $_SESSION['id_projet'], 'id_utilisateur' => $_SESSION['id']));

	$requete->closeCursor();

	header('Location: ../atelier.php');
} else {
	$nom = $_POST['nom'];
	$desc = $_POST['description'];

	$extensions_autorisees = array('jpg', 'jpeg', 'png', 'bmp', 'jpeg', 'gif');

	$taille_max = 4000000;

	if ($_POST['formulaire'] == "chapitre") {
		include("chapitre.php");
	} elseif ($_POST['formulaire'] == "personnage") {
		include("personnage.php");
	} elseif ($_POST['formulaire'] == "creature") {
		include("creature.php");
	} elseif ($_POST['formulaire'] == "lieu") {
		include("lieu.php");
	} elseif ($_POST['formulaire'] == "cle") {
		include("cle.php");
	} elseif ($_POST['formulaire'] == "illustration") {
		include("illustration.php");
	}
}
