<?php
include "INCLUSION/header.php";

if (!isset($_SESSION['pseudo'])) {
	header('Location: index.php');
}

include("TRAITEMENT/connexion.php");
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
									<form class="form-signin" action="TRAITEMENT/projet_systeme.php" method="POST">
										<div class="form-label-group">
											<input type="text" id="inputProjet" class="form-control" placeholder="Nom du projet" name="projet" required>
											<label for="inputProjet">Nom du projet</label>
										</div>
										<input type="hidden" name="formulaire" value="creer" />
										<button class="btn btn-lg btn-primary btn-block " type="submit"><i class="fas fa-fw fa-plus"></i> Créer le projet</button>
									</form>
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

									$requete->closeCursor();
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
							<i class="fas fa-fw fa-wrench"></i>
							<span>Options</span>
						</a>
						<div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
							<div class="bg-white py-2 collapse-inner rounded">
								<h6 class="collapse-header">les gens qui peuvent voir</h6>
								<a class="collapse-item" href="utilities-color.html">Colors</a>
								<a class="collapse-item" href="utilities-border.html">Borders</a>
								<a class="collapse-item" href="utilities-animation.html">Animations</a>
								<a class="collapse-item" href="utilities-other.html">Other</a>
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
								<h6 class="collapse-header">Custom Components:</h6>
								<a class="collapse-item" href="buttons.html">Buttons</a>
								<a class="collapse-item" href="cards.html">Cards</a>
							</div>
						</div>
					</li>

					<!-- Divider -->
					<hr class="sidebar-divider">

					<!-- Heading -->
					<div class="sidebar-heading">
						Addons
					</div>

					<!-- Nav Item - Pages Collapse Menu -->
					<li class="nav-item">
						<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
							<i class="fas fa-fw fa-folder"></i>
							<span>Pages</span>
						</a>
						<div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
							<div class="bg-white py-2 collapse-inner rounded">
								<h6 class="collapse-header">Login Screens:</h6>
								<a class="collapse-item" href="login.html">Login</a>
								<a class="collapse-item" href="register.html">Register</a>
								<a class="collapse-item" href="forgot-password.html">Forgot Password</a>
								<div class="collapse-divider"></div>
								<h6 class="collapse-header">Other Pages:</h6>
								<a class="collapse-item" href="404.html">404 Page</a>
								<a class="collapse-item" href="blank.html">Blank Page</a>
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
							<div class="d-sm-flex align-items-center justify-content-between mb-4" style='background-image: url("IMAGES/PROFILS/<?php echo $_SESSION['image']; ?>");background-repeat:no-repeat; background-size:cover;'>
								<a class="nav-link nav-item" href="#">
									<h1 class="font-weight-light text-white" style="text-shadow: 2px 2px black;">
										<?php if (isset($_SESSION['titre_projet'])) { ?>
											<img class="avatar rounded img-fluid" style="height:60px;" src="IMAGES/radiant.jpg" />
											<?php echo $_SESSION['titre_projet']; ?>
											<span style="font-size:13px;" class="badge badge-primary badge-counter"><?php echo $_SESSION['likes']; ?> <i class="fas fa-fw fa-thumbs-up"></i></span>
											<span style="font-size:13px;" class="badge badge-primary badge-counter"><?php echo $_SESSION['followers']; ?> <i class="fas fa-fw fa-users"></i></span>
										<?php } else { ?>
											<h1>Atelier</h1>
										<?php } ?>
									</h1>
								</a>
								<?php if (isset($_SESSION['titre_projet'])) { ?><a href="#" style="z-index:1" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i>Télécharger le projet en pdf</a><?php } ?>

							</div>
							<?php
							if (isset($_SESSION['titre_projet'])) {
							?>
								<!-- Content Row -->
								<div class="row text-center" id="cible">
									<div class="profile-head container-fluid">
										<ul class="nav nav-tabs" id="myTab" role="tablist">
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
									<div class="col-md-12 container-fluid">
										<div class="tab-content profile-tab" id="myTabContent">
											<div class="tab-pane fade show active" id="histoire" role="tabpanel" aria-labelledby="histoire-tab">
												<br>
												<div class="row">

													<?php
													$requete = $bdd->prepare('SELECT id_chapitre, titre_chapitre, description_chapitre, image_chapitre FROM chapitre, (SELECT id_tome FROM tome WHERE id_projet = :id)resultat WHERE chapitre.id_tome = resultat.id_tome');

													$requete->execute(array('id' => $_SESSION['id_projet']));

													$count = 1;

													while ($donnee = $requete->fetch()) { ?>
														<div class="col-xl-3 col-md-6 mb-4">
															<div class="card border-left-info shadow h-100 py-2">
																<div class="card-body">
																	<div class="row no-gutters align-items-center">
																		<div class="col mr-2">
																			<div class="font-weight-bold text-info text-uppercase mb-1">Chapitre <?php echo $count; ?></div>
																			<div class="text-xs text-muted font-weight-bold text-info text-uppercase mb-1"><a href="story.php?id=<?php echo $donnee['id_chapitre']; ?>"><?php echo $donnee['titre_chapitre']; ?></a></div>
																			<div>
																				<a href="">
																					<?php
																					if ($donnee['image_chapitre'] != "") {
																					?>
																						<img class="card-img-top" src="IMAGES/CHAPITRES/<?php echo $donnee['image_chapitre']; ?>" alt="">
																					<?php } else { ?>

																					<?php } ?>
																				</a>
																			</div>
																			<br />
																			<div class="row no-gutters align-items-center">
																				<div class="col">
																					<?php echo $donnee['description_chapitre']; ?>
																				</div>
																			</div>
																			<br />
																			<br />
																			<form action="TRAITEMENT/supprimer.php" method="POST">
																				<input type="hidden" name="id" value="<?php echo $donnee['id_chapitre']; ?>" />
																				<input type="hidden" name="supprimer" value="chapitre" />
																				<button class="btn btn-sm btn-primary shadow-sm" type="submit">Supprimer</button>
																			</form>
																		</div>
																	</div>
																</div>
															</div>
														</div>

													<?php $count++;
													}
													?>
												</div>
											</div>
											<div class="tab-pane fade" id="Personnages" role="tabpanel" aria-labelledby="Personnages-tab">
												<br>
												<div class="row">
													<?php
													$requete = $bdd->prepare('SELECT personnage.id_personnage, nom_personnage, description_personnage, image_personnage FROM personnage, intervenir WHERE personnage.id_personnage = intervenir.id_personnage AND intervenir.id_projet = :id_projet ORDER BY id_personnage DESC');

													$requete->execute(array('id_projet' => $_SESSION['id_projet']));

													while ($donnee = $requete->fetch()) {
													?>
														<div class="col-lg-4 col-sm-8 mb-4">
															<div class="card h-100">
																<a href="#">
																	<?php
																	if ($donnee['image_personnage'] == "") {
																	?>
																		<img class="card-img-top" src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" alt="">
																	<?php } else { ?>
																		<img class="card-img-top" src="IMAGES/PERSONNAGES/<?php echo $donnee['image_personnage']; ?>" alt="">
																	<?php } ?>
																</a>
																<div class="card-body">
																	<h4 class="card-title">
																		<a href="#"><?php echo $donnee['nom_personnage']; ?></a>
																	</h4>
																	<p>
																		<?php echo $donnee['description_personnage']; ?>
																	</p>
																	<br />
																	<a href="modification_personnage.php?id=<?php echo $donnee['id_personnage']; ?>">Details sur l'illustration &rarr;</a>
																	<br />
																	<br />
																	<form action="TRAITEMENT/supprimer.php" method="POST\">
																		<input type="hidden" name="id" value="<?php echo $donnee['id_personnage']; ?>" />
																		<input type="hidden" name="supprimer" value="personnage" />
																		<button class="btn btn-sm btn-primary shadow-sm" type="submit">Supprimer</button>
																	</form>
																</div>
															</div>
														</div>

													<?php }
													?>
												</div>
											</div>
											<div class="tab-pane fade show" id="Bestiaire" role="tabpanel" aria-labelledby="Bestiaire-tab">
												<br>
												<div class="row">

													<?php
													$requete = $bdd->prepare('SELECT creature.id_creature, nom_creature, description_creature, image_creature FROM creature, apparaitre WHERE creature.id_creature = apparaitre.id_creature AND apparaitre.id_projet = :id_projet ORDER BY id_creature DESC');

													$requete->execute(array('id_projet' => $_SESSION['id_projet']));

													while ($donnee = $requete->fetch()) { ?>

														<div class="col-lg-4 col-sm-8 mb-4">
															<div class="card h-100">
																<a href="#">
																	<?php if ($donnee['image_creature'] == "") { ?>
																		<img class="card-img-top" src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" alt="">
																	<?php } else { ?>
																		<img class="card-img-top" src="IMAGES/CREATURES/<?php echo $donnee['image_creature']; ?>" alt="">
																	<?php } ?>
																</a>
																<div class="card-body">
																	<h4 class="card-title">
																		<a href="#"><?php echo $donnee['nom_creature']; ?></a>
																	</h4>
																	<p>
																		<?php echo $donnee['description_creature']; ?>
																	</p>
																	<br />
																	<a href="modification_creature.php?id=<?php echo $donnee['id_creature']; ?>">Details sur l'illustration &rarr;</a>
																	<br />
																	<br />
																	<form action="TRAITEMENT/supprimer.php" method="POST">
																		<input type="hidden" name="id" value="<?php echo $donnee['id_creature']; ?>" />
																		<input type="hidden" name="supprimer" value="creature" />
																		<button class="btn btn-sm btn-primary shadow-sm" type="submit">Supprimer</button>
																	</form>
																</div>
															</div>
														</div>
													<?php }
													?>
												</div>
											</div>
											<div class="tab-pane fade show" id="Lieux" role="tabpanel" aria-labelledby="Lieux-tab">
												<br>
												<div class="row">

													<?php
													$requete = $bdd->prepare('SELECT lieu.id_lieu, nom_lieu, description_lieu, image_lieu FROM lieu, visiter WHERE lieu.id_lieu = visiter.id_lieu AND visiter.id_projet = :id_projet ORDER BY id_lieu DESC');

													$requete->execute(array('id_projet' => $_SESSION['id_projet']));

													while ($donnee = $requete->fetch()) { ?>


														<div class="card shadow mb-4 col-lg-4 col-sm-8 mb-4">
															<div class="card-header py-3">
																<h6 class="m-0 font-weight-bold text-primary"><?php echo $donnee['nom_lieu']; ?></h6>
															</div>
															<div class="card-body">
																<div class="text-center">
																	<?php if ($donnee['image_lieu'] == "") { ?>
																		<img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" alt="">
																	<?php } else { ?>
																		<img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="IMAGES/LIEUX/<?php echo $donnee['image_lieu']; ?>" alt="">
																	<?php } ?>
																</div>
																<p>
																	<?php echo $donnee['description_lieu']; ?>
																</p>
																<br />
																<a href="modification_lieu.php?id=<?php echo $donnee['id_lieu']; ?>">Details sur l'illustration &rarr;</a>
																<br />
																<br />
																<form action="TRAITEMENT/supprimer.php" method="POST">
																	<input type="hidden" name="id" value="<?php echo $donnee['id_lieu']; ?>" />
																	<input type="hidden" name="supprimer" value="lieu" />
																	<button class="btn btn-sm btn-primary shadow-sm" type="submit">Supprimer</button>
																</form>
															</div>
														</div>
													<?php
													}
													?>
												</div>
											</div>
											<div class="tab-pane fade show" id="Termes" role="tabpanel" aria-labelledby="Termes-tab">
												<br>
												<div class="row">

													<?php
													$requete = $bdd->prepare('SELECT terme.id_terme, nom_terme, description_terme FROM terme, citer WHERE terme.id_terme = citer.id_terme AND citer.id_projet = :id_projet ORDER BY id_terme DESC');

													$requete->execute(array('id_projet' => $_SESSION['id_projet']));

													while ($donnee = $requete->fetch()) { ?>
														<div class="col-xl-3 col-md-6 mb-4">
															<div class="card border-left-primary shadow h-100 py-2">
																<div class="card-body">
																	<div class="row no-gutters align-items-center">
																		<div class="col mr-2">
																			<div class="h5 mb-0 font-weight-bold text-primary"><a href="modification_terme.php?id=<?php echo $donnee['id_terme']; ?>"><?php echo $donnee['nom_terme']; ?></a></div>
																			<div class="">
																				<?php echo $donnee['description_terme']; ?>
																			</div>
																		</div>
																		<br />
																		<br />
																		<form action="TRAITEMENT/supprimer.php" method="POST">
																			<input type="hidden" name="id" value="<?php echo $donnee['id_terme']; ?>" />
																			<input type="hidden" name="supprimer" value="terme" />
																			<button class="btn btn-sm btn-primary shadow-sm" type="submit">Supprimer</button>
																		</form>
																	</div>
																</div>
															</div>
														</div>
													<?php }
													?>
												</div>
											</div>
											<div class="tab-pane fade show" id="Illustrations" role="tabpanel" aria-labelledby="Illustrations-tab">
												<br>
												<div class="row">

													<?php
													$requete = $bdd->prepare('SELECT * FROM illustration WHERE id_projet = :id_projet ORDER BY id_illustration DESC');

													$requete->execute(array('id_projet' => $_SESSION['id_projet']));

													while ($donnee = $requete->fetch()) { ?>
														<div class="col-xl-4 col-md-6 mb-4">
															<div class="card border-left-info shadow h-100 py-2">
																<div class="card-body">
																	<div class="row no-gutters align-items-center">
																		<div class="col mr-2">
																			<div class="font-weight-bold text-info text-uppercase mb-1"><?php echo $donnee['titre_illustration']; ?></div>
																			<div class="row no-gutters align-items-center">
																				<div class="col">
																					<a href="modification_illustration.php?id=<?php echo $donnee['id_illustration']; ?>">
																						<?php if ($donnee['image_illustration'] == "") { ?>
																							<img class="card-img-top" src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png\" alt="">
																						<?php } else { ?>
																							<img class="card-img-top" src="IMAGES/ILLUSTRATIONS/<?php echo $donnee['image_illustration']; ?>" alt="">
																						<?php } ?>
																					</a>
																				</div>
																				<div class="">
																					<?php echo $donnee['description_illustration']; ?>
																				</div>
																			</div>
																			<br />
																			<br />
																			<form action="TRAITEMENT/supprimer.php" method="POST">
																				<input type="hidden" name="id" value="<?php echo $donnee['id_illustration']; ?>" />
																				<input type="hidden" name="supprimer" value="illustration" />
																				<button class="btn btn-sm btn-primary shadow-sm" type="submit">Supprimer</button>
																			</form>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													<?php
													}
													?>
												</div>
											</div>
										</div>
									</div>
								</div>
							<?php
							} else {
							}
							?>
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

<?php
include "INCLUSION/footer.php";
?>