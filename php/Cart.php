<!DOCTYPE html>
<html lang="it" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/theme.css">
    <link rel="stylesheet" href="../css/sheet.css">
    <link rel="stylesheet" href="../css/cart.css">
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script
			  src="https://code.jquery.com/jquery-3.3.1.min.js"
			  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
			  crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script src="../js/bootstrap-input-spinner.js"></script>
    <script type="text/javascript" src="../js/cart_layout.js"></script>

    <!-- Page informations and icon -->
    <title>UniHungry - Cart</title>
    <link rel="shortcut icon" href="../res/icon.ico" />
  </head>
  <body>
    <?php include 'navbar.php' ?>
    <div class="container fullScreen">
      <div class="row top_nav" id="toShow">
            <a href="#toScroll" class="scrolling btn btn-primary">Ordina ora</a>
      </div>

      <div class="row" id="body">
        <div class="col-md-8 tofullscreen" id="content">
          <div class="row" id="prodotto">
            <div class="col-2 logo">
              <img class="reslogo nopadding img-fluid" src="../res/res2.jpg" alt="logo">
            </div>
            <div class="col contenuto">
              <div class="row">
                <div class="col-12">
                  <h5>Titolo</h5>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-8 description">
                  <div class="row col">
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.
                      </p>
                  </div>
                  <div class="row col">
                      <p>Prezzo: </p>
                  </div>
                  <div class="row col">
                     <a href="" class="rimuovi"><small>Rimuovi dal carrello</small></a>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group">
                    <label for="q">Quantità</label>
                    <input class="spinner" type="number" id="q" name="q" value="1" min="1" >
                  </div>
                </div>
              </div>
            </div>
          </div>
          <hr/>

        </div>
        <hr/>

      <div class="col" id="checkout">
            <div class="row col">
              <div class="head">
                <strong for="totale">Totale:</strong>
              </div>
              <label id="totale">13€</label>
            </div>
          <hr/>
          <div class="form-check">
            <label class="form-check-label">
              <input type="radio" class="form-check-input" name="optradio" id="ora">Paga ora
            </label>
          </div>
          <div class="form-check">
            <label class="form-check-label">
              <input type="radio" class="form-check-input" name="optradio" id="consegna" checked>Paga alla consegna
            </label>
          </div>
          <form class="collapse" id="myForm">
            <div class="form-row">
              <div class="form-group col-6">
                <label for="inputEmail4">Nome</label>
                <input type="text" class="form-control"placeholder="Nome">
              </div>
              <div class="form-group col-6">
                <label for="inputPassword4">Cognome</label>
                <input type="text" class="form-control"placeholder="Cognome">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-8">
                <label for="inputEmail4">Numero carta</label>
                <input type="text" class="form-control" placeholder="Numero">
              </div>
              <div class="form-group col-4">
                <label>CVV</label>
                <input type="text" class="form-control" placeholder="CVV">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-4">
                <label for="inputState">Anno scadenza</label>
                  <select id="inputState" class="form-control date" placeholder="Anno">
                    <option>19</option>
                  </select>
              </div>
              <div class="form-group col-4">
                <label for="inputState">Mese scadenza</label>
                <select id="inputState" class="form-control date" placeholder="Mese">
                  <option>01</option>
                </select>
              </div>
            </div>
          </form>
          <div class="sendNext">
            <form action="Confirm.html" method="post">
              <button type="submit" class="btn btn-primary order"  id="toScroll">Ordina ora</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
