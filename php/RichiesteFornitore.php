<!DOCTYPE html>
<html lang="it" dir="ltr">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/theme.css">
  <link rel="stylesheet" href="../css/sheet.css">
  <link rel="stylesheet" href="../css/tab.css">
  <link rel="stylesheet" href="../css/modifiche.css">
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script
      src="https://code.jquery.com/jquery-3.3.1.min.js"
      integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
      crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  <script type="text/javascript" src="../js/modifiche.js"></script>
  <!-- Page informations and icon -->
  <title>UniHungry - Modifiche</title>
  <link rel="shortcut icon" href="../res/icon.ico" />
</head>
  <body>
    <?php
    include 'navbar.php';
    if(!is_logged()){
      header('Location: ./Login.php');
  } else if($_SESSION['user_type'] != 'Fornitore'){
          include 'error.php';
      } else {
      $id = $_SESSION['user_id'];
      $modificheInCorso = $mysqli->query("SELECT * FROM modifiche WHERE id_fornitore = $id AND approvata IS NULL");
      $modificheRifiutate = $mysqli->query("SELECT * FROM modifiche WHERE id_fornitore = $id AND approvata = 0");
      $modificheAccettate = $mysqli->query("SELECT * FROM modifiche WHERE id_fornitore = $id AND approvata = 1");
    ?>
      <div class="modifyBox">
        <form class="needs-validation" action="action_new_request.php" method="post" novalidate>
          <h2>Nuova Modifica</h2>
            <div class="form-row">
              <div class="form-group col-md">
                <div class="row">
                  <div class="col">
                    <label for="tipoModifica">Tipologia modifica</label>
                    <select name="tipoModifica" class="form-control">
                      <option>AGGIUNGI CATEGORIA</option>
                    </select>
                  </div>
                </div>
                <div class="row">
                  <div class="col">
                    <label for="categoria">Categoria: </label>
                    <input name="categoria" class="form-control" placeholder="Inserisci la categoria" required>
                  </div>
                </div>
              </div>
              <div class="form-group col">
                <label for="textArea">Descrizione</label>
                <textarea class="form-control" name="descrizione" rows="6" required></textarea>
              </div>
            </div>
            <div class="form-row">
              <div class="col">
                <button type="submit" class="centered btn green">Invia</button>
              </div>
            </div>
        </form>
      </div>
      <div class="modifyBox">
        <nav>
          <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active tabLink" id="inProgress-tab" data-toggle="tab" href="#inProgress" role="tab" aria-controls="inProgress" aria-selected="true">Modifiche in corso</a>
            <a class="nav-item nav-link tabLink" id="approved-tab" data-toggle="tab" href="#approved" role="tab" aria-controls="approved" aria-selected="false">Modifiche approvate</a>
            <a class="nav-item nav-link tabLink" id="denied-tab" data-toggle="tab" href="#denied" role="tab" aria-controls="denied" aria-selected="false">Modifiche rifiutate</a>
          </div>
        </nav>
        <div class="tab-content">
          <div class="tab-pane active blackCol" id="inProgress">
            <div class="container fullScreen">
              <div class="row title">
                <div class="col-6">
                  OGGETTO
                </div>
                <div class="col-6">
                  DESCRIZIONE
                </div>
              </div>
              <hr/>
              <?php
              if($modificheInCorso->num_rows == 0) {
                echo 'No Results';
              } else {
                while ($modifica = $modificheInCorso->fetch_assoc()) {
                  echo '<div class="row">
                    <div class="col-6">
                      '.$modifica['oggetto'].'
                    </div>
                    <div class="col-6">
                      '.$modifica['descrizione'].'
                    </div>
                  </div>';
                }
              }
              ?>
            </div>
          </div>
          <div class="tab-pane fade in blackCol" id="approved">
            <div class="container fullScreen">
              <div class="row title">
                <div class="col-6">
                  OGGETTO
                </div>
                <div class="col-6">
                  DESCRIZIONE
                </div>
              </div>
              <hr/>
              <?php
              if($modificheAccettate->num_rows == 0) {
                echo 'No Results';
              } else {
                while ($approvata = $modificheAccettate->fetch_assoc()) {
                  echo '<div class="row">
                          <div class="col-6">
                            '.$approvata['oggetto'].'
                          </div>
                          <div class="col-6">
                            '.$approvata['descrizione'].'
                          </div>
                        </div>
                        <hr/>';
                }
              }
              ?>
            </div>
          </div>
          <div class="tab-pane fade in blackCol" id="denied">
            <div class="container fullScreen">
              <div class="row title">
                <div class="col-6">
                  OGGETTO
                </div>
                <div class="col-6">
                  DESCRIZIONE
                </div>
              </div>
              <hr/>
              <?php
              if($modificheRifiutate->num_rows == 0) {
                echo 'No Results';
              } else {
                while ($rifiutate = $modificheRifiutate->fetch_assoc()) {
                  echo '<div class="row content">
                          <div class="col-6">
                            '.$rifiutate['oggetto'].'
                          </div>
                          <div class="col-6">
                            '.$rifiutate['descrizione'].'
                          </div>
                        </div>
                        <hr/>';
                }
              }
              ?>
            </div>
          </div>
        </div>
      </div>
  <?php } ?>
  </body>
</html>
