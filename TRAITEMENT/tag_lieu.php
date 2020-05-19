<?php
    $trouve = false;
    $div = "";
    $requete = $bdd->prepare('SELECT nom_lieu FROM lieu, visiter WHERE lieu.id_lieu = visiter.id_lieu AND visiter.id_projet = :id_projet');

    $requete->execute(array('id_projet' => $_SESSION['id_projet']));

    while($lieu = $requete->fetch())
    {
        if(stripos($lieu['nom_lieu'], $_POST['tag']) !== false)
        {
            $div = $div." <button class=\"btn btn-sm btn-warning\" data-toggle=\"tooltip\" data-placement=\"top\" data-html=\"true\" title=\"\" type=\"submit\" id=\"tag\" value=\"".$lieu['nom_lieu']."\" name=\"lieu\">
                <i class=\"fas fa-fw fa-globe-africa\"></i> 
                ".$lieu['nom_lieu']."
            </button>";
            $trouve = true;
        }
    }
    if($trouve == true)
    {
        $resultat = $div;
    }
?>