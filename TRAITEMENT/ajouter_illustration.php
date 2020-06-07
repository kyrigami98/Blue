<?php

if (isset($_FILES['image']) and $_FILES['image']['error'] == 0) {
	if ($_FILES['image']['size'] <= $taille_max) {

		$image = pathinfo($_FILES['image']['name']);
		$extension = $image['extension'];

		if (in_array($extension, $extensions_autorisees)) {
			$image = $_SESSION['pseudo'] . basename($_FILES['image']['name']);
			move_uploaded_file($_FILES['image']['tmp_name'], '../IMAGES/ILLUSTRATIONS/' . $image);
		}
	}
} else {
	$image = "";
}

$requete = $bdd->prepare('INSERT INTO `illustration`(`id_illustration`, `titre_illustration`, `description_illustration`, `image_illustration`, `id_projet`)VALUES(NULL, :nom, :description, :image, :id)');

$requete->execute(array('nom' => $nom, 'description' => $desc, 'image' => $image, 'id' => $_SESSION['id_projet']));

$requete->closeCursor();

historique($nom, "ILLUSTRATION", "AJOUT", $_SESSION['id_projet'], $_SESSION['id']);

returnJson(true, $image, "vous venez d'ajouter une illustration");

?>