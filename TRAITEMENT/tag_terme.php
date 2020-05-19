<?php
    $trouve = false;
    $div = "";
    $requete = $bdd->prepare('SELECT nom_terme FROM terme, citer WHERE terme.id_terme = citer.id_terme AND citer.id_projet = :id_projet');

    $requete->execute(array('id_projet' => $_SESSION['id_projet']));

    while($terme = $requete->fetch())
    {
        if(stripos($terme['nom_terme'], $_POST['tag']) !== false)
        {
            $div = $div." <button class=\"btn btn-sm btn-danger\" data-toggle=\"tooltip\" data-placement=\"top\" data-html=\"true\" title=\"\" type=\"submit\" id=\"tag\" value=\"".$terme['nom_terme']."\" name=\"terme\">
                <i class=\"fas fa-fw fa-list-alt\"></i> 
                ".$terme['nom_terme']."
            </button>";
            $trouve = true;
        }
    }
    if($trouve == true)
    {
        $resultat = $div;
    }
?>