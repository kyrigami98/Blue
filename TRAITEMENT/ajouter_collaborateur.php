<?php
    if($_POST['collaborateur'] == $_SESSION['email'])
    {
        echo "vous ne pouvez pas vous inscrire comme collaborateur";
    }
    else
    {
        $requete = $bdd->prepare('SELECT email_utilisateur FROM collaborer, (SELECT id_utilisateur, email_utilisateur FROM utilisateur)collaborateur WHERE collaborer.id_utilisateur = collaborateur.id_utilisateur AND email_utilisateur = :email AND id_projet = :id');

        $requete->execute(array('email' => $_POST['collaborateur'], 'id' => $_SESSION['id_projet']));

        $donnee = $requete->fetch();

        if($donnee == false)
        {
            $requete1 = $bdd->prepare('SELECT id_utilisateur, type_utilisateur, nom_utilisateur FROM utilisateur WHERE email_utilisateur = :email');

            $requete1->execute(array('email' => $_POST['collaborateur']));

            $donnee = $requete1->fetch();

            $requete2 = $bdd->prepare('INSERT INTO `collaborer`(`id_projet`, `id_utilisateur`, `type_collaborateur`) VALUES (:id_projet, :id_utilisateur, :type_collaborateur)');

            $requete2->execute(array('id_projet' => $_SESSION['id_projet'], 'id_utilisateur' => $donnee['id_utilisateur'], 'type_collaborateur' => $donnee['type_utilisateur']));
            
            historique($donnee['nom_utilisateur'], "COLLABORATION", "AJOUT", $_SESSION['id_projet'], $_SESSION['id']);

            $requete1->closeCursor();

            $requete2->closeCursor();

            header('Location: ../atelier.php');
        }
        else
        {
            echo "vous etes deja en collaboration avec cet utilisateur";
            //die(var_dump($donnee));
        }
    }
?>