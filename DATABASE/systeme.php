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
				$bdd = new PDO('mysql:host=localhost;dbname=blue;charset=utf8','root','');
			}
			catch(Exception $e)
			{
				die('Erreur : '.$e->getMessage());
			}
			
			$requete = $bdd->query('SELECT * FROM user');
			
			while($donnee = $requete->fetch())
			{
				if($donnee['email_user'] == $email && $donnee['password_user'] == $password)
				{
					$_SESSION['id'] = $donnee['id_user'];
					$_SESSION['pseudo'] = $donnee['pseudo_user'];
					$_SESSION['email'] = $donnee['email_user'];
					$_SESSION['password'] = $donnee['password_user'];
					$_SESSION['type'] = $donnee['type_user'];
					$_SESSION['image'] = "STAND.jpg";
					$vide = false;
					$requete->closeCursor();
					$requete = $bdd->query('SELECT * FROM image_user');
					while($donnee = $requete->fetch())
					{
						if($donnee['id_user'] == $_SESSION['id'])
						{
							$_SESSION['image'] = $donnee['image_user'];
							$vide = false;
							$requete->closeCursor();
							header('Location: ../index.php');
							break;
						}
						else
						{
							$vide = true;
						}
					}
					if($vide == true)
					{
						$_SESSION['image'] = "STAND.jpg";
					}
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
				$bdd = new PDO('mysql:host=localhost;dbname=blue;charset=utf8','root','');
			}
			catch(Exception $e)
			{
				die('Erreur : '.$e->getMessage());
			}
			
			$requete = $bdd->query('SELECT email_user FROM user');
			
			while($donnee = $requete->fetch())
			{
				if($donnee['email_user'] == $email)
				{
					echo "l'email entre est deja utilise";
					$requete->closeCursor();
					$existe = true;
				}
			}
			
			$requete->closeCursor();
			
			if($existe == false)
			{
				$requete = $bdd->prepare('INSERT INTO `user` (`id_user`, `pseudo_user`, `email_user`, `password_user`)VALUES(NULL, :pseudo, :email, :password)');
				
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
				$bdd = new PDO('mysql:host=localhost;dbname=blue;charset=utf8','root','');
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
					$requete = $bdd->prepare('UPDATE `user` SET password_user = :password, pseudo_user = :pseudo, email_user = :email, type_user = :type WHERE id_user = :id');
				
					$requete->execute(array('password' => $password,'pseudo' => $pseudo, 'email' => $email, 'type' => $type, 'id' => $_SESSION['id']));
					
					$_SESSION['pseudo'] = $pseudo;
					$_SESSION['password'] = $password;
					$_SESSION['type'] = $type;
					
					header('Location: ../profil.php');
				}
			}
			else
			{
				$requete = $bdd->prepare('UPDATE `user` SET pseudo_user = :pseudo, email_user = :email, type_user = :type WHERE id_user = :id');
				
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
				$bdd = new PDO('mysql:host=localhost;dbname=blue;charset=utf8','root','');
			}
			catch(Exception $e)
			{
				die('Erreur : '.$e->getMessage());
			}
			
			$requete = $bdd->query('SELECT * FROM image_user');
			
			while($donnee = $requete->fetch())
			{
				if($donnee['id_user'] == $_SESSION['id'])
				{
					$requete = $bdd->prepare('UPDATE `image_user` SET image_user = :image WHERE id_user = :id');
				
					$requete->execute(array('image' => $image, 'id' => $_SESSION['id']));
							
					$_SESSION['image'] = $image;
					
					$requete->closeCursor();
					
					header('Location: ../profil.php');
				}
			}
			
			$requete->closeCursor();
			
			$requete = $bdd->prepare('INSERT INTO `image_user`(`id_image`, `image_user`, `id_user`)VALUES(NULL, :image, :id)');
				
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