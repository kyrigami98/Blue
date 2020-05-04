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
                move_uploaded_file($_FILES['image']['tmp_name'], '../IMAGES/LIEUX/'.$image);
            }
        }
    } 
    else 
    {
        $image = "";
    }

    if($image == "")
    {
        $requete = $bdd->prepare('UPDATE lieu SET nom_lieu = :nom, description_lieu = :description WHERE id_lieu = :id');

        $requete->execute(array('nom' => $_POST['nom'], 'description' => $_POST['description'], 'id' => $_POST['id']));
    }
    else
    {
        $requete = $bdd->prepare('UPDATE lieu SET nom_lieu = :nom, description_lieu = :description, image_lieu = :image WHERE id_lieu = :id');

        $requete->execute(array('nom' => $_POST['nom'], 'description' => $_POST['description'], 'image' => $image, 'id' => $_POST['id']));
    }
    $requete->closeCursor();

    header('Location: ../atelier.php');
?>