<!DOCTYPE html>
<html lang="it" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/theme.css">
    <link rel="stylesheet" href="../css/sheet.css">
    <link rel="stylesheet" href="../css/search.css">
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script
			  src="https://code.jquery.com/jquery-3.3.1.min.js"
			  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
			  crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../js/search.js"></script>

    <!-- Page informations and icon -->
    <title>UniHungry - Cerca</title>
    <link rel="shortcut icon" href="../res/icon.ico" />
  </head>
  <body>
    <?php include 'navbar.php';
    //$param = explode(" ",$_GET['s']);
    if(isset($_GET['s'])){
    $param = "%".$_GET['s']."%";
    $param = "'".mysqli_real_escape_string($mysqli, $param)."'";
    $sql ="SELECT P.*, F.nome_fornitore FROM prodotti P, fornitori F WHERE F.id_fornitore = P.id_fornitore
    AND (P.nome LIKE $param OR F.nome_fornitore LIKE $param OR P.categoria LIKE $param)";
    } else {
        $sql ="SELECT P.*, F.nome_fornitore FROM prodotti P, fornitori F WHERE F.id_fornitore = P.id_fornitore";
    }
    $products = $mysqli->query($sql);
    ?>
    <div class="container fullScreen">
      <div class="row" id="searchToHide">
          <div class="col-md-3">
              <div class="input-group mb-3 total">
                  <input type="text" class="form-control" placeholder="Cerca...">
                  <div class="input-group-append">
                    <button type="button" class="btn green" name="button">Vai</button>
                  </div>
              </div>
          </div>
      </div>
      <div class="row" id="myFiltersNav">
        <div class="col-md-3">
          <ul class="nav nav-tabs">
            <li><button class="btn orange noradius active" data-toggle="tab" href="#content">Prodotti</a></li>
            <li><button class="btn orange noradius" data-toggle="tab" href="#mobileFilters">Filtri</a></li>
          </ul>
        </div>
      </div>
      <div class="row tab-content">
      <?php
      $r = $mysqli->query("SELECT nome FROM categorie");
      while($cat_row = $r->fetch_assoc()){
          $categories[] = $cat_row;
      }
       ?>
        <div class="tab-pane fade" id="mobileFilters">
          <div class="col-md-3">
            <div class="fixedMargin">
              <h4>Categorie:</h4>
              <div class="form-check" id="filtersList">
                  <input type="checkbox" class="form-check-input">
                  <label class="form-check-label">Tutti</label>
                  <br>
                  <?php foreach($categories as $cat){ ?>
                  <input type="checkbox" class="form-check-input">
                  <label class="form-check-label"><?php echo $cat['nome']; ?></label>
                  <br>
                  <?php } ?>
              </div>
                  <h4>Fasce di prezzo:</h4>
                  <div>
                    <div class="radio tre">
                      <input type="radio" name="optradio" checked>
                    </div>
                    <div class="radio tre">
                      <input type="radio" name="optradio" checked>
                    </div>
                    <div class="radio tre">
                      <input type="radio" name="optradio" checked>
                    </div>
                  </div>
                  <div>
                    <div class="tre">
                      Max 5€
                    </div>
                    <div class="tre">
                      Max 10€
                    </div>
                    <div class="tre">
                      Max 15€
                    </div>
                  </div>
            </div>
          </div>
        </div>
        <div class="col-4" id="filters">
          <div class="row">
              <div class="col">
                  <div class="input-group mb-3 total">
                      <input type="text" class="form-control" placeholder="Cerca..">
                      <div class="input-group-append">
                        <button type="button" class="btn green" name="button">Vai</button>
                      </div>
                  </div>
              </div>
          </div>
          <div class="row">
            <div class="col">
              <div class="form-check">
                  <input type="checkbox" class="form-check-input">
                  <label class="form-check-label">Tutti</label>
                  <hr/>
                  <?php foreach($categories as $cat){ ?>
                  <input type="checkbox" class="form-check-input">
                  <label class="form-check-label"><?php echo $cat['nome']; ?></label>
                  <?php } ?>
              </div>
            </div>
          </div>
        </div>
        <div class="col-8 content tab-pane active distanced" id="content">
        <?php if($products->num_rows>0) {
                while ($row = $products->fetch_assoc()) {?>
                    <div class="row">
                    <div class="col-2 logo">
                        <?php  echo "<img class='reslogo nopadding img-fluid' src='data:image/jpeg;base64,".base64_encode($row['immagine'])."' alt='immagine prodotto'>";
                        ?>
                    </div>
                    <div class="col-10 contenuto">
                      <div class="row">
                        <div class="col">
                          <h5><?php echo $row['nome'] ?></h5>
                        </div>
                      </div>
                      <hr/>
                      <div class="row">
                        <div class="col">
                          <div class="row">
                            <div class="col-12">
                              <p><?php echo $row['descrizione'] ?>
                              </p>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-6">
                              <p>Prezzo: <?php echo $row['prezzo_unitario'] ?> </p>
                            </div>
                            <div class="col-6">
                              <a class="informazionLink" data-toggle="collapse" href="#information1" role="button" aria-expanded="false">Ingredienti:</a>
                            </div>
                          </div>
                          <div class="row collapse" id="information1">
                            <div class="col card card-body marginAccordion">
                              <p><?php echo $row['ingredienti'] ?></p>
                            </div>
                          </div>
                        </div>
                        <div class="col-3 buttonToHide">
                          <button type="button" class="btn green reduced" name="button">Aggiungi al carrello</button>
                        </div>
                      </div>
                      <div class="row buttonAppear">
                        <div class="col-12">
                          <button type="button" class="btn green" name="button">Aggiungi al carrello</button>
                        </div>
                      </div>
                    </div>
                    </div>
            <hr/>
        <?php }} ?>
        </div>
      </div>
  </body>
</html>
