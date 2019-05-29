<!DOCTYPE html>
<html lang="it">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/theme.css">
    <link rel="stylesheet" href="../css/modificaProdotto.css">
    <!--FontAwsome-->
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script
			  src="https://code.jquery.com/jquery-3.3.1.min.js"
			  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
			  crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../js/modificaProdotto.js"></script>

    <!-- Page informations and icon -->
    <title>UniHungry - Modifica Prodotto</title>
    <link rel="shortcut icon" href="../res/icon.ico" />
  </head>
  <body>
    <?php include 'navbar.php';
    if(!is_logged()){
        header('Location: ./ERROR');
    } else {
      $categorie = $mysqli->query("SELECT * FROM categorie ORDER BY nome");
    }
    if(isset($_GET['id'])){
      $result = $mysqli->query("SELECT * FROM prodotti WHERE id_prodotto = ".$_GET['id']." AND id_fornitore = ".$_SESSION['user_id']."");
      if($result->num_rows == 0){
        header('Location: ./ERROR');
      } else {
        $row = $result->fetch_assoc();
      }
    }
    ?>
        <div id="pageBody" class="container fullScreen ">
                    <form id="modificaform" class="col needs-validation" action="action_product_update.php" method="post" enctype="multipart/form-data" novalidate>
                        <div class="form-row">
                            <div id="selectImg" class="form-group col-md-6">
                                <label for="imgupload">
                                  <?php
                                  if(isset($row['immagine'])){
                                    echo "<img class='btn nopadding img-thumbnail' id='foodImg' src='data:image/jpeg;base64,".base64_encode( $row['immagine'])."' alt='immagine cibo default'>";
                                  } else {
                                    echo "<img class='btn nopadding img-thumbnail' id='foodImg' src='../res/default_food.png' alt='immagine cibo default'>";
                                  }
                                   ?>
                                <input type="file" onchange="readURL(this);" class="form-control-file" id="imgupload" name="image" hidden>
                                <p>clicca per caricare un'immagine</p>
                                <a href="" class="noVisitedLink" id="reset">resetta immagine</a>
                                </label>
                            </div>
                            <div class="form-group col-md-6">
                                  <label for="idprodotto">ID prodotto</label>
                                  <?php
                                  if(!isset($_GET['id'])) {
                                    echo "<input type='text' name='idprodotto' class='form-control' id='idprodotto' readonly>";
                                  } else {
                                    echo "<input type='text' name='idprodotto' class='form-control' id='idprodotto' value='".$row['id_prodotto']."' readonly>";
                                  }
                                  ?>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                              <label for="nome">Nome Prodotto</label>
                              <?php
                              if(isset($_GET['id'])){
                                echo "<input type='text' name='nome' class='form-control' id='nome' value='".$row['nome']."' required>";
                              } else {
                                echo "<input type='text' name='nome' class='form-control' id='nome' placeholder='Hamburger' required>";
                              }
                               ?>
                            </div>
                            <div class="form-group col-md-6">
                              <label for="categoria">Categoria</label>
                              <select class="form-control" name='categoria' id="categoria" required>
                                <?php
                                while ($cat = $categorie->fetch_assoc()) {
                                  echo "<option>".$cat['nome']."</option>";
                                }
                                 ?>
                               </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-8">
                              <label for="descrizione">Descrizione Prodotto</label>
                              <?php
                              if(isset($_GET['id'])){
                                echo "<input type='text' name='descrizione' class='form-control' id='descrizione' value='".$row['descrizione']."' maxlength='100' required>";
                              } else {
                                echo "<input type='text' name='descrizione' class='form-control' id='descrizione' placeholder='Hamburger con bacon croccante, insalata e pomodoro' maxlength='100' required>";
                              }
                               ?>
                            </div>
                            <div class="form-group col">
                                <label for="prezzo">Prezzo unitario</label>
                                <?php
                                if(isset($_GET['id'])){
                                  echo "<input type='text' name='prezzo' class='form-control' id='prezzo' value='".$row['prezzo_unitario']."'required>";
                                } else {
                                  echo "<input type='text' name='prezzo' class='form-control' id='prezzo' placeholder='10€' required>";
                                }
                                 ?>
                            </div>
                        </div>
                        <div class ="form-group">
                            <label for="ingredienti">Ingredienti</label>
                            <?php
                            if(isset($_GET['id'])){
                              echo "<textarea class='form-control' name='ingredienti' id='ingredienti' aria-describedby='ingredientiHelp' rows='2' required>".$row['ingredienti']."</textarea>";
                            } else {
                              echo "<textarea class='form-control' name='ingredienti' id='ingredienti' aria-describedby='ingredientiHelp' rows='2' required></textarea>";
                            }
                             ?>
                            <small id="ingredientiHelp" class="form-text">Per favore elenca tutti gli ingredienti e le possibili contaminazioni</small>
                        </div>
                        <div class="form-row">
                          <div class="col">
                            <button type="submit" class="btn green centered">Invia</button>
                          </div>
                        </div>
                    </form>
            </div>



  <!-- Optional JavaScript -->
  </body>
</html>
