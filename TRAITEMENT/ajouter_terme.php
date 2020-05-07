<?php

$requete = $bdd->prepare('INSERT INTO `terme`(`id_terme`, `nom_terme`, `description_terme`)VALUES(NULL, :nom, :description)');

$requete->execute(array('nom' => $nom, 'description' => $desc));

$requete->closeCursor();

$requete = $bdd->prepare('SELECT id_terme FROM terme WHERE nom_terme = :nom');

$requete->execute(array('nom' => $nom));

$donnee = $requete->fetch();

$requete->closeCursor();

$requete = $bdd->prepare('INSERT INTO citer(`id_terme`, `id_projet`)VALUES(:id_terme, :id_projet)');

$requete->execute(array('id_terme' => $donnee['id_terme'], 'id_projet' => $_SESSION['id_projet']));

$requete->closeCursor();

historique($nom, "TERME", "AJOUT", $_SESSION['id_projet'], $_SESSION['id']);

header('Location: ../atelier.php');

?>