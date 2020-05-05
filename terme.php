<?php

include "INCLUSION/header.php";

include "INCLUSION/redirection1.php";

include "TRAITEMENT/connexion.php";

$requete = $bdd->prepare('SELECT * FROM terme WHERE id_terme = :id');

$requete->execute(array('id' => $_GET['id']));

$donnee = $requete->fetch();
?>

<div id="modification" class="row">
    <div class="col-lg-10 col-xl-9 mx-auto">
        <div class="card card-signin flex-row my-5" style="  background-color: rgba(0, 0, 10, 0.8);">
            <div class="card-body">
                <h5 class="card-title text-center" style="color:White;">Modification</h5>
                <form class="form-signin" action="TRAITEMENT/modification.php" method="POST">

                    <div class="form-label-group">
                        <input type="text" id="terme" class="form-control" placeholder="terme" name="nom" value="<?php echo $donnee['nom_terme']; ?>" required />
                        <label for="terme">Terme</label>
                    </div>
                    <div class="form-label-group">
                        <textarea type="text" id="description_terme" rows="7" class="form-control" placeholder="Description du terme..." name="description"><?php echo $donnee['description_terme']; ?></textarea>
                    </div>
                    <hr>

                    <input type="hidden" name="modification" value="terme" />
                    <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" />
                    <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Modifier</button>


                </form>
            </div>
        </div>
    </div>
</div>


<?php
include "INCLUSION/footer.php";
?>