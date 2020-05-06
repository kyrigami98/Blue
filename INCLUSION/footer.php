<?php if (isset($_SESSION['pseudo'])) { ?>
	<div class="floating">
		<a href="#" class="float">
			<i id="floatbutton" class="fa fa-plus my-float"></i>
		</a>
		<ul>
			<li class="floatbuttonMenu invisible" name="chapitre" data-toggle="tooltip" data-placement="left" title='Créer un chapitre'>
				<a href="#" data-toggle="modal" data-target=".bd-example-modal-lg2">
					<i class="fas fa-fw fa-marker my-float"></i>
				</a>
			</li>
			<li class="floatbuttonMenu invisible" name="personnage" data-toggle="tooltip" data-placement="left" title='Créer un personnage'>
				<a href="#" data-toggle="modal" data-target=".bd-example-modal-lg2">
					<i class="fas fa-user-ninja my-float"></i>
				</a>
			</li>
			<li class="floatbuttonMenu invisible" name="creature" data-toggle="tooltip" data-placement="left" title='Créer une créature'>
				<a href="#" data-toggle="modal" data-target=".bd-example-modal-lg2">
					<i class="fas fa-fw fa-paw my-float"></i>
				</a>
			</li>
			<li class="floatbuttonMenu invisible" name="lieu" data-toggle="tooltip" data-placement="left" title='Créer un lieu'>
				<a href="#" data-toggle="modal" data-target=".bd-example-modal-lg2">
					<i class="fas fa-fw fa-globe-africa my-float"></i>
				</a>
			</li>
			<li class="floatbuttonMenu invisible" name="cle" data-toggle="tooltip" data-placement="left" title='Créer un mot clé'>
				<a href="#" data-toggle="modal" data-target=".bd-example-modal-lg2">
					<i class="fas fa-fw fa-list-alt my-float"></i>
				</a>
			</li>
			<li class="floatbuttonMenu invisible" name="illustration" data-toggle="tooltip" data-placement="left" title='Importer un illustration'>
				<a href="#" data-toggle="modal" data-target=".bd-example-modal-lg2">
					<i class="fas fa-fw fa-dragon my-float"></i>
				</a>
			</li>
		</ul>
	</div>
<?php } ?>

<!-- Footer -->

<footer class="sticky-footer bg-white">
	<div class="container my-auto">
		<div class="copyright text-center my-auto">
			<span>Copyright &copy; Blue 2019</span>
		</div>
	</div>
</footer>
<!-- End of Footer -->
</body>
<!-- Large modal -->

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content" style=" background-color: rgba(0, 0, 10, 0.8);background-color: #007bff;">

			<div id="connexion" class="row">
				<div class="container-fluid">
					<div class="card card-signin flex-row my-5">
						<div class="d-none d-md-flex connexion">
							<!-- Background image for card set in CSS! -->
						</div>
						<div class="card-body">
							<h5 class="card-title text-center">Se connecter!</h5>
							<form id="connexion" class="form-signin" action="TRAITEMENT/systeme.php" method="POST">

								<div class="form-label-group">
									<input type="email" id="inputEmail2" class="form-control" placeholder="Email address" name="email" required>
									<label for="inputEmail2">Email</label>
								</div>

								<div class="form-label-group">
									<input type="password" id="inputPassword2" class="form-control" placeholder="Password" name="password" required>
									<label for="inputPassword2">Mot de passe</label>
								</div>

								<div id="result" style="display: none" class="card btn btn-lg btn-block bg-warning text-white shadow text-center">

								</div>

								<input type="hidden" name="formulaire" value="connexion" />
								<button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Connexion</button>

							</form>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>

</div>


<div class="modal fade bd-example-modal-lg2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel2" aria-hidden="true">
	<div class="modal-dialog modal-sm  modal-dialog-centered">
		<div class="modal-content">
			<br />
			<div class="container">

				<form id="chapitre_form" class="modalForm" action="TRAITEMENT/atelier_systeme.php" method="POST" enctype="multipart/form-data">
					<div class="profile-img">
						<img class="avatar rounded img-fluid" src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" />
						<div class="file btn btn-sm btn-primary">
							Choisir une image
							<input type="file" name="image" class="file-upload" />
						</div>
						<hr>
						<div class="form-label-group">
							<input type="text" id="chapitre" class="form-control" placeholder="titre du chapitre" name="nom" required />
							<label for="chapitre">Titre du Chapitre</label>
						</div>
						<div class="form-label-group">
							<input type="text" id="description_chapitre" class="form-control" placeholder="description du chapitre" name="description">
							<label for="description_chapitre">Description</label>
						</div>
						<input type="hidden" name="formulaire" value="chapitre" />
						<button class="btn btn-lg btn-primary btn-block rounded" type="submit"><i class="glyphicon glyphicon-ok-sign"></i>
							<i class="fas fa-fw fa-plus"></i> Cr&eacute;er un chapitre
						</button>
						<br />
					</div>
				</form>

				<form id="personnage_form" class="modalForm" action="TRAITEMENT/atelier_systeme.php" method="POST" enctype="multipart/form-data">
					<div class="profile-img">
						<img class="avatar rounded img-fluid" src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" />
						<div class="file btn btn-sm btn-primary">
							Choisir une image
							<input type="file" name="image" class="file-upload" />
						</div>
						<hr>
						<div class="form-label-group">
							<input type="text" id="personnage" class="form-control" placeholder="nom du personnage" name="nom" required />
							<label for="personnage">Nom du Personnage</label>
						</div>
						<div class="form-label-group">
							<input type="text" id="description_personnage" class="form-control" placeholder="description du personnage" name="description">
							<label for="description_personnage">Description</label>
						</div>
						<input type="hidden" name="formulaire" value="personnage" />
						<button class="btn btn-lg btn-primary btn-block rounded" type="submit"><i class="glyphicon glyphicon-ok-sign"></i>
							<i class="fas fa-fw fa-plus"></i> Cr&eacute;er le personnage
						</button>
						<br />
					</div>
				</form>

				<form id="creature_form" class="modalForm" action="TRAITEMENT/atelier_systeme.php" method="POST" enctype="multipart/form-data">
					<div class="profile-img">
						<img class="avatar rounded img-fluid" src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" />
						<div class="file btn btn-sm btn-primary">
							Choisir une image
							<input type="file" name="image" class="file-upload" />
						</div>
						<hr>
						<div class="form-label-group">
							<input type="text" id="creature" class="form-control" placeholder="nom de la creature" name="nom" required />
							<label for="creature">Nom de la cr&eacute;ature</label>
						</div>
						<div class="form-label-group">
							<input type="text" id="description_creature" class="form-control" placeholder="description de la creature" name="description">
							<label for="description_creature">Description</label>
						</div>
						<input type="hidden" name="formulaire" value="creature" />

						<button class="btn btn-lg btn-primary btn-block rounded" type="submit"><i class="glyphicon glyphicon-ok-sign"></i>
							<i class="fas fa-fw fa-plus"></i> Cr&eacute;er la cr&eacute;ature
						</button>
						<br />
					</div>
				</form>

				<form id="lieu_form" class="modalForm" action="TRAITEMENT/atelier_systeme.php" method="POST" enctype="multipart/form-data">
					<div class="profile-img">
						<img class="avatar rounded img-fluid" src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" />
						<div class="file btn btn-sm btn-primary">
							Choisir une image
							<input type="file" name="image" class="file-upload" />
						</div>
						<hr>
						<div class="form-label-group">
							<input type="text" id="lieu" class="form-control" placeholder="nom du lieu" name="nom" required>
							<label for="lieu">Nom du Lieu</label>
						</div>
						<div class="form-label-group">
							<input type="text" id="description_lieu" class="form-control" placeholder="description du lieu" name="description">
							<label for="description_lieu">Description</label>
						</div>
						<input type="hidden" name="formulaire" value="lieu" />
						<button class="btn btn-lg btn-primary btn-block rounded" type="submit"><i class="glyphicon glyphicon-ok-sign"></i>
							<i class="fas fa-fw fa-plus"></i> Cr&eacute;er le lieu
						</button>
						<br />
					</div>
				</form>

				<form id="cle_form" class="modalForm" action="TRAITEMENT/atelier_systeme.php" method="POST" enctype="multipart/form-data">
					<div class="form-label-group">
						<input type="text" id="cle" class="form-control" placeholder="mot cle" name="nom" required>
						<label for="cle">Mot clé</label>
					</div>
					<div class="form-label-group">
						<input type="text" id="description_mot_cle" class="form-control" placeholder="description du mot cle" name="description">
						<label for="description_mot_cle">Description</label>
					</div>
					<input type="hidden" name="formulaire" value="cle" />
					<button class="btn btn-lg btn-primary btn-block rounded" type="submit"><i class="glyphicon glyphicon-ok-sign"></i>
						<i class="fas fa-fw fa-plus"></i> Cr&eacute;er le mot
					</button>
					<br />
				</form>

				<form id="illustration_form" class="modalForm" action="TRAITEMENT/atelier_systeme.php" method="POST" enctype="multipart/form-data">
					<div class="profile-img">
						<img class="avatar rounded img-fluid" src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" required />
						<div class="file btn btn-sm btn-primary">
							Choisir une image
							<input type="file" name="image" class="file-upload" />
						</div>
						<hr>
						<div class="form-label-group">
							<input type="text" id="illustration" class="form-control" placeholder="Nom de l'illustration" name="nom" required>
							<label for="illustration">Titre de l'illustration</label>
						</div>
						<div class="form-label-group">
							<input type="text" id="description_illustration" class="form-control" placeholder="description de l'illustration" name="description">
							<label for="description_illustration">Description</label>
						</div>
						<input type="hidden" name="formulaire" value="illustration" />
						<button class="btn btn-lg btn-primary btn-block rounded" type="submit"><i class="glyphicon glyphicon-ok-sign"></i>
							<i class="fas fa-fw fa-plus"></i> Importer l'illustration
						</button>
						<br />
					</div>
				</form>

			</div>

		</div>
	</div>
</div>


<!-- modification projet -->
<div class="modal fade" id="modif_projet" tabindex="-1" role="dialog" aria-labelledby="modif_projetTitle" aria-hidden="true" style=" background-color: rgba(0, 0, 0, 0.7);">
	<div class="modal-dialog" role="document">
		<div class="modal-dialog-centered">
			<div class="modal-content">
				<br />
				<div class="container">

					<form id="modif_projet_form" class="modalForm" action="TRAITEMENT/atelier_systeme.php" method="POST" enctype="multipart/form-data">
						<div class="profile-img">
							<img class="avatar rounded img-fluid" src="IMAGES/radiant.jpg" />
							<div class="file btn btn-sm btn-primary">
								Choisir une image pour le projet
								<input type="file" name="image" class="file-upload" />
							</div>
							<hr>
							<div class="form-label-group">
								<input type="text" id="titre_Projet" value="<?php echo $_SESSION['titre_projet']; ?>" class="form-control" placeholder="Nom de l'illustration" name="nom" required>
								<label for="titre_Projet"></label>
							</div>
							<div class="form-label-group">
								<input type="text" id="synopsis" class="form-control" placeholder="description de l'illustration" name="description">
								<label for="synopsis">Synopsis du projet</label>
							</div>
							<input type="hidden" name="formulaire" value="update_projet" />

							<button class="btn btn-lg btn-primary btn-block rounded" type="submit"><i class="glyphicon glyphicon-ok-sign"></i>
								<i class="fas fa-fw fa-plus"></i> Mettre à jour
							</button>
							<br />
						</div>
					</form>

				</div>
			</div>
		</div>
	</div>
</div>

<!-- image reader -->
<div class="modal fade" id="imageReader" tabindex="-1" role="dialog" aria-labelledby="imageReaderTitle" aria-hidden="true" style=" background-color: rgba(0, 0, 0, 0.7);">
	<div class="modal-dialog modal-xl" role="document">
		<div class="modal-dialog-centered">
			<div class="modal-body d-flex justify-content-center">
				<div class="img-responsive">
					<img id="imageReaderContent" src="" style="max-height:650px;" class="rounded mx-auto d-block">
				</div>
			</div>
		</div>
	</div>
</div>

<!--*********************Inclusions et importations*********************************************-->

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Custom scripts for all pages-->
<script src="JS/sb-admin-2.min.js"></script>

<!-- 
<script src="vendor/chart.js/Chart.min.js"></script>
<script src="JS/demo/chart-area-demo.js"></script>
<script src="JS/demo/chart-pie-demo.js"></script> -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script type="text/javascript" src="JS/MyScript.js"></script>

<script type="text/javascript">
	$(document).ready(function() {
		$(".deleteboutton").hide();
		//floating button
		$(".floating").mouseover(function() {
			$("#floatbutton").addClass("tourne");
			$(".floatbuttonMenu").fadeIn().removeClass("invisible")
		}).mouseleave(function() {
			$("#floatbutton").removeClass("tourne");
			$(".floatbuttonMenu").fadeOut()
		});

		//hide and show form in modal
		$(".floatbuttonMenu").click(function() {
			$(".modalForm").hide();
			$("#" + $(this).attr('name') + "_form").show();
		});

	});

	$(".post").on('mouseover', function() {
		$(this).find(".deleteboutton").fadeIn();
	});

	$(".post").on('mouseleave', function() {
		$(this).find(".deleteboutton").fadeOut();
	});

	$(".post").on('click', function() {
		$("#imageReader").find("#imageReaderContent").attr("src", $(this).find(".card-img-top").attr("src"));
	});

	$(".zoom").on('click', function() {
		$("#imageReader").find("#imageReaderContent").attr("src", $(this).attr("src"));
	});

</script>

<!--*********************JQuery**************************************************************************-->
<script>
	//voici le script Ajax pour la connexion
	$(document).on("submit", "#connexion", function(event) {

		formulaire = $(this).find("input[name=formulaire]").val();
		email = $(this).find("input[name=email]").val();
		password = $(this).find("input[name=password]").val();

		$.ajax({
			url: 'TRAITEMENT/systeme.php',
			type: 'POST',
			dataType: 'JSON',
			data: {
				formulaire: formulaire,
				email: email,
				password: password
			},
			success: function(data) {
				console.log(data);
				if (data.success == true && data.url != "") {
					location.reload(true);
				} else {
					$("#result").text(data.message).fadeIn(500);
				}
			},
			error: function(data) {
				$('#result').removeClass('bg-success').addClass('bg-danger').text('Oups... une erreur est survenu!').fadeIn(500);
			}

		});

		event.preventDefault() //ceci bloque la soumission du formulaire ;)

	});

	//voici le script Ajax pour l'inscription
	/*  $(document).on("submit", "#inscription", function(event) {

	   event.preventDefault();
	 
	 }); */
	//voici le script pour le champ text de la page story


	$(function() {
		$('[data-toggle="tooltip"]').tooltip()
	})
</script>


</html>