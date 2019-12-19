<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>BLUE</title>
<meta name="description" content="Blue">
<meta name="keywords" content="HTML,code,tags">
<meta name="author" content="Kyriel&Credo">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />


 <link rel="stylesheet" href="CSS/MyStyle.css"> 
 <link rel="stylesheet" href="CSS/all.css">
 <link rel="stylesheet" href="CSS/bootstrap.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<br><br>
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light bg-light shadow fixed-top">
  <div class="container">
    <a class="navbar-brand" href="index.php">BLUE</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
	  
	   <li class="nav-item">
			<input type="text" id="search" class="form-control" placeholder="Rechercher un projet..." required autofocus>
	   </li>
        <li class="nav-item">
          	<button class="btn" type="submit"><i class="fa fa-search"></i></button>
        </li>
		<?php
			if(!isset($_SESSION['pseudo']))
			{
		echo "<li class=\"nav-item\">
		 <a class=\"\" href=\"#inscription\">
			<button class=\"btn text-uppercase\" type=\"submit\">Inscription</button>
        </a>
		</li>
        <li class=\"nav-item\">    
			<button class=\"btn btn-primary text-uppercase\" data-toggle=\"modal\" data-target=\".bd-example-modal-lg\">Connexion</button>
        </li>";
			}
			else
			{
		echo "<li class=\"nav-item active\">
		  
		      <li class=\"dropdown\"> 

                    <a href=\"#\" class=\"nav-link dropdown-toggle\" id=\"navbarDropdown\" data-toggle=\"dropdown\" aria-expanded=\"false\"> 
                            Bienvenue, <strong>".$_SESSION['pseudo']."</strong><b class=\"caret\"></b>
                        </a>

                        <div class=\"dropdown-menu\" aria-labelledby=\"navbarDropdown\">
						<img class=\"card-img-top\" src=\"IMAGES/One-Piece.jpg\" alt=\"\">
                                <a class=\"dropdown-item\" href=\"profil.php\">Mon profil</a>
                                <a class=\"dropdown-item\" href=\"atelier.php\">Mon atelier</a>
                                <div class=\"dropdown-divider\"></div>
                                <a class=\"dropdown-item\" href=\"#\">
								<a href=\"DATABASE/systeme.php\"><button class=\"btn btn-danger text-uppercase\" style=\"margin-left:5%;\">Deconnexion</button></a>
								</a>
                        </div>

                </li> 
		  
                <span class=\"sr-only\">(current)</span>
             
        </li>";
			}?>
      </ul>
    </div>
  </div>
</nav>

<body>
