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
    <!--FontAwsome-->
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script
			  src="https://code.jquery.com/jquery-3.3.1.min.js"
			  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
			  crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script src="../js/bootstrap-input-spinner.js"></script>
    <script type="text/javascript" src="../js/cart_layout.js"></script>
    <script type="text/javascript" src="../js/cart_behaviour.js"></script>

    <!-- Page informations and icon -->
    <title>UniHungry - Cart</title>
    <link rel="shortcut icon" href="../res/icon.ico" />
  </head>
  <body>
    <?php include 'navbar.php';
    if(isset($_SESSION['cart'])){
        $sql = "SELECT P.*, F.nome_fornitore FROM prodotti P, fornitori F WHERE P.id_fornitore = F.id_fornitore AND id_prodotto in (";
        foreach ($_SESSION['cart'] as $productID => $quantity){
            $sql = "$sql $productID,";
        }
        $sql = substr($sql, 0, -1);
        $sql = "$sql ) ORDER BY id_fornitore";
        $result = $mysqli->query($sql);
        $products_array = array();
        $diversi = count($_SESSION['fornitori']);
        while($product = $result->fetch_assoc()){
            $products_array[$product['id_prodotto']] = $product;
        }
    }
    ?>
    <?php if(isset($_SESSION['cart']) && $diversi > 1 ){ ?>
        <div id="fornitoriAlert" class="alert alert-warning alert-dismissible fade show" role="alert">
            Attenzione stai ordinando da <span id="fornitoriNum"> <?php echo $diversi; ?></span> fornitori diversi, riceverai quindi altrettanti
            ordini con possibili differenze nell'orario di consegna!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
    <?php } ?>
    <div class="container fullScreen">
      <div class="row top_nav" id="toShow">
            <a href="#ordina" class="scrolling btn btn-primary">Ordina ora</a>
      </div>

      <div class="row" id="body">
        <div class="col-md-8 tofullscreen" id="content">
            <?php if(!isset($_SESSION['cart'])) {
                echo 'Il carrello è vuoto!';
                //FIX MESSAGE POSITION
            } else {
                $first = true;
                $fornitoreID = 0;
                foreach($products_array as $product){
                    if($first){
                        $fornitoreID = $product['id_fornitore'];
                        //print fornitore data
                        ?>
                         <div class="row fornitore" id="fornitore<?php echo $product['id_fornitore']; ?>">
                             <h4><?php echo $product['nome_fornitore']; ?></h4>
                         </div>
                        <?php
                        $first = false;
                    } else {
                        if($fornitoreID != $product['id_fornitore']){
                            $fornitoreID = $product['id_fornitore'];
                            //print fornitore data
                            ?>
                            <div class="row fornitore" id="fornitore<?php echo $product['id_fornitore']; ?>">
                                <h4><?php echo $product['nome_fornitore']; ?></h4>
                            </div>
                            <?php
                        }
                    }
            ?>
          <div class="row product" id="prodotto<?php echo $product['id_prodotto'];?>">
            <div class="col-2 logo">
                <?php
                echo "<img class='reslogo nopadding img-fluid' src='data:image/jpeg;base64,".base64_encode($product['immagine'])."' alt='immagine prodotto'>";
                ?>
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
                </div>
                <div class="col-lg-4">
                  <div class="form-group">
                    <label for="q">Quantità</label>
                    <input class="spinner" type="number" id="q" name="q" onchange="changeQuantity(this, <?php echo $product['id_prodotto'].", ".$product['id_fornitore'] ; ?>)" value="<?php $id = $product['id_prodotto']; echo $_SESSION['cart'][$id] ?>" min="1" >
                  </div>
                </div>
                <div class="row col">
                   <button type="button" class="rimuovi btn btn-link" onclick="removeProduct(<?php echo $product['id_prodotto'].", ".$product['id_fornitore'] ; ?>)"><small>Rimuovi dal carrello</small></button>
                </div>
              </div>
            </div>
          </div>
    <?php }}?>
        </div>


      <div class="col" id="checkout">
      <form  id="checkoutForm" action="action_ordina.php"method="post">
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
            <div class="form-group">
              <label for="luogo_ritiro">Luogo di ritiro:</label>
              <select id="luogo_ritiro" name="luogo_ritiro" class="form-control" required>
                  <option value="Ingresso Via dell'Università">Ingresso Via dell'Università</option>
                  <option value="Ingresso Via Macchiavelli">Ingresso Via Macchiavelli</option>
              </select>
            </div>
            <div class="form-group">
              <label for="ora_ritiro">Ora</label>
              <input type="time" id="ora_ritiro" name="ora_ritiro" class="form-control" value="<?php
              $minTime = time() + (30 * 60);
              date_default_timezone_set("Europe/Rome");
              echo date("H:i",$minTime); ?>" required>
            </div>
          <div class="form-check">
            <label class="form-check-label">
              <input type="radio" class="form-check-input" name="optradio" name="ora" id="ora">Paga ora
            </label>
          </div>
          <div class="form-check">
            <label class="form-check-label">
              <input type="radio" class="form-check-input" name="optradio" id="consegna" name="consegna" checked>Paga alla consegna
            </label>
          </div>

          <div class="collapse" id="myForm">
            <hr/>
            <div class="form-row">
              <div class="form-group col-6">
                <label for="nome">Nome</label>
                <input type="text" id="nome" name="nome" class="form-control"placeholder="Nome">
              </div>
              <div class="form-group col-6">
                <label for="cognome">Cognome</label>
                <input type="text" id="cognome" name="cognome" class="form-control"placeholder="Cognome">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-8">
                <label for="numero_carta">Numero carta</label>
                <input type="text" id="numero_carta" name="numero_carta" class="form-control" placeholder="1111 1111 1111 1111" pattern ='^\d{16}$'>
              </div>
              <div class="form-group col-4">
                <label for="cvv">CVV</label>
                <input type="text" name="cvv" id="cvv" class="form-control" placeholder="CVV" pattern ='^\d{3}$'>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-4">
                <label for="anno_scadenza">Anno scadenza</label>
                  <select id="anno_scadenza" name="anno_scadenza" class="form-control date">
                    <?php
                    for ($i=0; $i <= 11 ; $i++) {
                        $s= date("Y");
                        $s += $i;
                        echo "<option value='$s'>$s</option>";
                    }
                     ?>
                  </select>
              </div>
              <div class="form-group col-4">
                <label for="mese_scadenza">Mese scadenza</label>
                <select id="mese_scadenza" name="mese_scadenza" class="form-control date" placeholder="Mese">
                  <?php
                  for ($i=1; $i <= 12 ; $i++) {
                      if($i < 10){
                          $s = "0".$i;
                      } else {
                          $s = $i;
                      }
                      echo "<option value='$s'>$s</option>";
                  }
                   ?>
                </select>
              </div>
            </div>
            </div>
            <div class="sendNext">
                <button type="submit" class="btn btn-primary order" id="ordina" <?php if(!isset($_SESSION['cart'])){echo "disabled='disabled'";} ?>>Ordina ora</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
