<?php
    include "INCLUSION/header.php";

    include "TRAITEMENT/connexion.php";
?>

<div class="container" style="margin-top: 50px;">
    <div class="card border-0 shadow my-5">
        <div class="card-body" style="min-height: 470px;">
            <?php
                $requete = $bdd->prepare('SELECT titre_chapitre, id_chapitre FROM chapitre, tome WHERE chapitre.id_tome = tome.id_tome AND tome.id_projet = :id');

                $requete->execute(array('id' => $_GET['id']));

                $count = 1;
            ?>
            <select id="chapitres">
            <?php
                while($chapitre = $requete->fetch())
                {
            ?>
                <option value="<?php echo $chapitre['id_chapitre']; ?>">Chapitre <?php echo $count." : ".$chapitre['titre_chapitre']; ?></option>
            <?php
                    $count++;
                }
            ?>
            </select>
            <hr />
            <div>
                <ul class="nav nav-tabs" id="MyReader" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="stories-tab" data-toggle="tab" href="#stories" role="tab" aria-controls="stories" aria-selected="false">
                            Lire l'histoire
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="scans-tab" data-toggle="tab" href="#scans" role="tab" aria-controls="scans" aria-selected="true">
                            Lire les scans
                        </a>
                    </li>
                </ul>
            </div>
            <div class="tab-content" id="MyReaderContent">
                <div class="tab-pane fade show active" id="stories" role="tabpanel" aria-labelledby="stories-tab">
                    <br />
                    <div class="card">
                        <div class="card-body">
                            <div id="story">
                                
                            </div>
                        </div>
                    </div>
<!--                     <div class="card">
                        <div class="card-body">
                            <div>
                                <img src="IMAGES/PROFILS/STAND.jpg" alt="" style="height: 40px;border-radius: 50px;">
                                Commentaires...
                            </div>
                            <hr />
                        </div>
                    </div> -->
                </div>
                <div class="tab-pane fade" id="scans" role="tabpanel" aria-labelledby="scans-tab">
                    <br />
                    <div class="card container-fluid">
                        <div class="d-flex justify-content-center">
                            <div id="scan" class=" col-12" >
                                
                            </div>
                        </div>
                    </div>
<!--                     <div class="card">
                        <div class="card-body">
                            <div>
                                <img src="IMAGES/PROFILS/STAND.jpg" alt="" style="height: 40px;border-radius: 50px;">
                                Commentaires...
                            </div>
                            <hr />
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        chapitres = document.getElementById('chapitres');
        var id = chapitres.options[chapitres.selectedIndex].value;
        $.ajax({
            url: 'TRAITEMENT/systeme.php',
            type: 'POST',
            dataType: 'JSON',
            data: {
                formulaire: 'scanReader',
                id: id
            },
            success: function(data){
                $('#scan').html(data.message).fadeIn(500);
            },
            error: function(data){
                $('#scan').text('Une erreur est survenue lors de l\'execution... contactez les administrateurs').fadeIn(500);
            }
        });
        $.ajax({
            url: 'TRAITEMENT/systeme.php',
            type: 'POST',
            dataType: 'JSON',
            data: {
                formulaire: 'storyReader',
                id: id
            },
            success: function(data){
                $('#story').html(data.message).fadeIn(500);
            },
            error: function(data){
                $('#story').text('Une erreur est survenue lors de l\'execution... contactez les administrateurs').fadeIn(500);
            }
        })
    });
    $('#chapitres').on('change', function(){
        var id = this.options[this.selectedIndex].value;
        $.ajax({
            url: 'TRAITEMENT/systeme.php',
            type: 'POST',
            dataType: 'JSON',
            data: {
                formulaire: 'scanReader',
                id: id
            },
            success: function(data){
                $('#scan').html(data.message).fadeIn(500);
            },
            error: function(data){
                $('#scan').text('Une erreur est survenue lors de l\'execution... contactez les administrateurs').fadeIn(500);
            }
        });
        $.ajax({
            url: 'TRAITEMENT/systeme.php',
            type: 'POST',
            dataType: 'JSON',
            data: {
                formulaire: 'storyReader',
                id: id
            },
            success: function(data){
                $('#story').html(data.message).fadeIn(500);
            },
            error: function(data){
                $('#story').text('Une erreur est survenue lors de l\'execution... contactez les administrateurs').fadeIn(500);
            }
        });
    });
</script>

<?php
    include "INCLUSION/footer.php";
?>