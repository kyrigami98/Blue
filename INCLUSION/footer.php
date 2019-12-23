<!-- Large modal -->

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

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" style=" background-color: rgba(0, 0, 10, 0.8);background-color: #007bff;">
      
    <div id="connexion" class="row" >
      <div class="container-fluid">
        <div class="card card-signin flex-row my-5" style="">
          <div class="d-none d-md-flex connexion" >
             <!-- Background image for card set in CSS! -->
          </div>
          <div class="card-body">
            <h5 class="card-title text-center">Se connecter!</h5>
            <form class="form-signin" action="DATABASE/systeme.php" method="POST">

              <div class="form-label-group">
                <input type="email" id="inputEmail2" class="form-control" placeholder="Email address" name="email" required>
                <label for="inputEmail2">Email</label>
              </div>
             

              <div class="form-label-group">
                <input type="password" id="inputPassword2" class="form-control" placeholder="Password" name="password" required>
                <label for="inputPassword2">Mot de passe</label>
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

 <script src="vendor/jquery/jquery.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="JS/MyScript.js"></script>

 


</html>