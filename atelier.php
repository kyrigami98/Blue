<?php
include "INCLUSION/header.php";

include "INCLUSION/redirection1.php";

include "TRAITEMENT/connexion.php";
?>

<div class="container-fluid">
	<div class="card border-0 shadow my-5">
		<div class="card-body">
			<!-- Page Wrapper -->
			<div id="wrapper">
				<!-- Sidebar -->
				<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion rounded" id="accordionSidebar">
					<!-- Sidebar - Brand -->
					<a class="sidebar-brand d-flex align-items-center justify-content-center" href="profil.php#profile">
						<div class="sidebar-brand-icon rotate-n-15">
							<i class="fas fa-laugh-wink"></i>
						</div>
						<div class="sidebar-brand-text mx-3">Atelier</div>
						<!-- Dropdown - User Information -->
					</a>
					<!-- Divider -->
					<hr class="sidebar-divider my-0">
					<li class="nav-item active">
						<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProjet" aria-expanded="true" aria-controls="collapseProjet">
							<i class="fas fa-fw fa-plus"></i>
							<span>Mes projets</span>
						</a>
						<div id="collapseProjet" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
							<div class="bg-white py-2 collapse-inner rounded">
								<div class="card-body">
									<h6 class="collapse-header">Créer un projet:</h6>
									<form class="form-signin" action="TRAITEMENT/projet_systeme.php" method="POST">
										<div class="form-label-group">
											<input type="text" id="inputProjet" class="form-control" placeholder="Nom du projet" name="projet" required>
											<label for="inputProjet">Nom du projet</label>
										</div>
										<input type="hidden" name="formulaire" value="creer" />
										<button class="btn btn-lg btn-primary btn-block " type="submit"><i class="fas fa-fw fa-plus"></i> Créer le projet</button>
									</form>
								</div>
							</div>
							<div class="bg-white py-2 collapse-inner rounded">
								<div class="card-body">
									<h6 class="collapse-header">Mes autres projets:</h6>
									<?php
									$requete = $bdd->prepare('SELECT * FROM projet WHERE id_utilisateur = :id ORDER BY id_projet');

									$requete->execute(array('id' => $_SESSION['id']));

									while ($donnee = $requete->fetch()) {
									?>
										<form action="TRAITEMENT/atelier_systeme.php" method="POST">
											<a class="" href="#">
												<i class="fas fa-fw fa-folder"></i>
												<input type="hidden" name="id" value="<?php echo $donnee['id_projet']; ?>" />
												<input type="hidden" name="formulaire" value="projet" />
												<button class="btn btn-sm"><?php echo $donnee['titre_projet']; ?></button>
											</a>
										</form>
									<?php
									}
									?>
								</div>
							</div>
						</div>
					</li>
					<!-- Divider -->
					<hr class="sidebar-divider">
					<!-- Heading -->
					<div class="sidebar-heading">
						Options Générales
					</div>
					<!-- Nav Item - Utilities Collapse Menu -->
					<li class="nav-item">
						<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
							<i class="fas fa-fw fa-lock"></i>
							<span>Confidentialité</span>
						</a>
						<div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
							<div class="bg-white py-2 collapse-inner rounded">
								<h6 class="collapse-header">Visibilité de <?= $_SESSION['titre_projet'] ?></h6>
								<div class="img-responsive collapse-item d-flex justify-content-center">
									<div class="onoffswitch">
										<input type="checkbox" name="visibilite" data-on="public" data-off="privé" class="onoffswitch-checkbox" id="<?php echo $_SESSION['id']; ?>" <?php if ($_SESSION['visibilite'] == "public") {
																																														echo "checked";
																																													} else {
																																													} ?> />
										<label class="onoffswitch-label" for="<?php echo $_SESSION['id']; ?>">
											<span class="onoffswitch-inner"></span>
										</label>
									</div>
								</div>
							</div>
						</div>
					</li>
					<!-- Nav Item - Pages Collapse Menu -->
					<li class="nav-item">
						<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
							<i class="fas fa-fw fa-cog"></i>
							<span>Collabotations</span>
						</a>
						<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
							<div class="bg-white py-2 collapse-inner rounded">
								<h6 class="collapse-header">Ajouter un collaborateur</h6>
								<form class="form-signin card-body" action="TRAITEMENT/atelier_systeme.php" method="POST">
									<div class="form-label-group">
										<input type="text" id="inputcollaborateur" class="form-control" placeholder="email collaborateur" name="collaborateur" required>
										<label for="inputcollaborateur">Email...</label>
									</div>
									<input type="hidden" name="formulaire" value="collaborer" />
									<button class="btn btn-lg btn-primary btn-block " type="submit"><i class="fas fa-fw fa-user"></i> Ajouter comme collaborateur</button>
								</form>
							</div>
							<div class="bg-white py-2 collapse-inner rounded">
								<h6 class="collapse-header">Mes collaborateurs:</h6>
								<?php
								$requete = $bdd->prepare('SELECT collaborer.id_utilisateur, image_utilisateur, nom_utilisateur FROM collaborer, (SELECT id_utilisateur, image_utilisateur, nom_utilisateur FROM utilisateur)collaborateur WHERE collaborer.id_utilisateur = collaborateur.id_utilisateur AND collaborer.id_projet = :id_projet');

								$requete->execute(array('id_projet' => $_SESSION['id_projet']));

								while ($donnee = $requete->fetch()) {
								?>
									<a class="collapse-item" href="utilisateur.php?id=<?php echo $donnee['id_utilisateur']; ?>">
										<?php if (($donnee['image_utilisateur'] != "")) { ?>
											<img class="img-profile rounded-circle user-photo" src="IMAGES/PROFILS/<?php echo $donnee['image_utilisateur']; ?>" />
										<?php } else { ?>
											<img class="img-profile rounded-circle user-photo" src="IMAGES/PROFILS/STAND.jpg" />
										<?php } ?>
										<span class="mr-2 d-none d-lg-inline text-gray-600 small"><strong><?php echo $donnee['nom_utilisateur']; ?></strong></span>
									</a>
								<?php
								}
								?>
							</div>
						</div>
					</li>
					<!-- Divider -->
					<hr class="sidebar-divider d-none d-md-block">
					<!-- Sidebar Toggler (Sidebar) -->
					<div class="text-center d-none d-md-inline">
						<button class="rounded-circle border-0" id="sidebarToggle"></button>
					</div>
				</ul>
				<!-- End of Sidebar -->
				<!-- Content Wrapper -->
				<div id="content-wrapper" class="d-flex flex-column" style="background-color: white">
					<!-- Main Content -->
					<div id="content">
						<!-- Begin Page Content -->
						<div class="container-fluid">
							<!-- Page Heading -->
							<div class="" style="position: relative;">
								<div style="height: 100%; width: 100%; z-index:0;position:absolute; background: linear-gradient(to left, transparent, rgba(0,0,0,0.8));"></div>

								<div class="d-sm-flex align-items-center justify-content-between mb-4" style='z-index:1; background-image: url("IMAGES/PROFILS/<?php echo $_SESSION['image']; ?>");background-repeat:no-repeat; background-size:cover;'>

									<a class="nav-link nav-item" href="#" style="z-index:0;">
										<h1 class="font-weight-light text-white" style="text-shadow: 2px 2px black;">
											<?php if (isset($_SESSION['titre_projet'])) { ?>
												<img class="avatar rounded img-fluid" style="height:60px;" src="IMAGES/radiant.jpg" />
												<?php echo $_SESSION['titre_projet']; ?>

												<button type="button" data-toggle="modal" data-target="#modif_projet" class="btn btn-primary btn-circle shadow-lg">
													<i class="fas fa-pen"></i>
												</button>
											<?php } else { ?>
												<h1>Atelier</h1>
											<?php } ?>
										</h1>
									</a>
									<div class="d-sm-flex align-items-center justify-content-end">
										<span style="font-size:13px;margin-right:10px;z-index:1;" class="badge badge-primary badge-counter"><?php echo $_SESSION['likes']; ?> <i class="fas fa-fw fa-thumbs-up"></i></span>
										<span style="font-size:13px; margin-right:10px;z-index:1;" class="badge badge-primary badge-counter"><?php echo $_SESSION['followers']; ?> <i class="fas fa-fw fa-users"></i></span>
										<?php if (isset($_SESSION['titre_projet'])) { ?><a href="#" style="z-index:1;margin-right:10px;" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i>Télécharger le projet en pdf</a><?php } ?>
									</div>
								</div>
							</div>
							<div>
								<?php if (isset($_SESSION['titre_projet'])) { ?>
									<!-- Content Row -->
									<div class="row text-center" id="cible">
										<div class="profile-head container-fluid">
											<ul class="nav nav-tabs rounded" id="myTab" role="tablist" style="background-color: rgba(0,0,255,0.05)">
												<li class="nav-item">
													<a class="nav-link active" id="histoire-tab" data-toggle="tab" href="#histoire" role="tab" aria-controls="histoire" aria-selected="true"><i class="fas fa-fw fa-marker"></i>Histoire</a>
												</li>
												<li class="nav-item">
													<a class="nav-link" id="Personnages-tab" data-toggle="tab" href="#Personnages" role="tab" aria-controls="Personnages" aria-selected="false"><i class="fas fa-fw fa-user-ninja"></i>Personnages</a>
												</li>
												<li class="nav-item">
													<a class="nav-link" id="Bestiaire-tab" data-toggle="tab" href="#Bestiaire" role="tab" aria-controls="Bestiaire" aria-selected="false"><i class="fas fa-fw fa-paw"></i>Bestiaire</a>
												</li>
												<li class="nav-item">
													<a class="nav-link" id="Lieux-tab" data-toggle="tab" href="#Lieux" role="tab" aria-controls="Lieux" aria-selected="false"><i class="fas fa-fw fa-globe-africa"></i>Lieux et villes</a>
												</li>
												<li class="nav-item">
													<a class="nav-link" id="Termes-tab" data-toggle="tab" href="#Termes" role="tab" aria-controls="Termes" aria-selected="false"><i class="fas fa-fw fa-list-alt"></i>Termes théoriques</a>
												</li>
												<li class="nav-item">
													<a class="nav-link" id="Illustrations-tab" data-toggle="tab" href="#Illustrations" role="tab" aria-controls="Illustrations" aria-selected="false"><i class="fas fa-fw fa-dragon"></i>Illustrations</a>
												</li>
											</ul>
										</div>
										<div class="col-md-12 container-fluid rounded">
											<div class="tab-content profile-tab" id="myTabContent">
												<div class="tab-pane fade show active" id="histoire" role="tabpanel" aria-labelledby="histoire-tab">
													<br>
													<div class="row">
														<div class="card-columns">
															<?php
															$requete = $bdd->prepare('SELECT id_chapitre, titre_chapitre, description_chapitre, image_chapitre FROM chapitre, (SELECT id_tome FROM tome WHERE id_projet = :id)resultat WHERE chapitre.id_tome = resultat.id_tome');

															$requete->execute(array('id' => $_SESSION['id_projet']));

															$count = 1;

															while ($donnee = $requete->fetch()) {
															?>
																<div class="card shadow post">
																	<a href="#" data-toggle="modal" data-target="#imageReader">
																		<?php if ($donnee['image_chapitre'] != "") { ?>
																			<img class="card-img-top" src="IMAGES/CHAPITRES/<?php echo $donnee['image_chapitre']; ?>" alt="" data-toggle="tooltip" data-placement="left" data-html="false" title='<?php echo $donnee['description_chapitre']; ?>'>
																		<?php } else { ?>
																			<img class="card-img-top" src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" alt="" data-toggle="tooltip" data-placement="left" data-html="false" title='<?php echo $donnee['description_chapitre']; ?>'>
																		<?php } ?>
																	</a>
																	<div class="card-body btn-block">
																		<a href="story.php?id=<?php echo $donnee['id_chapitre']; ?>" class="btn">
																			<h5 class="card-title">
																				Chapitre <?php echo $count . ": "; ?>
																				<?php echo $donnee['titre_chapitre']; ?>
																			</h5>
																		</a>
																	</div>
																	<form action="TRAITEMENT/supprimer.php" method="POST">
																		<input type="hidden" name="id" value="<?php echo $donnee['id_chapitre']; ?>" />
																		<input type="hidden" name="supprimer" value="chapitre" />
																		<button type="submit" class="btn btn-danger btn-circle shadow-lg deleteboutton">
																			<i class="fas fa-trash-alt"></i>
																		</button>
																	</form>
																</div>
															<?php
																$count++;
															}
															?>
														</div>
													</div>
												</div>
												<div class="tab-pane fade" id="Personnages" role="tabpanel" aria-labelledby="Personnages-tab">
													<br>
													<div class="row">
														<div class="card-columns">
															<?php
															$requete = $bdd->prepare('SELECT personnage.id_personnage, nom_personnage, description_personnage, image_personnage FROM personnage, intervenir WHERE personnage.id_personnage = intervenir.id_personnage AND intervenir.id_projet = :id_projet ORDER BY id_personnage DESC');

															$requete->execute(array('id_projet' => $_SESSION['id_projet']));

															while ($donnee = $requete->fetch()) {
															?>
																<div class="card shadow post">
																	<a href="#" data-toggle="modal" data-target="#imageReader">
																		<?php if ($donnee['image_personnage'] != "") { ?>
																			<img class="card-img-top" src="IMAGES/PERSONNAGES/<?php echo $donnee['image_personnage']; ?>" alt="" data-toggle="tooltip" data-placement="left" data-html="false" title='<?php echo $donnee['description_personnage']; ?>' />
																		<?php } else { ?>
																			<img class="card-img-top" src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" alt="" data-toggle="tooltip" data-placement="left" data-html="false" title='<?php echo $donnee['description_personnage']; ?>' />
																		<?php } ?>
																	</a>
																	<div class="card-body btn-block">
																		<a href="personnage.php?id=<?php echo $donnee['id_personnage']; ?>" class="btn">
																			<h5 class="card-title">
																				<?php echo $donnee['nom_personnage']; ?>
																			</h5>
																		</a>
																	</div>
																	<form action="TRAITEMENT/supprimer.php" method="POST">
																		<input type="hidden" name="id" value="<?php echo $donnee['id_personnage']; ?>" />
																		<input type="hidden" name="supprimer" value="personnage" />
																		<button type="submit" class="btn btn-danger btn-circle shadow-lg deleteboutton">
																			<i class="fas fa-trash-alt"></i>
																		</button>
																	</form>
																</div>
															<?php
															}
															?>
														</div>
													</div>
												</div>
												<div class="tab-pane fade show" id="Bestiaire" role="tabpanel" aria-labelledby="Bestiaire-tab">
													<br>
													<div class="row">
														<div class="card-columns">
															<?php
															$requete = $bdd->prepare('SELECT creature.id_creature, nom_creature, description_creature, image_creature FROM creature, apparaitre WHERE creature.id_creature = apparaitre.id_creature AND apparaitre.id_projet = :id_projet ORDER BY id_creature DESC');

															$requete->execute(array('id_projet' => $_SESSION['id_projet']));

															while ($donnee = $requete->fetch()) {
															?>
																<div class="card shadow post">
																	<a href="#" data-toggle="modal" data-target="#imageReader">
																		<?php if ($donnee['image_creature'] != "") { ?>
																			<img class="card-img-top" src="IMAGES/CREATURES/<?php echo $donnee['image_creature']; ?>" alt="" data-toggle="tooltip" data-placement="left" data-html="false" title='<?php echo $donnee['description_creature']; ?>' />
																		<?php } else { ?>
																			<img class="card-img-top" src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" alt="" data-toggle="tooltip" data-placement="left" data-html="false" title='<?php echo $donnee['description_creature']; ?>' />
																		<?php } ?>
																	</a>
																	<div class="card-body btn-block">
																		<a href="creature.php?id=<?php echo $donnee['id_creature']; ?>" class="btn">
																			<h5 class="card-title">
																				<?php echo $donnee['nom_creature']; ?>
																			</h5>
																		</a>
																	</div>
																	<form action="TRAITEMENT/supprimer.php" method="POST">
																		<input type="hidden" name="id" value="<?php echo $donnee['id_creature']; ?>" />
																		<input type="hidden" name="supprimer" value="creature" />
																		<button type="submit" class="btn btn-danger btn-circle shadow-lg deleteboutton">
																			<i class="fas fa-trash-alt"></i>
																		</button>
																	</form>
																</div>
															<?php
															}
															?>
														</div>
													</div>
												</div>
												<div class="tab-pane fade show" id="Lieux" role="tabpanel" aria-labelledby="Lieux-tab">
													<br>
													<div class="row">
														<div class="card-columns">
															<?php
															$requete = $bdd->prepare('SELECT lieu.id_lieu, nom_lieu, description_lieu, image_lieu FROM lieu, visiter WHERE lieu.id_lieu = visiter.id_lieu AND visiter.id_projet = :id_projet ORDER BY id_lieu DESC');

															$requete->execute(array('id_projet' => $_SESSION['id_projet']));

															while ($donnee = $requete->fetch()) {
															?>
																<div class="card shadow post">
																	<a href="#" data-toggle="modal" data-target="#imageReader">
																		<?php if ($donnee['image_lieu'] != "") { ?>
																			<img class="card-img-top" src="IMAGES/LIEUX/<?php echo $donnee['image_lieu']; ?>" alt="" data-toggle="tooltip" data-placement="left" data-html="false" title='<?php echo $donnee['description_lieu']; ?>' />
																		<?php } else { ?>
																			<img class="card-img-top" src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" alt="" data-toggle="tooltip" data-placement="left" data-html="false" title='<?php echo $donnee['description_lieu']; ?>' />
																		<?php } ?>
																	</a>
																	<div class="card-body btn-block">
																		<a href="lieu.php?id=<?php echo $donnee['id_lieu']; ?>" class="btn">
																			<h5 class="card-title">
																				<?php echo $donnee['nom_lieu']; ?>
																			</h5>
																		</a>
																	</div>
																	<form action="TRAITEMENT/supprimer.php" method="POST">
																		<input type="hidden" name="id" value="<?php echo $donnee['id_lieu']; ?>" />
																		<input type="hidden" name="supprimer" value="lieu" />
																		<button type="submit" class="btn btn-danger btn-circle shadow-lg deleteboutton">
																			<i class="fas fa-trash-alt"></i>
																		</button>
																	</form>
																</div>
															<?php
															}
															?>
														</div>
													</div>
												</div>
												<div class="tab-pane fade show" id="Termes" role="tabpanel" aria-labelledby="Termes-tab">
													<br>
													<div class="row">
														<div class="card-columns">
															<?php
															$requete = $bdd->prepare('SELECT terme.id_terme, nom_terme, description_terme FROM terme, citer WHERE terme.id_terme = citer.id_terme AND citer.id_projet = :id_projet ORDER BY id_terme DESC');

															$requete->execute(array('id_projet' => $_SESSION['id_projet']));

															while ($donnee = $requete->fetch()) {
															?>
																<div class="card border-left-primary shadow h-100 py-2 post">
																	<div class="card-body">
																		<div class="row no-gutters align-items-center">
																			<div class="col mr-2">
																				<div class="h5 mb-0 font-weight-bold text-primary"><a href="terme.php?id=<?php echo $donnee['id_terme']; ?>"><?php echo $donnee['nom_terme']; ?></a></div>
																				<div class="">
																					<?php echo $donnee['description_terme']; ?>
																				</div>
																			</div>
																			<br />
																			<br />
																			<form action="TRAITEMENT/supprimer.php" method="POST">
																				<input type="hidden" name="id" value="<?php echo $donnee['id_terme']; ?>" />
																				<input type="hidden" name="supprimer" value="terme" />
																				<button type="submit" class="btn btn-danger btn-circle shadow-lg deleteboutton">
																					<i class="fas fa-trash-alt"></i>
																				</button>
																			</form>
																		</div>
																	</div>
																</div>
															<?php
															}
															?>
														</div>
													</div>
												</div>
												<div class="tab-pane fade show" id="Illustrations" role="tabpanel" aria-labelledby="Illustrations-tab">
													<br>
													<div class="row">
														<div class="card-columns">
															<?php
															$requete = $bdd->prepare('SELECT * FROM illustration WHERE id_projet = :id_projet ORDER BY id_illustration DESC');

															$requete->execute(array('id_projet' => $_SESSION['id_projet']));

															while ($donnee = $requete->fetch()) {
															?>
																<div class="card shadow post">
																	<a href="#" data-toggle="modal" data-target="#imageReader">
																		<?php if ($donnee['image_illustration'] != "") { ?>
																			<img class="card-img-top" src="IMAGES/ILLUSTRATIONS/<?php echo $donnee['image_illustration']; ?>" alt="" data-toggle="tooltip" data-placement="left" data-html="false" title='<?php echo $donnee['description_illustration']; ?>' />
																		<?php } else { ?>
																			<img class="card-img-top" src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" alt="" data-toggle="tooltip" data-placement="left" data-html="false" title='<?php echo $donnee['description_illustration']; ?>' />
																		<?php } ?>
																	</a>
																	<div class="card-body btn-block">
																		<a href="illustration.php?id=<?php echo $donnee['id_illustration']; ?>" class="btn">
																			<h5 class="card-title">
																				<?php echo $donnee['titre_illustration']; ?>
																			</h5>
																		</a>
																	</div>
																	<form action="TRAITEMENT/supprimer.php" method="POST">
																		<input type="hidden" name="id" value="<?php echo $donnee['id_illustration']; ?>" />
																		<input type="hidden" name="supprimer" value="illustration" />
																		<button type="submit" class="btn btn-danger btn-circle shadow-lg deleteboutton">
																			<i class="fas fa-trash-alt"></i>
																		</button>
																	</form>
																</div>
															<?php
															}
															?>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								<?php } else {
								} ?>
							</div>
							<!-- End of Main Content -->
						</div>
						<!-- End of Content Wrapper -->
					</div>
					<!-- End of Page Wrapper -->
				</div>
			</div>
		</div>
	</div>

	<script>
		$(document).ready(function() {
			$('#<?php echo $_SESSION['id']; ?>').on('change', function() {
				var isChecked = $(this).is(':checked');
				var selectedData;

				if (isChecked) {
					selectedData = $(this).attr('data-on');
				} else {
					selectedData = $(this).attr('data-off');
				}

				var formulaire = "visibilite";

				$.ajax({
					url: 'TRAITEMENT/projet_systeme.php',
					type: 'POST',
					dataType: 'JSON',
					data: {
						formulaire: formulaire,
						visibilite: selectedData
					},
					success: function(data) {
						alert(data.message)
					}
				});
			});
		});
	</script>

	<?php
	include "INCLUSION/footer.php";
	?>