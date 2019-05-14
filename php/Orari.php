<html lang="it">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/theme.css">
    <link rel="stylesheet" href="../css/orari.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script
			  src="https://code.jquery.com/jquery-3.3.1.min.js"
			  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
			  crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
    <script type="text/javascript" src="../js/orario.js"></script>


    <!-- Page informations and icon -->
    <title>UniHungry - Orari</title>
    <link rel="shortcut icon" href="../res/icon.ico" />
  </head>
  <body>
      <?php
      include 'navbar.php';
      include 'hour_manager.php';
      ?>
      <div class="container" id="form">
          <form id="modificaform" class="col" action="action_orari_update.php" method="post">
            <div class="center">
              <h2>MODIFICA ORARI</h2>
            </div>
            <div class="row center hide">
              <div class="col-md-2 center">
                <h4>Giorno</h4>
              </div>
              <div class="col-2 larger">
                <h4>Inizio Orario</h4>
              </div>
              <div class="col-2 larger">
                <h4>Fine Orario</h4>
              </div>
              <div class="col-md-2 center">

              </div>
              <div class="col-2 larger newline">
                <h4>Inizio Pausa</h4>
              </div>
              <div class="col-2 larger newline">
                <h4>Fine Pausa</h4>
              </div>
            </div>
            <hr/>
            <div class="form-row center" id="Lunedi">
              <div class="col-md-2 center">
                <h5>Lunedì</h5>
              </div>
              <div class="col-2 larger">
                <input type="text" id="orarioInizio" value="<?php echo ((isset($orarioInizio['Lunedi']['apertura'])) ? $orarioInizio['Lunedi']['apertura'] : '');?>" class="timepicker vertical" name="startLunedi"/>
              </div>
              <div class="col-2 larger">
                <input type="text" id="orarioFine" value="<?php echo ((isset($orarioFine['Lunedi']['chiusura'])) ? $orarioFine['Lunedi']['chiusura'] : '');?>" class="timepicker vertical" name="endLunedi"/>
              </div>
              <div class="col-md-2 center">
                <input type="checkbox" onclick="showOptional(this, 'Lunedi');" class="form-check-input" <?php echo ((isset($orarioInizioPausa['Lunedi']['inizio_pausa'])) ? '' : 'checked');?>>
                <label class="form-check-label" for="exampleCheck1">Orario Continuato</label>
              </div>
              <div class="col-2 larger newline">
                <input type="text" id="orarioInizio" value="<?php echo ((isset($orarioInizioPausa['Lunedi']['inizio_pausa'])) ? $orarioInizioPausa['Lunedi']['inizio_pausa'] : '');?>" class="timepicker vertical optional" name="startPausaLunedi"/>
              </div>
              <div class="col-2 larger newline">
                <input type="text" id="orarioFine" value="<?php echo ((isset($orarioFinePausa['Lunedi']['fine_pausa'])) ? $orarioFinePausa['Lunedi']['fine_pausa'] : '');?>" class="timepicker vertical optional" name="endPausaLunedi"/>
              </div>
            </div>
            <div class="form-row center" id="Martedi">
              <div class="col-md-2 center">
                <h5>Martedì</h5>
              </div>
              <div class="col-2 larger">
                <input type="text" id="orarioInizio" value="<?php echo ((isset($orarioInizio['Martedi']['apertura'])) ? $orarioInizio['Martedi']['apertura'] : '');?>" class="timepicker vertical" name="startMartedi"/>
              </div>
              <div class="col-2 larger">
                <input type="text" id="orarioFine" value="<?php echo ((isset($orarioFine['Martedi']['chiusura'])) ? $orarioFine['Martedi']['chiusura'] : '');?>" class="timepicker vertical" name="endMartedi"/>
              </div>
              <div class="col-md-2 center">
                <input type="checkbox" onchange="showOptional(this, 'Martedi');" class="form-check-input" <?php echo ((isset($orarioInizioPausa['Martedi']['inizio_pausa'])) ? '' : 'checked');?>>
                <label class="form-check-label" for="exampleCheck1">Orario Continuato</label>
              </div>
              <div class="col-2 larger newline">
                <input type="text" id="orarioInizio" value="<?php echo ((isset($orarioInizioPausa['Martedi']['inizio_pausa'])) ? $orarioInizioPausa['Martedi']['inizio_pausa'] : '');?>" class="timepicker vertical optional" name="startPausaMartedi"/>
              </div>
              <div class="col-2 larger newline">
                <input type="text" id="orarioFine" value="<?php echo ((isset($orarioFinePausa['Martedi']['fine_pausa'])) ? $orarioFinePausa['Martedi']['fine_pausa'] : '');?>" class="timepicker vertical optional" name="endPausaMartedi"/>
              </div>
            </div>
            <div class="form-row center" id="Mercoledi">
              <div class="col-md-2 center">
                <h5>Mercoledì</h5>
              </div>
              <div class="col-2 larger">
                <input type="text" id="orarioInizio" value="<?php echo ((isset($orarioInizio['Mercoledi']['apertura'])) ? $orarioInizio['Mercoledi']['apertura'] : '');?>" class="timepicker vertical" name="startMercoledi"/>
              </div>
              <div class="col-2 larger">
                <input type="text" id="orarioFine" value="<?php echo ((isset($orarioFine['Mercoledi']['chiusura'])) ? $orarioFine['Mercoledi']['chiusura'] : '');?>" class="timepicker vertical" name="endMercoledi"/>
              </div>
              <div class="col-md-2 center">
                <input type="checkbox" onchange="showOptional(this, 'Mercoledi');" class="form-check-input" <?php echo ((isset($orarioInizioPausa['Mercoledi']['inizio_pausa'])) ? '' : 'checked');?>>
                <label class="form-check-label" for="exampleCheck1">Orario Continuato</label>
              </div>
              <div class="col-2 larger newline">
                <input type="text" id="orarioInizio" value="<?php echo ((isset($orarioInizioPausa['Mercoledi']['inizio_pausa'])) ? $orarioInizioPausa['Mercoledi']['inizio_pausa'] : '');?>" class="timepicker vertical optional" name="startPausaMercoledi"/>
              </div>
              <div class="col-2 larger newline">
                <input type="text" id="orarioFine" value="<?php echo ((isset($orarioFinePausa['Mercoledi']['fine_pausa'])) ? $orarioFinePausa['Mercoledi']['fine_pausa'] : '');?>" class="timepicker vertical optional" name="endPausaMercoledi"/>
              </div>
            </div>
            <div class="form-row center" id="Giovedi">
              <div class="col-md-2 center">
                <h5>Giovedì</h5>
              </div>
              <div class="col-2 larger">
                <input type="text" id="orarioInizio" value="<?php echo ((isset($orarioInizio['Giovedi']['apertura'])) ? $orarioInizio['Giovedi']['apertura'] : '');?>" class="timepicker vertical" name="startGiovedi"/>
              </div>
              <div class="col-2 larger">
                <input type="text" id="orarioFine" value="<?php echo ((isset($orarioFine['Giovedi']['chiusura'])) ? $orarioFine['Giovedi']['chiusura'] : '');?>" class="timepicker vertical" name="endGiovedi"/>
              </div>
              <div class="col-md-2 center">
                <input type="checkbox" onchange="showOptional(this, 'Giovedi');" class="form-check-input" <?php echo ((isset($orarioInizioPausa['Giovedi']['inizio_pausa'])) ? '' : 'checked');?>>
                <label class="form-check-label" for="exampleCheck1">Orario Continuato</label>
              </div>
              <div class="col-2 larger newline">
                <input type="text" id="orarioInizio" value="<?php echo ((isset($orarioInizioPausa['Giovedi']['inizio_pausa'])) ? $orarioInizioPausa['Giovedi']['inizio_pausa'] : '');?>" class="timepicker vertical optional" name="startPausaGiovedi"/>
              </div>
              <div class="col-2 larger newline">
                <input type="text" id="orarioFine" value="<?php echo ((isset($orarioFinePausa['Giovedi']['fine_pausa'])) ? $orarioFinePausa['Giovedi']['fine_pausa'] : '');?>" class="timepicker vertical optional" name="endPausaGiovedi"/>
              </div>
            </div>
            <div class="form-row center" id="Venerdi">
              <div class="col-md-2 center">
                <h5>Venerdi</h5>
              </div>
              <div class="col-2 larger">
                <input type="text" id="orarioInizio" value="<?php echo ((isset($orarioInizio['Venerdi']['apertura'])) ? $orarioInizio['Venerdi']['apertura'] : '');?>" class="timepicker vertical" name="startVenerdi"/>
              </div>
              <div class="col-2 larger">
                <input type="text" id="orarioFine" value="<?php echo ((isset($orarioFine['Venerdi']['chiusura'])) ? $orarioFine['Venerdi']['chiusura'] : '');?>" class="timepicker vertical" name="endVenerdi"/>
              </div>
              <div class="col-md-2 center">
                <input type="checkbox" onclick="showOptional(this, 'Venerdi');" class="form-check-input" <?php echo ((isset($orarioInizioPausa['Venerdi']['inizio_pausa'])) ? '' : 'checked');?>>
                <label class="form-check-label" for="exampleCheck1">Orario Continuato</label>
              </div>
              <div class="col-2 larger newline">
                <input type="text" id="orarioInizio" value="<?php echo ((isset($orarioInizioPausa['Venerdi']['inizio_pausa'])) ? $orarioInizioPausa['Venerdi']['inizio_pausa'] : '');?>" class="timepicker vertical optional" name="startPausaVenerdi"/>
              </div>
              <div class="col-2 larger newline">
                <input type="text" id="orarioFine" value="<?php echo ((isset($orarioFinePausa['Venerdi']['fine_pausa'])) ? $orarioFinePausa['Venerdi']['fine_pausa'] : '');?>" class="timepicker vertical optional" name="endPausaVenerdi"/>
              </div>
            </div>
            <div class="form-row center" id="Sabato">
              <div class="col-md-2 center">
                <h5>Sabato</h5>
              </div>
              <div class="col-2 larger">
                <input type="text" id="orarioInizio" value="<?php echo ((isset($orarioInizio['Sabato']['apertura'])) ? $orarioInizio['Sabato']['apertura'] : '');?>" class="timepicker vertical" name="startSabato"/>
              </div>
              <div class="col-2 larger">
                <input type="text" id="orarioFine" value="<?php echo ((isset($orarioFine['Sabato']['chiusura'])) ? $orarioFine['Sabato']['chiusura'] : '');?>" class="timepicker vertical" name="endSabato"/>
              </div>
              <div class="col-md-2 center">
                <input type="checkbox" onclick="showOptional(this, 'Sabato');" class="form-check-input" <?php echo ((isset($orarioInizioPausa['Sabato']['inizio_pausa'])) ? '' : 'checked');?>>
                <label class="form-check-label" for="exampleCheck1">Orario Continuato</label>
              </div>
              <div class="col-2 larger newline">
                <input type="text" id="orarioInizio" value="<?php echo ((isset($orarioInizioPausa['Sabato']['inizio_pausa'])) ? $orarioInizioPausa['Sabato']['inizio_pausa'] : '');?>" class="timepicker vertical optional" name="startPausaSabato"/>
              </div>
              <div class="col-2 larger newline">
                <input type="text" id="orarioFine" value="<?php echo ((isset($orarioFinePausa['Sabato']['fine_pausa'])) ? $orarioFinePausa['Sabato']['fine_pausa'] : '');?>" class="timepicker vertical optional" name="endPausaSabato"/>
              </div>
            </div>
            <div class="form-row center" id="Domenica">
              <div class="col-md-2 center">
                <h5>Domenica</h5>
              </div>
              <div class="col-2 larger">
                <input type="text" id="orarioInizio" value="<?php echo ((isset($orarioInizio['Domenica']['apertura'])) ? $orarioInizio['Domenica']['apertura'] : '');?>" class="timepicker vertical" name="startDomenica"/>
              </div>
              <div class="col-2 larger">
                <input type="text" id="orarioFine" value="<?php echo ((isset($orarioFine['Domenica']['chiusura'])) ? $orarioFine['Domenica']['chiusura'] : '');?>" class="timepicker vertical" name="endDomenica"/>
              </div>
              <div class="col-md-2 center">
                <input type="checkbox" onclick="showOptional(this, 'Domenica');" class="form-check-input" <?php echo ((isset($orarioInizioPausa['Domenica']['inizio_pausa'])) ? '' : 'checked');?>>
                <label class="form-check-label" for="exampleCheck1">Orario Continuato</label>
              </div>
              <div class="col-2 larger newline">
                <input type="text" id="orarioInizio" value="<?php echo ((isset($orarioInizioPausa['Domenica']['inizio_pausa'])) ? $orarioInizioPausa['Domenica']['inizio_pausa'] : '');?>" class="timepicker vertical optional" name="startPausaDomenica"/>
              </div>
              <div class="col-2 larger newline">
                <input type="text" id="orarioFine" value="<?php echo ((isset($orarioFinePausa['Domenica']['fine_pausa'])) ? $orarioFinePausa['Domenica']['fine_pausa'] : '');?>" class="timepicker vertical optional" name="endPausaDomenica"/>
              </div>
            </div>
            <div class="alert alert-warning alert-dismissible fade show alertLayout topdistance" role="alert" id="error">
              <strong>Attenzione:</strong> Uno o più orari inseriti non sono validi!
              <button type="button" class="close" onclick="dismissAlert()" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="form-row topdistance">
              <div class="col">
                <button type="submit" onsubmit="" class="btn green centered">Modifica</button>
              </div>
            </div>
          </form>
      </div>
  </body>
</html>
