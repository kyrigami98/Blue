<?php
    $trouve = false;
    $div = "";
    $requete = $bdd->prepare('SELECT nom_personnage FROM personnage, intervenir WHERE personnage.id_personnage = intervenir.id_personnage AND intervenir.id_projet = :id_projet');

    $requete->execute(array('id_projet' => $_SESSION['id_projet']));

    while($personnage = $requete->fetch())
    {
        if(stripos($personnage['nom_personnage'], $_POST['tag']) !== false)
        {
            $div = $div." <button class=\"btn btn-sm btn-primary\" data-toggle=\"tooltip\" data-placement=\"top\" data-html=\"true\" title=\"\" type=\"submit\" id=\"tag\" value=\"".$personnage['nom_personnage']."\" name=\"personnage\">
                <i class=\"fas fa-fw fa-user-ninja\"></i> 
                ".$personnage['nom_personnage']."
            </button>";
            $trouve = true;
        }
    }
    if($trouve == true)
    {
        $resultat = $div;
    }
?>