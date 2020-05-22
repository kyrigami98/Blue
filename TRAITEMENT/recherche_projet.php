<?php
    $requete = $bdd->query('SELECT id_projet, titre_projet, image_projet, nom_utilisateur FROM projet, utilisateur WHERE utilisateur.id_utilisateur = projet.id_utilisateur');

    $resultat = "<div class=\"card-header py-3\"><h7 class=\"m-0 font-weight-bold\">Projets</h7></div>";
    while($projets = $requete->fetch())
    {
        if(stripos($projets['titre_projet'], $_POST['recherche']) !== false)
        {
            if($projets['image_projet'] != "")
            {
                $div = "<a class=\"dropdown-item\" href=\"voirprojet.php?id=".$projets['id_projet']."\"><img class=\"rounded\" width=\"50px\" src=\"IMAGES/PROJETS/".$projets['image_projet']."\" /> <span class=\"mr-2 d-none d-lg-inline text-gray-600 large\"><strong>".$projets['titre_projet']."</strong><span class=\"mr-2 d-none d-lg-inline text-gray-600 large\"> par ".$projets['nom_utilisateur']."</span></span></a>";
            }
            else
            {
                $div = "<a class=\"dropdown-item\" href=\"voirprojet.php?id=".$projets['id_projet']."\"><img class=\"rounded\" width=\"50px\" src=\"IMAGES/PROFILS/STAND.jpg\" /> <span class=\"mr-2 d-none d-lg-inline text-gray-600 large\"><strong>".$projets['titre_projet']."</strong><span class=\"mr-2 d-none d-lg-inline text-gray-600 large\"> par ".$projets['nom_utilisateur']."</span></span><br /></a>";
            }
            $resultat = $resultat."".$div;
            $trouve = true;
        }
        else
        {
            
        }
    }
?>