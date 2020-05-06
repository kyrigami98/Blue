<?php
include "INCLUSION/header.php";
?>


<div class="container" style="margin-top:50px;">
    <div class="card border-0 shadow my-5">
        <div class="card-body">

            <div class="" style="position: relative;">
                <div style="height: 100%; width: 100%; z-index:0;position:absolute; background: linear-gradient(to left, transparent, rgba(0,0,0,0.8));"></div>

                <div class="d-sm-flex align-items-center justify-content-start mb-4" style='min-height:300px;z-index:1; background-image: url("IMAGES/PROFILS/<?php echo $_SESSION['image']; ?>");background-repeat:no-repeat; background-size:cover;'>

                    <a class="nav-link nav-item" href="#" style="z-index:0;" data-toggle="modal" data-target="#imageReader">
                        <img class="avatar rounded zoom" style="height:250px;" src="IMAGES/radiant.jpg" />
                    </a>

                    <div class="text-white" style="z-index:0;text-shadow: 2px 2px black;">

                        <div class="col-12">
                            <h1 class="font-weight-light text-white" style="text-shadow: 2px 2px black;">
                                <?php if (isset($_SESSION['titre_projet'])) { ?>
                                    <?php echo $_SESSION['titre_projet']; ?>
                                <?php } else { ?>
                                    <h1>Lire</h1>
                                <?php } ?>

                                <span style="font-size:13px;margin-right:10px;z-index:1;" class="badge badge-primary badge-counter"><?php echo $_SESSION['likes']; ?> <i class="fas fa-fw fa-thumbs-up"></i></span>
                                <span style="font-size:13px; margin-right:10px;z-index:1;" class="badge badge-primary badge-counter"><?php echo $_SESSION['followers']; ?> <i class="fas fa-fw fa-users"></i></span>

                            </h1>
                        </div>

                        <div class="col-12">
                            <?php if (isset($_SESSION['synopsis'])) { ?>
                                <?php echo $_SESSION['synopsis']; ?>
                            <?php } else { ?>
                                <h1>Pas de synopsis</h1>
                            <?php } ?>
                        </div>


                        <a class="btn" href="#">
                            <img class="img-profile rounded-circle user-photo" src="IMAGES/PROFILS/<?php echo $_SESSION['image']; ?>" />
                            Créer par <span class="mr-2 d-none d-lg-inline text-gray-600 small"><strong><?php echo $_SESSION['pseudo']; ?></strong></span>
                        </a>
                        <br />
                        <hr class="" style="background:gray;">


                        <div class="col-12">
                            <a href="#" class="btn btn-danger">
                                <i class="fas fa-fw fa-thumbs-up"></i> J'aime
                            </a>
                            <a href="#" class="btn btn-primary">
                                <i class="fas fa-fw fa-plus"></i> Suivre le projet
                            </a>

                            <a href="#" class="btn btn-lg btn-success pull-right">
                                <i class="fas fa-fw fa-book-reader"></i> Commencer la lecture
                            </a>
                        </div>
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
                            <a class="btn" rel="nofollow" href="#"><strong>Chapitre 3:</strong> Anarchie →</a>
                            <hr>
                            <a class="btn" rel="nofollow" href="#"><strong> Chapitre 2:</strong> Monarchie →</a>
                            <hr>
                            <a class="btn" rel="nofollow" href="#"><strong> Chapitre 1:</strong> Subarashi →</a>
                            <hr>

                            <a class="btn btn-block btn-primary" rel="nofollow" href="#">Voir plus →</a>
                        </div>
                    </div>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Mots techniques du projet</h6>
                        </div>

                        <div class="card-body">
                            <div class="col-lg-12 mb-4">
                                <div class="card shadow">
                                    <div class="card-body">
                                    <strong> haki</strong>
                                        <div class="small">Le Haki (覇気, Haki, traduit littéralement par "Ambition"), aussi nommé Fluide, est un concept mystérieux que certains personnages peuvent utiliser. Il est présent ...</div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 mb-4">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <strong>bankai</strong>
                                        <div class="small">Si le Shinigami remporte le combat, son Zanpakutō lui donne accès à ses pouvoirs cachés via son vrai nom. Atteindre le Bankai est rare et même une fois obtenu, ...</div>
                                    </div>
                                </div>
                            </div>
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
                                        <a href="#" data-toggle="modal" data-target="#imageReader">
                                            <img class="img-fluid card zoom" style="width: 25rem;" src="IMAGES/radiant.jpg" data-toggle="tooltip" data-placement="left" data-html="false" title='<?php echo 'ok'; ?>' alt="">
                                        </a>
                                        <a href="#" data-toggle="modal" data-target="#imageReader">
                                            <img class="img-fluid card zoom" style="width: 25rem;" src="IMAGES/giphy.gif" data-toggle="tooltip" data-placement="left" data-html="false" title='<?php echo 'ok'; ?>' alt="">
                                        </a>
                                        <a href="#" data-toggle="modal" data-target="#imageReader">
                                            <img class="img-fluid card zoom" style="width: 25rem;" src="IMAGES/hammer.jpg" data-toggle="tooltip" data-placement="left" data-html="false" title='<?php echo 'ok'; ?>' alt="">
                                        </a>

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
                                        <a href="#" data-toggle="modal" data-target="#imageReader">
                                            <img class="img-fluid card zoom" style="width: 25rem;" src="IMAGES/radiant.jpg" data-toggle="tooltip" data-placement="left" data-html="false" title='<?php echo 'ok'; ?>' alt="">
                                        </a>
                                        <a href="#" data-toggle="modal" data-target="#imageReader">
                                            <img class="img-fluid card zoom" style="width: 25rem;" src="IMAGES/giphy.gif" data-toggle="tooltip" data-placement="left" data-html="false" title='<?php echo 'ok'; ?>' alt="">
                                        </a>
                                        <a href="#" data-toggle="modal" data-target="#imageReader">
                                            <img class="img-fluid card zoom" style="width: 25rem;" src="IMAGES/hammer.jpg" data-toggle="tooltip" data-placement="left" data-html="false" title='<?php echo 'ok'; ?>' alt="">
                                        </a>
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
                                        <a href="#" data-toggle="modal" data-target="#imageReader">
                                            <img class="img-fluid card zoom" style="width: 25rem;" src="IMAGES/radiant.jpg" data-toggle="tooltip" data-placement="left" data-html="false" title='<?php echo 'ok'; ?>' alt="">
                                        </a>
                                        <a href="#" data-toggle="modal" data-target="#imageReader">
                                            <img class="img-fluid card zoom" style="width: 25rem;" src="IMAGES/giphy.gif" data-toggle="tooltip" data-placement="left" data-html="false" title='<?php echo 'ok'; ?>' alt="">
                                        </a>
                                        <a href="#" data-toggle="modal" data-target="#imageReader">
                                            <img class="img-fluid card zoom" style="width: 25rem;" src="IMAGES/hammer.jpg" data-toggle="tooltip" data-placement="left" data-html="false" title='<?php echo 'ok'; ?>' alt="">
                                        </a>

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