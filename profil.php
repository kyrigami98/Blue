
<?php
	include "INCLUSION/header.php";
	
?>

<div class="container">
  <div class="card border-0 shadow my-5">
    <div class="card-body p-5">


  
<form action="DATABASE/systeme.php" method="POST" enctype="multipart/form-data">
      <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
							<h4><?php if(isset($_SESSION['pseudo'])){echo$_SESSION['pseudo'];} ?></h4><h6 class="text-muted"><?php if(isset($_SESSION['domaine'])){echo$_SESSION['domaine'];}else{echo "...";} ?></h6>
                            <?php
								if($_SESSION['image'] == "")
								{
									echo "<img class=\"avatar rounded img-fluid\" src=\"http://ssl.gstatic.com/accounts/ui/avatar_2x.png\"/>
										<div class=\"file btn btn-lg btn-primary\">
											Photo de Profil
											<input type=\"file\" name=\"profil\"  class=\"file-upload\"/>
										</div>";
								}
								else
								{
									echo "<img class=\"avatar rounded img-fluid\" src=\"IMAGES/PROFILS/".$_SESSION['image']."\" alt=\"".$_SESSION['image']."\"/>
										<div class=\"file btn btn-lg btn-primary\">
											Photo de Profil
											<input type=\"file\" name=\"profil\"  class=\"file-upload\"/>
										</div>";
								}
							?>
                        </div>
							
						<div class="row">
							<div class="col-md-12">
								<div class="profile-work">
								  <ul class="list-group">
									<li class="list-group-item text-muted">Activité <i class="fa fa-dashboard fa-1x"></i></li>
									<li class="list-group-item text-right"><span class="pull-left"><strong>Partage</strong></span><?php if(isset($_SESSION['partages'])){echo$_SESSION['partages'];}else{echo"0";} ?></li>
									<li class="list-group-item text-right"><span class="pull-left"><strong>Likes</strong></span><?php if(isset($_SESSION['likes'])){echo$_SESSION['likes'];}else{echo"0";} ?></li>
									<li class="list-group-item text-right"><span class="pull-left"><strong>Nombre de Projet</strong></span><?php if(isset($_SESSION['projets'])){echo$_SESSION['projets'];}else{echo"0";} ?></li>
									<li class="list-group-item text-right"><span class="pull-left"><strong>Followers</strong></span><?php if(isset($_SESSION['followers'])){echo$_SESSION['followers'];}else{echo"0";} ?></li>
								  </ul> 
									
								</div>
							</div>
						
						</div>
									
						  <br>
                    </div>
					
                    <div class="col-md-6">
                        <div class="profile-head">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Projets</a>
                                </li> 
								<li class="nav-item">
                                    <a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Informations</a>
                                </li>
                               
                            </ul>
                        </div>
							
                    <div class="col-md-12">
                        <div class="tab-content profile-tab" id="myTabContent">
						
						    <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
							
							<br> 
							 <form class="form-signin" action="DATABASE/systeme.php" method="POST">
							  <div class="form-label-group">
								<input type="text" id="inputProjet" class="form-control" placeholder="Nom du projet" name="projet" required>
								<label for="inputProjet">Nom du projet</label>
							  </div>          
							  <input type="hidden" name="formulaire" value="connexion" />
							  <button class="btn btn-lg btn-primary btn-block " type="submit"><i class="fas fa-fw fa-plus"></i> Créer le projet</button>
						   </form>
											
                               <hr>  					
							   <div class="inline-block">
								  <div class="card h-100">
									 <div class="card-body">
									  <h4 class="card-title">
										Listes des projets
									  </h4>
									</div>
								  </div>
								</div>
							   
							   <div class="row">
							   
								<div class="col-lg-6 col-sm-6 mb-4">
								
                <span style="font-size:10px;" class="badge badge-primary badge-counter">124 <i class="fas fa-fw fa-thumbs-up"></i></span>
				<span style="font-size:10px;" class="badge badge-primary badge-counter">10 <i class="fas fa-fw fa-users"></i></span>
								  <div class="card h-100">
									<a href="#"><img class="card-img-top" src="IMAGES/giphy1.gif" alt=""></a>
									 <div class="card-body">
									  <h4 class="card-title">
										<a href="#">Symfonia</a>
									  </h4>
									</div>
								  </div>
								</div>
								
								<div class="col-lg-6 col-sm-5 mb-6">
								
                <span style="font-size:10px;" class="badge badge-primary badge-counter">124 <i class="fas fa-fw fa-thumbs-up"></i></span>
				<span style="font-size:10px;" class="badge badge-primary badge-counter">10 <i class="fas fa-fw fa-users"></i></span>
								  <div class="card h-100">
									<a href="#"><img class="card-img-top" src="IMAGES/dragon-ball-z.jpg" alt=""></a>
									 <div class="card-body">
									  <h4 class="card-title">
										<a href="#">Badass</a>
									  </h4>
									</div>
								  </div>
								</div>
								
							  </div>
                            </div>
						
                            <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
								   
							 
									<hr>
									  <div class="form-label-group">
										<div class="form-group">
										  <label for="Titre">Titre</label>
										  <select class="form-control" id="Titre" name="domaine">
											<option value="Dessinateur">Déssinateur</option>
											<option value="Scenariste">Scénariste</option>
											<option value="Scenariste & Dessinateur">Déssinateur & Scénariste</option>
										  </select>
										</div>
									  </div>
					  
									<hr>
							   
									<div class="form-label-group">
										<input type="text" id="inputUserame" class="form-control" placeholder="Username" name="pseudo" value="<?php echo $_SESSION['pseudo'];?>" required autofocus>
										<label for="inputUserame">Pseudo</label>
									  </div>
									  
									<div class="form-label-group">
										<input type="email" id="inputEmail2" class="form-control" placeholder="Email address" name="email" value="<?php echo $_SESSION['email'];?>" required>
										<label for="inputEmail2">Email</label>
									  </div>
									 
									 <hr>

									  <div class="form-label-group">
										<input type="password" id="inputPassword2" class="form-control" placeholder="Password" name="password" required>
										<label for="inputPassword2">Ancien Mot de passe</label>
									  </div>
									  
									<div class="form-label-group">
										<input type="password" id="inputPassword3" class="form-control" placeholder="Password" name="newpassword" required>
										<label for="inputPassword3">Nouveau Mot de passe</label>
									  </div>
											
									 <div class="form-label-group">        
										<div class="form-check">
										  <label class="form-check-label">
											<input type="checkbox" class="form-check-input" value="">J'ai lu et j'accepte les <a href="">conditions d'utilisation<a>
										  </label>
										</div>
									 </div>
									 
									<div class="row pull-right">
										<div class="form-group">
											<div class="col-xs-12">
											<br>
											<input type="hidden" name="formulaire" value="profil" />
											<button class="btn btn-lg btn-success pull-right" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
											<button class="btn btn-lg  pull-left" type="reset"><i class="fa fa-repeat"></i> Reset</button>
											</div>
										</div>
								</div>
									
                            </div>
							
                        
							
						</div>
                       </div>
                    </div>
					
            
       </div>
			
        </form>  
	
    </div>


    </div>
  </div>
</div>



<?php
include "INCLUSION/footer.php";
?>
