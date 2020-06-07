<?php
include "INCLUSION/header.php";

include "TRAITEMENT/connexion.php";

$followers = followers_projet($_GET['id']);

$likes = likes_projet($_GET['id']);

$requete_projet = $bdd->prepare('SELECT titre_projet, image_projet, description_projet, image_utilisateur, nom_utilisateur, utilisateur.id_utilisateur FROM utilisateur, projet WHERE utilisateur.id_utilisateur = projet.id_utilisateur AND id_projet = :id');

$requete_projet->execute(array('id' => $_GET['id']));

$projet = $requete_projet->fetch();
?>


<div class="container" style="margin-top:50px;">
    <div class="card border-0 shadow my-5">
        <div class="card-body">
            <?php //die(var_dump($projet)); ?>
            <div class="" style="position: relative;">
                <div style="height: 100%; width: 100%; z-index:0;position:absolute; background: linear-gradient(to left, transparent, rgba(0,0,0,0.8));"></div>

                <div class="d-sm-flex align-items-center justify-content-start mb-4" style='min-height:300px;z-index:1; background-image: url("IMAGES/PROJETS/<?php echo $projet['image_projet']; ?>");background-repeat:no-repeat; background-size:cover;'>

                    <a class="nav-link nav-item" href="#" style="z-index:0;" data-toggle="modal" data-target="#imageReader">
                    <?php if($projet['image_projet'] == ""){ ?>
                        <img class="avatar rounded zoom" style="height:250px;" src="IMAGES/PROJETS/STAND.jpg" />
                    <?php }else{ ?>
                        <img class="avatar rounded zoom" style="height:250px;" src="IMAGES/PROJETS/<?php echo $projet['image_projet']; ?>" />
                    <?php } ?>
                    </a>

                    <div class="text-white" style="z-index:0;text-shadow: 2px 2px black;">

                        <div class="col-12">
                            <h1 class="font-weight-light text-white" style="text-shadow: 2px 2px black;">
                                <?php if (isset($projet['titre_projet'])) { ?>
                                    <?php echo $projet['titre_projet']; ?>
                                <?php } else { ?>
                                    <h1>Lire</h1>
                                <?php } ?>

                                <span style="font-size:13px;margin-right:10px;z-index:1;" class="badge badge-primary badge-counter"><?php if(isset($likes)){ echo $likes; }else{ echo 0;} ?> <i class="fas fa-fw fa-thumbs-up"></i></span>
                                <span style="font-size:13px; margin-right:10px;z-index:1;" class="badge badge-primary badge-counter"><?php if(isset($followers)){ echo $followers; }else{ echo 0;} ?> <i class="fas fa-fw fa-users"></i></span>

                            </h1>
                        </div>

                        <div class="col-12">
                            <?php if (isset($projet['description_projet'])) { ?>
                                <?php echo $projet['description_projet']; ?>
                            <?php } else { ?>
                                <h1>Pas de synopsis</h1>
                            <?php } ?>
                        </div>


                        <a class="btn" href="utilisateur.php?id=<?php echo $projet['id_utilisateur']; ?>">
                            <img class="img-profile rounded-circle user-photo" src="IMAGES/PROFILS/<?php echo $projet['image_utilisateur']; ?>" alt="<?php echo $projet['image_utilisateur']; ?>" />
                            Créer par <span class="mr-2 d-none d-lg-inline text-gray-600 small"><strong><?php echo $projet['nom_utilisateur']; ?></strong></span>
                        </a>
                        <br />
                        <hr class="" style="background:gray;">
                        <?php
                            if(isset($_SESSION['id']) AND $_SESSION['id'] != $projet['id_utilisateur'])
                            {
                                $requete_suivre = $bdd->prepare('SELECT * FROM suivre_projet WHERE id_projet = :projet AND id_abonne = :abonne');

                                $requete_suivre->execute(array('projet' => $_GET['id'], 'abonne' => $_SESSION['id']));

                                $suivre = $requete_suivre->fetch();

                                $requete_suivre->closeCursor();

                                $requete_aimer = $bdd->prepare('SELECT * FROM aimer_projet WHERE id_projet = :projet AND id_abonne = :abonne');

                                $requete_aimer->execute(array('projet' => $_GET['id'], 'abonne' => $_SESSION['id']));

                                $aimer = $requete_aimer->fetch();

                                $requete_aimer->closeCursor();
                        ?>
                        <div class="col-12">
                            <div class="row">
                                <div>
                                    <button class="btn btn-danger" <?php if($aimer == NULL){ echo "style='visibility:visible;position: absolute;width:150px;margin-right:5px;'"; }else{ echo "style='visibility:hidden;position: absolute;width:150px;margin-right:5px;'"; } ?> id="aimer_projet" onclick="aimer_projet();">
                                        <i class="fas fa-fw fa-thumbs-up"></i> J'aime
                                    </button>
                                    <button class="btn btn-danger" <?php if($aimer == NULL){ echo "style='visibility:hidden;width:150px;margin-right:5px;'"; }else{ echo "style='visibility:visible;width:150px;margin-right:5px;'"; } ?> id="ne_plus_aimer_projet" onclick="ne_plus_aimer_projet();">
                                        <i class="fas fa-fw fa-thumbs-down"></i> Je n'aime plus
                                    </button>
                                </div>
                                <div>
                                    <button class="btn btn-primary" <?php if($suivre == NULL){ echo "style='visibility:visible;position: absolute;width:160px;margin-right:5px;'"; }else{ echo "style='visibility:hidden;position: absolute;width:160px;margin-right:5px;'"; } ?> id="suivre_projet" onclick="suivre_projet();">
                                        <i class="fas fa-fw fa-plus"></i> Suivre le projet
                                    </button>
                                    <button class="btn btn-primary" <?php if($suivre == NULL){ echo "style='visibility:hidden;width:160px;margin-right:5px;'"; }else{ echo "style='visibility:visible;width:160px;margin-right:5px;'"; } ?> id="ne_plus_suivre_projet" onclick="ne_plus_suivre_projet();">
                                        <i class="fas fa-fw fa-minus"></i> Ne plus suivre
                                    </button>
                                </div>
                                <div>
                                    <a href="scanReader.php?id=<?php echo $_GET['id']; ?>" class="btn btn-success">
                                        <i class="fas fa-fw fa-book-reader"></i> Commencer la lecture
                                    </a>
                                </div>
                            </div>
                        </div>
                        <?php 
                            }
                            elseif(isset($_SESSION['id']) AND $_SESSION['id'] == $projet['id_utilisateur'])
                            {
                                echo "Vous pouvez voir ce projet dans l'atelier";
                        ?>
                                <form action="TRAITEMENT/atelier_systeme.php" method="POST">
								    <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" />
								    <input type="hidden" name="formulaire" value="projet" />
								    <h5 class="card-title"><button class="btn btn-md btn-secondary" href="#" >Ouvrir dans l'atelier</button></h5>
							    </form>
                        <?php 
                            }
                            else
                            {
                                echo "Connectez-vous pour suivre ce projet";
                            }
                        ?>
                        </hr>
                    </div>

                </div>


            </div>
            <div class="row">

                <!-- Content Column -->
                <div class="col-lg-4 mb-4">

                    <!-- Project Card Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Liste des chapitres </h6>
                        </div>
                        <div class="card-body">
                            <?php
                                $requete_chapitre = $bdd->prepare('SELECT id_chapitre, titre_chapitre FROM chapitre, (SELECT id_tome FROM tome WHERE id_projet = :id)resultat WHERE chapitre.id_tome = resultat.id_tome');
                            
                                $requete_chapitre->execute(array('id' => $_GET['id']));

                                $count = 0;
								
								$existe = false;
								
                                while($chapitre = $requete_chapitre->fetch())
                                {
                            ?>
                                <?php if(isset($_SESSION['id_projet']) AND $_SESSION['id_projet'] == $_GET['id']){ ?>
									<a class="btn" rel="nofollow" href="story.php?id=<?php echo $chapitre['id_chapitre']; ?>"><strong>Chapitre <?php echo ++$count; ?>:</strong> <?php echo $chapitre['titre_chapitre']; ?> →</a>
                                <?php }else{ ?>    
                                    <a class="btn" rel="nofollow" href="#"><strong>Chapitre <?php echo ++$count; ?>:</strong> <?php echo $chapitre['titre_chapitre']; ?> →</a>
                                <?php } ?>
                                    <hr>
                            <?php
									$existe = true;
                                }
								
								if($existe == false)
								{
									echo "Aucun chapitre n'est disponible actuellement...<br /><br />";
								}
								
                                $requete_chapitre->closeCursor();
                            ?>

                            <a class="btn btn-block btn-primary" rel="nofollow" href="#">Voir plus →</a>
                        </div>
                    </div>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Mots techniques du projet</h6>
                        </div>

                        <div class="card-body">
                            <?php
								$requete_terme = $bdd->prepare('SELECT terme.id_terme, nom_terme, description_terme FROM terme, citer WHERE terme.id_terme = citer.id_terme AND citer.id_projet = :id ORDER BY id_terme DESC');
                            
                                $requete_terme->execute(array('id' => $_GET['id']));

                                $count = 0;
								
								$existe = false;;

                                while($terme = $requete_terme->fetch())
                                {
                            ?>
                            <div class="col-lg-12 mb-4">
                                <div class="card shadow">
                                    <div class="card-body">
                                    <strong> <?php echo $terme['nom_terme']; ?></strong>
                                        <div class="small"><?php echo $terme['description_terme']; ?></div>
                                    </div>
                                </div>
                            </div>

                            <?php
									$existe = true;
                                }

								if($existe == false)
								{
									echo "Aucun mot technique n'est disponible actuellement...<br /><br />";
								}

                                $requete_terme->closeCursor();
                            ?>
                            <a class="btn btn-block btn-primary" rel="nofollow" href="#">Voir plus →</a>
                        </div>

                    </div>

                </div>

                <div class="col-lg-8 mb-4">

                    <!-- Illustrations -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Illustrations</h6>
                        </div>
                        <div class="card-body">
                            <div class="text-center">
                                <div class="row">
                                    <div class="card-columns">
                                    <?php
                                        $requete_illustration = $bdd->prepare('SELECT * FROM illustration WHERE id_projet = :id ORDER BY id_illustration DESC');

                                        $requete_illustration->execute(array('id' => $_GET['id']));
											
										$existe = false;
										
                                        while($illustration = $requete_illustration->fetch())
                                        {
                                    ?>
                                        <a href="#" data-toggle="modal" data-target="#imageReader">
                                            <img class="img-fluid card zoom" style="width: 25rem;" src="IMAGES/ILLUSTRATIONS/<?php echo $illustration['image_illustration']; ?>" data-toggle="tooltip" data-placement="left" data-html="false" title='<?php echo $illustration['description_illustration']; ?>' alt="">
                                        </a>
                                    <?php
											$existe = true;
                                        }        
										
										if($existe == false)
										{
											echo "Aucune illustration";
										}
										
                                        $requete_illustration->closeCursor();
                                    ?>
                                    </div>
                                    <a class="btn btn-block btn-primary" rel="nofollow" href="#">Voir plus →</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Personnages -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Personnages</h6>
                        </div>
                        <div class="card-body">
                            <div class="text-center">
                                <div class="row">
                                    <div class="card-columns">
                                        <?php
                                            $requete_personnage = $bdd->prepare('SELECT personnage.id_personnage, nom_personnage, description_personnage, image_personnage FROM personnage, intervenir WHERE personnage.id_personnage = intervenir.id_personnage AND intervenir.id_projet = :id ORDER BY id_personnage DESC');

                                            $requete_personnage->execute(array('id' => $_GET['id']));

											$existe = false;

                                            while($personnage = $requete_personnage->fetch())
                                            {
                                        ?>
                                        <a href="#" data-toggle="modal" data-target="#imageReader">
                                            <img class="img-fluid card zoom" style="width: 25rem;" src="IMAGES/PERSONNAGES/<?php echo $personnage['image_personnage']; ?>" data-toggle="tooltip" data-placement="left" data-html="false" title='<?php echo $personnage['description_personnage']; ?>' alt="">
                                        </a>
                                        <?php
												$existe = true;
                                            }
											
											if($existe == false)
											{
												echo "Aucun personnage";
											}
											
                                            $requete_personnage->closeCursor();
                                        ?>
                                    </div>
                                    <a class="btn btn-block btn-primary" rel="nofollow" href="#">Voir plus →</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Créatures -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Créatures</h6>
                        </div>
                        <div class="card-body">
                            <div class="text-center">
                                <div class="row">
                                    <div class="card-columns">
                                        <?php
                                            $requete_creature = $bdd->prepare('SELECT creature.id_creature, nom_creature, description_creature, image_creature FROM creature, apparaitre WHERE creature.id_creature = apparaitre.id_creature AND apparaitre.id_projet = :id ORDER BY id_creature DESC');

                                            $requete_creature->execute(array('id' => $_GET['id']));

											$existe = false;

                                            while($creature = $requete_creature->fetch())
                                            {
                                        ?>
                                        <a href="#" data-toggle="modal" data-target="#imageReader">
                                            <img class="img-fluid card zoom" style="width: 25rem;" src="IMAGES/CREATURES/<?php echo $creature['image_creature']; ?>" data-toggle="tooltip" data-placement="left" data-html="false" title='<?php echo $creature['description_creature']; ?>' alt="">
                                        </a>
                                        <?php
												$existe = true;
                                            }
											
											if($existe == false)
											{
												echo "Aucune creature";
											}
											
                                            $requete_creature->closeCursor();
                                        ?>
                                    </div>
                                    <a class="btn btn-block btn-primary" rel="nofollow" href="#">Voir plus →</a>
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