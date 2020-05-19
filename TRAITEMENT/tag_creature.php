<?php
    $trouve = false;
    $div = "";
    $requete = $bdd->prepare('SELECT nom_creature FROM creature, apparaitre WHERE creature.id_creature = apparaitre.id_creature AND apparaitre.id_projet = :id_projet');

    $requete->execute(array('id_projet' => $_SESSION['id_projet']));

    while($creature = $requete->fetch())
    {
        if(stripos($creature['nom_creature'], $_POST['tag']) !== false)
        {
            $div = $div." <button class=\"btn btn-sm btn-success\" data-toggle=\"tooltip\" data-placement=\"top\" data-html=\"true\" title=\"\" type=\"submit\" id=\"tag\" value=\"".$creature['nom_creature']."\" name=\"creature\">
                <i class=\"fas fa-fw fa-paw\"></i> 
                ".$creature['nom_creature']."
            </button>";
            $trouve = true;
        }
    }
    if($trouve == true)
    {
        $resultat = $div;
    }
?>