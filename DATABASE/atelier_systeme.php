<?php
	session_start();

	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=blue;charset=utf8','root','');
	}
	catch(Exception $e)
	{
		die('Erreur : '.$e->getMessage());
	}

	if($_POST['formulaire'] == "projet")
	{
		$id = $_POST['id'];
		
		$requete = $bdd->query('SELECT * FROM creer_projet');
		
		while($donnee = $requete->fetch())
		{
			if($donnee['id_projet'] == $id)
			{
				$_SESSION['id_projet'] = $donnee['id_projet'];
				$_SESSION['nom_projet'] = $donnee['nom_projet'];
				$_SESSION['likes'] = $donnee['likes_projet'];
				$_SESSION['followers'] = $donnee['followers_projet'];
				
				$requete->closeCursor();
				
				header('Location: ../atelier.php');
			}
		}
	}
	else
	{
		$nom = $_POST['nom'];
		$desc = $_POST['description'];
		
		$extensions_autorisees = array('jpg', 'jpeg', 'png');
		
		if($_POST['formulaire'] == "chapitre")
		{	
			$requete = $bdd->prepare('INSERT INTO `chapitre`(`id_chapitre`, `nom_chapitre`, `description_chapitre`, `id_projet`)VALUES(NULL, :nom, :description, :id)');
				
			$requete->execute(array('nom' => $nom, 'description' => $desc, 'id' => $_SESSION['id_projet']));
			
			$requete->closeCursor();
			
			header('Location: ../atelier.php');
		}
		elseif($_POST['formulaire'] == "personnage")
		{
			if(isset($_FILES['image']) AND $_FILES['image']['error'] == 0)
			{
				if($_FILES['image']['size'] <= 1000000)
				{
					
					$image = pathinfo($_FILES['image']['name']);
					$extension = $image['extension'];
					
					if(in_array($extension, $extensions_autorisees))
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
			
			$requete = $bdd->prepare('INSERT INTO `personnage`(`id_personnage`, `nom_personnage`, `description_personnage`, `image_personnage`, `id_projet`)VALUES(NULL, :nom, :description, :image, :id)');
				
			$requete->execute(array('nom' => $nom, 'description' => $desc, 'image' => $image, 'id' => $_SESSION['id_projet']));
			
			$requete->closeCursor();
			
			header('Location: ../atelier.php#Personnages');
		}
		elseif($_POST['formulaire'] == "creature")
		{
			if(isset($_FILES['image']) AND $_FILES['image']['error'] == 0)
			{
				if($_FILES['image']['size'] <= 1000000)
				{
					
					$image = pathinfo($_FILES['image']['name']);
					$extension = $image['extension'];
					
					if(in_array($extension, $extensions_autorisees))
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
			
			$requete = $bdd->prepare('INSERT INTO `creature`(`id_creature`, `nom_creature`, `description_creature`, `image_creature`, `id_projet`)VALUES(NULL, :nom, :description, :image, :id)');
				
			$requete->execute(array('nom' => $nom, 'description' => $desc, 'image' => $image, 'id' => $_SESSION['id_projet']));
			
			$requete->closeCursor();
			
			header('Location: ../atelier.php');
		}
		elseif($_POST['formulaire'] == "lieu")
		{
			if(isset($_FILES['image']) AND $_FILES['image']['error'] == 0)
			{
				if($_FILES['image']['size'] <= 1000000)
				{
					
					$image = pathinfo($_FILES['image']['name']);
					$extension = $image['extension'];
					
					if(in_array($extension, $extensions_autorisees))
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
			
			$requete = $bdd->prepare('INSERT INTO `lieu`(`id_lieu`, `nom_lieu`, `description_lieu`, `image_lieu`, `id_projet`)VALUES(NULL, :nom, :description, :image, :id)');
				
			$requete->execute(array('nom' => $nom, 'description' => $desc, 'image' => $image, 'id' => $_SESSION['id_projet']));
			
			$requete->closeCursor();
			
			header('Location: ../atelier.php');
		}
		elseif($_POST['formulaire'] == "cle")
		{
			$requete = $bdd->prepare('INSERT INTO `terme`(`id_terme`, `nom_terme`, `description_terme`, `id_projet`)VALUES(NULL, :nom, :description, :id)');
				
			$requete->execute(array('nom' => $nom, 'description' => $desc, 'id' => $_SESSION['id_projet']));
			
			$requete->closeCursor();
			
			header('Location: ../atelier.php');
		}
		elseif($_POST['formulaire'] == "illustration")
		{
			if(isset($_FILES['image']) AND $_FILES['image']['error'] == 0)
			{
				if($_FILES['image']['size'] <= 1000000)
				{
					
					$image = pathinfo($_FILES['image']['name']);
					$extension = $image['extension'];
					
					if(in_array($extension, $extensions_autorisees))
					{
						$image = $_SESSION['pseudo'].basename($_FILES['image']['name']);
						move_uploaded_file($_FILES['image']['tmp_name'], '../IMAGES/ILLUSTRATIONS/'.$image);
					}
				}
			}
			else
			{
				$image = "";
			}
			
			$requete = $bdd->prepare('INSERT INTO `illustration`(`id_illustration`, `nom_illustration`, `description_illustration`, `image_illustration`, `id_projet`)VALUES(NULL, :nom, :description, :image, :id)');
				
			$requete->execute(array('nom' => $nom, 'description' => $desc, 'image' => $image, 'id' => $_SESSION['id_projet']));
			
			$requete->closeCursor();
			
			header('Location: ../atelier.php');
		}
	}
?>