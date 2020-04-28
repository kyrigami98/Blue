<?php
include "INCLUSION/header.php";

include "TRAITEMENT/connexion.php";

$requete = $bdd->prepare('SELECT * FROM chapitre WHERE id_chapitre = :id');

$requete->execute(array('id' => $_GET['id']));

$donnee = $requete->fetch();
?>

<div class="container-fluid" style="margin-top:50px;">
    <div class="card border-0 shadow my-5">
        <div class="card-body">

            <div class="sidebar-brand-text mx-3">
                <div class="dropdown no-arrow mb-4">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-book"> Titre du chapitre </i> : <?php echo $donnee['titre_chapitre']; ?>
                    </button>
                    <?php
                        $requete2 = $bdd->query('SELECT * FROM chapitre');

                        while($donnee2 = $requete2->fetch())
                        {
                            if($donnee2['id_chapitre'] != $_GET['id'])
                            {
                    ?>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="story.php?id=<?php echo $donnee2['id_chapitre']; ?>">Titre du chapitre : <?php echo $donnee2['titre_chapitre']; ?></a>
                    </div>
                    <?php
                            }
                        }

                        $requete2->closeCursor();
                    ?>
                    <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#exampleModal">
                        <i class="fas fa-pen"> </i> Modifier plus d'informations
                    </button>

                </div>
            </div>

            <div class="container mt-4 mb-4 text-center">
                Resultats trouvés :
                <button class="btn btn-sm btn-primary" type="submit"><i class="fas fa-fw fa-plus"></i> Madara</button>
                <button class="btn btn-sm btn-success" type="submit"><i class="fas fa-fw fa-plus"></i> Man</button>
                <button class="btn btn-sm btn-info" type="submit"><i class="fas fa-fw fa-plus"></i> Maison de luxe</button>
                <button class="btn btn-sm btn-warning" type="submit"><i class="fas fa-fw fa-plus"></i> Tigre</button>
                <button class="btn btn-sm btn-danger" type="submit"><i class="fas fa-fw fa-plus"></i> personnage 1</button>
                <button class="btn btn-sm btn-primary" type="submit"><i class="fas fa-fw fa-plus"></i> personnage 2</button>
            </div>

            <div class="form-group">

                <div class="container mt-4 mb-4">
                    <div class="row justify-content-md-center">
                        <div class="col-md-12 col-lg-12">
                            <div class="form-group">
                                <textarea id="editor"><?php echo $donnee['texte_chapitre']; ?></textarea>
                            </div>
                        </div>
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
						<?php }else{ ?>
                            <img class="avatar rounded img-fluid" src="IMAGES/PROFILS/STAND.jpg" alt="Image par defaut" />
                        <?php } ?>				
                        <div class="file btn btn-lg btn-primary">
							Image du chapitre
							<input type="file" name="image"  class="file-upload"/>
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
<?php
include "INCLUSION/footer.php";
?>