<?php

if (isset($_FILES['image']) and $_FILES['image']['error'] == 0) {
	if ($_FILES['image']['size'] <= $taille_max) {

		$image = pathinfo($_FILES['image']['name']);
		$extension = $image['extension'];

		if (in_array($extension, $extensions_autorisees)) {
			$image = $_SESSION['pseudo'] . basename($_FILES['image']['name']);
			move_uploaded_file($_FILES['image']['tmp_name'], '../IMAGES/PERSONNAGES/' . $image);
		}
	}
} else {
	$image = "";
}

$requete = $bdd->prepare('INSERT INTO `personnage`(`id_personnage`, `nom_personnage`, `description_personnage`, `image_personnage`)VALUES(NULL, :nom, :description, :image)');

$requete->execute(array('nom' => $nom, 'description' => $desc, 'image' => $image));

$requete->closeCursor();

$requete = $bdd->prepare('SELECT id_personnage FROM personnage WHERE nom_personnage = :nom');

$requete->execute(array('nom' => $nom));

$donnee = $requete->fetch();

$requete->closeCursor();

$requete = $bdd->prepare('INSERT INTO intervenir(`id_personnage`, `id_projet`)VALUES(:id_personnage, :id_projet)');

$requete->execute(array('id_personnage' => $donnee['id_personnage'], 'id_projet' => $_SESSION['id_projet']));

$requete->closeCursor();

header('Location: ../atelier.php');
