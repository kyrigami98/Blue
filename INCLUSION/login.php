<?php
include("TRAITEMENT/connexion.php");
?>
<!-- This snippet uses Font Awesome 5 Free as a dependency. You can download it at fontawesome.io! -->

<header>
	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
		<ol class="carousel-indicators">
			<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
		</ol>
		<div class="carousel-inner" role="listbox">
			<!-- Slide One - Set the background image for this slide in the line below -->
			<div class="carousel-item active" style="background-image: url('IMAGES/Bakuman.jpg')">
				<div class="d-none d-md-block">
					<video class="card-img-top" src="IMAGES/Anime.mp4" autoplay muted controls alt="" style="border-radius:10px;"></video>
				</div>
			</div>
			<!-- Slide Two - Set the background image for this slide in the line below -->
			<div class="carousel-item" style="background-image: url('IMAGES/draw.gif')">
				<div class="carousel-caption d-none d-md-block"></div>
			</div>
			<!-- Slide Three - Set the background image for this slide in the line below -->
			<div class="carousel-item" style="background-image: url('IMAGES/giphy (2).gif')">
				<div class="carousel-caption d-none d-md-block"></div>
			</div>
		</div>
		<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
</header>



<div class="container text-center">
	<h1 class="mt-5 text-white font-weight-light">Bienvenu dans l'imaginium delirium</h1>
	<p class="lead text-white-50">La logique vous mènera d’un point A à un point B. L’imagination vous emmènera où vous voulez.</p>
</div>


<video autoplay loop id="myVideo" style=" filter: blur(8px);-webkit-filter: blur(8px);">
	<source src="IMAGES/Anime.mp4" type="video/mp4">
</video>

<!-- Page Content -->
<div class="container">
	<div class="row">

		<div class="card-columns">
			<?php
			$requete = $bdd->query('SELECT * FROM projet ORDER BY id_projet DESC LIMIT 6');
			while ($donnee = $requete->fetch()) { ?>
				<div class="card">
					<?php if ($donnee['image_projet'] == "") { ?>
						<a href="#"><img class="card-img-top" src="IMAGES/PROJETS/STAND.jpg" alt=""></a>
					<?php 	} else { ?>
						<a href="#"><img class="card-img-top" src="../IMAGES/PROJETS/<?= $donnee['image_projet'] ?>" alt=""></a>
					<?php 	} ?>
					<div class="card-body">
						<h5 class="card-title"><?= $donnee['titre_projet'] ?></h5>
						<p class="card-text"><?= $donnee['description_projet'] ?></p>
						<p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
					</div>
				</div>
			<?php } ?>
		</div>

	</div>
	<!-- /.row -->

	<!-- Pagination -->
	<ul class="pagination justify-content-center">
		<li class="page-item">
			<a class="page-link" href="#" aria-label="Previous">
				<span aria-hidden="true">&laquo;</span>
				<span class="sr-only">Previous</span>
			</a>
		</li>
		<li class="page-item">
			<a class="page-link" href="#">1</a>
		</li>
		<li class="page-item">
			<a class="page-link" href="#">2</a>
		</li>
		<li class="page-item">
			<a class="page-link" href="#">3</a>
		</li>
		<li class="page-item">
			<a class="page-link" href="#" aria-label="Next">
				<span aria-hidden="true">&raquo;</span>
				<span class="sr-only">Next</span>
			</a>
		</li>
	</ul>

</div>
<!-- /.container -->
<?php
if (!isset($_SESSION['pseudo'])) {
	echo
		"<div id=\"inscription\" class=\"row\">
      <div class=\"col-lg-10 col-xl-9 mx-auto\">
        <div class=\"card card-signin flex-row my-5\" style=\"  background-color: rgba(0, 0, 10, 0.8);\">
          <div class=\"card-img-left d-none d-md-flex\">
             <!-- Background image for card set in CSS! -->
          </div>
          <div class=\"card-body\">
            <h5 class=\"card-title text-center\" style=\"color:White;\">Rejoins Blue !</h5>				
			<form id=\"inscription\" class=\"form-signin\" action=\"TRAITEMENT/systeme.php\" method=\"POST\">
              <div class=\"form-label-group\">
                <input type=\"text\" id=\"inputUserame\" class=\"form-control\" placeholder=\"Username\" name=\"pseudo\" required autofocus>
                <label for=\"inputUserame\">Pseudo</label>
              </div>

              <div class=\"form-label-group\">
                <input type=\"email\" id=\"inputEmail\" class=\"form-control\" placeholder=\"Email address\" name=\"email\" required>
                <label for=\"inputEmail\">Email</label>
              </div>
              
              <hr>

              <div class=\"form-label-group\">
                <input type=\"password\" id=\"inputPassword\" class=\"form-control\" placeholder=\"Password\" name=\"password\" required>
                <label for=\"inputPassword\">Mot de passe</label>
              </div>
              
              <div class=\"form-label-group\">
                <input type=\"password\" id=\"inputConfirmPassword\" class=\"form-control\" placeholder=\"Password\" required>
                <label for=\"inputConfirmPassword\">Confirmer le mot de passe</label>
              </div>
			  
			  <div class=\"form-label-group\">        
			  <div class=\"form-check\">
			  <label class=\"form-check-label\">
				<input type=\"checkbox\" class=\"form-check-input\" value=\"\" style=\"color:white;\">J'ai lu et j\'accepte les <a href=\"\">conditions d'utilisation<a>
			  </label>
			</div>
			 </div>
				<input type=\"hidden\" name=\"formulaire\" value=\"inscription\" />
              <button class=\"btn btn-lg btn-primary btn-block text-uppercase\" type=\"submit\">S'inscrire</button>
              <a class=\"d-block text-center mt-2 small\" href=\"#\" data-toggle=\"modal\" data-target=\".bd-example-modal-lg\">J'ai deja un compte</a>
             
           
		   </form>
          </div>
        </div>
      </div>
    </div>
		
	</script>
	";
}
