<?php
include "INCLUSION/header.php";

?>

<div class="container-fluid" style="margin-top:50px;">
    <div class="card border-0 shadow my-5">
        <div class="card-body">

            <div class="sidebar-brand-text mx-3">
                <div class="dropdown no-arrow mb-4">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-book"> Chapitre 1 </i> : la guerre des 100 lieux
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Chapitre 2 : la guerre des 100 lieux</a>
                        <a class="dropdown-item" href="#">Chapitre 3 : la guerre des 200 lieux</a>
                        <a class="dropdown-item" href="#">Chapitre 4 : la guerre des 300 lieux</a>
                    </div>

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
                                <textarea id="editor"></textarea>
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


                    </div>
                </form>


            </div>

        </div>
    </div>
</div>
<?php
include "INCLUSION/footer.php";
?>