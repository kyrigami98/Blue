<?php
include "INCLUSION/header.php";

include "TRAITEMENT/connexion.php";

if(!isset($_SESSION['pseudo']))
{
    header('Location: index.php');
}

$requete = $bdd->prepare('SELECT * FROM chapitre WHERE id_chapitre = :id');

$requete->execute(array('id' => $_GET['id']));

$donnee = $requete->fetch();

?>

<div class="container-fluid" style="margin-top:50px;">
    <div class="card border-0 shadow my-5">
        <div class="card-body">

            <div class="" style="position: relative;">
                <div style="height: 100%; width: 100%; z-index:0;position:absolute; background: linear-gradient(to left, transparent, rgba(0,0,0,0.8));"></div>

                <div class="d-sm-flex align-items-center justify-content-between mb-4" style='z-index:1;background-image: url("IMAGES/CHAPITRES/<?php echo $donnee['image_chapitre']; ?>");background-repeat:no-repeat; background-size:cover;'>
                    <a class="nav-link nav-item" href="#" style=" z-index:1;">
                        <h1 class="font-weight-light text-white" style="text-shadow: 2px 2px black;">
                            <?php if (isset($_SESSION['titre_projet'])) { 
									if(isset($_SESSION['image_projet'])) {
							?>
                                <img class="avatar rounded img-fluid" style="height:60px;" src="IMAGES/PROJETS/<?php echo $_SESSION['image_projet']; ?>" />
                            <?php 
									}
									else
									{
										
									}
									echo $_SESSION['titre_projet']; ?>
                            <?php } else { ?>
                                <h1>Atelier</h1>
                            <?php } ?>
                        </h1>
                    </a>

                    <div class="sidebar-brand-text">
                        <div class="dropdown no-arrow ">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-book"> Titre du chapitre </i> : <?php echo $donnee['titre_chapitre']; ?>
                            </button>
                            <?php
                            $requete2 = $bdd->query('SELECT * FROM chapitre');

                            while ($donnee2 = $requete2->fetch()) {
                                if ($donnee2['id_chapitre'] != $_GET['id']) {
                            ?>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="story.php?id=<?php echo $donnee2['id_chapitre']; ?>">Titre du chapitre : <?php echo $donnee2['titre_chapitre']; ?></a>
                                    </div>
                            <?php
                                }
                            }

                            $requete2->closeCursor();
                            ?>

                        </div>
                    </div>

                    <button style=" z-index:1;" type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#exampleModal">
                        <i class="fas fa-pen"> </i> Modifier plus d'informations
                    </button>
                </div>
            </div>
        </div>


        <div class="profile-head container">
            <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">
                        <i class="fas fa-feather"></i> Ecrire mon histoire
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
                        <i class="fab fa-accusoft"> </i> Ajouter des planches
                    </a>
                </li>
            </ul>
        </div>

        <div class="row">
            <div class="tab-content profile-tab container" id="myTabContent">

                <!-- ecriture -->
                <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <br>

                    <div class="container text-center" id="tags">
                        <!--<button class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" data-html="true" title='<img class="avatar rounded img-fluid" style="height:60px;" src="IMAGES/radiant.jpg" />
                        <hr><span>
                        Madara Uchiha (うちはマダラ, Uchiha Madara) was the legendary leader of the Uchiha clan. He founded Konohagakure alongside his childhood friend and rival, Hashirama Senju, with the intention of beginning an era of peace. ... Madara, however, rewrote his death and went into hiding to work on his own plans.
                        </span>
                        <hr>' type="submit"><i class="fas fa-user-ninja fa-plus"></i> Madara
                        </button>

                        <button class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" data-html="true" title='<img class="avatar rounded img-fluid" style="height:60px;" src="IMAGES/radiant.jpg" />' type="submit"><i class="fas fa-fw fa-dragon"></i> Illustration </button>

                        <button class="btn btn-sm btn-info" data-toggle="tooltip" data-placement="top" data-html="true" title='<img class="avatar rounded img-fluid" style="height:60px;" src="IMAGES/radiant.jpg" />' type="submit"><i class="fas fa-fw  fa-globe-africa"></i> Maison de luxe</button>

                        <button class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="top" data-html="true" title='<img class="avatar rounded img-fluid" style="height:60px;" src="IMAGES/radiant.jpg" />' type="submit"><i class="fas fa-fw fa-paw"></i> Tigre</button>

                        <button class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" data-html="true" title='<img class="avatar rounded img-fluid" style="height:60px;" src="IMAGES/radiant.jpg" />' type="submit"><i class="fas fa-fw fa-list-alt"></i> Haki</button>-->

                    </div>

                    <div class="form-group">

                        <div class="mt-4 mb-4">
                            <div class="row justify-content-md-center">
                                <div class="col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <textarea id="editor" rows="10" cols="120"><?php echo $donnee['texte_chapitre']; ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

                <!-- planches -->
                <div class="tab-pane fade container" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <br>
                    <div class="row">

                        <div class="col-md-2">
                            <form action="TRAITEMENT/systeme.php" method="POST" enctype="multipart/form-data">
                                <div class="profile-img">
                                    <img class="avatar rounded img-fluid" src="IMAGES/PROFILS/STAND.jpg" alt="Image par defaut" />

                                    <div class="file btn btn-lg btn-primary">
                                        Choisir
                                        <input type="file" name="image" class="file-upload" required />
                                    </div>
                                    <div class="form-label-group">
                                        <input type="number" value="0" min="0" id="inputProjet" class="form-control" placeholder="" name="page" required>
                                        <label for="inputProjet">Numéro de page</label>
                                    </div>
									<input type="hidden" name="id_chapitre" value="<?php echo $_GET['id']; ?>" />
                                    <input type="hidden" name="formulaire" value="planche" />
                                    <button class="btn btn-sm btn-primary btn-block" type="submit">
                                        <i class="fa fa-plus"></i>
                                        Importer
                                    </button>
                                    <br />
                                </div>
                            </form>
                        </div>
						<?php 
							$requete2 = $bdd->prepare('SELECT id_planche, image_planche, numero_planche FROM planche WHERE id_chapitre = :id ORDER BY numero_planche');
							
							$requete2->execute(array('id' => $_GET['id']));
							
							$existe = false;
							
							while($donnee2 = $requete2->fetch())
							{
						?>
                        <div class="col-md-2 align-self-center post rounded">
                            <img class="avatar rounded zoomer img-fluid border border-info" style="max-height:320px;" src="IMAGES/PLANCHES/<?php echo $donnee2['image_planche'] ?>" alt="Image par defaut" />
                            <p class="text-muted text-center">Page <?php echo $donnee2['numero_planche']; ?></p>
                            <form action="TRAITEMENT/supprimer.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $donnee2['id_planche']; ?>" />
                                <input type="hidden" name="supprimer" value="planche" />
                                <button type="submit" class="btn btn-danger btn-circle shadow-lg deleteboutton">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </div>
						<?php
								$existe = true;
							}
							
							if($existe == false)
							{
								echo "Aucune plance n'est disponible actuellement...";
							}
							
							$requete2->closeCursor();
						?>


                    </div>

                    <br>
                </div>
            </div>

        </div>


    </div>
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="card-img-left d-none d-md-flex" style="background-image: url('');">

                <form action="TRAITEMENT/modifier_chapitre.php" method="POST" enctype="multipart/form-data">
                    <div class="profile-img">
                        <br />
                        <?php
                        if ($donnee['image_chapitre']) { ?>
                            <img class="avatar rounded img-fluid" src="IMAGES/CHAPITRES/<?php echo $donnee['image_chapitre']; ?>" alt="<?php echo $donnee['image_chapitre']; ?>" />
                        <?php } else { ?>
                            <img class="avatar rounded img-fluid" src="IMAGES/PROFILS/STAND.jpg" alt="Image par defaut" />
                        <?php } ?>
                        <div class="file btn btn-lg btn-primary">
                            Image du chapitre
                            <input type="file" name="image" class="file-upload" />
                        </div>
                        <input type="hidden" name="formulaire" value="image" />
                        <div class="form-label-group">
                            <input type="text" id="chapitre" class="form-control" placeholder="titre du chapitre" name="titre" value="<?php echo $donnee['titre_chapitre']; ?>" required />
                            <label for="chapitre">Titre du Chapitre</label>
                        </div>
                        <div class="form-label-group">
                            <textarea type="text" id="description_chapitre" rows="7" class="form-control" placeholder="Description du chapitre..." name="description"><?php echo $donnee['description_chapitre']; ?></textarea>
                        </div>
                        <input type="hidden" name="chapitre" value="infos" />
                        <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" />
                        <hr>

                        <input type="hidden" name="formulaire" value="inscription" />
                        <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Modifier</button>


                    </div>
                </form>


            </div>

        </div>
    </div>
</div>

<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

<?php
include "INCLUSION/footer.php";
?>