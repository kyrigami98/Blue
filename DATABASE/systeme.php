<?php
	session_start();
	
	if(isset($_POST['formulaire']))
	{
		if($_POST['formulaire'] == "connexion")
		{
			$email = $_POST['email'];
			$password = $_POST['password'];
			
			try
			{
				$bdd = new PDO('mysql:host=localhost;dbname=blue2;charset=utf8','root','');
			}
			catch(Exception $e)
			{
				die('Erreur : '.$e->getMessage());
			}
			
			$requete1 = $bdd->query('SELECT * FROM utilisateur');
			
			while($donnee1 = $requete1->fetch())
			{
				if($donnee1['email_utilisateur'] == $email && $donnee1['password_utilisateur'] == $password)
				{
					$_SESSION['id'] = $donnee1['id_utilisateur'];
					$_SESSION['pseudo'] = $donnee1['nom_utilisateur'];
					$_SESSION['email'] = $donnee1['email_utilisateur'];
					$_SESSION['password'] = $donnee1['password_utilisateur'];
					$_SESSION['type'] = $donnee1['type_utilisateur'];
					$_SESSION['image'] = $donnee1['image_utilisateur'];
					
					$requete2 = $bdd->prepare('SELECT * FROM projet WHERE id_projet = :id');
		
					$requete2->execute(array('id' => $donnee1['projet_en_cours']));
					
					$donnee2 = $requete2->fetch();
					
					$_SESSION['id_projet'] = $donnee2['id_projet'];
					$_SESSION['titre_projet'] = $donnee2['titre_projet'];
					$_SESSION['likes'] = $donnee2['likes_projet'];
					$_SESSION['followers'] = $donnee2['followers_projet'];
					
					$requete1->closeCursor();

					$requete2->closeCursor();
					
					header('Location: ../index.php');
				}
			}
			echo "l'email ou le mot de passe est incorrecte";
			$requete->closeCursor();
		}
		elseif($_POST['formulaire'] == "inscription")
		{
			$pseudo = $_POST['pseudo'];
			$email = $_POST['email'];
			$password = $_POST['password'];
			$existe = false;
			
			try
			{
				$bdd = new PDO('mysql:host=localhost;dbname=blue2;charset=utf8','root','');
			}
			catch(Exception $e)
			{
				die('Erreur : '.$e->getMessage());
			}
			
			$requete = $bdd->query('SELECT email_utilisateur FROM utilisateur');
			
			while($donnee = $requete->fetch())
			{
				if($donnee['email_utilisateur'] == $email)
				{
					echo "l'email entre existe deja";
					$existe = true;
				}
			}
			
			$requete->closeCursor();
			
			if($existe == false)
			{
				$requete = $bdd->prepare('INSERT INTO `utilisateur` (`id_utilisateur`, `nom_utilisateur`, `email_utilisateur`, `password_utilisateur`)VALUES(NULL, :pseudo, :email, :password)');
				
				$requete->execute(array('pseudo' => $pseudo, 'email' => $email, 'password' => $password));
				
				echo "l'inscription a bien ete faite";
			}
			
			$requete->closeCursor();
		}
		elseif($_POST['formulaire'] == "profil")
		{
			$type = $_POST['type'];
			$pseudo = $_POST['pseudo'];
			$email = $_POST['email'];
			$oldpassword = $_POST['password'];
			$password = $_POST['newpassword'];
			
			try
			{
				$bdd = new PDO('mysql:host=localhost;dbname=blue2;charset=utf8','root','');
			}
			catch(Exception $e)
			{
				die('Erreur : '.$e->getMessage());
			}
			
			if($oldpassword != "")
			{
				if($oldpassword != $_SESSION['password'])
				{
					echo "le mot de passe saisi est incorrecte";
				}
				else
				{
					$requete = $bdd->prepare('UPDATE `utilisateur` SET password_utilisateur = :password, nom_utilisateur = :pseudo, email_utilisateur = :email, type_utilisateur = :type WHERE id_utilisateur = :id');
				
					$requete->execute(array('password' => $password,'pseudo' => $pseudo, 'email' => $email, 'type' => $type, 'id' => $_SESSION['id']));
					
					$_SESSION['pseudo'] = $pseudo;
					$_SESSION['password'] = $password;
					$_SESSION['type'] = $type;
					
					header('Location: ../profil.php');
				}
			}
			else
			{
				$requete = $bdd->prepare('UPDATE `utilisateur` SET nom_utilisateur = :pseudo, email_utilisateur = :email, type_utilisateur = :type WHERE id_utilisateur = :id');
				
				$requete->execute(array('pseudo' => $pseudo, 'email' => $email, 'type' => $type, 'id' => $_SESSION['id']));
					
				$_SESSION['pseudo'] = $pseudo;
				$_SESSION['type'] = $type;
				$_SESSION['email'] = $email;
					
				header('Location: ../profil.php');
			}
		}
		else if($_POST['formulaire'] == "image")
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
						$image = $_SESSION['pseudo'].basename($_FILES['image']['name']);
						move_uploaded_file($_FILES['image']['tmp_name'], '../IMAGES/PROFILS/'.$image);
					}
				}
			}
			
			try
			{
				$bdd = new PDO('mysql:host=localhost;dbname=blue2;charset=utf8','root','');
			}
			catch(Exception $e)
			{
				die('Erreur : '.$e->getMessage());
			}
			
			$requete = $bdd->prepare('UPDATE `utilisateur` SET image_utilisateur = :image WHERE id_utilisateur = :id');
				
			$requete->execute(array('image' => $image, 'id' => $_SESSION['id']));
							
			$_SESSION['image'] = $image;
					
			$requete->closeCursor();
					
			header('Location: ../profil.php');
		}
	}
	else
	{
		session_destroy();
		header("Location: ../index.php");
	}
?>