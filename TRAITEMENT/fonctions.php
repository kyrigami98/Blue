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

    $requete->execute(array('nom' => $nom, 'categorie' => $categorie, 'type' => $type, 'projet' => $projet, 'collaborateur' => $collaborateur));

    $requete->closeCursor();
}

function getHistorique($id)
{
    include "connexion.php";

    //je recupere la liste des projets de l'user
    $listeProjetUser = $bdd->prepare('
        SELECT id_projet
        FROM projet 
        WHERE id_utilisateur = ' . $id);
    $listeProjetUser->execute();
    $dataProjet = $listeProjetUser->fetchAll();
    $listeProjetUser->closeCursor();

    //je recupere la liste des historiques
    $historique = $bdd->prepare('
        SELECT *
        FROM historique, projet 
        WHERE historique.id_projet = projet.id_projet
        ORDER BY `date_modif` DESC
    ');
    $historique->execute(array(':id' => $id));
    $dataHistory = $historique->fetchAll();
    $historique->closeCursor();
    //je parcours les tabaleau pour faire le lien entre les historiques et les projets
    for ($i = count($dataProjet)-1; $i>=0; $i--) {
        foreach ($dataHistory as $value) {
            if (in_array($value["id_projet"], $dataProjet[$i])) {

                switch ($value["type_modif"]) {
                    case "MODIFICATION":
                        $icone='<div class="icon-circle bg-primary"><i class="fas fa-edit text-white"></i></div>';
                        break;
                    case "SUPPRESSION":
                        $icone='<div class="icon-circle bg-danger"><i class="fas fa-trash text-white"></i></div>';
                        break;
                    case "AJOUT":
                        $icone='<div class="icon-circle bg-success"><i class="fas fa-plus text-white"></i></div>';
                        break;
                    default:
                        $icone='<div class="icon-circle bg-primary"><i class="fas fa-file text-white"></i></div>';
                    break;
                };

                $retour =  '
                <form action="TRAITEMENT/atelier_systeme.php" method="POST">
                    <input type="hidden" name="id" value="'.$value["id_projet"].'" />
                    <input type="hidden" name="formulaire" value="projet" /> 
                        <button class="dropdown-item d-flex align-items-center btn btn-sm">
                            <div class="mr-3">
                            '.$icone.'
                            </div>
                            <div>
                                <div class="small text-gray-500">'. date("d F Y à h:i", strtotime($value["date_modif"])).'</div>
                                <span class="font-weight-bold">'. ucfirst(strtolower($value["categorie_modif"])) .' du projet '. $value["titre_projet"] .' mise à jour!</span>
                            </div>
                        </button>
                </form>
                ';
  
                echo $retour;
            }
        }
    }

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
