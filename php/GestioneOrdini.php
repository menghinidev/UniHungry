<!doctype html>
<html lang="it">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/theme.css">
    <link rel="stylesheet" href="../css/ordini.css">
    <link rel="stylesheet" href="../css/riepilogo.css">
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script
			  src="https://code.jquery.com/jquery-3.3.1.min.js"
			  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
			  crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

    <!-- Page informations and icon -->
    <title>UniHungry - Riepilogo</title>
    <link rel="shortcut icon" href="../res/icon.ico" />
  </head>
  <body>
      <?php include 'navbar.php';
      if(!is_logged()){

      } else if($_SESSION['user_type'] = 'Fornitore'){ ?>

      <div class="row" id="filterBar">
              <form class="col-6 form-inline">
                  <div class="form-group">
                      <label for="dateFilter">Filtra per data</label>
                      <input class="form-control" type="date" value="" id="dateFilter">
                  </div>
              </form>
              <form class="col-6 form-inline">
                  <div class="form-inline" id="checkBoxes">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="accettati">
                        <label class="form-check-label" for="defaultCheck2">
                          Accettati
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="completati">
                        <label class="form-check-label" for="defaultCheck2">
                          Completati
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="consegnati">
                        <label class="form-check-label" for="defaultCheck2">
                          Consegnati
                        </label>
                      </div>
                  </div>

              </form>
          </div>
  </div>

  <div class="container fullScreen" id="ordini">

      <div class="container riepilogoOrdine fullScreen">
          <h2>Ordini</h2>
          <div class=" row">
              <p class="col-4">Id ordine: </p>
              <p class="col-4">Data e ora: </p>
              <p class="col-4">Stato: </p>
          </div>
      </div>

      <div id="accordion">
        <div class="card">
          <div class="card-header nopadding" id="headingOne">
                  <div class="container fullScreen btn" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                      <div class="row">
                          <p class="col-4">#222222222 </p>
                          <p class="col-4">30/01/19 - 10:14 </p>
                          <p class="col-4"> stato ordine</p>
                      </div>
                  </div>
          </div>

          <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
            <div class="card-body">
                <p>Luogo ritiro: [campus]</p>
              <ul>
                  <li>
                      <div class="row">
                          <div class="col-9">
                              <a href="./Search.html">Prodotto</a> x2
                          </div>
                          <div class="col prezzo">
                              8.50€
                          </div>
                      </div>
                  </li>
                  <li>
                      <div class="row">
                          <div class="col-9">
                              Prodotto x1
                          </div>
                          <div class="col prezzo">
                              12.99€
                          </div>
                      </div>
                  </li>
                  <li>
                      <div class="row">
                          <div class="col-9">
                              Prodotto con nome lungo
                          </div>
                          <div class="col prezzo">
                              3.50€
                          </div>
                      </div>
                  </li>
              </ul>
              <div class="buttons">
                  <button class="btn green" type="button" name="accetta">
                      Accetta
                  </button>
                  <button class="btn red" type="button" name="rifiuta">
                      Rifiuta
                  </button>
              </div>

            </div>
          </div>
        </div>
    <?php } ?>
  </body>
