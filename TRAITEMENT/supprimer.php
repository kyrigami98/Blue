<?php
session_start();

include "../INCLUSION/redirection2.php";

include "fonctions.php";

if (isset($_POST['supprimer'])) {
	include("connexion.php");

	if ($_POST['supprimer'] == "chapitre") {
		$requete_nom = $bdd->prepare('SELECT titre_chapitre FROM chapitre WHERE id_chapitre = :id');

		$requete_nom->execute(array('id' => $_POST['id']));

		$donnee = $requete_nom->fetch();

		$requete = $bdd->prepare('DELETE FROM chapitre WHERE id_chapitre = :id');

		$requete->execute(array('id' => $_POST['id']));

		$requete->closeCursor();

		historique($donnee['titre_chapitre'], "CHAPITRE", "SUPPRESSION", $_SESSION['id_projet'], $_SESSION['id']);

		header('Location: ../atelier.php');
	} elseif ($_POST['supprimer'] == "personnage") {

		$requete_nom = $bdd->prepare('SELECT nom_personnage FROM personnage WHERE id_personnage = :id');

		$requete_nom->execute(array('id' => $_POST['id']));

		$donnee = $requete_nom->fetch();

		$requete = $bdd->prepare('DELETE FROM intervenir WHERE id_personnage = :id');

		$requete->execute(array('id' => $_POST['id']));

		$requete->closeCursor();

		$requete = $bdd->prepare('DELETE FROM personnage WHERE id_personnage = :id');

		$requete->execute(array('id' => $_POST['id']));

		$requete->closeCursor();

		historique($donnee['nom_personnage'], "PERSONNAGE", "SUPPRESSION", $_SESSION['id_projet'], $_SESSION['id']);

		header('Location: ../atelier.php');
	} elseif ($_POST['supprimer'] == "creature") {
		$requete_nom = $bdd->prepare('SELECT nom_creature FROM creature WHERE id_creature = :id');

		$requete_nom->execute(array('id' => $_POST['id']));

		$donnee = $requete_nom->fetch();

		$requete = $bdd->prepare('DELETE FROM apparaitre WHERE id_creature = :id');

		$requete->execute(array('id' => $_POST['id']));

		$requete->closeCursor();

		$requete = $bdd->prepare('DELETE FROM creature WHERE id_creature = :id');

		$requete->execute(array('id' => $_POST['id']));

		$requete->closeCursor();

		historique($donnee['nom_creature'], "CREATURE", "SUPPRESSION", $_SESSION['id_projet'], $_SESSION['id']);

		header('Location: ../atelier.php');
	} elseif ($_POST['supprimer'] == "lieu") {
		$requete_nom = $bdd->prepare('SELECT nom_lieu FROM lieu WHERE id_lieu = :id');

		$requete_nom->execute(array('id' => $_POST['id']));

		$donnee = $requete_nom->fetch();

		$requete = $bdd->prepare('DELETE FROM visiter WHERE id_lieu = :id');

		$requete->execute(array('id' => $_POST['id']));

		$requete->closeCursor();

		$requete = $bdd->prepare('DELETE FROM lieu WHERE id_lieu = :id');

		$requete->execute(array('id' => $_POST['id']));

		$requete->closeCursor();

		historique($donnee['nom_lieu'], "LIEU", "SUPPRESSION", $_SESSION['id_projet'], $_SESSION['id']);

		header('Location: ../atelier.php');
	} elseif ($_POST['supprimer'] == "terme") {
		$requete_nom = $bdd->prepare('SELECT nom_terme FROM terme WHERE id_terme = :id');

		$requete_nom->execute(array('id' => $_POST['id']));

		$donnee = $requete_nom->fetch();

		$requete = $bdd->prepare('DELETE FROM citer WHERE id_terme = :id');

		$requete->execute(array('id' => $_POST['id']));

		$requete->closeCursor();

		$requete = $bdd->prepare('DELETE FROM terme WHERE id_terme = :id');

		$requete->execute(array('id' => $_POST['id']));

		$requete->closeCursor();

		historique($donnee['nom_terme'], "TERME", "SUPPRESSION", $_SESSION['id_projet'], $_SESSION['id']);

		header('Location: ../atelier.php');
	} elseif ($_POST['supprimer'] == "illustration") {
		$requete_nom = $bdd->prepare('SELECT titre_illustration FROM illustration WHERE id_illustration = :id');

		$requete_nom->execute(array('id' => $_POST['id']));

		$donnee = $requete_nom->fetch();

		$requete = $bdd->prepare('DELETE FROM illustration WHERE id_illustration = :id');

		$requete->execute(array('id' => $_POST['id']));

		$requete->closeCursor();

		historique($donnee['titre_illustration'], "ILLUSTRATION", "SUPPRESSION", $_SESSION['id_projet'], $_SESSION['id']);

		header('Location: ../atelier.php');
	}
}
