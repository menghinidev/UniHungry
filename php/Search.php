<!DOCTYPE html>
<html lang="it" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/theme.css">
    <link rel="stylesheet" href="../css/search.css">
    <!--FontAwsome-->
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script
			  src="https://code.jquery.com/jquery-3.3.1.min.js"
			  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
			  crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../js/search_filter.js"></script>
    <script type="text/javascript" src="../js/search_layout.js"></script>
    <script type="text/javascript" src="../js/search_ajax.js"></script>
    <script type="text/javascript" src="../js/search_pagination.js"></script>
    <!-- Page informations and icon -->
    <title>UniHungry - Cerca</title>
    <link rel="shortcut icon" href="../res/icon.ico" />
  </head>
  <body>
    <?php include 'navbar.php';
    $sql ="SELECT P.*, F.nome_fornitore, FornitoreAperto(F.id_fornitore) AS aperto FROM prodotti P, fornitori F WHERE F.id_fornitore = P.id_fornitore";
    if(isset($_GET['pid'])){
        $sql .= " AND P.id_prodotto = {$_GET['pid']}";
    } else if(isset($_GET['fid'])){
        $sql .= " AND P.id_fornitore = {$_GET['fid']}";
    }
        if(isset($_GET['s'])){
            if($_GET['s'] != ''){
            $s = "%".$_GET['s']."%";
            $s = str_replace(" ","%", $s);
            $s = "'".mysqli_real_escape_string($mysqli, $s)."'";
            $sql = $sql. " AND (P.nome LIKE $s OR F.nome_fornitore LIKE $s OR P.categoria LIKE $s)";
            }
        }
        if(isset($_GET['cat'])){
            $filtercat = explode("_",$_GET['cat']);
            if($_GET['cat'] != ''){
                $sql = "$sql AND (";
                $first = true;
                foreach($filtercat as $filter){
                    if(!$first){
                        $sql = $sql. " OR ";
                    }
                    $filter = "'".mysqli_real_escape_string($mysqli, $filter)."'";
                    $sql = $sql." P.categoria = $filter";
                    $first=false;
                }
                $sql = $sql. ")";
            }
        }
        if(isset($_GET['price'])){
            $price = $_GET['price'];
            $val = preg_replace("/[^0-9\.]/", '', $price);
            if($val != ''){
                $sql = $sql." AND P.prezzo_unitario <= $val ";
            }
        }
        if(isset($_GET['s'])){
            if($_GET['s'] != ''){
                $string = "'".mysqli_real_escape_string($mysqli, $_GET['s'])."'";
                $sql = "$sql ORDER BY levenshtein($string, P.nome), levenshtein($string, F.nome_fornitore), P.nome";
            }
            else {
               $sql = "$sql ORDER BY nome";
           }
        } else {
            $sql = "$sql ORDER BY nome";
        }
    $products = $mysqli->query($sql);

    //PAGINAZIONE
    if (isset($_GET['pageno'])) {
      $pageno = $_GET['pageno'];
    } else {
      $pageno = 1;
    }

    $no_of_records_per_page = 5;
    $offset = ($pageno - 1) * $no_of_records_per_page;
    $total_pages = ceil($products->num_rows / $no_of_records_per_page);

    $sql = $sql." LIMIT $offset, $no_of_records_per_page";
    $products = $mysqli->query($sql);
    //END PAGINAZIONE
    //echo $products;
    $r = $mysqli->query("SELECT nome FROM categorie");
    while($cat_row = $r->fetch_assoc()){
        $categories[] = $cat_row;
    }
     ?>
    <div class="container fullScreen">
        <div class="row fullScreen justify-content-between mb-3 mt-3">
            <div class="col-lg-4 col-9">
                <div class="input-group" >
                    <input type="text" class="searchbar form-control" <?php if(isset($_GET['s']) && $_GET['s']!==''){echo "value='".$_GET['s']."'";} ?> name="s" placeholder="Cerca...">
                    <div class="input-group-append">
                      <button type="button" class="btn green" onclick="applica()"><i class="fa fa-fw fa-search"></i></button>
                    </div>
                </div>
            </div>
            <?php if(is_logged() && $_SESSION['user_type'] == 'Cliente'){ ?>
            <div class="col-lg-2 col-3">
                <div class=" btn btn-primary">
                    <a id="cartButton" class="noVisitedLink" href="./Cart.php" name="button">
                        Carrello
                        <i class="fa fa-fw fa-lg fa-shopping-cart"></i>
                    </a>
                    <span id="product_count" class="badge badge-pill badge-danger"><?php if(isset($_SESSION['tot_products'])){echo $_SESSION['tot_products'];} ?></span>
                </div>
            </div>
            <?php } ?>

        </div>
        <div class="row col">
            <button class="btn orange" id="filterButton" onclick="$('#filters').toggle();"><i class="fa fa-filter"></i> Filtri</button>
        </div>

      <div class="row">
        <div class="col-2 filterBorder" id="filters">
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
            <h4>Prezzo:</h4>
            <div >
              <input class="priceFilter" type="radio" name="optradio" name= "indifferente"
              <?php if(isset($_GET['price'])){
                  if($price == 'Indifferente'){
                      echo " checked ";
                  }
              }
              ?>>
              <label for="max5">Indifferente</label>
              <br/>
              <input class="priceFilter" type="radio" name="optradio" name= "max5"
              <?php if(isset($_GET['price'])){
                  if($price == 'Max 5???'){
                      echo " checked ";
                  }
              }
              ?>>
              <label for="max3">Max 5???</label>
              <br/>
              <input class="priceFilter" type="radio" name="optradio" name= "max7"
              <?php if(isset($_GET['price'])){
                  if($price == 'Max 7???'){
                      echo " checked ";
                  }
              }
              ?>>
              <label for="max5">Max 7???</label>
              <br/>
              <input class="priceFilter" type="radio" name="optradio" name= "max10"
              <?php if(isset($_GET['price'])){
                  if($price == 'Max 10???'){
                      echo " checked ";
                  }
              }
              ?>>
              <label for="max10">Max 10???</label>
            </div>
             <button class="btn green applica top_margin">Applica filtri</button>
             <button class="btn purple reset top_margin">Resetta filtri</button>
            </div>
        <div class="col distanced" id="content">
        <?php
        if($products->num_rows <= 0){
            include 'no_results.php';
        }
        else {
                while ($row = $products->fetch_assoc()) {?>
                    <div class="row">
                    <div class="col-2 logo">
                        <?php
                        echo "<img class='reslogo nopadding img-fluid' src='data:image/jpeg;base64,".base64_encode($row['immagine'])."' alt='immagine prodotto'>";
                        ?>
                    </div>
                    <div class="col contenuto">
                      <div class="row">
                        <div class="col">
                          <strong><?php echo $row['nome'] ?> </strong>
                          <span> - </span>
                          <a class="alwaysGreen" href="./Fornitore.php?id=<?php echo $row['id_fornitore'] ?>"><?php echo $row['nome_fornitore'] ?></a>
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
                              <p>Prezzo: <?php echo $row['prezzo_unitario'] ?> ???</p>
                            </div>
                            <div class="col-6">
                              <a class="informazionLink" data-toggle="collapse" href="#id<?php echo $row['id_prodotto'] ?>" role="button" aria-expanded="false"><i class="fa fa-info-circle fa-lg"></i></a>
                            </div>
                          </div>
                          <div class="row collapse" id="id<?php echo $row['id_prodotto']?>">
                            <div class="col-lg-7 col-md-8 card card-body marginAccordion">
                              <p><?php echo $row['ingredienti'] ?></p>
                            </div>
                          </div>
                        </div>
                        <?php if(is_logged() && $_SESSION['user_type'] == 'Cliente'){ ?>
                        <?php if($row['aperto']) { ?>
                        <div class="col-lg-3 buttonPC">
                        <?php if(isset($_SESSION['cart'][$row['id_prodotto']])){?>
                            <button type="button" class="btn orange reduced" name="button" onclick="addCart(<?php echo $row['id_prodotto'].", ".$row['id_fornitore']?>,this)">Aggiungi un altro</button>
                        <?php } else { ?>
                            <button type="button" class="btn green reduced" name="button" onclick="addCart(<?php echo $row['id_prodotto'].", ".$row['id_fornitore']?>,this)">Aggiungi al carrello</button>
                        <?php }} else { ?>
                            <div class="col-lg-3">
                            <button class="btn chiuso disabled reduced" disabled>Il fornitore ?? chiuso!</button>
                        <?php }?>
                        </div>
                  <?php } else if(!is_logged()){?>
                      <div class="col-lg-3 buttonPC">
                        <a type="button" class="btn noVisitedLink green reduced" onclick="not_loggedClick(); return false;" name="button" href="#">Aggiungi al carrello</a>
                      </div>
                  <?php }?>

                    </div>
                    </div>
                    </div>
            <hr/>
        <?php }?>
        <div class="row">
          <div class="col-3"></div>
          <div class="col-6">
            <nav>
              <ul class="pagination">
                <li class="page-item <?php if($pageno <= 1){ echo 'disabled'; } ?>">
                  <a class="page-link" id="1" onclick="changePage(this)">First</a>
                </li>
                <?php
                for ($i=1; $i < $total_pages + 1; $i++) {
                  if($i == $pageno) {
                    echo '<li class="page-item">
                      <a class="page-link current" id="'.$i.'" onclick="changePage(this)">'.$i.'</a>
                    </li>';
                  } else {
                    echo '<li class="page-item">
                      <a class="page-link" id="'.$i.'" onclick="changePage(this)">'.$i.'</a>
                    </li>';
                  }
                }
                ?>
                <li class="page-item <?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
                  <a class="page-link" id="<?php echo $total_pages ?>" onclick="changePage(this)">Last</a>
                </li>
              </ul>
            </nav>
          </div>
          <div class="col-3"></div>
        </div>
        </div>
        <?php } ?>
      </div>
  </body>
</html>
