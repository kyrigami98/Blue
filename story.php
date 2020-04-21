<?php
include "INCLUSION/header.php";

?>

<div class="container-fluid" style="margin-top:50px; height:600px">
    <div class="card border-0 shadow my-5" style="height:570px">
        <div class="card-body">

            <div class="sidebar-brand-text mx-3 text-center">
                <div class="dropdown no-arrow mb-4">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-book"> Chapitre 1 </i> : la guerre des 100 lieux
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Chapitre 2 : la guerre des 100 lieux</a>
                        <a class="dropdown-item" href="#">Chapitre 3 : la guerre des 200 lieux</a>
                        <a class="dropdown-item" href="#">Chapitre 4 : la guerre des 300 lieux</a>
                    </div>
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

<?php
include "INCLUSION/footer.php";
?>