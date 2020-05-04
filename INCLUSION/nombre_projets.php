<?php
    $requete = $bdd->prepare('SELECT COUNT(*) FROM projet WHERE id_utilisateur = :id');

    $requete->execute(array('id' => $_SESSION['id']));

    $donnee = $requete->fetch();

    $_SESSION['projets'] = $donnee['COUNT(*)'];
?>