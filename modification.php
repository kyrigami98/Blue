<?php
include "INCLUSION/header.php";

?>

<div id="inscription" class="row">
    <div class="col-lg-10 col-xl-9 mx-auto">
        <div class="card card-signin flex-row my-5" style="  background-color: rgba(0, 0, 10, 0.8);">
            <div class="card-img-left d-none d-md-flex" style="background-image: url('');">

                <form action="DATABASE/systeme.php" method="POST" enctype="multipart/form-data">
                    <div class="profile-img">
                        <br />
                        <?php
                        if ($_SESSION['image']) {
                            echo "<img class=\"avatar rounded img-fluid\" src=\"IMAGES/PROFILS/" . $_SESSION['image'] . "\" alt=\"" . $_SESSION['image'] . "\"/>
										<div class=\"file btn btn-lg btn-primary\">
											Photo de Profil
											<input type=\"file\" name=\"image\"  class=\"file-upload\" required/>
										</div>";
                        } else {
                            echo "<img class=\"avatar rounded img-fluid\" src=\"IMAGES/PROFILS/STAND.jpg\" alt=\"Image par defaut\"/>
										<div class=\"file btn btn-lg btn-primary\">
											Photo de Profil
											<input type=\"file\" name=\"image\"  class=\"file-upload\" required/>
										</div>";
                        }
                        ?>
                        <input type="hidden" name="formulaire" value="image" />
                    </div>
                </form>


            </div>
            <div class="card-body">
                <h5 class="card-title text-center" style="color:White;">Modification</h5>
                <form class="form-signin" action="DATABASE/systeme.php" method="POST">

                    <div class="form-label-group">
                        <input type="text" id="chapitre" class="form-control" placeholder="titre du chapitre" name="nom" required />
                        <label for="chapitre">Titre du Chapitre</label>
                    </div>
                    <div class="form-label-group">
                        <textarea type="text" id="description_chapitre" rows="7" class="form-control" placeholder="Description du chapitre..." name="description"></textarea>
                    </div>
                    <input type="hidden" name="formulaire" value="chapitre" />
                    <hr>

                    <input type="hidden" name="formulaire" value="inscription" />
                    <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Modifier</button>


                </form>
            </div>
        </div>
    </div>
</div>


<?php
include "INCLUSION/footer.php";
?>