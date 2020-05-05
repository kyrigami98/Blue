<?php

include("INCLUSION/header.php");

include("INCLUSION/redirection1.php");

include("TRAITEMENT/connexion.php");

include("INCLUSION/nombre_projets.php");

?>
<div class="container">
	<div class="card border-0 shadow my-5">
		<div class="card-body p-5">
			<div class="row">
				<div class="col-md-4">
					<form action="TRAITEMENT/systeme.php" method="POST" enctype="multipart/form-data">
						<div class="profile-img">
							<h4>
								<?php
								if (isset($_SESSION['pseudo'])) {
									echo $_SESSION['pseudo'];
								}
								?>
							</h4>
							<h6 class="text-muted">
								<?php
								if (isset($_SESSION['type'])) {
									echo $_SESSION['type'];
								} else {
									echo "...";
								}
								?>
							</h6>
							<?php
							if ($_SESSION['image']) {
							?>
								<img class="avatar rounded img-fluid" src="IMAGES/PROFILS/<?php echo $_SESSION['image']; ?>" alt="<?php echo $_SESSION['image']; ?>" />
							<?php
							} else {
							?>
								<img class="avatar rounded img-fluid" src="IMAGES/PROFILS/STAND.jpg" alt="Image par defaut" />
							<?php
							}
							?>
							<div class="file btn btn-lg btn-primary">
								Photo de Profil
								<input type="file" name="image" class="file-upload" required />
							</div>
							<input type="hidden" name="formulaire" value="image" />
							<button class="btn btn-lg btn-primary btn-block" type="submit">
								<i class="glyphicon glyphicon-ok-sign"></i>
								Enregistrer l'image
							</button>
							<br />
						</div>
					</form>
					<div class="row">
						<div class="col-md-12">
							<div class="profile-work">
								<ul class="list-group">
									<li class="list-group-item text-muted">
										Activité
										<i class="fa fa-dashboard fa-1x"></i>
									</li>
									<li class="list-group-item text-right">
										<span class="pull-left">
											<strong>
												Partage
											</strong>
										</span>
										<?php
										if (isset($_SESSION['partages'])) {
											echo $_SESSION['partages'];
										} else {
											echo "0";
										}
										?>
									</li>
									<li class="list-group-item text-right">
										<span class="pull-left">
											<strong>
												Likes
											</strong>
										</span>
										<?php
										if (isset($_SESSION['likes'])) {
											echo $_SESSION['likes'];
										} else {
											echo "0";
										}
										?>
									</li>
									<li class="list-group-item text-right">
										<span class="pull-left">
											<strong>
												Nombre de Projet
											</strong>
										</span>
										<?php
										if (isset($_SESSION['projets'])) {
											echo $_SESSION['projets'];
										} else {
											echo "0";
										}
										?>
									</li>
									<li class="list-group-item text-right">
										<span class="pull-left">
											<strong>
												Followers
											</strong>
										</span>
										<?php
										if (isset($_SESSION['followers'])) {
											echo $_SESSION['followers'];
										} else {
											echo "0";
										}
										?>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<br>
				</div>
				<div class="col-md-8">
					<div class="profile-head">
						<ul class="nav nav-tabs" id="myTab" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">
									Projets
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
									Informations
								</a>
							</li>
						</ul>
					</div>
					<div class="col-md-12">
						<div class="tab-content profile-tab" id="myTabContent">
							<div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
								<br>

								<div class="card">
									<div class="card-body">
										<form class="form-signin" action="TRAITEMENT/projet_systeme.php" method="POST">

											<h4 class="card-title">
												Création de projet

												<div class="pull-right img-responsive">
													<div class="onoffswitch">
														<input type="checkbox" name="visibilite" data-on="public" data-off="privé" class="onoffswitch-checkbox" id="myonoffswitch" />
														<label class="onoffswitch-label" for="myonoffswitch">
															<span class="onoffswitch-inner"></span>
														</label>
													</div>
												</div>

											</h4>
											<hr>

											<div class="">
												<div class="form-label-group">
													<input type="text" id="inputProjet" class="form-control" placeholder="Nom du projet" name="projet" required />
													<label for="inputProjet">
														Nom du projet
													</label>
												</div>

												<input type="hidden" name="formulaire" value="creer" />
												<button class="btn btn-lg btn-primary btn-block " type="submit">
													<i class="fas fa-fw fa-plus"></i>
													Créer le projet
												</button>
											</div>

										</form>
									</div>
								</div>
								<hr>
								<div class="inline-block">
									<div class="card">
										<div class="card-body">
											<h4 class="card-title">
												Mes projets
											</h4>
											<div class="row">
												<?php

												$requete = $bdd->query('SELECT * FROM projet ORDER BY id_projet DESC');

												while ($donnee = $requete->fetch()) {
													if ($donnee['id_utilisateur'] == $_SESSION['id']) {
												?>
														<div class="col-lg-6 col-sm-6 mb-4">
															<span style="font-size:10px;" class="badge badge-primary badge-counter">
																<?php
																echo $donnee['likes_projet'];
																?>
																<i class="fas fa-fw fa-thumbs-up"></i>
															</span>
															<span style="font-size:10px;" class="badge badge-primary badge-counter">
																<?php
																echo $donnee['followers_projet'];
																?>
																<i class="fas fa-fw fa-users"></i>
															</span>
															<form action="TRAITEMENT/atelier_systeme.php" method="POST">
																<div class="card h-100" data-toggle="tooltip" data-placement="left" data-html="false" title='<?php echo $donnee['description_projet']; ?>'>
																	<a href="#">
																	<?php if($donnee['image_projet'] == ""){ ?>
																		<img class="card-img-top" src="IMAGES/giphy1.gif" alt="" />
																	<?php }else{ ?>
																		<img class="card-img-top" src="IMAGES/PROJETS/<?php echo $donnee['image_projet']; ?>" alt="" />
																	<?php } ?>
																	</a>
																	<div class="card-body">
																		<h4 class="card-title">
																			<input type="hidden" name="id" value="<?php echo $donnee['id_projet']; ?>" />
																			<input type="hidden" name="formulaire" value="projet" />
																			<button class="btn btn-md" href="#">
																				<?php
																				echo $donnee['titre_projet'];
																				?>
																			</button>

																			<div class="pull-right img-responsive">
																				<div class="onoffswitch">
																					<input type="checkbox" name="visibilite" data-on="public" data-off="privé" class="onoffswitch-checkbox" id="<?php echo $donnee['id_projet']; ?>" onchange="changer(<?php echo $donnee['id_projet']; ?>);" <?php if($donnee['visibilite'] == "public"){ echo "checked"; } else { } ?> />
																					<label class="onoffswitch-label" for="<?php echo $donnee['id_projet']; ?>">
																						<span class="onoffswitch-inner"></span>
																					</label>
																				</div>
																			</div>

																		</h4>
																	</div>
																</div>
															</form>
														</div>
												<?php
													}
												}
												?>
											</div>

										</div>
									</div>
								</div>
							</div>
							<div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
								<form action="TRAITEMENT/systeme.php" method="POST">
									<hr>
									<div class="form-label-group">
										<div class="form-group">
											<label for="Titre">
												Titre
											</label>
											<select class="form-control" id="Titre" name="type">
												<option value="Dessinateur">
													Déssinateur
												</option>
												<option value="Scenariste">
													Scénariste
												</option>
												<option value="Scenariste & Dessinateur">
													Déssinateur & Scénariste
												</option>
											</select>
										</div>
									</div>
									<hr>
									<div class="form-label-group">
										<input type="text" id="inputUserame" class="form-control" placeholder="Username" name="pseudo" value="<?php echo $_SESSION['pseudo']; ?>" required autofocus>
										<label for="inputUserame">
											Pseudo
										</label>
									</div>
									<div class="form-label-group">
										<input type="email" id="inputEmail2" class="form-control" placeholder="Email address" name="email" value="<?php echo $_SESSION['email']; ?>" required>
										<label for="inputEmail2">
											Email
										</label>
									</div>
									<hr>
									<div class="form-label-group">
										<input type="password" id="inputPassword2" class="form-control" placeholder="Password" name="password">
										<label for="inputPassword2">
											Ancien Mot de passe
										</label>
									</div>
									<div class="form-label-group">
										<input type="password" id="inputPassword3" class="form-control" placeholder="Password" name="newpassword">
										<label for="inputPassword3">
											Nouveau Mot de passe
										</label>
									</div>
									<div class="form-label-group">
										<div class="form-check">
											<label class="form-check-label">
												<input type="checkbox" class="form-check-input" value="">
												J'ai lu et j'accepte les
												<a href="">
													conditions d'utilisation
													<a>
											</label>
										</div>
									</div>
									<div class="row pull-right">
										<div class="form-group">
											<div class="col-xs-12">
												<br>
												<input type="hidden" name="formulaire" value="profil" />
												<button class="btn btn-lg btn-success pull-right" type="submit">
													<i class="glyphicon glyphicon-ok-sign"></i>
													Sauvegarder
												</button>
												<button class="btn btn-lg  pull-left" type="reset">
													<i class="fa fa-repeat"></i>
													Vider les champs
												</button>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<script>
	function changer(id){
		var valeur = '#'+id;
		var isChecked = $(valeur).is(':checked');
		var selectData;

		if(isChecked){
			selectedData = $(valeur).attr('data-on');
		}
		else{
			selectedData = $(valeur).attr('data-off');
		}

		var formulaire = "visibilite";

		$.ajax({
			url: 'TRAITEMENT/projet_systeme.php',
			type: 'POST',
			dataType: 'JSON',
			data: {
				id: id,
				formulaire: formulaire,
				visibilite: selectedData
			},
			success: function(data){
				alert(data.message)
			}
		});
	}
</script>

<?php
include "INCLUSION/footer.php";
?>