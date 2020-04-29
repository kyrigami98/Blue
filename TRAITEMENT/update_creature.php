<?php 
    if (isset($_FILES['image']) and $_FILES['image']['error'] == 0) 
    {
        if ($_FILES['image']['size'] <= $taille_max) 
        {
    
            $image = pathinfo($_FILES['image']['name']);
            $extension = $image['extension'];
    
            if (in_array($extension, $extensions_autorisees)) 
            {
                $image = $_SESSION['pseudo'].basename($_FILES['image']['name']);
                move_uploaded_file($_FILES['image']['tmp_name'], '../IMAGES/CREATURES/'.$image);
            }
        }
    } 
    else 
    {
        $image = "";
    }

    if($image == "")
    {
        $requete = $bdd->prepare('UPDATE creature SET nom_creature = :nom, description_creature = :description WHERE id_creature = :id');

        $requete->execute(array('nom' => $_POST['nom'], 'description' => $_POST['description'], 'id' => $_POST['id']));
    }
    else
    {
        $requete = $bdd->prepare('UPDATE creature SET nom_creature = :nom, description_creature = :description, image_creature = :image WHERE id_creature = :id');

        $requete->execute(array('nom' => $_POST['nom'], 'description' => $_POST['description'], 'image' => $image, 'id' => $_POST['id']));
    }
    $requete->closeCursor();

    header('Location: ../atelier.php');
?>