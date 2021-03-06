<?php

include("INCLUSION/header.php");

include("TRAITEMENT/connexion.php");

$projets = nombre_de_projets($_GET['id']);

$followers_user = nombre_de_followers($_GET['id']);

$requete1 = $bdd->prepare('SELECT image_utilisateur, nom_utilisateur, type_utilisateur FROM utilisateur WHERE id_utilisateur = :id');

$requete1->execute(array('id' => $_GET['id']));

$user = $requete1->fetch();

?>
<div class="container">
    <div class="card border-0 shadow my-5">
        <div class="card-body p-5">
            <div class="row">
                <div class="col-md-4">
                    <div class="profile-img">
                        <h4>
                            <?php
                                if(isset($user['nom_utilisateur']))
                                {
                                    echo $user['nom_utilisateur'];
                                }
                            ?>
                        </h4>
                        <h6>
                            <?php
                                if(isset($user['type_utilisateur']))
                                {
                                    echo $user['type_utilisateur'];
                                }
                                else
                                {
                                    echo "...";
                                }
                            ?>
                        </h6>
                        <?php if(isset($user['image_utilisateur'])){ ?>
                            <img class="avatar rounded img-fluid" src="IMAGES/PROFILS/<?php echo $user['image_utilisateur']; ?>" alt="<?php echo $user['image_utilisateur']; ?>">
                        <?php }else{ ?>
                            <img class="avatar rounded img-fluid" src="IMAGES/PROFILS/STAND.jpg" alt="Image par defaut" />
                        <?php } ?>
                        <br />
                    </div>
                    <br />
                    <?php
                        if(isset($_SESSION['id']) AND $_SESSION['id'] != $_GET['id'])
                        {
                            $requete3 = $bdd->prepare('SELECT * FROM suivre WHERE id_artiste = :artiste AND id_abonne = :abonne');

                            $requete3->execute(array('artiste' => $_GET['id'], 'abonne' => $_SESSION['id']));

                            $suivi = $requete3->fetch();
                    ?>
                    <div class="col-md-12">
                        <button class="btn btn-md btn-block btn-primary" <?php if($suivi == NULL){ echo "style='visibility:visible;position: absolute;'"; }else{ echo "style='visibility:hidden;position: absolute;'"; } ?> id="suivre" onclick="suivre(1);">
                            Suivre l'artiste <i class="fas fa-check fa-md"></i>
                        </button>
                        <button class="btn btn-md btn-block btn-danger" <?php if($suivi == NULL){ echo "style='visibility:hidden;'"; }else{ echo "style='visibility:visible;'"; } ?> id="ne_plus_suivre" onclick="ne_plus_suivre();">
                            Ne plus suivre <i class="fas fa-ban fa-md"></i>
                        </button>
                    </div>
                    <?php
                        }
                        elseif(isset($_SESSION['id']) AND $_SESSION['id'] == $_GET['id'])
                        {
                            echo "Je ne sais vraiment pas comment vous êtes arrivé là...<br />";
                     
                        }
                        else
                        {
                            echo "Connectez-vous pour suivre cet artiste<br />";
                        }
                    ?>
                    <br />
                    <div class="row">
                        <div class="col-md-12">
                            <div class="profile-work">
                                <ul class="list-group">
                                    <li class="list-group-item text-muted">
                                        Activité
                                        <i class="fa fa-dashboard fa-1x"></i>
                                    </li>
                                    <li class="list-group-item text-right">
                                        <span class="pull-left">
                                            <strong>
                                                Partage
                                            </strong>
                                        </span>
                                        <?php
                                            if(isset($user['partages_projet']))
                                            {
                                                echo $user['partages_projet'];
                                            }
                                            else
                                            {
                                                echo "0";
                                            }
                                        ?>
                                    </li>
                                    <li class="list-group-item text-right">
                                        <span class="pull-left">
                                            <strong>
                                                Likes
                                            </strong>
                                        </span>
                                        <?php
                                            echo nombre_de_likes($_GET['id']);
                                        ?>
                                    </li>
                                    <li class="list-group-item text-right">
                                        <span class="pull-left">
                                            <strong>
                                                Nombre de Projet
                                            </strong>
                                        </span>
                                        <?php
                                            if(isset($projets))
                                            {
                                                echo $projets;
                                            }
                                            else
                                            {
                                                echo "0";
                                            }
                                        ?>
                                    </li>
                                    <li class="list-group-item text-right">
                                        <span class="pull-left">
                                            <strong>
                                                followers
                                            </strong>
                                        </span>
                                        <?php
                                            if(isset($followers_user))
                                            {
                                                echo $followers_user;
                                            }
                                            else
                                            {
                                                echo "0";
                                            }
                                        ?>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <br />
                </div>
                <div class="col-md-8">
                    <div class="col-md-12">
                        <br />
                        <div class="inline-block">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">
                                        Projets
                                    </h4>
                                    <div class="row">
                                        <?php
                                            $requete2 = $bdd->prepare('SELECT * FROM projet WHERE id_utilisateur = :id ORDER BY id_projet DESC');

                                            $requete2->execute(array('id' => $_GET['id']));

                                            while($donnee = $requete2->fetch())
                                            {
                                        ?>
                                        <div class="col-lg-6 col-sm-6 mb-4">
                                            <span style="font-size:10px;" class="badge badge-primary badge-counter">
                                                <?php
                                                    echo likes_projet($donnee['id_projet']);
                                                ?>
                                                <i class="fas fa-fw fa-thumbs-up"></i>
                                            </span>
                                            <span style="font-size:10px;" class="badge badge-primary badge-counter">
                                                <?php
                                                    echo followers_projet($donnee['id_projet']);
                                                ?>
                                                <i class="fas fa-fw fa-users"></i>
                                            </span>
                                            <div class="card h-100" data-toggle="tooltip" data-placement="left" data-html="false" title='<?php echo $donnee['description_projet']; ?>'>
                                                <a href="#">
                                                <?php if($donnee['image_projet'] == ""){ ?>
                                                    <img class="card-img-top" src="IMAGES/giphy1.gif" alt="" />
                                                <?php }else{ ?>
                                                    <img class="card-img-top" src="IMAGES/PROJETS/<?php echo $donnee['image_projet']; ?>" alt="" />
                                                <?php } ?>
                                                </a>
                                                <div class="card-body">
                                                    <h4 class="card-title">
                                                        <a class="btn btn-md" href="voirprojet.php?id=<?php echo $donnee['id_projet']; ?>">
                                                            <?php
                                                                echo $donnee['titre_projet'];
                                                            ?>
                                                        </a>
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr />
                        <div class="inline-block">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">
                                        Collaborations
                                    </h4>
                                    <div class="row">
                                        <?php
                                            $requete2 = $bdd->prepare('SELECT projet.id_projet, image_projet, description_projet, titre_projet FROM collaborer, projet WHERE collaborer.id_projet = projet.id_projet AND collaborer.id_utilisateur = :id ORDER BY collaborer.id_projet DESC');

                                            $requete2->execute(array('id' => $_GET['id']));

                                            while($donnee = $requete2->fetch())
                                            {
                                        ?>
                                        <div class="col-lg-6 col-sm-6 mb-4">
                                            <span style="font-size:10px;" class="badge badge-primary badge-counter">
                                                <?php
                                                    echo likes_projet($donnee['id_projet']);
                                                ?>
                                                <i class="fas fa-fw fa-thumbs-up"></i>
                                            </span>
                                            <span style="font-size:10px;" class="badge badge-primary badge-counter">
                                                <?php
                                                    echo followers_projet($donnee['id_projet']);
                                                ?>
                                                <i class="fas fa-fw fa-users"></i>
                                            </span>
                                            <div class="card h-100" data-toggle="tooltip" data-placement="left" data-html="false" title='<?php echo $donnee['description_projet']; ?>'>
                                                <a href="#">
                                                <?php if($donnee['image_projet'] == ""){ ?>
                                                    <img class="card-img-top" src="IMAGES/giphy1.gif" alt="" />
                                                <?php }else{ ?>
                                                    <img class="card-img-top" src="IMAGES/PROJETS/<?php echo $donnee['image_projet']; ?>" alt="" />
                                                <?php } ?>
                                                </a>
                                                <div class="card-body">
                                                    <h4 class="card-title">
                                                        <button class="btn btn-md" href="#">
                                                            <?php
                                                                echo $donnee['titre_projet'];
                                                            ?>
                                                        </button>
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
    include "INCLUSION/footer.php";
?>