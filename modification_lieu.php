<?php
include "INCLUSION/header.php";

include "TRAITEMENT/connexion.php";

$requete = $bdd->prepare('SELECT * FROM lieu WHERE id_lieu = :id');

$requete->execute(array('id' => $_GET['id']));

$donnee = $requete->fetch();
?>

<div id="modification" class="row">
    <div class="col-lg-10 col-xl-9 mx-auto">
        <div class="card card-signin flex-row my-5" style="background-color: rgba(0, 0, 10, 0.8);">
            <form class="form-signin row" action="TRAITEMENT/modification.php" method="POST" enctype="multipart/form-data">
                <div class="card-img-left d-none d-md-flex col-md-6" style="background-image: url('');">
                    <div class="profile-img">
                        <br />
                        <?php if($donnee['image_lieu'] != ""){ ?>
                            <img class="avatar rounded img-fluid" src="IMAGES/LIEUX/<?php echo $donnee['image_lieu']; ?>" alt="<?php echo $donnee['image_lieu']; ?>" />
                        <?php }else{ ?>
                            <img class="avatar rounded img-fluid" src="IMAGES/PROFILS/STAND.jpg" alt="image par defaut" />
                        <?php } ?>
                        <div class="file btn btn-lg btn-primary">
                            <?php echo $donnee['nom_lieu']; ?>
                            <input type="file" name="image" class="file-upload" />
                        </div>
                    </div>
                </div>
                <div class="card-body col-md-6">
                    <h5 class="card-title text-center" style="color:white;">
                        Modification
                    </h5>
                    <div class="form-label-group">
                        <input type="text" id="lieu" class="form-control" placeholder="nom du lieu" name="nom" value="<?php echo $donnee['nom_lieu']; ?>" required />
                        <label for="lieu">Nom du lieu</label>
                    </div>
                    <div class="form-label-group">
                        <textarea type="text" rows="7" class="form-control" placeholder="description du lieu..." name="description"><?php echo $donnee['description_lieu']; ?></textarea>
                    </div>
                    <hr />
                    <input type="hidden" name="modification" value="lieu" />
                    <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" />
                    <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Modifier</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
include "INCLUSION/footer.php";
?>