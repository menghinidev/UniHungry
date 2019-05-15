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
    <script type="text/javascript" src="../js/search_filter.js"></script>
    <!-- Page informations and icon -->
    <title>UniHungry - Cerca</title>
    <link rel="shortcut icon" href="../res/icon.ico" />
  </head>
  <body>
    <?php include 'navbar.php';
    if(isset($_GET['cat'])){
        $filtercat = explode(" ",$_GET['cat']);
    }
    if(isset($_GET['price'])){
        $price = $_GET['price'];
    }
    if(isset($_GET['s'])){
    $s = "%".$_GET['s']."%";
    $s = "'".mysqli_real_escape_string($mysqli, $s)."'";
    $sql ="SELECT P.*, F.nome_fornitore FROM prodotti P, fornitori F WHERE F.id_fornitore = P.id_fornitore
    AND (P.nome LIKE $s OR F.nome_fornitore LIKE $s OR P.categoria LIKE $s)";
    } else {
        $sql ="SELECT P.*, F.nome_fornitore FROM prodotti P, fornitori F WHERE F.id_fornitore = P.id_fornitore";
    }
    $products = $mysqli->query($sql);
    ?>
    <div class="container fullScreen">
    <nav id="mobileNav">
    <div id="mobileNavContent">
        <div class="row" id="searchToHide">
            <div class="col-md-3">
                <div class="input-group mb-3 total">
                    <input type="text" class="form-control" name="s" placeholder="Cerca...">
                    <div class="input-group-append">
                      <button class="btn green" onclick="applica()">Vai</button>
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
    </div>
    </nav>
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
                  <?php foreach($categories as $cat){ ?>
                  <input type="checkbox" class="form-check-input filter">
                  <label class="form-check-label"><?php echo $cat['nome']; ?></label>
                  <br/>
                  <?php } ?>
              </div>
              <h4>Fasce di prezzo:</h4>
              <div >
                <input class="priceFilter" type="radio" name="optradio" name= "nessuna">
                <label for="max3">Nessuna</label>
                <br/>
                <input class="priceFilter" type="radio" name="optradio" name= "max3">
                <label for="max3">Max 3€</label>
                <br/>
                <input class="priceFilter" type="radio" name="optradio" name= "max6">
                <label for="max6">Max 6€</label>
                <br/>
                <input class="priceFilter" type="radio" name="optradio" name= "max10">
                <label for="max10">Max 10€</label>
              </div>
               <button class="btn green applica">Applica filtri</button>
               <button class="btn purple reset">Resetta filtri</button>
            </div>
          </div>
        </div>
        <div class="col-4" id="filters">
        <div id="filtersContent">
          <div class="row">
              <div class="col">
                  <div class="input-group mb-3 total" >
                      <input type="text" class="searchbar form-control" <?php if($_GET['s']!==''){echo "value=".$_GET['s'];} ?> name="s" placeholder="Cerca...">
                      <div class="input-group-append">
                        <button class="btn green" onclick="applica()">Vai</button>
                      </div>
                  </div>
              </div>
          </div>
          <div class="row">
            <div class="col">
            <h4>Categorie:</h4>
              <div class="form-check">
                  <?php foreach($categories as $cat){ ?>
                  <input type="checkbox" class="form-check-input filter"
                  <?php if(isset($_GET['cat'])){
                      if(!(array_search($cat['nome'], $filtercat)===FALSE)){
                          echo " checked ";
                      }
                  }
                  ?>
                  >
                  <label class="form-check-label"><?php echo $cat['nome']; ?></label>
                  <br/>
                  <?php } ?>
              </div>
            <h4>Fasce di prezzo:</h4>
            <div >
              <input class="priceFilter" type="radio" name="optradio" name= "nessuna"
              <?php if(isset($_GET['price'])){
                  if($price == 'Nessuna'){
                      echo " checked ";
                  }
              }
              ?>>
              <label for="max3">Nessuna</label>
              <br/>
              <input class="priceFilter" type="radio" name="optradio" name= "max3"
              <?php if(isset($_GET['price'])){
                  if($price == 'Max 3€'){
                      echo " checked ";
                  }
              }
              ?>>
              <label for="max3">Max 3€</label>
              <br/>
              <input class="priceFilter" type="radio" name="optradio" name= "max6"
              <?php if(isset($_GET['price'])){
                  if($price == 'Max 6€'){
                      echo " checked ";
                  }
              }
              ?>>
              <label for="max6">Max 6€</label>
              <br/>
              <input class="priceFilter" type="radio" name="optradio" name= "max10"
              <?php if(isset($_GET['price'])){
                  if($price == 'Max 10€'){
                      echo " checked ";
                  }
              }
              ?>>
              <label for="max10">Max 10€</label>
            </div>
             <button class="btn green applica">Applica filtri</button>
             <button class="btn purple reset">Resetta filtri</button>
            </div>
          </div>
        </div>
        </div>
        <div class="col-8 content tab-pane active distanced" id="content">
        <?php if($products->num_rows>0) {
                while ($row = $products->fetch_assoc()) {?>
                    <div class="row">
                    <div class="col-2 logo">
                        <?php
                        echo "<img class='reslogo nopadding img-fluid' src='data:image/jpeg;base64,".base64_encode($row['immagine'])."' alt='immagine prodotto'>";
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
                              <a class="informazionLink" data-toggle="collapse" href="#id<?php echo $row['id_prodotto'] ?>" role="button" aria-expanded="false">Ingredienti:</a>
                            </div>
                          </div>
                          <div class="row collapse" id="id<?php echo $row['id_prodotto']?>">
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
