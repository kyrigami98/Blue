<?php
	include "INCLUSION/header.php";
	
	if(!isset($_SESSION['pseudo']))
	{
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
						<div class="sidebar-brand-text mx-3" >Atelier</div>
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
							<?php
								$requete = $bdd->prepare('SELECT * FROM projet WHERE id_utilisateur = :id ORDER BY id_projet');
								$requete->execute(array('id' => $_SESSION['id']));
								
								while($donnee = $requete->fetch())
								{
								?>
											<form action="TRAITEMENT/atelier_systeme.php" method="POST">
												<a class="nav-link" href="#">
													<hr class="sidebar-divider">
													<i class="fas fa-fw fa-folder"></i>
													<input type="hidden" name="id" value="<?php echo $donnee['id_projet']; ?>" />
													<input type="hidden" name="formulaire" value="projet" />
													<button class="btn btn-sm" style="color:white;"><?php echo $donnee['titre_projet']; ?></button>
												</a>
											</form>
								<?php
								}
								
								$requete->closeCursor();
							?>
							<div class="bg-white py-2 collapse-inner rounded">
								<div class="card-body">
									<form class="form-signin" action="TRAITEMENT/projet_systeme.php" method="POST">
										<div class="form-label-group">
											<input type="text" id="inputProjet" class="form-control" placeholder="Nom du projet" name="projet" required>
											<label for="inputProjet">Nom du projet</label>
										</div>          
										<input type="hidden" name="formulaire" value="connexion" />
										<button class="btn btn-lg btn-primary btn-block " type="submit"><i class="fas fa-fw fa-plus"></i> Créer le projet</button>
									</form>
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
							<div class="d-sm-flex align-items-center justify-content-between mb-4">
								<a class="nav-link nav-item" href="#">
									<h1 class="font-weight-light">
										<?php
											if(isset($_SESSION['titre_projet']))
											{
										?>
											<img class="avatar rounded img-fluid" style="height:60px;" src="IMAGES/radiant.jpg" />
											<?php echo $_SESSION['titre_projet']; ?>
											<span style="font-size:13px;" class="badge badge-primary badge-counter"><?php echo $_SESSION['likes'];?> <i class="fas fa-fw fa-thumbs-up"></i></span>
											<span style="font-size:13px;" class="badge badge-primary badge-counter"><?php echo $_SESSION['followers'];?> <i class="fas fa-fw fa-users"></i></span>
										<?php
											}
											else
											{
												echo "<h1>Atelier</h1>";
											}
										?>
									</h1>
								</a>
								<?php if(isset($_SESSION['titre_projet'])){?><a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i>Télécharger le projet en pdf</a><?php } ?>
							</div>
							<?php
								if(isset($_SESSION['titre_projet']))
								{
							?>
							<!-- Content Row -->
							<div class="row text-center" id="cible">
								<div class="profile-head">
									<ul class="nav nav-tabs" id="myTab" role="tablist">
										<li class="nav-item">
											<a class="nav-link active" id="histoire-tab" data-toggle="tab" href="#histoire" role="tab" aria-controls="histoire" aria-selected="true">Histoire</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" id="Personnages-tab" data-toggle="tab" href="#Personnages" role="tab" aria-controls="Personnages" aria-selected="false">Personnages</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" id="Bestiaire-tab" data-toggle="tab" href="#Bestiaire" role="tab" aria-controls="Bestiaire" aria-selected="false">Bestiaire</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" id="Lieux-tab" data-toggle="tab" href="#Lieux" role="tab" aria-controls="Lieux" aria-selected="false">Lieux et villes</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" id="Termes-tab" data-toggle="tab" href="#Termes" role="tab" aria-controls="Termes" aria-selected="false">Termes théoriques</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" id="Illustrations-tab" data-toggle="tab" href="#Illustrations" role="tab" aria-controls="Illustrations" aria-selected="false">Illustrations</a>
										</li>
									</ul>
								</div>
								<div class="col-md-12">
									<div class="tab-content profile-tab" id="myTabContent">
										<div class="tab-pane fade show active" id="histoire" role="tabpanel" aria-labelledby="histoire-tab">
											<br>  
											<div class="row">
												<div class="col-xl-3 col-md-6 mb-4">
													<form action="TRAITEMENT/atelier_systeme.php" method="POST" enctype="multipart/form-data">
														<div class="profile-img">
															<img class="avatar rounded img-fluid" src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png"/>
															<div class="file btn btn-sm btn-primary">
																Choisir une image
																<input type="file" name="image"  class="file-upload"/>
															</div>		
															<div class="form-label-group">
																<input type="text" id="chapitre" class="form-control" placeholder="titre du chapitre" name="nom" required />
																<label for="chapitre">Titre du Chapitre</label>
															</div>  
															<div class="form-label-group">
																<input type="text" id="description_chapitre" class="form-control" placeholder="description du chapitre" name="description">
																<label for="description_chapitre">Description</label>
															</div>  
															<input type="hidden" name="formulaire" value="chapitre" />
															<button class="btn btn-sm btn-primary btn-block rounded" type="submit"><i class="glyphicon glyphicon-ok-sign"></i>
																Cr&eacute;er un chapitre
															</button>
															<br />
														</div>
													</form>
												</div>
												<?php
													$requete = $bdd->prepare('SELECT id_chapitre, titre_chapitre, description_chapitre FROM chapitre, (SELECT id_tome FROM tome WHERE id_projet = :id)resultat WHERE chapitre.id_tome = resultat.id_tome');
													
													$requete->execute(array('id' => $_SESSION['id_projet']));
													
													$count = 1;
													
													while($donnee = $requete->fetch())
													{
															echo
																"
																	<div class=\"col-xl-3 col-md-6 mb-4\">
																		<div class=\"card border-left-info shadow h-100 py-2\">
																			<div class=\"card-body\">
																				<div class=\"row no-gutters align-items-center\">
																					<div class=\"col mr-2\">
																						<div class=\"font-weight-bold text-info text-uppercase mb-1\">Chapitre ".$count."</div>
																						<div class=\"text-xs text-muted font-weight-bold text-info text-uppercase mb-1\">".$donnee['titre_chapitre']."</div>
																						<div class=\"row no-gutters align-items-center\">
																							<div class=\"col\">
																								".$donnee['description_chapitre']."
																							</div>
																						</div>
																						<br />
																						<br />
																						<form action=\"TRAITEMENT/supprimer.php\" method=\"POST\">
																							<input type=\"hidden\" name=\"id\" value=".$donnee['id_chapitre']." />
																							<input type=\"hidden\" name=\"supprimer\" value=\"chapitre\" />
																							<button class=\"btn btn-sm btn-primary shadow-sm\" type=\"submit\">Supprimer</button>
																						</form>
																					</div>
																				</div>
																			</div>
																		</div>
																	</div>
																";
															$count++;
													}
												?>
												<!--<div class="col-xl-3 col-md-6 mb-4">
													<div class="card border-left-info shadow h-100 py-2">
														<div class="card-body">
															<div class="row no-gutters align-items-center">
																<div class="col mr-2">
																	<div class="font-weight-bold text-info text-uppercase mb-1">Tome 1</div>
																	<div class="text-xs text-muted font-weight-bold text-info text-uppercase mb-1">Sorcier</div>
																	<div class="row no-gutters align-items-center">
																		<div class="col">
																			<a href="#"><img class="card-img-top" src="IMAGES/radiant.jpg" alt=""></a>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="col-xl-3 col-md-6 mb-4">
													<div class="card border-left-info shadow h-100 py-2">
														<div class="card-body">
															<div class="row no-gutters align-items-center">
																<div class="col mr-2">
																	<div class="font-weight-bold text-info text-uppercase mb-1">Tome 2</div>
																	<div class="text-xs text-muted font-weight-bold text-info text-uppercase mb-1">Sorcier</div>
																	<div class="row no-gutters align-items-center">
																		<div class="col">
																			<a href="#"><img class="card-img-top" src="IMAGES/Hammer.jpg" alt=""></a>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>-->
											</div>
										</div>
										<div class="tab-pane fade" id="Personnages" role="tabpanel" aria-labelledby="Personnages-tab">
											<br>  
											<div class="row">
												<div class="col-xl-3 col-md-6 mb-4">
													<form action="TRAITEMENT/atelier_systeme.php" method="POST" enctype="multipart/form-data">
														<div class="profile-img">
															<img class="avatar rounded img-fluid" src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png"/>
															<div class="file btn btn-sm btn-primary">
																Choisir une image
																<input type="file" name="image"  class="file-upload"/>
															</div>
															<div class="form-label-group">
																<input type="text" id="personnage" class="form-control" placeholder="nom du personnage" name="nom" required />
																<label for="personnage">Nom du Personnage</label>
															</div>  
															<div class="form-label-group">
																<input type="text" id="description_personnage" class="form-control" placeholder="description du personnage" name="description">
																<label for="description_personnage">Description</label>
															</div>  
															<input type="hidden" name="formulaire" value="personnage" />
															<button class="btn btn-sm btn-primary btn-block rounded" type="submit"><i class="glyphicon glyphicon-ok-sign"></i>
																Cr&eacute;er le personnage
															</button>
															<br />
														</div>
													</form>
												</div>
												<?php
													$requete = $bdd->prepare('SELECT personnage.id_personnage, nom_personnage, description_personnage, image_personnage FROM personnage, intervenir WHERE personnage.id_personnage = intervenir.id_personnage AND intervenir.id_projet = :id_projet ORDER BY id_personnage DESC');
												
													$requete->execute(array('id_projet' => $_SESSION['id_projet']));
												
													while($donnee = $requete->fetch())
													{
														if($donnee['image_personnage'] == "")
														{
															echo
																"
																	<div class=\"col-lg-4 col-sm-8 mb-4\">
																		<div class=\"card h-100\">
																			<a href=\"#\"><img class=\"card-img-top\" src=\"http://ssl.gstatic.com/accounts/ui/avatar_2x.png\" alt=\"\"></a>
																			<div class=\"card-body\">
																				<h4 class=\"card-title\">
																					<a href=\"#\">".$donnee['nom_personnage']."</a>
																				</h4>
																				<p>
																					".$donnee['description_personnage']."
																				</p>
																				<br />
																				<a href=\"#\">Details sur l'illustration &rarr;</a>
																				<br />
																				<br />
																				<form action=\"TRAITEMENT/supprimer.php\" method=\"POST\">
																					<input type=\"hidden\" name=\"id\" value=".$donnee['id_personnage']." />
																					<input type=\"hidden\" name=\"supprimer\" value=\"personnage\" />
																					<button class=\"btn btn-sm btn-primary shadow-sm\" type=\"submit\">Supprimer</button>
																				</form>
																			</div>
																		</div>
																	</div>
																";
														}
														else
														{
															echo
																"
																	<div class=\"col-lg-4 col-sm-8 mb-4\">
																		<div class=\"card h-100\">
																			<a href=\"#\"><img class=\"card-img-top\" src=\"IMAGES/PERSONNAGES/".$donnee['image_personnage']."\" alt=\"\"></a>
																			<div class=\"card-body\">
																				<h4 class=\"card-title\">
																					<a href=\"#\">".$donnee['nom_personnage']."</a>
																				</h4>
																				<p>
																					".$donnee['description_personnage']."
																				</p>
																				<br />
																				<a href=\"#\">Details sur l'illustration &rarr;</a>
																				<br />
																				<br />
																				<form action=\"TRAITEMENT/supprimer.php\" method=\"POST\">
																					<input type=\"hidden\" name=\"id\" value=".$donnee['id_personnage']." />
																					<input type=\"hidden\" name=\"supprimer\" value=\"personnage\" />
																					<button class=\"btn btn-sm btn-primary shadow-sm\" type=\"submit\">Supprimer</button>
																				</form>
																			</div>
																		</div>
																	</div>
																";
														}
													}
												?>
												<!--<div class="col-lg-4 col-sm-8 mb-4">
													<div class="card h-100">
														<a href="#"><img class="card-img-top" src="IMAGES/giphy1.gif" alt=""></a>
														<div class="card-body">
															<h4 class="card-title">
																<a href="#">Creve</a>
															</h4>
															<p>
																Add some quality, svg illustrations to your project courtesy of,
																a constantly updated collection of beautiful svg 
																images that you can use completely free and without attribution!
															</p>
															<a target="_blank" rel="nofollow" href="#">Details sur l'illustration &rarr;</a>
														</div>
													</div>
												</div>
												<div class="col-lg-4 col-sm-8 mb-4">
													<div class="card h-100">
														<a href="#"><img class="card-img-top" src="IMAGES/connect.gif" alt=""></a>
														<div class="card-body">
															<h4 class="card-title">
																<a href="#">Shine</a>
															</h4>
															<p>
																Add some quality, svg illustrations to your project courtesy of,
																a constantly updated collection of beautiful svg 
																images that you can use completely free and without attribution!
															</p>
															<a target="_blank" rel="nofollow" href="#">Details sur l'illustration &rarr;</a>
														</div>
													</div>
												</div>-->
											</div>
										</div>
										<div class="tab-pane fade show" id="Bestiaire" role="tabpanel" aria-labelledby="Bestiaire-tab">
											<br> 
											<div class="row">
												<div class="col-xl-3 col-md-6 mb-4">
													<form action="TRAITEMENT/atelier_systeme.php" method="POST" enctype="multipart/form-data">
														<div class="profile-img">
															<img class="avatar rounded img-fluid" src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png"/>
															<div class="file btn btn-sm btn-primary">
																Choisir une image
																<input type="file" name="image"  class="file-upload" />
															</div>
															<div class="form-label-group">
																<input type="text" id="creature" class="form-control" placeholder="nom de la creature" name="nom" required />
																<label for="creature">Nom de la cr&eacute;ature</label>
															</div>  
															<div class="form-label-group">
																<input type="text" id="description_creature" class="form-control" placeholder="description de la creature" name="description">
																<label for="description_creature">Description</label>
															</div>  
															<input type="hidden" name="formulaire" value="creature" />
															<button class="btn btn-sm btn-primary btn-block rounded" type="submit"><i class="glyphicon glyphicon-ok-sign"></i>
																Cr&eacute;er la cr&eacute;ature
															</button>
															<br />
														</div>
													</form>
												</div>
												<?php
													$requete = $bdd->prepare('SELECT creature.id_creature, nom_creature, description_creature, image_creature FROM creature, apparaitre WHERE creature.id_creature = apparaitre.id_creature AND apparaitre.id_projet = :id_projet ORDER BY id_creature DESC');
												
													$requete->execute(array('id_projet' => $_SESSION['id_projet']));
												
													while($donnee = $requete->fetch())
													{
															if($donnee['image_creature'] == "")
															{
																echo
																	"
																		<div class=\"col-lg-4 col-sm-8 mb-4\">
																			<div class=\"card h-100\">
																				<a href=\"#\"><img class=\"card-img-top\" src=\"http://ssl.gstatic.com/accounts/ui/avatar_2x.png\" alt=\"\"></a>
																				<div class=\"card-body\">
																					<h4 class=\"card-title\">
																						<a href=\"#\">".$donnee['nom_creature']."</a>
																					</h4>
																					<p>
																						".$donnee['description_creature']."
																					</p>
																					<br />
																					<a href=\"#\">Details sur l'illustration &rarr;</a>
																					<br />
																					<br />
																					<form action=\"TRAITEMENT/supprimer.php\" method=\"POST\">
																						<input type=\"hidden\" name=\"id\" value=".$donnee['id_creature']." />
																						<input type=\"hidden\" name=\"supprimer\" value=\"creature\" />
																						<button class=\"btn btn-sm btn-primary shadow-sm\" type=\"submit\">Supprimer</button>
																					</form>
																				</div>
																			</div>
																		</div>
																	";
															}
															else
															{
																echo
																	"
																		<div class=\"col-lg-4 col-sm-8 mb-4\">
																			<div class=\"card h-100\">
																				<a href=\"#\"><img class=\"card-img-top\" src=\"IMAGES/CREATURES/".$donnee['image_creature']."\" alt=\"\"></a>
																				<div class=\"card-body\">
																					<h4 class=\"card-title\">
																						<a href=\"#\">".$donnee['nom_creature']."</a>
																					</h4>
																					<p>
																						".$donnee['description_creature']."
																					</p>
																					<br />
																					<a href=\"#\">Details sur l'illustration &rarr;</a>
																					<br />
																					<br />
																					<form action=\"TRAITEMENT/supprimer.php\" method=\"POST\">
																						<input type=\"hidden\" name=\"id\" value=".$donnee['id_creature']." />
																						<input type=\"hidden\" name=\"supprimer\" value=\"creature\" />
																						<button class=\"btn btn-sm btn-primary shadow-sm\" type=\"submit\">Supprimer</button>
																					</form>
																				</div>
																			</div>
																		</div>
																	";
															}
														
													}
												?>
												<!--<div class="col-lg-4 col-sm-8 mb-4">
													<div class="card h-100">
														<a href="#"><img class="card-img-top" src="IMAGES/connect.gif" alt=""></a>
														<div class="card-body">
															<h4 class="card-title">
																<a href="#">Shine</a>
															</h4>
															<p>
																Add some quality, svg illustrations to your project courtesy of,
																a constantly updated collection of beautiful svg 
																images that you can use completely free and without attribution!
															</p>
															<a target="_blank" rel="nofollow" href="#">Details sur l'illustration &rarr;</a>
														</div>
													</div>
												</div>-->
											</div>
										</div>
										<div class="tab-pane fade show" id="Lieux" role="tabpanel" aria-labelledby="Lieux-tab">
											<br> 
											<div class="row">
												<div class="col-xl-3 col-md-6 mb-4">
													<form action="TRAITEMENT/atelier_systeme.php" method="POST" enctype="multipart/form-data">
														<div class="profile-img">
															<img class="avatar rounded img-fluid" src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png"/>
															<div class="file btn btn-sm btn-primary">
																Choisir une image
																<input type="file" name="image"  class="file-upload" />
															</div>
															<div class="form-label-group">
																<input type="text" id="lieu" class="form-control" placeholder="nom du lieu" name="nom" required>
																<label for="lieu">Nom du Lieu</label>
															</div>  
															<div class="form-label-group">
																<input type="text" id="description_lieu" class="form-control" placeholder="description du lieu" name="description">
																<label for="description_lieu">Description</label>
															</div>  
															<input type="hidden" name="formulaire" value="lieu" />
															<button class="btn btn-sm btn-primary btn-block rounded" type="submit"><i class="glyphicon glyphicon-ok-sign"></i>
																Cr&eacute;er le lieu
															</button>
															<br />
														</div>
													</form>
												</div>
												<?php
													$requete = $bdd->prepare('SELECT lieu.id_lieu, nom_lieu, description_lieu, image_lieu FROM lieu, visiter WHERE lieu.id_lieu = visiter.id_lieu AND visiter.id_projet = :id_projet ORDER BY id_lieu DESC');
												
													$requete->execute(array('id_projet' => $_SESSION['id_projet']));
												
													while($donnee = $requete->fetch())
													{
															if($donnee['image_lieu'] == "")
															{
																echo
																	"
																		<div class=\"card shadow mb-4 col-lg-4 col-sm-8 mb-4\">
																			<div class=\"card-header py-3\">
																				<h6 class=\"m-0 font-weight-bold text-primary\">".$donnee['nom_lieu']."</h6>
																			</div>
																			<div class=\"card-body\">
																				<div class=\"text-center\">
																					<img class=\"img-fluid px-3 px-sm-4 mt-3 mb-4\" style=\"width: 25rem;\" src=\"http://ssl.gstatic.com/accounts/ui/avatar_2x.png\" alt=\"\">
																				</div>
																				<p>
																					".$donnee['description_lieu']."
																				</p>
																				<br />
																				<a href=\"#\">Details sur l'illustration &rarr;</a>
																				<br />
																				<br />
																				<form action=\"TRAITEMENT/supprimer.php\" method=\"POST\">
																					<input type=\"hidden\" name=\"id\" value=".$donnee['id_lieu']." />
																					<input type=\"hidden\" name=\"supprimer\" value=\"lieu\" />
																					<button class=\"btn btn-sm btn-primary shadow-sm\" type=\"submit\">Supprimer</button>
																				</form>
																			</div>
																		</div>
																	";
															}
															else
															{
																echo
																	"
																		<div class=\"card shadow mb-4 col-lg-4 col-sm-8 mb-4\">
																			<div class=\"card-header py-3\">
																				<h6 class=\"m-0 font-weight-bold text-primary\">".$donnee['nom_lieu']."</h6>
																			</div>
																			<div class=\"card-body\">
																				<div class=\"text-center\">
																					<img class=\"img-fluid px-3 px-sm-4 mt-3 mb-4\" style=\"width: 25rem;\" src=\"IMAGES/LIEUX/".$donnee['image_lieu']."\" alt=\"\">
																				</div>
																				<p>
																					".$donnee['description_lieu']."
																				</p>
																				<br />
																					<a href=\"#\">Details sur l'illustration &rarr;</a>
																				<br />
																				<br />
																				<form action=\"TRAITEMENT/supprimer.php\" method=\"POST\">
																					<input type=\"hidden\" name=\"id\" value=".$donnee['id_lieu']." />
																					<input type=\"hidden\" name=\"supprimer\" value=\"lieu\" />
																					<button class=\"btn btn-sm btn-primary shadow-sm\" type=\"submit\">Supprimer</button>
																				</form>
																			</div>
																		</div>
																	";
															}
														
													}
												?>
												<!--<div class="card shadow mb-4 col-lg-4 col-sm-8 mb-4">
													<div class="card-header py-3">
														<h6 class="m-0 font-weight-bold text-primary">L'entre de BabaYaga</h6>
													</div>
													<div class="card-body">
														<div class="text-center">
															<img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="IMAGES/giphy.gif" alt="">
														</div>
														<p>
															Add some quality, svg illustrations to your project courtesy of,
															a constantly updated collection of beautiful svg 
															images that you can use completely free and without attribution!
														</p>
														<a target="_blank" rel="nofollow" href="#">Details sur l'illustration &rarr;</a>
													</div>
												</div>
												<div class="card shadow mb-4 col-lg-4 col-sm-8 mb-4">
													<div class="card-header py-3">
														<h6 class="m-0 font-weight-bold text-primary">L'Atelier des OTAKUS</h6>
													</div>
													<div class="card-body">
														<div class="text-center">
															<img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="IMAGES/mangaka.png" alt="">
														</div>
														<p>
															Add some quality, svg illustrations to your project courtesy of,
															a constantly updated collection of beautiful svg 
															images that you can use completely free and without attribution!
														</p>
														<a target="_blank" rel="nofollow" href="#">Details sur l'illustration &rarr;</a>
													</div>
												</div>-->
											</div>
										</div>
										<div class="tab-pane fade show" id="Termes" role="tabpanel" aria-labelledby="Termes-tab">
											<br> 
											<div class="row">
												<div class="col-xl-3 col-md-6 mb-4">
													<form action="TRAITEMENT/atelier_systeme.php" method="POST" enctype="multipart/form-data">
														<div class="form-label-group">
															<input type="text" id="cle" class="form-control" placeholder="mot cle" name="nom" required>
															<label for="cle">Mot clé</label>
														</div>  
														<div class="form-label-group">
															<input type="text" id="description_mot_cle" class="form-control" placeholder="description du mot cle" name="description">
															<label for="description_mot_cle">Description</label>
														</div>  
														<input type="hidden" name="formulaire" value="cle" />
														<button class="btn btn-sm btn-primary btn-block rounded" type="submit"><i class="glyphicon glyphicon-ok-sign"></i>
															Cr&eacute;er le mot
														</button>
														<br />
													</form>
												</div>
												<?php
													$requete = $bdd->prepare('SELECT terme.id_terme, nom_terme, description_terme FROM terme, citer WHERE terme.id_terme = citer.id_terme AND citer.id_projet = :id_projet ORDER BY id_terme DESC');
												
													$requete->execute(array('id_projet' => $_SESSION['id_projet']));
												
													while($donnee = $requete->fetch())
													{
															echo
																"
																	<div class=\"col-xl-3 col-md-6 mb-4\">
																		<div class=\"card border-left-primary shadow h-100 py-2\">
																			<div class=\"card-body\">
																				<div class=\"row no-gutters align-items-center\">
																					<div class=\"col mr-2\">
																						<div class=\"h5 mb-0 font-weight-bold text-primary\">".$donnee['nom_terme']."</div>
																						<div class=\"\">
																							".$donnee['description_terme']."
																						</div>
																					</div>
																					<br />
																					<br />
																					<form action=\"TRAITEMENT/supprimer.php\" method=\"POST\">
																						<input type=\"hidden\" name=\"id\" value=".$donnee['id_terme']." />
																						<input type=\"hidden\" name=\"supprimer\" value=\"terme\" />
																						<button class=\"btn btn-sm btn-primary shadow-sm\" type=\"submit\">Supprimer</button>
																					</form>
																				</div>
																			</div>
																		</div>
																	</div>
																";
													}
												?>
												<!-- Earnings (Monthly) Card Example -->
												<!--<div class="col-xl-3 col-md-6 mb-4">
													<div class="card border-left-primary shadow h-100 py-2">
														<div class="card-body">
															<div class="row no-gutters align-items-center">
																<div class="col mr-2">
																	<div class="h5 mb-0 font-weight-bold text-primary">Haki des rois</div>
																	<div class="">
																		Energie bla bla bla
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="col-xl-3 col-md-6 mb-4">
													<div class="card border-left-primary shadow h-100 py-2">
														<div class="card-body">
															<div class="row no-gutters align-items-center">
																<div class="col mr-2">
																	<div class="h5 mb-0 font-weight-bold text-primary">Super Saiyan</div>
																	<div class="">
																		Transformation bla bla bla
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>-->
											</div>
										</div>
										<div class="tab-pane fade show" id="Illustrations" role="tabpanel" aria-labelledby="Illustrations-tab">
											<br>  
											<div class="row">
												<div class="col-xl-3 col-md-6 mb-4">
													<form action="TRAITEMENT/atelier_systeme.php" method="POST" enctype="multipart/form-data">
														<div class="profile-img">
															<img class="avatar rounded img-fluid" src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png"/>
															<div class="file btn btn-sm btn-primary">
																Choisir une image
																<input type="file" name="image"  class="file-upload"/>
															</div>
															<div class="form-label-group">
																<input type="text" id="illustration" class="form-control" placeholder="Nom de l'illustration" name="nom" required>
																<label for="illustration">Titre de l'illustration</label>
															</div>  
															<div class="form-label-group">
																<input type="text" id="description_illustration" class="form-control" placeholder="description de l'illustration" name="description">
																<label for="description_illustration">Description</label>
															</div>  
															<input type="hidden" name="formulaire" value="illustration" />
															<button class="btn btn-sm btn-primary btn-block rounded" type="submit"><i class="glyphicon glyphicon-ok-sign"></i>
																Importer l'illustration
															</button>
															<br />
														</div>
													</form>
												</div>
												<?php
													$requete = $bdd->prepare('SELECT * FROM illustration WHERE id_projet = :id_projet ORDER BY id_illustration DESC');
													
													$requete->execute(array('id_projet' => $_SESSION['id_projet']));
												
													while($donnee = $requete->fetch())
													{
															if($donnee['image_illustration'] == "")
															{
																echo
																"
																	<div class=\"col-xl-4 col-md-6 mb-4\">
																		<div class=\"card border-left-info shadow h-100 py-2\">
																			<div class=\"card-body\">
																				<div class=\"row no-gutters align-items-center\">
																					<div class=\"col mr-2\">
																						<div class=\"font-weight-bold text-info text-uppercase mb-1\">".$donnee['titre_illustration']."</div>
																						<div class=\"row no-gutters align-items-center\">
																							<div class=\"col\">
																								<a href=\"#\"><img class=\"card-img-top\" src=\"http://ssl.gstatic.com/accounts/ui/avatar_2x.png\" alt=\"\"></a>
																							</div>
																							<div class=\"\">
																								".$donnee['description_illustration']."
																							</div>
																						</div>
																						<br />
																						<br />
																						<form action=\"TRAITEMENT/supprimer.php\" method=\"POST\">
																							<input type=\"hidden\" name=\"id\" value=".$donnee['id_illustration']." />
																							<input type=\"hidden\" name=\"supprimer\" value=\"illustration\" />
																							<button class=\"btn btn-sm btn-primary shadow-sm\" type=\"submit\">Supprimer</button>
																						</form>
																					</div>
																				</div>
																			</div>
																		</div>
																	</div>
																";
															}
															else
															{
																echo
																	"
																		<div class=\"col-xl-4 col-md-6 mb-4\">
																			<div class=\"card border-left-info shadow h-100 py-2\">
																				<div class=\"card-body\">
																					<div class=\"row no-gutters align-items-center\">
																						<div class=\"col mr-2\">
																							<div class=\"font-weight-bold text-info text-uppercase mb-1\">".$donnee['titre_illustration']."</div>
																							<div class=\"row no-gutters align-items-center\">
																								<div class=\"col\">
																									<a href=\"#\"><img class=\"card-img-top\" src=\"IMAGES/ILLUSTRATIONS/".$donnee['image_illustration']."\" alt=\"\"></a>
																								</div>
																								<div class=\"\">
																									".$donnee['description_illustration']."
																								</div>
																							</div>
																							<br />
																							<br />
																							<form action=\"TRAITEMENT/supprimer.php\" method=\"POST\">
																								<input type=\"hidden\" name=\"id\" value=".$donnee['id_illustration']." />
																								<input type=\"hidden\" name=\"supprimer\" value=\"illustration\" />
																								<button class=\"btn btn-sm btn-primary shadow-sm\" type=\"submit\">Supprimer</button>
																							</form>
																						</div>
																					</div>
																				</div>
																			</div>
																		</div>
																	";
															}
													}
												?>
												<!--<div class="col-xl-4 col-md-6 mb-4">
													<div class="card border-left-info shadow h-100 py-2">
														<div class="card-body">
															<div class="row no-gutters align-items-center">
																<div class="col mr-2">
																	<div class="font-weight-bold text-info text-uppercase mb-1">Non de l'illustration 1</div>
																	<div class="row no-gutters align-items-center">
																		<div class="col">
																			<a href="#"><img class="card-img-top" src="IMAGES/radiant.jpg" alt=""></a>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="col-xl-4 col-md-6 mb-4">
													<div class="card border-left-info shadow h-100 py-2">
														<div class="card-body">
															<div class="row no-gutters align-items-center">
																<div class="col mr-2">
																	<div class="font-weight-bold text-info text-uppercase mb-1">Non de l'illustration 2</div>
																	<div class="row no-gutters align-items-center">
																		<div class="col">
																			<a href="#"><img class="card-img-top" src="IMAGES/Hammer.jpg" alt=""></a>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>-->
											</div>
										</div>
									</div>
								</div>
							</div>
							<?php
								}
								else
								{
									
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
