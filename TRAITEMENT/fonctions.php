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

?>
