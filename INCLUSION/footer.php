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


<!--*********************Inclusions et importations*********************************************-->
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
<script src="https://code.jquery.com/jquery-3.5.0.js" integrity="sha256-r/AaFHrszJtwpe+tHyNi/XCfMxYpbsRg2Uqn0x3s2zc=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script type="text/javascript" src="JS/MyScript.js"></script>

<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

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
      dataType: 'html',
      data: {
        formulaire: formulaire,
        email: email,
        password: password
      },
      success: function(data) {
        if(data == "connecter"){  
          location.reload(true);
        }else{
          $("#result").text(data).fadeIn(500);
        }
      },  
      error: function(data) {
        $('#result').removeClass('bg-success').addClass('bg-danger').text('Oups... une erreur est survenu!').fadeIn(500);
      }

    });

    event.preventDefault() //ceci bloque la soumission du formulaire ;)

  });

  //voici le script Ajax pour l'inscription
  $(document).on("submit", "#inscription", function(event) {

    event.preventDefault();
  
  });
  //voici le script pour le champ text de la page story
  tinymce.init({
    selector: 'textarea#editor',
    skin: 'bootstrap',
    plugins: 'lists, link, image, media',
    toolbar: 'h1 h2 bold italic strikethrough blockquote bullist numlist backcolor | link image media | removeformat help',
    min_height: 400,
    width: 1100,
    menubar: false,
    setup: (editor) => { // Apply the focus effect
      editor.on('init', () => {
        editor.getContainer().style.transition = "border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out"
      });
      editor.on('focus', () => {
        editor.getContainer().style.boxShadow = "0 0 0 .2rem rgba(0, 123, 255, .25)",
          editor.getContainer().style.borderColor = "#80bdff"
      });
      editor.on('blur', () => {
        editor.getContainer().style.boxShadow = "",
          editor.getContainer().style.borderColor = ""
      });
    }
  });
</script>


</html>