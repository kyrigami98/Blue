<?php
include("TRAITEMENT/connexion.php");
?>

<header>

    <!--Carousel Wrapper-->
    <div id="carousel-example-2" class="carousel slide carousel-fade z-depth-1-half" data-ride="carousel" style="position: relative;">
        <!--Indicators-->
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-2" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-2" data-slide-to="1"></li>
            <li data-target="#carousel-example-2" data-slide-to="2"></li>
        </ol>
        <!--/.Indicators-->
        <!--Slides-->
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">

                <div class="view">

                    <div style="height: 100%; width: 100%; z-index:1;position:absolute; background: linear-gradient(transparent, rgba(0,0,0,1));"></div>

                    <img class="imageCarousel" src="https://images4.alphacoders.com/698/thumb-1920-698782.jpg" alt="First slide">

                    <div class="mask rgba-black-light"></div>
                </div>

                <div class="carousel-caption" style="top:30%;">

                    <div class="container text-center">
                        <h1 class="mt-5 text-white font-weight-light">
                            <img src="IMAGES/MASCOTTES/masaoborder.png" height="50px">
                            <strong>Bienvenue dans l'imaginium delirium</strong>
                            <img src="IMAGES/MASCOTTES/mizuiroborder.png" height="50px">
                        </h1>
                        <p class="lead text-white-50">La logique vous mènera d’un point A à un point B. L’imagination vous emmènera où vous voulez.</p>
                    </div>
                </div>

            </div>

            <div class="carousel-item">

                <div style="height: 100%; width: 100%; z-index:1;position:absolute; background: linear-gradient(transparent, rgba(0,0,0,1));"></div>

                <!--Mask color-->
                <div class="view">
                    <img class="imageCarousel" src="https://i.pinimg.com/originals/c2/12/5d/c2125d45fb26547200b4ef8086d8892c.jpg" alt="Second slide">
                    <div class="mask rgba-black-light"></div>
                </div>
                <div class="carousel-caption" style="top:30%;">

                    <div class="container text-center">
                        <h1 class="mt-5 text-white font-weight-light">
                            <img src="IMAGES/MASCOTTES/masaoborder.png" height="50px">
                            <strong>Bienvenue dans l'imaginium delirium</strong>
                            <img src="IMAGES/MASCOTTES/mizuiroborder.png" height="50px">
                        </h1>
                        <p class="lead text-white-50">La logique vous mènera d’un point A à un point B. L’imagination vous emmènera où vous voulez.</p>
                    </div>
                </div>
            </div>

            <div class="carousel-item">

                <div style="height: 100%; width: 100%; z-index:1;position:absolute; background: linear-gradient(transparent, rgba(0,0,0,1));"></div>

                <!--Mask color-->
                <div class="view">
                    <img class="imageCarousel" src="https://www.xtrafondos.com/en/descargar.php?id=3219&resolucion=1280x768" alt="Third slide">
                    <div class="mask rgba-black-light"></div>
                </div>
                <div class="carousel-caption" style="top:30%;">

                    <div class="container text-center">
                        <h1 class="mt-5 text-white font-weight-light">
                            <img src="IMAGES/MASCOTTES/masaoborder.png" height="50px">
                            <strong>Bienvenue dans l'imaginium delirium</strong>
                            <img src="IMAGES/MASCOTTES/mizuiroborder.png" height="50px">
                        </h1>
                        <p class="lead text-white-50">La logique vous mènera d’un point A à un point B. L’imagination vous emmènera où vous voulez.</p>
                    </div>
                </div>
            </div>

        </div>
        <!--/.Slides-->
        <!--Controls-->
        <a class="carousel-control-prev" href="#carousel-example-2" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon rounded-circle btn btn-lg blue-bg-primary" style="padding:30px;" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carousel-example-2" role="button" data-slide="next">
            <span class="carousel-control-next-icon rounded-circle btn btn-lg blue-bg-primary" style="padding:30px;" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        <!--/.Controls-->
    </div>
    <!--/.Carousel Wrapper-->

</header>


<div class="container-fluid card-central" style="position:absolute; top:55%;z-index:50;">


    <div class="card border-0 shadow">
        <div class="profile-head">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="projets_edites-tab" data-toggle="tab" href="#projets_edites" role="tab" aria-controls="projets_edites" aria-selected="false">
                        <b>PROJETS EDITES </b>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " id="nouveaute-tab" data-toggle="tab" href="#nouveaute" role="tab" aria-controls="nouveaute" aria-selected="true">
                        <b> NOUVEAUTES </b>
                    </a>
                </li>
            </ul>
        </div>

        <div class="card-body">

            <div class="col-md-12">

                <div class="tab-content nouveaute-tab" id="myTabContent">

                    <div class="tab-pane fade show" id="nouveaute" role="tabpanel" aria-labelledby="nouveaute-tab">

                        <div class="card-columns">
                            <?php
                            //LIMIT 6
                            $requete = $bdd->query('SELECT id_projet, image_projet, projet.id_utilisateur, titre_projet, description_projet, image_utilisateur, nom_utilisateur FROM projet, utilisateur WHERE visibilite = "public" AND projet.id_utilisateur = utilisateur.id_utilisateur ORDER BY id_projet DESC');
                            while ($donnee = $requete->fetch()) {
                                $requete_modif = $bdd->prepare('SELECT date_modif FROM historique WHERE id_projet = :id ORDER BY date_modif DESC LIMIT 1');

                                $requete_modif->execute(array('id' => $donnee['id_projet']));

                                $date = $requete_modif->fetch();
                            ?>



                                <div class="card mb-3 post shadow" data-toggle="tooltip" data-placement="left" data-html="false" title='<?php echo date("d F Y à h:i", strtotime($date['date_modif'])); ?>'>


                                    <?php if ($donnee['image_projet'] == NULL) { ?>
                                        <img class="card-img-top" src="IMAGES/PROJETS/STAND.jpg" alt="" data-toggle="modal" data-target="#imageReader">
                                    <?php     } else { ?>
                                        <img class="card-img-top" src="IMAGES/PROJETS/<?= $donnee['image_projet'] ?>" alt="<?= $donnee['image_projet'] ?>" data-toggle="modal" data-target="#imageReader">
                                    <?php     } ?>

                                    <div class="card-body">
                                        <span style="position: absolute;top:4px;right:8px;">
                                            <span style="font-size:10px;" class="badge badge-primary badge-counter">
                                                <?php
                                                echo likes_projet($donnee['id_projet']);
                                                ?>
                                                <i class="fas fa-fw fa-thumbs-up"></i>
                                            </span>
                                            <span style="font-size:10px;" class="badge badge-primary badge-counter">
                                                <?php
                                                echo followers_projet($donnee['id_projet']);
                                                ?>
                                                <i class="fas fa-fw fa-users"></i>
                                            </span>
                                        </span>
                                        <h5 class="card-title">
                                            <?= $donnee['titre_projet']; ?>

                                            <span class="text-gray-400 badge badge-light" style="">
                                                <a class="collapse-item" href="utilisateur.php?id=<?php echo $donnee['id_utilisateur']; ?>">
                                                    <span style="font-size:10px, color:gray;font-style:italic"><?= "par " . $donnee['nom_utilisateur']; ?></span>
                                                </a>
                                            </span>
                                        </h5>
                                        <p class="card-text" style="font-size:15px;">
                                            <?= empty($donnee['description_projet']) ? "" : substr($donnee['description_projet'], 0, 100) . "..." ?>
                                        </p>

                                        <p class="card-text">
                                            <?php if (isset($_SESSION['id']) and $_SESSION['id'] == $donnee['id_utilisateur']) { ?>
                                                <h5 class="card-title"><a class="btn btn-md btn-block btn-success" href="voirprojet.php?id=<?php echo $donnee['id_projet']; ?>"><strong>Voir le projet</strong></a></h5>
                                                <h5 class="card-title">
                                                    <form action="TRAITEMENT/atelier_systeme.php" method="POST">
                                                        <input type="hidden" name="id" value="<?php echo $donnee['id_projet']; ?>" />
                                                        <input type="hidden" name="formulaire" value="projet" />
                                                        <button class="btn btn-md btn-block btn-primary"><strong>Modifier le projet</strong></button>
                                                    </form>
                                                </h5>
                                            <?php } else { ?>
                                                <a class="btn btn-md btn-block btn-primary" href="voirprojet.php?id=<?php echo $donnee['id_projet']; ?>"><strong>Voir le projet</strong></a>
                                            <?php } ?>
                                        </p>
                                    </div>
                                </div>

                            <?php } ?>
                        </div>

                    </div>

                    <div class="tab-pane fade show active" id="projets_edites" role="tabpanel" aria-labelledby="projets_edites-tab">
                        <div class="">

                            <?php
                            $requete = $bdd->query('SELECT id_projet, titre_projet, image_projet, description_projet,projet.id_utilisateur, image_utilisateur, nom_utilisateur
                            FROM projet ,utilisateur 
                            WHERE image_projet <> "" 
                            AND visibilite = "public" 
                            AND projet.id_utilisateur = utilisateur.id_utilisateur 
                            ORDER BY id_projet DESC LIMIT 10');
                            while ($donnee = $requete->fetch()) {
                            ?>


                                <div class="row shadow rounded" style="padding: 20px;">
                                    <div class="col-md-4 img-fluid">
                                        <span class="badge badge-danger" style="position: absolute;">Nouveauté</span>
                                        <img class="img-fluid rounded mb-3 mb-md-0" class="rounded zoomer" width="" src="IMAGES/PROJETS/<?= $donnee['image_projet'] ?>">
                                    </div>
                                    <div class="col-md-8">
                                        <h3><?= $donnee['titre_projet']; ?>
                                            <span style="">

                                                <span style="font-size:10px;" class="badge badge-primary badge-counter">
                                                    <?php
                                                    echo likes_projet($donnee['id_projet']);
                                                    ?>
                                                    <i class="fas fa-fw fa-thumbs-up"></i>
                                                </span>
                                                <span style="font-size:10px;" class="badge badge-primary badge-counter">
                                                    <?php
                                                    echo followers_projet($donnee['id_projet']);
                                                    ?>
                                                    <i class="fas fa-fw fa-users"></i>
                                                </span>
                                            </span>
                                        </h3>
                                        <span class="text-gray-400 badge badge-light pull-right" style="">
                                            <a class="collapse-item" href="utilisateur.php?id=<?php echo $donnee['id_utilisateur']; ?>">
                                                <span style="font-size:10px !important, color:gray;font-style:italic"><?= "par " . $donnee['nom_utilisateur']; ?></span>
                                            </a>
                                        </span>
                                        <hr>
                                        <b>Synopsis:</b>
                                        <p> <?= empty($donnee['description_projet']) ? "Pas de synopsis" : $donnee['description_projet'] ?></p>

                                        <b>Aperçu des planches:</b>
                                        <p class="col-md-9">
                                            <div class="items">

                                                <?php

                                                $query = $bdd->prepare('SELECT image_planche, planche.id_chapitre , tome.id_tome , projet.id_projet
                                                                            FROM planche, chapitre , tome , projet 
                                                                            WHERE chapitre.id_chapitre = planche.id_chapitre 
                                                                            AND chapitre.id_tome = tome.id_tome 
                                                                            AND tome.id_projet = projet.id_projet
                                                                            AND projet.id_projet = :id
                                                                            ORDER BY numero_planche');


                                                $query->execute(array('id' => $donnee['id_projet']));
                                                while ($data = $query->fetch()) {

                                                ?>
                                                    <div class="item">
                                                        <img class="rounded zoomer" height="200px" src="IMAGES/PLANCHES/<?php echo $data['image_planche'] ?>" alt="">
                                                    </div>

                                                <?php } ?>

                                            </div>
                                        </p>

                                        <a class="btn btn-block btn-lg btn-primary" href="voirprojet.php?id=<?= $donnee['id_projet']; ?>">Lire un extrait gratuit</a>
                                    </div>

                                </div>
                                <br>

                            <?php } ?>

                        </div>
                    </div>



                </div>
            </div>


        </div>
    </div>

</div>

<script type="text/javascript">
    const slider = document.querySelector('.items');
    let isDown = false;
    let startX;
    let scrollLeft;

    slider.addEventListener('mousedown', (e) => {
        isDown = true;
        slider.classList.add('active');
        startX = e.pageX - slider.offsetLeft;
        scrollLeft = slider.scrollLeft;
    });
    slider.addEventListener('mouseleave', () => {
        isDown = false;
        slider.classList.remove('active');
    });
    slider.addEventListener('mouseup', () => {
        isDown = false;
        slider.classList.remove('active');
    });
    slider.addEventListener('mousemove', (e) => {
        if (!isDown) return;
        e.preventDefault();
        const x = e.pageX - slider.offsetLeft;
        const walk = (x - startX) * 3; //scroll-fast
        slider.scrollLeft = scrollLeft - walk;
        console.log(walk);
    });

    $(document).ready(function() {
        $("#footer").hide();
    });
</script>