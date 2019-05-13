<!doctype html>
<html lang="it">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/theme.css">
    <link rel="stylesheet" href="../css/sheet.css">
    <link rel="stylesheet" href="../css/prodottiFornitore.css">
    <link rel="stylesheet" href="../css/fornitore.css">
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script
			  src="https://code.jquery.com/jquery-3.3.1.min.js"
			  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
			  crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../js/profiloFornitore.js"></script>
    <!-- Page informations and icon -->
    <title>UniHungry - Il tuo profilo</title>
    <link rel="shortcut icon" href="../res/icon.ico" />
  </head>
    <body>
        <?php include 'navbar.php';
        if(!is_logged()){
            header('Location: ./ERROR');
        } else {
          $id = $_SESSION['user_id'];
          $sqlprodotti = "SELECT * FROM prodotti WHERE id_fornitore = $id ORDER BY nome";
          $result = $mysqli->query($sqlprodotti);
          $sqlfornitore = "SELECT * FROM fornitori WHERE id_fornitore = ".$_SESSION['user_id'];
          $resultfornitore = $mysqli->query($sqlfornitore);
          $fornitore = $resultfornitore->fetch_assoc();
        }?>
        <div class="container nopadding row fullScreen">
            <div id="profileInfoBox" class="col-md-4 col-xl-2">
                <form>
                    <div id="changeLogo" class="form-group">
                        <label for="logoupload">
                        <?php
                        if(isset($fornitore['logo'])){
                          echo "<img class='nopadding profilePic' id='foodImg' src='data:image/jpeg;base64,".base64_encode($fornitore['logo'])."' alt='immagine fornitore'>";
                        } else {
                          echo "<img class='nopadding profilePic' id='foodImg' src='../res/default_food.png' alt='immagine cibo default'>";
                        }
                        ?>
                        </label>
                    </div>
                    <hr/>
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input type="text" class="form-control" id="nome" value="<?php echo $fornitore['nome_fornitore']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="descrizione">Descrizione</label>
                        <textarea class="form-control" id="descrizione" rows="3" aria-describedby="descrizioneHelp" maxlength="100" readonly><?php echo $fornitore['descrizione_breve']; ?></textarea>
                    </div>
                </form>
                <div id="modificaUtente" >
                    <a href="./ModificaProfiloFornitore.php">modifica impostazioni utente</a>
                </div>
            </div>
            <div id="prodottiBox" class="col">
                <div id="titleBox" class="row">
                    <div class="col-4">
                        <h2>I Tuoi Prodotti</h2>
                    </div>
                    <div class="col">
                        <div class="tabledispl">
                            <a id="addLink" href="./ModificaProdotto.php">
                                <img src="../res/plusicon.png" alt="" width=20px;>
                                <span class="nopadding">Nuovo prodotto</span>
                            </a>
                        </div>
                    </div>
                </div>
                <hr/>
                <?php
                if($result->num_rows > 0){
                  while ($row = $result->fetch_assoc()) {
                    echo "<div class='row distanced'>
                      <div class='col-2 logo'>";
                      if (isset($row['immagine'])) {
                        echo "<img class='reslogo nopadding img-fluid' src='data:image/jpeg;base64,".base64_encode( $row['immagine'])."' alt='logo'>";
                      } else {
                        echo "<img class='reslogo nopadding img-fluid' src='../res/res2.jpg' alt='logo'>";
                      }
                      echo "</div>
                      <div class='col-10 contenuto'>
                        <div class='row'>
                          <div class='col'>
                            <h4>".$row['nome']."</h4>
                          </div>
                        </div>
                        <hr/>
                        <div class='row'>
                          <div class='col'>
                            <div class='row'>
                              <div class='col-12'>
                                <p>".$row['descrizione']."</p>
                              </div>
                            </div>
                            <div class='row'>
                              <div class='col-6'>
                                <p>Prezzo: ".$row['prezzo_unitario']."€</p>
                              </div>
                              <div class='col-6'>
                                <a class='informazionLink' data-toggle='collapse' href='#id".$row['id_prodotto']."' role='button' aria-expanded='false'>Ingredienti:</a>
                              </div>
                            </div>
                            <div class='row collapse' id='id".$row['id_prodotto']."'>
                              <div class='col card card-body marginAccordion'>
                                <p>".$row['ingredienti']."</p>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class='row'>
                          <div class='col-12'>
                            <a class='btn orange noVisitedLink' href='./ModificaProdotto.php?id=".$row['id_prodotto']."'>Modifica Prodotto</a>
                          </div>
                        </div>
                      </div>
                    </div>";
                  }
                }
                 ?>
              <hr/>
              <div class="row">
                <div class="col middleCol">
                  <nav aria-label="Page navigation example">
                    <ul class="pagination">
                      <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                          <span aria-hidden="true">&laquo;</span>
                          <span class="sr-only">Previous</span>
                        </a>
                      </li>
                      <li class="page-item"><a class="page-link" href="#">1</a></li>
                      <li class="page-item"><a class="page-link" href="#">2</a></li>
                      <li class="page-item"><a class="page-link" href="#">3</a></li>
                      <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                          <span aria-hidden="true">&raquo;</span>
                          <span class="sr-only">Next</span>
                        </a>
                      </li>
                    </ul>
                  </nav>
                </div>
              </div>
            </div>
        </div>


    <!-- Optional JavaScript -->
    </body>
  </html>
