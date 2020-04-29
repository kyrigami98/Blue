<?php 
    if(isset($_FILES['image']) and $_FILES['image']['error'] == 0) 
    {
        if ($_FILES['image']['size'] <= $taille_max) 
        {
    
            $image = pathinfo($_FILES['image']['name']);
            $extension = $image['extension'];
    
            if (in_array($extension, $extensions_autorisees)) 
            {
                $image = $_SESSION['pseudo'].basename($_FILES['image']['name']);
                move_uploaded_file($_FILES['image']['tmp_name'], '../IMAGES/PERSONNAGES/'.$image);
            }
        }
    } 
    else 
    {
        $image = "";
    }

    /*die(var_dump($_FILES));

    die("secours");*/

    if($image == "")
    {
        $requete = $bdd->prepare('UPDATE personnage SET nom_personnage = :nom, description_personnage = :description WHERE id_personnage = :id');

        $requete->execute(array('nom' => $_POST['nom'], 'description' => $_POST['description'], 'id' => $_POST['id']));
    }
    else
    {
        $requete = $bdd->prepare('UPDATE personnage SET nom_personnage = :nom, description_personnage = :description, image_personnage = :image WHERE id_personnage = :id');

        $requete->execute(array('nom' => $_POST['nom'], 'description' => $_POST['description'], 'image' => $image, 'id' => $_POST['id']));
    }
    $requete->closeCursor();

    header('Location: ../atelier.php');
?>