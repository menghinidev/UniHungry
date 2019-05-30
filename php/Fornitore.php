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
    <link rel="stylesheet" href="../css/profiloFornitore.css">
    <!--FontAwsome-->
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script
			  src="https://code.jquery.com/jquery-3.3.1.min.js"
			  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
			  crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

    <!-- Page informations and icon -->
    <title>UniHungry - Profilo Fornitore</title>
    <link rel="shortcut icon" href="../res/icon.ico" />
  </head>
    <body>
        <?php
          include 'navbar.php';
          $id = $_GET['id'];
          $sqlfornitore = "SELECT * FROM fornitori WHERE id_fornitore = $id";
          $emailfield = "SELECT * FROM fornitori INNER JOIN users ON fornitori.id_fornitore = users.user_id WHERE fornitori.id_fornitore = $id";
          $sqlorari = "SELECT * FROM orari_giornalieri WHERE id_fornitore = $id";
          $result = $mysqli->query($sqlfornitore);
          $emailResult = $mysqli->query($emailfield);
          $orariResult = $mysqli->query($sqlorari);
          $email = $emailResult->fetch_assoc();
          $fornitore = $result->fetch_assoc();
        ?>
        <div class="container nopadding row fullScreen">
          <div id="profileInfoBox" class="col-xl-2">
            <div id="changeLogo">
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
            <div class="centered field">
              <h5><strong>Indirizzo</strong></h5>
              <?php echo $fornitore['indirizzo']; ?>
            </div>
            <div class="centered field">
              <h5><strong>Numero Telefono</strong></h5>
              <?php echo $fornitore['telefono']; ?>
            </div>
            <div class="centered field">
              <h5><strong>Email</strong></h5>
              <?php echo $email['email']; ?>
            </div>
          </div>
          <div class="col-xl-10">
            <div class="centered distanced">
              <h2><?php echo $fornitore['nome_fornitore']; ?></h2>
            </div>
            <hr/>
            <div class="centered distanced">
              <i><?php echo $fornitore['descrizione']; ?></i>
            </div>
            <hr/>
            <div class="row distanced">
              <div class="col-md-3"></div>
              <div class="col-md-6 orari">
                <h4 class="centered">Orari Apertura</h4>
                <?php
                if($orariResult->num_rows == 0) {
                  echo '<div class="row">
                    <div class="col centered">
                      <strong>Non ci sono orari per questo fornitore</strong>
                    </div>
                  </div>';
                }
                while ($orari = $orariResult->fetch_assoc()) {
                ?>
                <div class="row">
                    <div class="col-4 centered nopadding">
                      <strong><?php echo $orari['giorno_settimana']; ?>:</strong>
                    </div>
                    <div class="col-4 centered nopadding"><?php
                    if (isset($orari["inizio_pausa"])) {
                      echo substr_replace($orari["apertura"] ,"",-3)." - ".substr_replace($orari["inizio_pausa"] ,"",-3);
                    } else {
                      echo substr_replace($orari["apertura"] ,"",-3).' - '.substr_replace($orari["chiusura"] ,"",-3);
                    }
                    ?>
                    </div>
                    <div class="col-4 centered nopadding"><?php
                    if (isset($orari["inizio_pausa"])) {
                      echo substr_replace($orari["fine_pausa"] ,"",-3).' - '.substr_replace($orari["chiusura"] ,"",-3);
                    }
                    ?>
                    </div>
                </div>
                <?php
                }
                ?>
                <div class="row field">
                  <div class="col">
                    <a class="btn orange centered fullwidth noVisitedLink" href="./Search.php?fid=<?php echo $id; ?>">Guarda Tutti i Prodotti</a>
                  </div>
                </div>
            </div>
            <div class="col-md-3"></div>
          </div>
        </div>
      </div>
    <!-- Optional JavaScript -->
    </body>
  </html>
