<?php
    include "connexion.php";

    $extensions_autorisees = array('jpg', 'jpeg', 'png', 'bmp', 'jpeg', 'gif', 'JPG', 'JPEG', 'PNG', 'BMP', 'JPEG', 'GIF');

    $taille_max = 4000000;

    if(isset($_POST['modification']))
    {
        if($_POST['modification'] == "creature")
        {
            include "update_creature.php";
        }
        elseif($_POST['modification'] == "illustration")
        {
            include "update_illustration.php";
        }
        elseif($_POST['modification'] == "lieu")
        {
            include "update_lieu.php";
        }
        elseif($_POST['modification'] == "personnage")
        {
            include "update_personnage.php";
        }
        elseif($_POST['modification'] == "terme")
        {
            include "update_terme.php";
        }
    }
?>