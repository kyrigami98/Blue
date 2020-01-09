<?php
	session_start();
	
	if(isset($_POST['modifier']) and isset($_POST['id']))
	{
		try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=blue;charset=utf8','root','');
		}
		catch(Exception $e)
		{
			die('Erreur : '.$e->getMessage());
		}
		
		if($_POST['modifier'] == "chapitre")
		{
			$requete = $bdd->prepare('SELECT * FROM chapitre WHERE id_chapitre = :id');
			
			$requete->execute(array('id' => $_POST['id']));
			
			$donnee = $requete->fetch();
			
			echo 
				"
					<form action=\"DATABASE/update.php\" method=\"POST\">
						<label for=\"nom\">Nom : </label>
						<br /><br />
						<input id=\"nom\" type=\"text\" name=\"nom\" value=\"".$donnee['nom_chapitre']."\" />
						<br /><br />
						<label for=\"description\">Description : </label>
						<br /><br />
						<textarea id=\"description\" cols=\"50\" rows=\"30\" name=\"description\" placeholder=\"Description du chapitre\">".$donnee['description_chapitre']."</textarea>
						<br /><br />
						<input type=\"hidden\" name=\"formulaire\" value=\"chapitre\" />
						<input type=\"hidden\" name=\"id\" value=\"".$donnee['id_chapitre']."\" />
						<input type=\"submit\" value=\"Modifier\" />
					</form>
				";
		}
		elseif($_POST['modifier'] == "personnage")
		{
			$requete = $bdd->prepare('SELECT * FROM personnage WHERE id_personnage = :id');
			
			$requete->execute(array('id' => $_POST['id']));
			
			$donnee = $requete->fetch();
			
			echo 
				"
					<form action=\"DATABASE/update.php\" method=\"POST\" enctype=\"multipart/form-data\">
						<img  src=\"IMAGES/PERSONNAGES/".$donnee['image_personnage']."\" height=\"500px\" />
						<br /><br />
						<input type=\"file\" name=\"image\"/>
						<br /><br />
						<label for=\"description\">Nom : </label>
						<br /><br />
						<input id=\"nom\" type=\"text\" name=\"nom\" value=\"".$donnee['nom_personnage']."\" />
						<br /><br />
						<label for=\"description\">Description : </label>
						<br /><br />
						<textarea id=\"description\" cols=\"50\" rows=\"10\" name=\"description\" placeholder=\"Description du personnage\">".$donnee['description_personnage']."</textarea>
						<br /><br />
						<input type=\"hidden\" name=\"formulaire\" value=\"personnage\" />
						<input type=\"hidden\" name=\"id\" value=\"".$donnee['id_personnage']."\" />
						<input type=\"submit\" value=\"Modifier\" />
					</form>
				";
		}
		elseif($_POST['modifier'] == "creature")
		{
			$requete = $bdd->prepare('SELECT * FROM creature WHERE id_creature = :id');
			
			$requete->execute(array('id' => $_POST['id']));
			
			$donnee = $requete->fetch();
			
			echo 
				"
					<form action=\"DATABASE/update.php\" method=\"POST\" enctype=\"multipart/form-data\">
						<img  src=\"IMAGES/CREATURES/".$donnee['image_creature']."\"/>
						<br /><br />
						<input type=\"file\" name=\"image\"/>
						<br /><br />
						<label for=\"nom\">Nom : </label>
						<br /><br />
						<input id=\"nom\" type=\"text\" name=\"nom\" value=\"".$donnee['nom_creature']."\" />
						<br /><br />
						<label for=\"description\">Description : </label>
						<br /><br />
						<textarea id=\"description\" cols=\"50\" rows=\"10\" name=\"description\" placeholder=\"Description de la creature\">".$donnee['description_creature']."</textarea>
						<br /><br />
						<input type=\"hidden\" name=\"formulaire\" value=\"creature\" />
						<input type=\"hidden\" name=\"id\" value=\"".$donnee['id_creature']."\" />
						<input type=\"submit\" value=\"Modifier\" />
					</form>
				";
		}
		elseif($_POST['modifier'] == "lieu")
		{
			$requete = $bdd->prepare('SELECT * FROM lieu WHERE id_lieu = :id');
			
			$requete->execute(array('id' => $_POST['id']));
			
			$donnee = $requete->fetch();
			
			if($donnee['image_lieu'] != "")
			{
				echo 
				"
					<form action=\"DATABASE/update.php\" method=\"POST\" enctype=\"multipart/form-data\">
						<img  src=\"IMAGES/LIEUX/".$donnee['image_lieu']."\"/>
						<br /><br />
						<input type=\"file\" name=\"image\"/>
						<br /><br />
						<label for=\"nom\">Nom : </label>
						<br /><br />
						<input id=\"nom\" type=\"text\" name=\"nom\" value=\"".$donnee['nom_lieu']."\" />
						<br /><br />
						<label for=\"description\">Description : </label>
						<br /><br />
						<textarea id=\"description\" cols=\"50\" rows=\"10\" name=\"description\" placeholder=\"Description du lieu\">".$donnee['description_lieu']."</textarea>
						<br /><br />
						<input type=\"hidden\" name=\"formulaire\" value=\"lieu\" />
						<input type=\"hidden\" name=\"id\" value=\"".$donnee['id_lieu']."\" />
						<input type=\"submit\" value=\"Modifier\" />
					</form>
				";
			}
			else
			{
				echo 
				"
					<form action=\"DATABASE/update.php\" method=\"POST\" enctype=\"multipart/form-data\">
						<input type=\"file\" name=\"image\"/>
						<br /><br />
						<label for=\"nom\">Nom : </label>
						<br /><br />
						<input id=\"nom\" type=\"text\" name=\"nom\" value=\"".$donnee['nom_lieu']."\" />
						<br /><br />
						<label for=\"description\">Description : </label>
						<br /><br />
						<textarea id=\"description\" cols=\"50\" rows=\"10\" name=\"description\" placeholder=\"Description du lieu\">".$donnee['description_lieu']."</textarea>
						<br /><br />
						<input type=\"hidden\" name=\"formulaire\" value=\"lieu\" />
						<input type=\"hidden\" name=\"id\" value=\"".$donnee['id_lieu']."\" />
						<input type=\"submit\" value=\"Modifier\" />
					</form>
				";
			}
		}
		elseif($_POST['modifier'] == "terme")
		{
			$requete = $bdd->prepare('SELECT * FROM terme WHERE id_terme = :id');
			
			$requete->execute(array('id' => $_POST['id']));
			
			$donnee = $requete->fetch();
			
			echo 
				"
					<form action=\"DATABASE/update.php\" method=\"POST\">
						<label for=\"nom\">Nom : </label>
						<br /><br />
						<input id=\"nom\" type=\"text\" name=\"nom\" value=\"".$donnee['nom_terme']."\" />
						<br /><br />
						<label for=\"description\">Description : </label>
						<br /><br />
						<textarea id=\"description\" cols=\"50\" rows=\"10\" name=\"description\" placeholder=\"Description du terme\">".$donnee['description_terme']."</textarea>
						<br /><br />
						<input type=\"hidden\" name=\"formulaire\" value=\"terme\" />
						<input type=\"hidden\" name=\"id\" value=\"".$donnee['id_terme']."\" />
						<input type=\"submit\" value=\"Modifier\" />
					</form>
				";
		}
		elseif($_POST['modifier'] == "illustration")
		{
			$requete = $bdd->prepare('SELECT * FROM illustration WHERE id_illustration = :id');
			
			$requete->execute(array('id' => $_POST['id']));
			
			$donnee = $requete->fetch();
			
			if($donnee['image_illustration'] != "")
			{
				echo 
				"
					<form action=\"DATABASE/update.php\" method=\"POST\" enctype=\"multipart/form-data\">
						<img  src=\"IMAGES/ILLUSTRATIONS/".$donnee['image_illustration']."\"/>
						<br /><br />
						<input type=\"file\" name=\"image\"/>
						<br /><br />
						<label for=\"nom\">Nom : </label>
						<br /><br />
						<input id=\"nom\" type=\"text\" name=\"nom\" value=\"".$donnee['nom_illustration']."\" />
						<br /><br />
						<label for=\"description\">Description : </label>
						<br /><br />
						<textarea id=\"description\" cols=\"50\" rows=\"5\" name=\"description\" placeholder=\"Description de l'illustration\">".$donnee['description_illustration']."</textarea>
						<br /><br />
						<input type=\"hidden\" name=\"formulaire\" value=\"illustration\" />
						<input type=\"hidden\" name=\"id\" value=\"".$donnee['id_illustration']."\" />
						<input type=\"submit\" value=\"Modifier\" />
					</form>
				";
			}
			else
			{
				echo 
				"
					<form action=\"DATABASE/update.php\" method=\"POST\" enctype=\"multipart/form-data\">
						<input type=\"file\" name=\"image\"/>
						<br /><br />
						<label for=\"nom\">Nom : </label>
						<br /><br />
						<input id=\"nom\" type=\"text\" name=\"nom\" value=\"".$donnee['nom_illustration']."\" />
						<br /><br />
						<label for=\"description\">Description : </label>
						<br /><br />
						<textarea id=\"description\" cols=\"50\" rows=\"5\" name=\"description\" placeholder=\"Description de l'illustration\">".$donnee['description_illustration']."</textarea>
						<br /><br />
						<input type=\"hidden\" name=\"formulaire\" value=\"illustration\" />
						<input type=\"hidden\" name=\"id\" value=\"".$donnee['id_illustration']."\" />
						<input type=\"submit\" value=\"Modifier\" />
					</form>
				";
			}
		}
	}
	else
	{
		header('Location: atelier.php');
	}
?>