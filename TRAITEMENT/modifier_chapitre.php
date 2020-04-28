<?php
    include "connexion.php";

    if(isset($_POST['chapitre']))
    {
        if($_POST['chapitre'] == "infos")
        {
            $extensions_autorisees = array('jpg', 'jpeg', 'png', 'bmp', 'jpeg', 'gif', 'JPG', 'JPEG', 'PNG', 'BMP', 'JPEG', 'GIF');

            if (isset($_FILES['image']) and $_FILES['image']['error'] == 0) 
            {
                if ($_FILES['image']['size'] <= 4000000) 
                {
            
                    $image = pathinfo($_FILES['image']['name']);
                    $extension = $image['extension'];
            
                    if (in_array($extension, $extensions_autorisees)) 
                    {
                        $image = $_SESSION['pseudo'].basename($_FILES['image']['name']);
                        move_uploaded_file($_FILES['image']['tmp_name'], '../IMAGES/CHAPITRES/'.$image);
                    }
                }
            } 
            else 
            {
                $image = "";
            }

            if($image == "")
            {
                $requete = $bdd->prepare('UPDATE chapitre SET titre_chapitre = :titre, description_chapitre = :description WHERE id_chapitre = :id');

                $requete->execute(array('titre' => $_POST['titre'], 'description' => $_POST['description'], 'id' => $_POST['id']));
            }
            else
            {
                $requete = $bdd->prepare('UPDATE chapitre SET titre_chapitre = :titre, description_chapitre = :description, image_chapitre = :image WHERE id_chapitre = :id');

                $requete->execute(array('titre' => $_POST['titre'], 'description' => $_POST['description'], 'image' => $image, 'id' => $_POST['id']));
            }
            $requete->closeCursor();

            header('Location: ../story.php?id='.$_POST['id']);
        }
        elseif($_POST['chapitre'] == "texte")
        {
            echo "vous voulez modifier le texte d'un chapitre";
        }
    }
?>