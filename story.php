<?php
include "INCLUSION/header.php";

include "INCLUSION/redirection1.php";

include "TRAITEMENT/connexion.php";

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
                            <?php if (isset($_SESSION['titre_projet'])) { ?>
                                <img class="avatar rounded img-fluid" style="height:60px;" src="IMAGES/radiant.jpg" />
                                <?php echo $_SESSION['titre_projet']; ?>
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

        <div class="container mt-4 mb-4 text-center">
            Resultats trouvés :
            <button class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" data-html="true" title='<img class="avatar rounded img-fluid" style="height:60px;" src="IMAGES/radiant.jpg" />
            <hr><span>
            Madara Uchiha (うちはマダラ, Uchiha Madara) was the legendary leader of the Uchiha clan. He founded Konohagakure alongside his childhood friend and rival, Hashirama Senju, with the intention of beginning an era of peace. ... Madara, however, rewrote his death and went into hiding to work on his own plans.
            </span>
            <hr>' type="submit"><i class="fas fa-user-ninja fa-plus"></i> Madara
            </button>

            <button class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" data-html="true" title='<img class="avatar rounded img-fluid" style="height:60px;" src="IMAGES/radiant.jpg" />' type="submit"><i class="fas fa-fw fa-dragon"></i> Illustration </button>

            <button class="btn btn-sm btn-info" data-toggle="tooltip" data-placement="top" data-html="true" title='<img class="avatar rounded img-fluid" style="height:60px;" src="IMAGES/radiant.jpg" />' type="submit"><i class="fas fa-fw  fa-globe-africa"></i> Maison de luxe</button>

            <button class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="top" data-html="true" title='<img class="avatar rounded img-fluid" style="height:60px;" src="IMAGES/radiant.jpg" />' type="submit"><i class="fas fa-fw fa-paw"></i> Tigre</button>

            <button class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" data-html="true" title='<img class="avatar rounded img-fluid" style="height:60px;" src="IMAGES/radiant.jpg" />' type="submit"><i class="fas fa-fw fa-list-alt"></i> Haki</button>

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

<script type="text/javascript">
    tinymce.init({
        selector: 'textarea#editor',
        skin: 'bootstrap',
        plugins: 'lists, link, image, media',
        toolbar: 'h1 h2 bold italic strikethrough blockquote bullist numlist backcolor | link image media | removeformat help',
        min_height: 400,
        width: 1100,
        menubar: false,
        setup: (editor) => { // Apply the focus effect
            editor.on('init', () => {
                editor.getContainer().style.transition = "border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out"
            });
            editor.on('focus', () => {
                editor.getContainer().style.boxShadow = "0 0 0 .2rem rgba(0, 123, 255, .25)",
                    editor.getContainer().style.borderColor = "#80bdff"
            });
            editor.on('blur', () => {
                editor.getContainer().style.boxShadow = "",
                    editor.getContainer().style.borderColor = ""
            });
        }
    });
</script>

<?php
include "INCLUSION/footer.php";
?>