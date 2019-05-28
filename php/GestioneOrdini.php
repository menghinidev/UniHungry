<!DOCTYPE html>
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
    <script src="../js/gestioneOrdini_behaviour.js" charset="utf-8"></script>
    <!-- Page informations and icon -->
    <title>UniHungry - Riepilogo</title>
    <link rel="shortcut icon" href="../res/icon.ico" />
  </head>
  <body>
      <?php include 'navbar.php';
      if(!is_logged()){

      } else if($_SESSION['user_type'] = 'Fornitore'){
          $id = $_SESSION['user_id'];
          $sql = "SELECT * FROM ordini WHERE id_fornitore = $id AND stato_ordine!='rifiutato'";
          $sql .=" ORDER BY data DESC, ora_richiesta DESC";
          $result = $mysqli->query($sql);
     ?>

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
                        <label class="form-check-label" for="accettati">
                          Ricevuti
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="accettati">
                        <label class="form-check-label" for="accettati">
                          Accettati
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="completati">
                        <label class="form-check-label" for="completati">
                          Completati
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="consegnati">
                        <label class="form-check-label" for="consegnati">
                          Consegnati
                        </label>
                      </div>
                  </div>

              </form>
          </div>
  </div>

  <div class="container fullScreen" id="ordini">
      <?php if($result->num_rows <= 0){
          echo "Non ci sono ordini";
      } else {
      ?>
      <div class="container riepilogoOrdine fullScreen">
          <h2>Ordini</h2>
          <div class=" row">
              <p class="col-4">Id ordine: </p>
              <p class="col-4">Data e ora: </p>
              <p class="col-4">Stato: </p>
          </div>
      </div>

      <div id="accordion">
          <?php
          while($ordine = $result->fetch_assoc()){
              $sql = "SELECT P.id_prodotto, P.nome, P.prezzo_unitario, O.quantita FROM ordinazioni O, prodotti P where P.id_prodotto = O.id_prodotto AND id_ordine = {$ordine['id_ordine']}";
              $prodotti = $mysqli->query($sql);
           ?>
        <div class="card">
          <div class="card-header nopadding" id="heading<?php echo $ordine['id_ordine']; ?>">
                  <div class="container fullScreen btn" data-toggle="collapse" data-target="#collapse<?php echo $ordine['id_ordine']; ?>" aria-expanded="true" aria-controls="collapse<?php echo $ordine['id_ordine']; ?>">
                      <div class="row">
                          <p class="col-4"><?php echo "#".$ordine['id_ordine']; ?> </p>
                          <p class="col-4"><?php echo date("d/m/y",strtotime($ordine['data']))." alle ".$ordine['ora_richiesta']; ?> </p>
                          <p class="col-4"> <?php echo $ordine['stato_ordine']; ?></p>
                      </div>
                  </div>
          </div>

          <div id="collapse<?php echo $ordine['id_ordine']; ?>" class="collapse <?php if(isset($_GET['oid']) && $_GET['oid']==$ordine['id_ordine']){echo " show";} ?>" aria-labelledby="heading<?php echo $ordine['id_ordine']; ?>" data-parent="#accordion">
            <div class="card-body">
                <p>Luogo ritiro: <?php echo $ordine['luogo_ritiro']; ?></p>
              <ul>
                  <?php while($p = $prodotti->fetch_assoc()){ ?>
                  <li>
                      <div class="row">
                          <div class="col-9">
                              <a href="./Search.php?pid=<?php echo $p['id_prodotto']; ?>"><?php echo $p['nome'] ?></a> x <?php echo $p['quantita']; ?>
                          </div>
                          <div class="col prezzo">
                              <?php echo $p['prezzo_unitario']*$p['quantita'];?> €
                          </div>
                      </div>
                  </li>
              <?php } ?>
              </ul>
              <div class="buttons">
                  <?php if($ordine['stato_ordine'] == 'ricevuto'){ ?>
                  <button class="btn green" type="button" name="accetta" onclick="buttonClick('accetta',<?php echo $ordine['id_ordine']; ?> )">
                      Accetta
                  </button>
                  <button class="btn red" type="button" name="rifiuta" onclick="buttonClick('rifiuta',<?php echo $ordine['id_ordine']; ?> )">
                      Rifiuta
                  </button>
              <?php } else if($ordine['stato_ordine'] == 'accettato'){ ?>
                  <button class="btn orange" type="button" name="completato" onclick="buttonClick('completato',<?php echo $ordine['id_ordine']; ?> )">
                      Completa
                  </button>
              <?php }else if($ordine['stato_ordine'] == 'in consegna'){ ?>
                  <button class="btn purple" type="button" name="consegnato" onclick="buttonClick('consegnato',<?php echo $ordine['id_ordine']; ?> )">
                      Consegnato
                  </button>
              <?php }?>
              </div>

            </div>
          </div>
        </div>
    <?php } ?>
    </div>
<?php } ?>
<?php } ?>
</body>
