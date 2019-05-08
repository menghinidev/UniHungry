<!DOCTYPE html>
<html lang="it">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/theme.css">
    <link rel="stylesheet" href="../css/register.css">
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script
			  src="https://code.jquery.com/jquery-3.3.1.min.js"
			  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
			  crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script src="../js/sha512.js" charset="utf-8"></script>
    <script src="../js/passwordFormClick.js" charset="utf-8"></script>
    <script src="../js/registerClick.js" charset="utf-8"></script>
    <!-- Page informations and icon -->
    <title>UniHungry - Registrati</title>
    <link rel="shortcut icon" href="../res/icon.ico" />
  </head>
  <body>
      <?php include 'navbar.php'; ?>
      <div class="container">
              <form id="registerform" class="col" action="action_register.php"  method="post">
                      <h2>Iscriviti </h2>
                  <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="nome">Nome</label>
                        <input type="text" name ="nome" class="form-control" id="nome" placeholder="Mario">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="cognome">Cognome</label>
                        <input type="text" name ="cognome" class="form-control" id="cognome" placeholder="Rossi">
                      </div>
                  </div>
                  <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="email">Email</label>
                        <input type="email" name ="email" class="form-control" id="email" placeholder="mario.rossi@mail.com">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="password">Password</label>
                        <input type="password" name ="password" class="form-control" id="password" placeholder="Password">
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="cellulare">Numero di telefono</label>
                      <input type="text" name ="telefono" class="form-control" id="cellulare" placeholder="3456789100">
                  </div>

                  <div class="form-group">
                      <div class="form-check">
                          <input class="form-check-input" name="fornitore" type="checkbox" id="fornitoreCheck">
                          <label class="form-check-label" for="gridCheck">
                          Registrati come fornitore
                          </label>
                      </div>
                  </div>
                  <div id="fornitoreInput" class ="collapse form-group">
                      <h5>Inserisci i tuoi dati fornitore</h5>
                      <p>La tua richiesta verrà sottoposta all'amministratore, ti invieremo una mail appena confermata
                      e potrai completare la pagina fornitore dal tuo profilo.</p>
                      <label for="nomefornitore">Nome Attività</label>
                      <input type="text" name="nome_fornitore" class="form-control" id="nomefornitore" placeholder="Pizzeria da Mario">
                      <label for="indirizzo">Indirizzo</label>
                      <input type="text" name="indirizzo" class="form-control" id="indirizzo" placeholder="Via Garibaldi 25">
                      <label for="descrizione_breve">Descrizione</label>
                      <textarea class="form-control" name="descrizione_breve" id="descrizione_breve" aria-describedby="descrizioneHelp" maxlength="50" rows="2"></textarea>
                      <small id="descrizioneHelp" class="form-text">Max 50 caratteri</small>
                  </div>
                  <div class="form-row">
                    <div class="col">
                      <button id="registrati" type="submit" onclick="registerClick(this.form, this.form.password)" class="centered btn green">Registrati</button>
                    </div>
                  </div>
              </form>
      </div>


      <!-- Optional JavaScript -->
      <script src="../js/fornitore.js" charset="utf-8"></script>
      </body>
