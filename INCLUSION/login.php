<?php
include("TRAITEMENT/connexion.php");
?>
<!-- This snippet uses Font Awesome 5 Free as a dependency. You can download it at fontawesome.io! -->

<header>
	<!--Carousel Wrapper-->
	<div id="carousel-example-2" class="carousel slide carousel-fade z-depth-1-half" data-ride="carousel">
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

					<div style="height: 100%; width: 100%; z-index:1;position:absolute; background: linear-gradient(transparent, rgba(0,0,0,0.8));"></div>

					<img class="d-block w-100" style="z-index:0; filter: blur(8px);-webkit-filter: blur(5px);" src="https://lageekroom.com/wp-content/uploads/2019/08/Une-date-de-sortie-pour-le-1er-roman-de-Hells-Paradise-4.jpg" alt="First slide">

					<div class="mask rgba-black-light"></div>
				</div>

				<div class="carousel-caption">

					<div class="container">
						<div class="row">
							<div class="col-sm">
								<a href="#" class=""><img class="rounded zoomer" height="300px" src="IMAGES/radiant.jpg" alt=""></a>
								<hr>
								<h5 class="h3-responsive">This is the first title</h5>
							</div>
							<div class="col-sm">
								<a href="#" class=""><img class="rounded zoomer" height="300px" src="IMAGES/radiant.jpg" alt=""></a>
								<hr>
								<h5 class="h3-responsive">This is the first title</h5>
							</div>
							<div class="col-sm">
								<a href="#" class=""><img class="rounded zoomer" height="300px" src="IMAGES/radiant.jpg" alt=""></a>
								<hr>
								<h5 class="h3-responsive">This is the first title</h5>
							</div>
						</div>
					</div>
				</div>

			</div>

			<div class="carousel-item">

				<div style="height: 100%; width: 100%; z-index:1;position:absolute; background: linear-gradient(transparent, rgba(0,0,0,0.8));"></div>

				<!--Mask color-->
				<div class="view">
					<img class="d-block w-100" src="https://www.journaldujapon.com/wp-content/uploads/2019/04/Pika-Shonen-2018.png" alt="Second slide">
					<div class="mask rgba-black-light"></div>
				</div>
				<div class="carousel-caption">
					<h3 class="h3-responsive">Actualité</h3>
					<p>Secondary text</p>
				</div>
			</div>

			<div class="carousel-item">

				<div style="height: 100%; width: 100%; z-index:1;position:absolute; background: linear-gradient(transparent, rgba(0,0,0,0.8));"></div>

				<!--Mask color-->
				<div class="view">
					<img class="d-block w-100" src="https://lageekroom.com/wp-content/uploads/2019/04/promised-neverland-volume-7-test.jpg" alt="Third slide">
					<div class="mask rgba-black-light"></div>
				</div>
				<div class="carousel-caption">
					<h3 class="h3-responsive">Manga Tutorial</h3>
					<p>Third text</p>
				</div>
			</div>

		</div>
		<!--/.Slides-->
		<!--Controls-->
		<a class="carousel-control-prev" href="#carousel-example-2" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#carousel-example-2" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
		<!--/.Controls-->
	</div>
	<!--/.Carousel Wrapper-->
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
			//LIMIT 6
			$requete = $bdd->query('SELECT * FROM projet WHERE visibilite = "public" ORDER BY id_projet DESC');
			while ($donnee = $requete->fetch()) {
				$requete_modif = $bdd->prepare('SELECT date_modif FROM historique WHERE id_projet = :id ORDER BY date_modif DESC LIMIT 1');

				$requete_modif->execute(array('id' => $donnee['id_projet']));

				$date = $requete_modif->fetch();
			?>
				<div class="card" data-toggle="tooltip" data-placement="left" data-html="false" title='<?php echo $donnee['description_projet']; ?>'>
					<?php if ($donnee['image_projet'] == NULL) { ?>
						<a href="#"><img class="card-img-top" src="IMAGES/PROJETS/STAND.jpg" alt=""></a>
					<?php 	} else { ?>
						<a href="#"><img class="card-img-top" src="IMAGES/PROJETS/<?= $donnee['image_projet'] ?>" alt="<?= $donnee['image_projet'] ?>"></a>
					<?php 	} ?>
					<div class="card-body">
						<?php if (isset($_SESSION['id']) && $donnee['id_utilisateur'] == $_SESSION['id']) { ?>
							<form action="TRAITEMENT/atelier_systeme.php" method="POST">
								<input type="hidden" name="id" value="<?php echo $donnee['id_projet']; ?>" />
								<input type="hidden" name="formulaire" value="projet" />
								<h5 class="card-title"><button class="btn btn-md" href="#"><?= $donnee['titre_projet'] ?></button></h5>
							</form>
						<?php } else { ?>
							<h5 class="card-title"><a class="btn btn-md" href="voirprojet.php?id=<?php echo $donnee['id_projet']; ?>"><?= $donnee['titre_projet'] ?></a></h5>
						<?php } ?>
						<p class="card-text"><small class="text-muted">dernière modification <?php echo $date['date_modif']; ?></small></p>
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
if (!isset($_SESSION['pseudo'])) { ?>
	<div id="inscription" class="row">
		<div class="col-lg-10 col-xl-9 mx-auto">
			<div class="card card-signin flex-row my-5" style="background-color: rgba(0, 0, 10, 0.8);">
				<div class="card-img-left d-none d-md-flex">
					<!-- Background image for card set in CSS! -->
				</div>
				<div class="card-body">
					<h5 class="card-title text-center" style="color:White;">Rejoins Blue !</h5>
					<form id="inscription" class="form-signin" action="TRAITEMENT/systeme.php" method="POST">
						<div class="form-label-group">
							<input type="text" id="inputUserame" class="form-control" placeholder="Username" name="pseudo" required autofocus>
							<label for="inputUserame">Pseudo</label>
						</div>

						<div class="form-label-group">
							<input type="email" id="inputEmail" class="form-control" placeholder="Email address" name="email" required>
							<label for="inputEmail">Email</label>
						</div>

						<hr>

						<div class="form-label-group">
							<input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>
							<label for="inputPassword">Mot de passe</label>
						</div>

						<div class="form-label-group">
							<input type="password" id="inputConfirmPassword" class="form-control" placeholder="Password" required>
							<label for="inputConfirmPassword">Confirmer le mot de passe</label>
						</div>

						<div class="form-label-group">
							<div class="form-check">
								<label class="form-check-label">
									<input type="checkbox" class="form-check-input" value="" style="color:white;" required>J'ai lu et j'accepte les <a href="">conditions d'utilisation<a>
								</label>
							</div>
						</div>
						<input type="hidden" name="formulaire" value="inscription" />
						<button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">S'inscrire</button>
						<a class="d-block text-center mt-2 small" href="#" data-toggle="modal" data-target=".bd-example-modal-lg">J'ai deja un compte</a>
						<div class="text-center" id="resultat"></div>


					</form>
				</div>
			</div>
		</div>
	</div>
	<script>
		$(document).on("submit", "#inscription", function(event) {
			pseudo = $(this).find("input[name=pseudo]").val();
			email = $(this).find("input[name=email]").val();
			password = $(this).find("input[name=password]").val();
			formulaire = $(this).find("input[name=formulaire]").val();

			$.ajax({
				url: 'TRAITEMENT/systeme.php',
				type: 'POST',
				dataType: 'JSON',
				data: {
					formulaire: formulaire,
					pseudo: pseudo,
					email: email,
					password: password
				},
				success: function(data) {
					console.log(data);
					if (data.success == true && data.url != "") {
						location.reload(true);
					} else {
						$("#resultat").text(data.message).fadeIn(500);
					}
				},
				error: function(data) {
					$('#resultat').removeClass('bg-success').addClass('bg-danger').text('Oups... une erreur est survenue!').fadeIn(500);
				}
			});
			event.preventDefault();
		});
	</script>
<?php }
?>