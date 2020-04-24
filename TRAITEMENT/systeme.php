<?php
session_start();

if (isset($_POST['formulaire'])) {
	if ($_POST['formulaire'] == "connexion") {
		include("signin.php");
	} elseif ($_POST['formulaire'] == "inscription") {
		include("signup.php");
	} elseif ($_POST['formulaire'] == "profil") {
		include("profile.php");
	} else if ($_POST['formulaire'] == "image") {
		include("image.php");
	}
} else {
	session_destroy();
	header("Location: ../index.php");
}
