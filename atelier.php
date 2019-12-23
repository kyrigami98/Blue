
<?php
include "INCLUSION/header.php";
?>

<div class="container-fluid">
  <div class="card border-0 shadow my-5">
    <div class="card-body">
	  
  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
		
		
        <div class="sidebar-brand-text mx-3" >Mes projets</div>
              <!-- Dropdown - User Information -->
		
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="index.html">
          <i class="fas fa-fw fa-plus"></i>
          <span>Nouveau Projet</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Interface
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Components</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Components:</h6>
            <a class="collapse-item" href="buttons.html">Buttons</a>
            <a class="collapse-item" href="cards.html">Cards</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Utilities</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Utilities:</h6>
            <a class="collapse-item" href="utilities-color.html">Colors</a>
            <a class="collapse-item" href="utilities-border.html">Borders</a>
            <a class="collapse-item" href="utilities-animation.html">Animations</a>
            <a class="collapse-item" href="utilities-other.html">Other</a>
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

      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="charts.html">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Charts</span></a>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="tables.html">
          <i class="fas fa-fw fa-table"></i>
          <span>Tables</span></a>
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
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            
      <h1 class="font-weight-light">Symfonia</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i>Télécharger le projet en pdf</a>
          </div>

          <!-- Content Row -->
        
          <div class="row">

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
								</div>
							 </div>
                            </div>
						
						    <div class="tab-pane fade" id="Personnages" role="tabpanel" aria-labelledby="Personnages-tab">
                               <br>  
							   
							   <div class="row">
							   
								<div class="col-lg-4 col-sm-8 mb-4">
								  <div class="card h-100">
									<a href="#"><img class="card-img-top" src="IMAGES/giphy1.gif" alt=""></a>
									 <div class="card-body">
									  <h4 class="card-title">
										<a href="#">Creve</a>
									  </h4>
									  
								  <p>Add some quality, svg illustrations to your project courtesy of,
								  a constantly updated collection of beautiful svg 
								  images that you can use completely free and without attribution!</p>
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
									  
								  <p>Add some quality, svg illustrations to your project courtesy of,
								  a constantly updated collection of beautiful svg 
								  images that you can use completely free and without attribution!</p>
								  <a target="_blank" rel="nofollow" href="#">Details sur l'illustration &rarr;</a>
								  
									</div>
								  </div>
								</div>
								
								</div>
								
                            </div>
						
                            <div class="tab-pane fade show" id="Bestiaire" role="tabpanel" aria-labelledby="Bestiaire-tab">
						 
								<br> 

							 
							   <div class="row">
							   
								
								<div class="col-lg-4 col-sm-8 mb-4">
								  <div class="card h-100">
									<a href="#"><img class="card-img-top" src="IMAGES/connect.gif" alt=""></a>
									 <div class="card-body">
									  <h4 class="card-title">
										<a href="#">Shine</a>
									  </h4>
									 
								  <p>Add some quality, svg illustrations to your project courtesy of,
								  a constantly updated collection of beautiful svg 
								  images that you can use completely free and without attribution!</p>
								  <a target="_blank" rel="nofollow" href="#">Details sur l'illustration &rarr;</a>
								
									
									</div>
								  </div>
								</div>
								
                            </div>
                            </div>
							
							  <div class="tab-pane fade show" id="Lieux" role="tabpanel" aria-labelledby="Lieux-tab">
								   
									<br> 
									
									
							   <div class="row">
							   
							  <div class="card shadow mb-4 col-lg-4 col-sm-8 mb-4">
								<div class="card-header py-3">
								  <h6 class="m-0 font-weight-bold text-primary">L'entre de BabaYaga</h6>
								</div>
								<div class="card-body">
								  <div class="text-center">
									<img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="IMAGES/giphy.gif" alt="">
								  </div>
								  <p>Add some quality, svg illustrations to your project courtesy of,
								  a constantly updated collection of beautiful svg 
								  images that you can use completely free and without attribution!</p>
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
								  <p>Add some quality, svg illustrations to your project courtesy of,
								  a constantly updated collection of beautiful svg 
								  images that you can use completely free and without attribution!</p>
								  <a target="_blank" rel="nofollow" href="#">Details sur l'illustration &rarr;</a>
								</div>
							  </div>
							  	
                            </div>
							
                            </div>
							
							  <div class="tab-pane fade show" id="Termes" role="tabpanel" aria-labelledby="Termes-tab">
						
								<br> 
									
							  <div class="row">

								<!-- Earnings (Monthly) Card Example -->
								<div class="col-xl-3 col-md-6 mb-4">
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
								</div>
								
							</div>

                            </div>
							
							  <div class="tab-pane fade show" id="Illustrations" role="tabpanel" aria-labelledby="Illustrations-tab">
								   
								   
								   <br>  
								
								<div class="row">
								<div class="col-xl-4 col-md-6 mb-4">
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
								</div>
							 </div>
								   
								   
                            </div>
							
                        
							
						</div>
                       
                    </div>
					
          </div>


      </div>
      <!-- End of Main Content -->


    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->
	  
   
    </div>
  </div>
</div>



<?php
include "INCLUSION/footer.php";
?>
