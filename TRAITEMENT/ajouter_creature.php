<?php

if (isset($_FILES['image']) and $_FILES['image']['error'] == 0) {
	if ($_FILES['image']['size'] <= $taille_max) {

		$image = pathinfo($_FILES['image']['name']);
		$extension = $image['extension'];

		if (in_array($extension, $extensions_autorisees)) {
			$image = $_SESSION['pseudo'] . basename($_FILES['image']['name']);
			move_uploaded_file($_FILES['image']['tmp_name'], '../IMAGES/CREATURES/' . $image);
		}
	}
} else {
	$image = "";
}

$requete = $bdd->prepare('INSERT INTO `creature`(`id_creature`, `nom_creature`, `description_creature`, `image_creature`)VALUES(NULL, :nom, :description, :image)');

$requete->execute(array('nom' => $nom, 'description' => $desc, 'image' => $image));

$requete->closeCursor();

$requete = $bdd->prepare('SELECT id_creature FROM creature WHERE nom_creature = :nom');

$requete->execute(array('nom' => $nom));

$donnee = $requete->fetch();

$requete->closeCursor();

$requete = $bdd->prepare('INSERT INTO apparaitre(`id_creature`, `id_projet`)VALUES(:id_creature, :id_projet)');

$requete->execute(array('id_creature' => $donnee['id_creature'], 'id_projet' => $_SESSION['id_projet']));

$requete->closeCursor();

historique($nom, "CREATURE", "AJOUT", $_SESSION['id_projet'], $_SESSION['id']);

returnJson(true, "", "vous venez d'ajouter une creature");

?>