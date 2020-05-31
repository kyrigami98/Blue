<?php
    $trouve = false;
    $div = "";
    $requete = $bdd->prepare('SELECT titre_illustration FROM illustration WHERE illustration.id_projet = :id_projet');

    $requete->execute(array('id_projet' => $_SESSION['id_projet']));

    while($illustration = $requete->fetch())
    {
        if(stripos($illustration['titre_illustration'], $_POST['tag']) !== false)
        {
            $div = $div." <button class=\"btn btn-sm btn-info\" data-toggle=\"tooltip\" data-placement=\"top\" data-html=\"true\" title=\"\" type=\"submit\" id=\"tag\" value=\"".$illustration['titre_illustration']."\" name=\"illustration\">
                <i class=\"fas fa-fw fa-dragon\"></i> 
                ".$illustration['titre_illustration']."
            </button>";
            $trouve = true;
        }
    }
    if($trouve == true)
    {
        $resultat = $div;
    }
?>