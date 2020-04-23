<?php

$extensions_autorisees = array('jpg', 'jpeg', 'png', 'bmp', 'jpeg', 'gif');
			
			if(isset($_FILES['image']) AND $_FILES['image']['error'] == 0)
			{
				if($_FILES['image']['size'] <= 4000000)
				{
					
					$image = pathinfo($_FILES['image']['name']);
					$extension = $image['extension'];
					
					if(in_array($extension, $extensions_autorisees))
					{
						$image = $_SESSION['pseudo'].basename($_FILES['image']['name']);
						move_uploaded_file($_FILES['image']['tmp_name'], '../IMAGES/PROFILS/'.$image);
					}
				}
			}
			
			include("connexion.php");
			
			$requete = $bdd->prepare('UPDATE `utilisateur` SET image_utilisateur = :image WHERE id_utilisateur = :id');
				
			$requete->execute(array('image' => $image, 'id' => $_SESSION['id']));
							
			$_SESSION['image'] = $image;
					
			$requete->closeCursor();
					
			header('Location: ../profil.php');
?>