<?php
    $requete = $bdd->prepare('UPDATE terme SET nom_terme = :nom, description_terme = :description WHERE id_terme = :id');

    $requete->execute(array('nom' => $_POST['nom'], 'description' => $_POST['description'], 'id' => $_POST['id']));

    $requete->closeCursor();

    header('Location: ../atelier.php');
?>