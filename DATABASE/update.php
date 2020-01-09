<?php
	if(isset($_POST['formulaire']))
	{
		try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=blue;charset=utf8','root','');
		}
		catch(Exception $e)
		{
			die('Erreur : '.$e->getMessage());
		}
		
		if($_POST['formulaire'] == "chapitre")
		{
			$requete = $bdd->prepare('UPDATE `chapitre` SET nom_chapitre = :nom, description_chapitre = :description WHERE id_chapitre = :id');
			
			$requete->execute(array('nom' => $_POST['nom'], 'description' => $_POST['description'], 'id' => $_POST['id']));
			
			header('Location: ../atelier.php');
		}
		elseif($_POST['formulaire'] == "personnage")
		{
			$extensions_autorisees = array('jpg', 'jpeg', 'png');
			
			if(isset($_FILES['image']) AND $_FILES['image']['error'] == 0)
			{
				if($_FILES['image']['size'] <= 1000000)
				{
					$image = pathinfo($_FILES['image']['name']);
					$extension = $image['extension'];
					
					if(in_array($extension, $extensions_autorisees))
					{
						$image = basename($_FILES['image']['name']);
						move_uploaded_file($_FILES['image']['tmp_name'], '../IMAGES/PERSONNAGES/'.$image);
					}
				}
				
				$requete = $bdd->prepare('UPDATE `personnage` SET image_personnage = :image WHERE id_personnage = :id');
			
				$requete->execute(array('image' => $image, 'id' => $_POST['id']));
				
				$requete->closeCursor();
			}
			
			$requete = $bdd->prepare('UPDATE `personnage` SET nom_personnage = :nom, description_personnage = :description, WHERE id_personnage = :id');
			
			$requete->execute(array('nom' => $_POST['nom'], 'description' => $_POST['description'], 'id' => $_POST['id']));
			
			$requete->closeCursor();
			
			header('Location: ../atelier.php');
		}
		elseif($_POST['formulaire'] == "creature")
		{
			$extensions_autorisees = array('jpg', 'jpeg', 'png');
			
			if(isset($_FILES['image']) AND $_FILES['image']['error'] == 0)
			{
				if($_FILES['image']['size'] <= 1000000)
				{
					$image = pathinfo($_FILES['image']['name']);
					$extension = $image['extension'];
					
					if(in_array($extension, $extensions_autorisees))
					{
						$image = basename($_FILES['image']['name']);
						move_uploaded_file($_FILES['image']['tmp_name'], '../IMAGES/CREATURES/'.$image);
					}
				}
				
				$requete = $bdd->prepare('UPDATE `personnage` SET image_creature = :image WHERE id_creature = :id');
			
				$requete->execute(array('image' => $image, 'id' => $_POST['id']));
				
				$requete->closeCursor();
			}
			
			$requete = $bdd->prepare('UPDATE `creature` SET nom_creature = :nom, description_creature = :description, WHERE id_creature = :id');
			
			$requete->execute(array('nom' => $_POST['nom'], 'description' => $_POST['description'], 'id' => $_POST['id']));
			
			$requete->closeCursor();
			
			header('Location: ../atelier.php');
		}
		elseif($_POST['formulaire'] == "lieu")
		{
			$extensions_autorisees = array('jpg', 'jpeg', 'png');
			
			if(isset($_FILES['image']) AND $_FILES['image']['error'] == 0)
			{
				if($_FILES['image']['size'] <= 1000000)
				{
					$image = pathinfo($_FILES['image']['name']);
					$extension = $image['extension'];
					
					if(in_array($extension, $extensions_autorisees))
					{
						$image = basename($_FILES['image']['name']);
						move_uploaded_file($_FILES['image']['tmp_name'], '../IMAGES/LIEUX/'.$image);
					}
				}
				
				$requete = $bdd->prepare('UPDATE `lieu` SET image_lieu = :image WHERE id_lieu = :id');
			
				$requete->execute(array('image' => $image, 'id' => $_POST['id']));
				
				$requete->closeCursor();
			}
			
			$requete = $bdd->prepare('UPDATE `lieu` SET nom_lieu = :nom, description_lieu = :description, WHERE id_lieu = :id');
			
			$requete->execute(array('nom' => $_POST['nom'], 'description' => $_POST['description'], 'id' => $_POST['id']));
			
			$requete->closeCursor();
			
			header('Location: ../atelier.php');
		}
		elseif($_POST['formulaire'] == "terme")
		{
			$requete = $bdd->prepare('UPDATE `terme` SET nom_terme = :nom, description_terme = :description WHERE id_terme = :id');
			
			$requete->execute(array('nom' => $_POST['nom'], 'description' => $_POST['description'], 'id' => $_POST['id']));
			
			header('Location: ../atelier.php');
		}
		elseif($_POST['formulaire'] == "illustration")
		{
			$extensions_autorisees = array('jpg', 'jpeg', 'png');
			
			if(isset($_FILES['image']) AND $_FILES['image']['error'] == 0)
			{
				if($_FILES['image']['size'] <= 1000000)
				{
					$image = pathinfo($_FILES['image']['name']);
					$extension = $image['extension'];
					
					if(in_array($extension, $extensions_autorisees))
					{
						$image = basename($_FILES['image']['name']);
						move_uploaded_file($_FILES['image']['tmp_name'], '../IMAGES/ILLUSTRATIONS/'.$image);
					}
				}
				
				$requete = $bdd->prepare('UPDATE `illustration` SET image_illustration = :image WHERE id_illustration = :id');
			
				$requete->execute(array('image' => $image, 'id' => $_POST['id']));
				
				$requete->closeCursor();
			}
			
			$requete = $bdd->prepare('UPDATE `illustration` SET nom_illustration = :nom, description_illustration = :description, WHERE id_illustration = :id');
			
			$requete->execute(array('nom' => $_POST['nom'], 'description' => $_POST['description'], 'id' => $_POST['id']));
			
			$requete->closeCursor();
			
			header('Location: ../atelier.php');
		}
	}
?>