<?php

//quand tu crée une fonction commente ça comme j'ai fais en haut car ca permet 
//de voir ca descripion quand on passe la souris sur son nom dans n'importe quel code

/**
 * returnJson met des données dans un Json et le retourne à un script ajax
 * 
 * @param Boolean $success 
 * // c'est l'etat de la requete, tu met true si c'est c'est un success.
 * @param String $url 
 * // c'est l'url de la page ou tu veux rediriger l'user en cas de success
 * @param String $message 
 * // c'est un message a afficher a l'utilisateur
 * 
 * @return void
 */
function returnJson($success, $url, $message)
{
    $myArr = array(
        "success" => $success,
        "url" => $url,
        "message" => $message
    );
    echo json_encode($myArr);
}

/**
* @param String $nom
* //le nom de l'element modifie
* @param String $categorie
* //la categorie a laquelle appartient l'element modifie
* @param String $type
* //SUPPRESSION, MODIFICATION, AJOUT, 
* @param Int $projet
* //l'id du projet qui subit des modifications
* @param Int $collaborateur
* //l'id de l'utilisateur qui applique des modifications
* @return void
*/
function historique($nom, $categorie, $type, $projet, $collaborateur)
{
    include "connexion.php";

    $requete = $bdd->prepare('INSERT INTO historique(`nom_modif`, `categorie_modif`, `type_modif`, `id_projet`, `id_collaborateur`)VALUES(:nom, :categorie, :type, :projet, :collaborateur)');

	$requete->execute(array('nom' => $nom, 'categorie' => $categorie, 'type' => $type, 'projet' => $projet ,'collaborateur' => $collaborateur));

	$requete->closeCursor();
}

/** 
 * @param Int $id
 * //l'id de l'utilisateur
 * @return Int
*/
function nombre_de_projets($id)
{
    include "connexion.php";

    $requete = $bdd->prepare('SELECT COUNT(*) FROM projet WHERE id_utilisateur = :id');

    $requete->execute(array('id' => $id));

    $donnee = $requete->fetch();

    $requete->closeCursor();

    return $donnee['COUNT(*)'];
}

/**
 * @param Int $id
 * //l'id de l'utilisateur
 * @return Int
 */
function nombre_de_followers($id)
{
    include "connexion.php";

    $requete = $bdd->prepare('SELECT COUNT(*) FROM suivre WHERE id_artiste = :id');

    $requete->execute(array('id' => $id));

    $donnee = $requete->fetch();

    $requete->closeCursor();

    return $donnee['COUNT(*)'];
}

/**
 * @param Int $id
 * //l'id du projet
 * @return Int
 */
function followers_projet($id)
{
    include "connexion.php";

    $requete = $bdd->prepare('SELECT COUNT(*) FROM suivre_projet WHERE id_projet = :id');

    $requete->execute(array('id' => $id));

    $donnee = $requete->fetch();

    $requete->closeCursor();

    return $donnee['COUNT(*)'];
}

/**
 * @param Int $id
 * //l'id du projet
 * @return Int
 */
function likes_projet($id)
{
    include "connexion.php";

    $requete = $bdd->prepare('SELECT COUNT(*) FROM aimer_projet WHERE id_projet = :id');

    $requete->execute(array('id' => $id));

    $donnee = $requete->fetch();

    $requete->closeCursor();

    return $donnee['COUNT(*)'];
}

/**
 * @param Int $id
 * //l'id de l'utilisateur
 * @return Int
 */
function nombre_de_likes($id)
{
    include "connexion.php";

    $requete = $bdd->prepare('SELECT COUNT(*) FROM utilisateur, projet WHERE utilisateur.id_utilisateur = projet.id_utilisateur AND utilisateur.id_utilisateur = :id');

    $requete->execute(array('id' => $id));

    $donnee = $requete->fetch();

    $requete->closeCursor();

    return $donnee['COUNT(*)'];
}

?>

