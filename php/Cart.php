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
    <?php include 'navbar.php';
    if(isset($_SESSION['cart'])){
        $sql = "SELECT * FROM prodotti WHERE id_prodotto in (";
        foreach ($_SESSION['cart'] as $productID => $quantity){
            $sql = "$sql $productID,";
        }
        $sql = substr($sql, 0, -1);
        $sql = "$sql ) ORDER BY id_fornitore";
        $result = $mysqli->query($sql);
        $diversi = count($_SESSION['fornitori']);
        while($product = $result->fetch_assoc()){
            $products_array[$product['id_prodotto']] = $product;
        }
    }
    ?>
    <?php if(isset($_SESSION['cart']) && $diversi > 1 ){ ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            Attenzione stai ordinando da <?php echo $diversi; ?> fornitori diversi, riceverai quindi altrettanti
            ordini con possibili differenze nell'orario di consegna!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
    <?php } ?>
    <div class="container fullScreen">
      <div class="row top_nav" id="toShow">
            <a href="#toScroll" class="scrolling btn btn-primary">Ordina ora</a>
      </div>

      <div class="row" id="body">
        <div class="col-md-8 tofullscreen" id="content">
            <?php if(!isset($_SESSION['cart'])) {
                echo 'Il carrello è vuoto!';
                //FIX MESSAGE POSITION
            } else {
                foreach($products_array as $product){
            ?>
          <div class="row" id="prodotto">
            <div class="col-2 logo">
              <img class="reslogo nopadding img-fluid" src="../res/res2.jpg" alt="logo">
            </div>
            <div class="col contenuto">
              <div class="row">
                <div class="col-12">
                  <h5><?php echo $product['nome']; ?></h5>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-8 description">
                  <div class="row col">
                      <p><?php echo $product['descrizione']; ?>
                      </p>
                  </div>
                  <div class="row col">
                      <p>Prezzo: <?php echo $product['prezzo_unitario'];?> </p>
                  </div>
                  <div class="row col">
                     <a href="" class="rimuovi"><small>Rimuovi dal carrello</small></a>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group">
                    <label for="q">Quantità</label>
                    <input class="spinner" type="number" id="q" name="q" value="<?php $id = $product['id_prodotto']; echo $_SESSION['cart'][$id] ?>" min="1" >
                  </div>
                </div>
              </div>
            </div>
          </div>
          <hr/>


    <?php }}?>
        </div>
        <hr/>
      <div class="col" id="checkout">
            <div class="row col">
              <div class="head">
                <strong for="totale">Totale:</strong>
              </div>
              <?php if(!isset($_SESSION['cart'])) { ?>
                  <label id="totale">0€</label>
              <?php } else {
                  $tot = 0;
                  foreach($products_array as $id => $p){
                      $tot += $p['prezzo_unitario'] * $_SESSION['cart'][$id];
                  }
              ?>
                  <label id="totale"><?php echo $tot. "€"; ?></label>
              <?php } ?>
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
