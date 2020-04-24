<?php

$type = $_POST['type'];
$pseudo = $_POST['pseudo'];
$email = $_POST['email'];
$oldpassword = $_POST['password'];
$password = $_POST['newpassword'];

include("connexion.php");

if ($oldpassword != "") {
	if ($oldpassword != $_SESSION['password']) {
		echo "le mot de passe saisi est incorrecte";
	} else {
		$requete = $bdd->prepare('UPDATE `utilisateur` SET password_utilisateur = :password, nom_utilisateur = :pseudo, email_utilisateur = :email, type_utilisateur = :type WHERE id_utilisateur = :id');

		$requete->execute(array('password' => $password, 'pseudo' => $pseudo, 'email' => $email, 'type' => $type, 'id' => $_SESSION['id']));

		$_SESSION['pseudo'] = $pseudo;
		$_SESSION['password'] = $password;
		$_SESSION['type'] = $type;

		header('Location: ../profil.php');
	}
} else {
	$requete = $bdd->prepare('UPDATE `utilisateur` SET nom_utilisateur = :pseudo, email_utilisateur = :email, type_utilisateur = :type WHERE id_utilisateur = :id');

	$requete->execute(array('pseudo' => $pseudo, 'email' => $email, 'type' => $type, 'id' => $_SESSION['id']));

	$_SESSION['pseudo'] = $pseudo;
	$_SESSION['type'] = $type;
	$_SESSION['email'] = $email;

	header('Location: ../profil.php');
}
