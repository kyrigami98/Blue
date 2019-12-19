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
			
			$requete = $bdd->query('SELECT * FROM utilisateurs');
			
			while($donnee = $requete->fetch())
			{
				if($donnee['email'] == $email && $donnee['password'] == $password)
				{
					$_SESSION['pseudo'] = $donnee['pseudo'];
					$_SESSION['email'] = $donnee['email'];
					$_SESSION['password'] = $donnee['password'];
					$_SESSION['domaine'] = $donnee['domaine'];
					$_SESSION['partages'] = $donnee['nb_partages'];
					$_SESSION['likes'] = $donnee['nb_likes'];
					$_SESSION['projets'] = $donnee['nb_projets'];
					$_SESSION['followers'] = $donnee['nb_followers'];
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
			
			$requete = $bdd->query('SELECT email FROM utilisateurs');
			
			if($requete->fetch() != null)
			{
				while($donnee = $requete->fetch())
				{
					if($donnee['email'] == $email)
					{
						echo "l'email entre est deja utilise";
						$existe = true;
					}
				}
			}
			
			if($existe == false)
			{
				$requete = $bdd->prepare('INSERT INTO `utilisateurs` (`id`, `pseudo`, `email`, `password`)VALUES(NULL, :pseudo, :email, :password)');
				
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
				$requete = $bdd->prepare('UPDATE `utilisateurs` SET pseudo = :pseudo, email = :email, password = :password, domaine = :domaine WHERE pseudo = :user');
			
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