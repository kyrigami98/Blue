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

					<img class="d-block w-100" style="z-index:0; filter: blur(2px);-webkit-filter: blur(1px);" src="https://lvdneng.rosselcdn.net/sites/default/files/dpistyles_v2/ena_16_9_extra_big/2020/05/06/node_749505/46982263/public/2020/05/06/B9723396273Z.1_20200506170704_000%2BG02FVMCAG.1-0.jpg?itok=qntyo5h_1588777631" alt="First slide">

					<div class="mask rgba-black-light"></div>
				</div>

				<div class="carousel-caption">

					<div class="items">

						<?php
						$requete = $bdd->query('SELECT id_projet, titre_projet, image_projet FROM projet WHERE image_projet <> "" AND visibilite = "public" ORDER BY id_projet DESC LIMIT 10');
						while ($donnee = $requete->fetch()) {
						?>
							<div class="item item1">
								<span class="badge badge-danger" style="position: absolute;">Nouveauté</span>
								<h5 class="text-gray-600 badge badge-light" style="position: absolute;bottom:25px;"><?php echo $donnee['titre_projet']; ?></h5>
								<a href="voirprojet.php?id=<?php echo $donnee['id_projet']; ?>" class=""><img class="rounded zoomer" height="300px" src="IMAGES/PROJETS/<?php echo $donnee['image_projet'] ?>" alt=""></a>
							</div>

						<?php } ?>

					</div>
				</div>

			</div>

			<div class="carousel-item">

				<div style="height: 100%; width: 100%; z-index:1;position:absolute; background: linear-gradient(transparent, rgba(0,0,0,0.8));"></div>

				<!--Mask color-->
				<div class="view">
					<img class="d-block w-100" src="IMAGES/wtf.gif" alt="Second slide">
					<div class="mask rgba-black-light"></div>
				</div>
				<div class="carousel-caption">
					<h3 class="h3-responsive">Actualité</h3>
				</div>
			</div>

			<div class="carousel-item">

				<div style="height: 100%; width: 100%; z-index:1;position:absolute; background: linear-gradient(transparent, rgba(0,0,0,0.8));"></div>

				<!--Mask color-->
				<div class="view">
					<img class="d-block w-100" src="IMAGES/unnamed.gif" alt="Third slide">
					<div class="mask rgba-black-light"></div>
				</div>
				<div class="carousel-caption">
					<h3 class="h3-responsive">Bientôt Manga Tutorial</h3>
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
	<h1 class="mt-5 text-white font-weight-light">
		<img src="IMAGES/MASCOTTES/masaoborder.png" height="50px">
		<strong>Bienvenu dans l'imaginium delirium</strong>
		<img src="IMAGES/MASCOTTES/mizuiroborder.png" height="50px">
	</h1>
	<p class="lead text-white-50">La logique vous mènera d’un point A à un point B. L’imagination vous emmènera où vous voulez.</p>
</div>

<!-- Page Content -->
<div class="container">
	<div class="row">

		<div class="card-columns">
			<?php
			//LIMIT 6
			$requete = $bdd->query('SELECT id_projet, image_projet, projet.id_utilisateur, titre_projet, description_projet, image_utilisateur, nom_utilisateur FROM projet, utilisateur WHERE visibilite = "public" AND projet.id_utilisateur = utilisateur.id_utilisateur ORDER BY id_projet DESC');
			while ($donnee = $requete->fetch()) {
				$requete_modif = $bdd->prepare('SELECT date_modif FROM historique WHERE id_projet = :id ORDER BY date_modif DESC LIMIT 1');

				$requete_modif->execute(array('id' => $donnee['id_projet']));

				$date = $requete_modif->fetch();
			?>
				<div class="card post" style="border-radius: 10px;box-shadow: 3px 5px 5px 2px #0062E6;" data-toggle="tooltip" data-placement="left" data-html="false" title=''>

					<span class="mr-2 d-none d-lg-inline text-gray-600 small btn-block" style="border-radius: 10px;color:black;position: absolute;padding:20px;">
						<H5 class="badge badge-primary" style="color:white;font-size:17px;font-style:italic;padding:10px;"><?= $donnee['titre_projet'] ?> </H5>
					</span>

					<div href="#" data-toggle="modal" data-target="#imageReader">
						<div class="">
							<div class="" style="position: absolute;bottom:0px;width:100%;border-radius:5px; padding:5%;background: white;">

								<div class="options" style="display: none;">
									<span class="mr-2 d-none d-lg-inline text-gray-600 small btn-block" style="height:20px;">
										<H7 class="text-gray-600"><?= substr($donnee['description_projet'], 0, 200) . "..."; ?> </H7>
									</span>
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
									<?php } ?> <br>
								</div>

								<a class="collapse-item" href="utilisateur.php?id=<?php echo $donnee['id_utilisateur']; ?>">
									<img class="img-profile rounded-circle user-photo" src="IMAGES/PROFILS/<?php echo $donnee['image_utilisateur']; ?>" />
									<strong><?php echo $donnee['nom_utilisateur']; ?></strong>
								</a>
								<span class="card-text">
									<small class="text-gray-600" style=""><?php echo " Mise à jour le " . date("d F Y à h:i", strtotime($date['date_modif'])); ?></small>
								</span>

							</div>

							<?php if ($donnee['image_projet'] == NULL) { ?>
								<img style="border-radius: 10px;" class="card-img-top" src="IMAGES/PROJETS/STAND.jpg" alt="">
							<?php 	} else { ?>
								<img style="border-radius: 10px;" class="card-img-top" src="IMAGES/PROJETS/<?= $donnee['image_projet'] ?>" alt="<?= $donnee['image_projet'] ?>">
							<?php 	} ?>
						</div>
					</div>

				</div>
			<?php } ?>
		</div>

	</div>
	<!-- /.row -->

	<!-- Pagination 
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
-->
</div>

<!-- /.container -->
<script>
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