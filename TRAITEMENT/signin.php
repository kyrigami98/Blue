<?php
	$email = $_POST['email'];
	$password = $_POST['password'];

	include("connexion.php");

	$requete1 = $bdd->query('SELECT * FROM utilisateur');

	while ($donnee1 = $requete1->fetch()) {
		if ($donnee1['email_utilisateur'] == $email && $donnee1['password_utilisateur'] == $password) {
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

			returnJson(true,"index.php","Connecté");
			exit;
			
		}
	}

	$requete1->closeCursor();
	returnJson(false,"","L'email ou le mot de passe est incorrecte");
	exit;

?>