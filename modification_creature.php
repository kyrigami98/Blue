<?php
include "INCLUSION/header.php";

include "TRAITEMENT/connexion.php";

$requete = $bdd->prepare('SELECT * FROM creature WHERE id_creature = :id');

$requete->execute(array('id' => $_GET['id']));

$donnee = $requete->fetch();
?>

<div id="modification" class="row">
    <div class="col-lg-10 col-xl-9 mx-auto">
        <div class="card card-signin flex-row my-5" style="  background-color: rgba(0, 0, 10, 0.8);">
            <div class="card-img-left d-none d-md-flex" style="background-image: url('');">

                <form action="TRAITEMENT/modification.php" method="POST" enctype="multipart/form-data">
                    <div class="profile-img">
                        <br />
                        <?php if ($donnee['image_creature']) { ?>
                            <img class="avatar rounded img-fluid" src="IMAGES/CREATURES/<?php echo $donnee['image_creature']; ?>" alt="<?php echo $donnee['image_creature']; ?>"/>
						<?php }else{ ?>
                            <img class="avatar rounded img-fluid" src="IMAGES/PROFILS/STAND.jpg" alt="Image par defaut"/>
                        <?php } ?>
                                        <div class="file btn btn-lg btn-primary">
											<?php echo $donnee['nom_creature']; ?>
											<input type="file" name="image"  class="file-upload" required/>
										</div>
                        <input type="hidden" name="image" value="creature" />
                    </div>
                </form>


            </div>
            <div class="card-body">
                <h5 class="card-title text-center" style="color:White;">Modification</h5>
                <form class="form-signin" action="TRAITEMENT/modification.php" method="POST">

                    <div class="form-label-group">
                        <input type="text" id="creature" class="form-control" placeholder="titre du chapitre" name="nom" value="<?php echo $donnee['nom_creature']; ?>" required />
                        <label for="creature">Nom de la creature</label>
                    </div>
                    <div class="form-label-group">
                        <textarea type="text" id="description_creature" rows="7" class="form-control" placeholder="Description de la creature..." name="description"><?php echo $donnee['description_creature']; ?></textarea>
                    </div>
                    <hr>

                    <input type="hidden" name="modification" value="creature" />
                    <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Modifier</button>


                </form>
            </div>
        </div>
    </div>
</div>


<?php
include "INCLUSION/footer.php";
?>