<?php

if (isset($_FILES['image']) and $_FILES['image']['error'] == 0) {
	if ($_FILES['image']['size'] <= $taille_max) {

		$image = pathinfo($_FILES['image']['name']);
		$extension = $image['extension'];

		if (in_array($extension, $extensions_autorisees)) {
			$image = $_SESSION['pseudo'] . basename($_FILES['image']['name']);
			move_uploaded_file($_FILES['image']['tmp_name'], '../IMAGES/LIEUX/' . $image);
		}
	}
} else {
	$image = "";
}

$requete = $bdd->prepare('INSERT INTO `lieu`(`id_lieu`, `nom_lieu`, `description_lieu`, `image_lieu`)VALUES(NULL, :nom, :description, :image)');

$requete->execute(array('nom' => $nom, 'description' => $desc, 'image' => $image));

$requete->closeCursor();

$requete = $bdd->prepare('SELECT id_lieu FROM lieu WHERE nom_lieu = :nom');

$requete->execute(array('nom' => $nom));

$donnee = $requete->fetch();

$requete->closeCursor();

$requete = $bdd->prepare('INSERT INTO visiter(`id_lieu`, `id_projet`)VALUES(:id_lieu, :id_projet)');

$requete->execute(array('id_lieu' => $donnee['id_lieu'], 'id_projet' => $_SESSION['id_projet']));

$requete->closeCursor();

historique($nom, "LIEU", "AJOUT", $_SESSION['id_projet'], $_SESSION['id']);

header('Location: ../atelier.php');

?>