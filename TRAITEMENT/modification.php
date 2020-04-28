<?php
    include "connexion.php";

    if(isset($_POST['modification']))
    {
        if($_POST['modification'] == "creature")
        {
            echo $_POST['nom'];
        }
        elseif($_POST['modification'] == "illustration")
        {
            echo $_POST['nom'];
        }
        elseif($_POST['modification'] == "lieu")
        {
            echo $_POST['nom'];
        }
        elseif($_POST['modification'] == "personnage")
        {
            echo $_POST['nom'];
        }
        elseif($_POST['modification'] == "terme")
        {
            echo $_POST['nom'];
        }
    }
    elseif(isset($_POST['image']))
    {
        if($_POST['modification'] == "creature")
        {
            
        }
        elseif($_POST['modification'] == "illustration")
        {
            
        }
        elseif($_POST['modification'] == "lieu")
        {
            
        }
        elseif($_POST['modification'] == "personnage")
        {
            
        }
        elseif($_POST['modification'] == "terme")
        {
            ?><img src="<?php echo $_POST['image']; ?>" alt="<?php echo $_POST['image']; ?>" /><?php
        }
    }
?>