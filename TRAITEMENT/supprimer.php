<?php
session_start();

include "../INCLUSION/redirection2.php";

if (isset($_POST['supprimer'])) {
	include("connexion.php");

	if ($_POST['supprimer'] == "chapitre") {
		$requete = $bdd->prepare('DELETE FROM chapitre WHERE id_chapitre = :id');

		$requete->execute(array('id' => $_POST['id']));

		$requete->closeCursor();

		header('Location: ../atelier.php');
	} elseif ($_POST['supprimer'] == "personnage") {

		$requete = $bdd->prepare('DELETE FROM intervenir WHERE id_personnage = :id');

		$requete->execute(array('id' => $_POST['id']));

		$requete->closeCursor();

		$requete = $bdd->prepare('DELETE FROM personnage WHERE id_personnage = :id');

		$requete->execute(array('id' => $_POST['id']));

		$requete->closeCursor();

		header('Location: ../atelier.php');
	} elseif ($_POST['supprimer'] == "creature") {
		$requete = $bdd->prepare('DELETE FROM apparaitre WHERE id_creature = :id');

		$requete->execute(array('id' => $_POST['id']));

		$requete->closeCursor();

		$requete = $bdd->prepare('DELETE FROM creature WHERE id_creature = :id');

		$requete->execute(array('id' => $_POST['id']));

		$requete->closeCursor();

		header('Location: ../atelier.php');
	} elseif ($_POST['supprimer'] == "lieu") {
		$requete = $bdd->prepare('DELETE FROM visiter WHERE id_lieu = :id');

		$requete->execute(array('id' => $_POST['id']));

		$requete->closeCursor();

		$requete = $bdd->prepare('DELETE FROM lieu WHERE id_lieu = :id');

		$requete->execute(array('id' => $_POST['id']));

		$requete->closeCursor();

		header('Location: ../atelier.php');
	} elseif ($_POST['supprimer'] == "terme") {
		$requete = $bdd->prepare('DELETE FROM citer WHERE id_terme = :id');

		$requete->execute(array('id' => $_POST['id']));

		$requete->closeCursor();

		$requete = $bdd->prepare('DELETE FROM terme WHERE id_terme = :id');

		$requete->execute(array('id' => $_POST['id']));

		$requete->closeCursor();


		header('Location: ../atelier.php');
	} elseif ($_POST['supprimer'] == "illustration") {
		$requete = $bdd->prepare('DELETE FROM illustration WHERE id_illustration = :id');

		$requete->execute(array('id' => $_POST['id']));

		$requete->closeCursor();

		header('Location: ../atelier.php');
	}
}
