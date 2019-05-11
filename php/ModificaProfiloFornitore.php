<html lang="it">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/theme.css">
    <link rel="stylesheet" href="../css/modificaProfiloFornitore.css">

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script
			  src="https://code.jquery.com/jquery-3.3.1.min.js"
			  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
			  crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

    <!-- Page informations and icon -->
    <title>UniHungry - Modifca Profilo</title>
    <link rel="shortcut icon" href="../res/icon.ico" />
  </head>
  <body>
      <?php include 'navbar.php';
      ?>
      <div class="container" id="profile">
          <form id="modificaform" class="col">
                  <h2>Modifica informazioni</h2>
                  <div class="form-row">
                    <div id="selectImg" class="form-group col-md-6">
                        <label for="imgupload">
                          <?php
                          if(isset($row['immagine'])){
                            echo "<img class='btn nopadding img-thumbnail' id='foodImg' src='data:image/jpeg;base64,".base64_encode($row['immagine'])."' alt='immagine cibo default'>";
                          } else {
                            echo "<img class='btn nopadding img-thumbnail' id='foodImg' src='../res/default_food.png' alt='immagine cibo default'>";
                          }
                           ?>
                        <input type="file" onchange="readURL(this);" class="form-control-file" id="imgupload" name="image" hidden>
                        <small class="form-text">Clicca l'immagine per caricarne una</small>
                        <a href="" class="noVisitedLink" id="reset">Resetta immagine</a>
                        </label>
                    </div>
                    <div class="form-group col-md-6">
                      ORARI
                    </div>
                  </div>
              <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" id="nome">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="cognome">Cognome</label>
                    <input type="text" class="form-control" id="cognome">
                  </div>
              </div>
              <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="nomeAttivita">Nome Attività</label>
                    <input type="text" class="form-control" id="nomeAttivita">
                  </div>
                  <div class="form-group col-md-6">
                      <label for="cellulare">Numero cellulare</label>
                      <input type="text" class="form-control" id="cellulare">
                  </div>
              </div>
              <h4>Informazioni accesso</h4>
              <div class="form-group">
                  <label for="passwordOld">Vecchia Password</label>
                  <input type="password" class="form-control" id="passwordOld">
                  <label for="passwordNew">Nuova Password</label>
                  <input type="password" class="form-control" id="passwordNew">
                  <label for="passwordNewConfirm">Conferma nuova Password</label>
                  <input type="password" class="form-control" id="passwordNewConfirm">
              </div>
              <div class="form-row">
              <div class="col-4"></div>
              <button id="registrati" type="submit" class="col-4 btn green">Modifica</button>
              <div class="col-4"></div>
              </div>
          </form>
      </div>

  </body>
</html>
