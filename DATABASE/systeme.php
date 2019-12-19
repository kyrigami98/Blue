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
				if($donnee['EMAIL_USER'] == $email && $donnee['PASSWORD_USER'] == $password)
				{
					$_SESSION['pseudo'] = $donnee['PSEUDO_USER'];
					$_SESSION['email'] = $donnee['EMAIL_USER'];
					$_SESSION['password'] = $donnee['PASSWORD_USER'];
					$_SESSION['domaine'] = $donnee['ID_TYPE_USER'];
					//$_SESSION['partages'] = $donnee['nb_partages'];
					//$_SESSION['likes'] = $donnee['nb_likes'];
					//$_SESSION['projets'] = $donnee['nb_projets'];
					//$_SESSION['followers'] = $donnee['nb_followers'];
					$requete->closeCursor();
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
			
			$requete = $bdd->query('SELECT EMAIL_USER FROM user');
			
			while($donnee = $requete->fetch())
			{
				if($donnee['EMAIL_USER'] == $email)
				{
					echo "l'email entre est deja utilise";
					$existe = true;
				}
			}
			
			if($existe == false)
			{
				$requete = $bdd->prepare('INSERT INTO `user` (`ID_USER`, `PSEUDO_USER`, `EMAIL_USER`, `PASSWORD_USER`)VALUES(NULL, :pseudo, :email, :password)');
				
				$requete->execute(array('pseudo' => $pseudo, 'email' => $email, 'password' => $password));
				
				echo "l'inscription a bien ete faite";
			}
			
			$requete->closeCursor();
		}
		elseif($_POST['formulaire'] == "profil")
		{
			$domaine = $_POST['domaine'];
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
			
			if($oldpassword != $_SESSION['password'])
			{
				echo "le mot de passe saisi est incorrecte";
			}
			else
			{
				$requete = $bdd->prepare('UPDATE `user` SET PSEUDO_USER = :pseudo, EMAIL_USER = :email, PASSWORD_USER = :password, id_type_user = :domaine WHERE PSEUDO_USER = :user');
			
				$requete->execute(array('pseudo' => $pseudo, 'email' => $email, 'password' => $password, 'domaine' => $domaine, 'user' => $_SESSION['pseudo']));
				
				$_SESSION['pseudo'] = $pseudo;
				$_SESSION['password'] = $password;
				$_SESSION['domaine'] = $domaine;
				
				echo "mise a jour effectuee avec succes";
			}
		}
	}
	else
	{
		session_destroy();
		header("Location: ../index.php");
	}
?>