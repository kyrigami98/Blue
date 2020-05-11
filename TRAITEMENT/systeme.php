<?php
session_start();

include "connexion.php";

include "fonctions.php";

if (isset($_POST['formulaire'])) 
{
	if ($_POST['formulaire'] == "connexion") 
	{
		include("signin.php");
	} 
	elseif ($_POST['formulaire'] == "inscription") 
	{
		include("signup.php");
	} 
	elseif ($_POST['formulaire'] == "profil") 
	{
		include("profile.php");
	} 
	else if ($_POST['formulaire'] == "image") 
	{
		include("image.php");
	}
	elseif ($_POST['formulaire'] == "recherche")
	{
		if($_POST['recherche'] == "")
		{
			$resultat = "<span style=\"margin-left:10px;\">...<span>";
		}
		else
		{
			$trouve = false;

			include "recherche_projet.php";

			include "recherche_auteur.php";

			if($trouve == false)
			{
				$resultat = "<span style=\"margin-left:10px;\">aucun resultat trouvé</span>";
			}
		}



		returnJson(true, "", $resultat);
		
	} 
	elseif ($_POST['formulaire'] == "suivre") 
	{
		$requete = $bdd->prepare('INSERT INTO suivre(`id_artiste`, `id_abonne`) VALUES (:artiste, :abonne)');

		$requete->execute(array('artiste' => $_POST['id'], 'abonne' => $_SESSION['id']));
	} 
	elseif ($_POST['formulaire'] == "ne_plus_suivre") 
	{
		$requete = $bdd->prepare('DELETE FROM suivre WHERE id_artiste = :artiste AND id_abonne = :abonne');

		$requete->execute(array('artiste' => $_POST['id'], 'abonne' => $_SESSION['id']));
	} 
	elseif ($_POST['formulaire'] == "suivre_projet") 
	{
		$requete = $bdd->prepare('INSERT INTO suivre_projet(`id_projet`, `id_abonne`) VALUES (:projet, :abonne)');

		$requete->execute(array('projet' => $_POST['id'], 'abonne' => $_SESSION['id']));
	} 
	elseif ($_POST['formulaire'] == "ne_plus_suivre_projet") 
	{
		$requete = $bdd->prepare('DELETE FROM suivre_projet WHERE id_projet = :projet AND id_abonne = :abonne');

		$requete->execute(array('projet' => $_POST['id'], 'abonne' => $_SESSION['id']));
	} 
	elseif ($_POST['formulaire'] == "aimer_projet") 
	{
		$requete = $bdd->prepare('INSERT INTO aimer_projet(`id_projet`, `id_abonne`) VALUES (:projet, :abonne)');

		$requete->execute(array('projet' => $_POST['id'], 'abonne' => $_SESSION['id']));
	} 
	elseif ($_POST['formulaire'] == "ne_plus_aimer_projet") 
	{
		$requete = $bdd->prepare('DELETE FROM aimer_projet WHERE id_projet = :projet AND id_abonne = :abonne');

		$requete->execute(array('projet' => $_POST['id'], 'abonne' => $_SESSION['id']));
	} 
	elseif ($_POST['formulaire'] == "planche") 
	{
		if (isset($_FILES['image']) and $_FILES['image']['error'] == 0) 
		{
			if ($_FILES['image']['size'] <= $taille_max) 
			{
				$image = pathinfo($_FILES['image']['name']);
				$extension = $image['extension'];

				if (in_array($extension, $extensions_autorisees)) 
				{
					$image = $_SESSION['pseudo'] . basename($_FILES['image']['name']);
					move_uploaded_file($_FILES['image']['tmp_name'], '../IMAGES/PLANCHES/' . $image);
				}
			}
		} 
		else 
		{
			$image = "";
		}
		
		$requete = $bdd->prepare('INSERT INTO planche(`image_planche`, `numero_planche`, `id_chapitre`) VALUES (:image, :page, :chapitre)');
		
		$requete->execute(array('image' => $image, 'page' => $_POST['page'], 'chapitre' => $_POST['id_chapitre']));
		
		header('Location: ../story.php?id='.$_POST['id_chapitre']);
	}
} 
else 
{
	session_destroy();
	header("Location: ../index.php");
}
