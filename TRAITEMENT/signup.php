<?php

$pseudo = $_POST['pseudo'];
			$email = $_POST['email'];
			$password = $_POST['password'];
			$existe = false;
			
			include("connexion.php");
			
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
?>