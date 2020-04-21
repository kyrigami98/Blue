<?php
	session_start();

	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=blue2;charset=utf8','root','');
	}
	catch(Exception $e)
	{
		die('Erreur : '.$e->getMessage());
	}

	if($_POST['formulaire'] == "projet")
	{
		$id = $_POST['id'];
		
		$requete = $bdd->prepare('SELECT * FROM projet WHERE id_projet = :id');
		
		$requete->execute(array('id' => $id));
		
		$donnee = $requete->fetch();
		
		$_SESSION['id_projet'] = $donnee['id_projet'];
		$_SESSION['titre_projet'] = $donnee['titre_projet'];
		$_SESSION['likes'] = $donnee['likes_projet'];
		$_SESSION['followers'] = $donnee['followers_projet'];
		
		$requete->closeCursor();
		
		$requete = $bdd->prepare('UPDATE `utilisateur` SET `projet_en_cours` = :id_projet WHERE `id_utilisateur` = :id_utilisateur');

		$requete->execute(array('id_projet' => $_SESSION['id_projet'], 'id_utilisateur' => $_SESSION['id']));

		$requete->closeCursor();

		header('Location: ../atelier.php');
	}
	else
	{
		$nom = $_POST['nom'];
		$desc = $_POST['description'];
		
		$extensions_autorisees = array('jpg', 'jpeg', 'png');
		
		if($_POST['formulaire'] == "chapitre")
		{
			$cree = false;
			
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
			
			$requete = $bdd->prepare('INSERT INTO `personnage`(`id_personnage`, `nom_personnage`, `description_personnage`, `image_personnage`)VALUES(NULL, :nom, :description, :image)');
				
			$requete->execute(array('nom' => $nom, 'description' => $desc, 'image' => $image));
			
			$requete->closeCursor();
			
			$requete = $bdd->prepare('SELECT id_personnage FROM personnage WHERE nom_personnage = :nom');
			
			$requete->execute(array('nom' => $nom));
			
			$donnee = $requete->fetch();
			
			$requete->closeCursor();
			
			$requete = $bdd->prepare('INSERT INTO intervenir(`id_personnage`, `id_projet`)VALUES(:id_personnage, :id_projet)');
			
			$requete->execute(array('id_personnage' => $donnee['id_personnage'], 'id_projet' => $_SESSION['id_projet']));
			
			$requete->closeCursor();
			
			header('Location: ../atelier.php');
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
			
			$requete = $bdd->prepare('INSERT INTO `creature`(`id_creature`, `nom_creature`, `description_creature`, `image_creature`)VALUES(NULL, :nom, :description, :image)');
				
			$requete->execute(array('nom' => $nom, 'description' => $desc, 'image' => $image));
			
			$requete->closeCursor();
			
			$requete = $bdd->prepare('SELECT id_creature FROM creature WHERE nom_creature = :nom');
			
			$requete->execute(array('nom' => $nom));
			
			$donnee = $requete->fetch();
			
			$requete->closeCursor();
			
			$requete = $bdd->prepare('INSERT INTO apparaitre(`id_creature`, `id_projet`)VALUES(:id_creature, :id_projet)');
			
			$requete->execute(array('id_creature' => $donnee['id_creature'], 'id_projet' => $_SESSION['id_projet']));
			
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
			
			$requete = $bdd->prepare('INSERT INTO `lieu`(`id_lieu`, `nom_lieu`, `description_lieu`, `image_lieu`)VALUES(NULL, :nom, :description, :image)');
				
			$requete->execute(array('nom' => $nom, 'description' => $desc, 'image' => $image));
			
			$requete->closeCursor();
			
			$requete = $bdd->prepare('SELECT id_lieu FROM lieu WHERE nom_lieu = :nom');
			
			$requete->execute(array('nom' => $nom));
			
			$donnee = $requete->fetch();
			
			$requete->closeCursor();
			
			$requete = $bdd->prepare('INSERT INTO visiter(`id_lieu`, `id_projet`)VALUES(:id_lieu, :id_projet)');
			
			$requete->execute(array('id_lieu' => $donnee['id_lieu'], 'id_projet' => $_SESSION['id_projet']));
			
			$requete->closeCursor();
			
			header('Location: ../atelier.php');
		}
		elseif($_POST['formulaire'] == "cle")
		{
			$requete = $bdd->prepare('INSERT INTO `terme`(`id_terme`, `nom_terme`, `description_terme`)VALUES(NULL, :nom, :description)');
				
			$requete->execute(array('nom' => $nom, 'description' => $desc));
			
			$requete->closeCursor();
			
			$requete = $bdd->prepare('SELECT id_terme FROM terme WHERE nom_terme = :nom');
			
			$requete->execute(array('nom' => $nom));
			
			$donnee = $requete->fetch();
			
			$requete->closeCursor();
			
			$requete = $bdd->prepare('INSERT INTO citer(`id_terme`, `id_projet`)VALUES(:id_terme, :id_projet)');
			
			$requete->execute(array('id_terme' => $donnee['id_terme'], 'id_projet' => $_SESSION['id_projet']));
			
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
			
			$requete = $bdd->prepare('INSERT INTO `illustration`(`id_illustration`, `titre_illustration`, `description_illustration`, `image_illustration`, `id_projet`)VALUES(NULL, :nom, :description, :image, :id)');
				
			$requete->execute(array('nom' => $nom, 'description' => $desc, 'image' => $image, 'id' => $_SESSION['id_projet']));
			
			$requete->closeCursor();
			
			header('Location: ../atelier.php');
		}
	}
?>