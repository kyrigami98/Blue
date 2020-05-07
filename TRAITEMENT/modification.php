<?php
    include "connexion.php";

    include "fonctions.php";

    if(isset($_POST['modification']))
    {
        if($_POST['modification'] == "creature")
        {
            include "modifier_creature.php";
        }
        elseif($_POST['modification'] == "illustration")
        {
            include "modifier_illustration.php";
        }
        elseif($_POST['modification'] == "lieu")
        {
            include "modifier_lieu.php";
        }
        elseif($_POST['modification'] == "personnage")
        {
            include "modifier_personnage.php";
        }
        elseif($_POST['modification'] == "terme")
        {
            include "modifier_terme.php";
        }
    }
?>