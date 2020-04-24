<?php

$cree = false;
			
			if(isset($_FILES['image']) AND $_FILES['image']['error'] == 0)
			{
				if($_FILES['image']['size'] <= $taille_max)
				{
					
					$image = pathinfo($_FILES['image']['name']);
					$extension = $image['extension'];
					
					if(in_array($extension, $extensions_autorisees))
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
			
			$requete = $bdd->prepare('SELECT id_tome FROM tome WHERE id_projet = :id');
			
			$requete->execute(array('id' => $_SESSION['id_projet']));
			
			$donnee = $requete->fetch();
			
			if($donnee == NULL)
			{
				
				$requete->closeCursor();
				
				$requete = $bdd->prepare('INSERT INTO `tome`(`id_tome`, `titre_tome`, `image_tome`, `id_projet`)VALUES(NULL, :titre, :image, :id)');
				
				$requete->execute(array('titre' => $nom, 'image' => $image, 'id' => $_SESSION['id_projet']));
				
				$requete->closeCursor();
				
				$requete = $bdd->prepare('SELECT id_tome FROM tome WHERE titre_tome = :titre');
			
				$requete->execute(array('titre' => $nom));
				
				$donnee = $requete->fetch();
				
				$requete_chapitre = $bdd->prepare('INSERT INTO `chapitre`(`id_chapitre`, `titre_chapitre`, `description_chapitre`, `id_tome`, `image_chapitre`)VALUES(NULL, :nom, :description, :id, :image)');
				
				$requete_chapitre->execute(array('nom' => $nom, 'description' => $desc, 'id' => $donnee['id_tome'], 'image' => $image));
				
				$requete->closeCursor();
				
				$requete_chapitre->closeCursor();
				
				$cree = true;
				
				header('Location: ../atelier.php');
			}
			else
			{
				$requete->closeCursor();
				
				$requete = $bdd->prepare('SELECT id_tome FROM tome WHERE id_projet = :id');
				
				$requete->execute(array('id' => $_SESSION['id_projet']));
				
				while($donnee = $requete->fetch())
				{
					$requete_chapitre = $bdd->prepare('SELECT * FROM chapitre WHERE id_tome = :id');
					
					$requete_chapitre->execute(array('id' => $donnee['id_tome']));
					
					$count = 0;
					
					while($donnee2 = $requete_chapitre->fetch())
					{
						$count++;
					}
					if($count < 10)
					{
						$requete_chapitre->closeCursor();
						
						$requete_chapitre = $bdd->prepare('INSERT INTO `chapitre`(`id_chapitre`, `titre_chapitre`, `description_chapitre`, `id_tome`, `image_chapitre`)VALUES(NULL, :nom, :description, :id, :image)');
					
						$requete_chapitre->execute(array('nom' => $nom, 'description' => $desc, 'id' => $donnee['id_tome'], 'image' => $image));
						
						$requete_chapitre->closeCursor();
						
						$requete->closeCursor();
						
						$cree = true;
						
						header('Location: ../atelier.php');
					}
				}
				if($cree == false)
				{
					$requete->closeCursor();
				
					$requete = $bdd->prepare('INSERT INTO `tome`(`id_tome`, `titre_tome`, `image_tome`, `id_projet`)VALUES(NULL, :titre, :image, :id)');
					
					$requete->execute(array('titre' => $nom, 'image' => $image, 'id' => $_SESSION['id_projet']));
					
					$requete->closeCursor();
					
					$requete = $bdd->prepare('SELECT id_tome FROM tome WHERE titre_tome = :titre');
				
					$requete->execute(array('titre' => $nom));
					
					$donnee = $requete->fetch();
					
					$requete_chapitre = $bdd->prepare('INSERT INTO `chapitre`(`id_chapitre`, `titre_chapitre`, `description_chapitre`, `id_tome`, `image_chapitre`)VALUES(NULL, :nom, :description, :id, :image)');
					
					$requete_chapitre->execute(array('nom' => $nom, 'description' => $desc, 'id' => $donnee['id_tome'], 'image' => $image));
					
					$requete->closeCursor();
					
					$requete_chapitre->closeCursor();
					
					header('Location: ../atelier.php');
				}
			}
?>