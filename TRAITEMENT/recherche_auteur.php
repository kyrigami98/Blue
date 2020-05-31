<?php
    $requete = $bdd->query('SELECT id_utilisateur, nom_utilisateur, image_utilisateur FROM utilisateur');

    $resultat = $resultat."<div class=\"card-header py-3\"><h7 class=\"m-0 font-weight-bold\">Auteurs</h7></div>";
    while($auteurs = $requete->fetch())
    {
        if(stripos($auteurs['nom_utilisateur'], $_POST['recherche']) !== false)
        {
            if($auteurs['image_utilisateur'] != "")
            {
                $div = "<a class=\"dropdown-item\" href=\"utilisateur.php?id=".$auteurs['id_utilisateur']."\"><img class=\"img-profile rounded-circle user-photo\" src=\"IMAGES/PROFILS/".$auteurs['image_utilisateur']."\" /> <span class=\"mr-2 d-none d-lg-inline text-gray-600 large\"><strong>".$auteurs['nom_utilisateur']."</strong></span></a><hr />";
            }
            else
            {
                $div = "<a class=\"dropdown-item\" href=\"utilisateur.php?id=".$auteurs['id_utilisateur']."\"><span class=\"mr-2 d-none d-lg-inline text-gray-600 large\"><strong>".$auteurs['nom_utilisateur']."</strong></span></a><hr />";
            }
            $resultat = $resultat."".$div;
            $trouve = true;
        }
        else
        {
            
        }
    }
?>