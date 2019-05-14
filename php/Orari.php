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
            <div class="form-row center" id="lunedi">
              <div class="col-md-2 center">
                <h5>Lunedì</h5>
              </div>
              <div class="col-2 larger">
                <input type="text" id="orarioInizio" value="<?php echo ((isset($orarioInizio['lunedi']['apertura'])) ? $orarioInizio['lunedi']['apertura'] : '');?>" class="timepicker vertical" name="start"/>
              </div>
              <div class="col-2 larger">
                <input type="text" id="orarioFine" value="<?php echo ((isset($orarioFine['lunedi']['chiusura'])) ? $orarioFine['lunedi']['chiusura'] : '');?>" class="timepicker vertical" name="end"/>
              </div>
              <div class="col-md-2 center">
                <input type="checkbox" onclick="checkChange(this, 'lunedi');" class="form-check-input" <?php echo ((isset($orarioInizioPausa['lunedi']['inizio_pausa'])) ? '' : 'checked');?>>
                <label class="form-check-label" for="exampleCheck1">Orario Continuato</label>
              </div>
              <div class="col-2 larger newline">
                <input type="text" id="orarioInizio" value="<?php echo ((isset($orarioInizioPausa['lunedi']['inizio_pausa'])) ? $orarioInizioPausa['lunedi']['inizio_pausa'] : '');?>" class="timepicker vertical optional" name="start"/>
              </div>
              <div class="col-2 larger newline">
                <input type="text" id="orarioFine" value="<?php echo ((isset($orarioFinePausa['lunedi']['fine_pausa'])) ? $orarioFinePausa['lunedi']['fine_pausa'] : '');?>" class="timepicker vertical optional" name="end"/>
              </div>
            </div>
            <div class="form-row center" id="martedi">
              <div class="col-md-2 center">
                <h5>Martedì</h5>
              </div>
              <div class="col-2 larger">
                <input type="text" id="orarioInizio" value="<?php echo ((isset($orarioInizio['martedi']['apertura'])) ? $orarioInizio['martedi']['apertura'] : '');?>" class="timepicker vertical" name="start"/>
              </div>
              <div class="col-2 larger">
                <input type="text" id="orarioFine" value="<?php echo ((isset($orarioFine['martedi']['chiusura'])) ? $orarioFine['martedi']['chiusura'] : '');?>" class="timepicker vertical" name="end"/>
              </div>
              <div class="col-md-2 center">
                <input type="checkbox" onchange="checkChange(this, 'martedi');" class="form-check-input" <?php echo ((isset($orarioInizioPausa['martedi']['inizio_pausa'])) ? '' : 'checked');?>>
                <label class="form-check-label" for="exampleCheck1">Orario Continuato</label>
              </div>
              <div class="col-2 larger newline">
                <input type="text" id="orarioInizio" value="<?php echo ((isset($orarioInizioPausa['martedi']['inizio_pausa'])) ? $orarioInizioPausa['martedi']['inizio_pausa'] : '');?>" class="timepicker vertical optional" name="start"/>
              </div>
              <div class="col-2 larger newline">
                <input type="text" id="orarioFine" value="<?php echo ((isset($orarioFinePausa['martedi']['fine_pausa'])) ? $orarioFinePausa['martedi']['fine_pausa'] : '');?>" class="timepicker vertical optional" name="end"/>
              </div>
            </div>
            <div class="form-row center" id="mercoledi">
              <div class="col-md-2 center">
                <h5>Mercoledì</h5>
              </div>
              <div class="col-2 larger">
                <input type="text" id="orarioInizio" value="<?php echo ((isset($orarioInizio['mercoledi']['apertura'])) ? $orarioInizio['mercoledi']['apertura'] : '');?>" class="timepicker vertical" name="start"/>
              </div>
              <div class="col-2 larger">
                <input type="text" id="orarioFine" value="<?php echo ((isset($orarioFine['mercoledi']['chiusura'])) ? $orarioFine['mercoledi']['chiusura'] : '');?>" class="timepicker vertical" name="end"/>
              </div>
              <div class="col-md-2 center">
                <input type="checkbox" onchange="checkChange(this, 'mercoledi');" class="form-check-input" <?php echo ((isset($orarioInizioPausa['mercoledi']['inizio_pausa'])) ? '' : 'checked');?>>
                <label class="form-check-label" for="exampleCheck1">Orario Continuato</label>
              </div>
              <div class="col-2 larger newline">
                <input type="text" id="orarioInizio" value="<?php echo ((isset($orarioInizioPausa['mercoledi']['inizio_pausa'])) ? $orarioInizioPausa['mercoledi']['inizio_pausa'] : '');?>" class="timepicker vertical optional" name="start"/>
              </div>
              <div class="col-2 larger newline">
                <input type="text" id="orarioFine" value="<?php echo ((isset($orarioFinePausa['mercoledi']['fine_pausa'])) ? $orarioFinePausa['mercoledi']['fine_pausa'] : '');?>" class="timepicker vertical optional" name="end"/>
              </div>
            </div>
            <div class="form-row center" id="giovedi">
              <div class="col-md-2 center">
                <h5>Giovedì</h5>
              </div>
              <div class="col-2 larger">
                <input type="text" id="orarioInizio" value="<?php echo ((isset($orarioInizio['giovedi']['apertura'])) ? $orarioInizio['giovedi']['apertura'] : '');?>" class="timepicker vertical" name="start"/>
              </div>
              <div class="col-2 larger">
                <input type="text" id="orarioFine" value="<?php echo ((isset($orarioFine['giovedi']['chiusura'])) ? $orarioFine['giovedi']['chiusura'] : '');?>" class="timepicker vertical" name="end"/>
              </div>
              <div class="col-md-2 center">
                <input type="checkbox" onchange="checkChange(this, 'giovedi');" class="form-check-input" <?php echo ((isset($orarioInizioPausa['giovedi']['inizio_pausa'])) ? '' : 'checked');?>>
                <label class="form-check-label" for="exampleCheck1">Orario Continuato</label>
              </div>
              <div class="col-2 larger newline">
                <input type="text" id="orarioInizio" value="<?php echo ((isset($orarioInizioPausa['giovedi']['inizio_pausa'])) ? $orarioInizioPausa['giovedi']['inizio_pausa'] : '');?>" class="timepicker vertical optional" name="start"/>
              </div>
              <div class="col-2 larger newline">
                <input type="text" id="orarioFine" value="<?php echo ((isset($orarioFinePausa['giovedi']['fine_pausa'])) ? $orarioFinePausa['giovedi']['fine_pausa'] : '');?>" class="timepicker vertical optional" name="end"/>
              </div>
            </div>
            <div class="form-row center" id="venerdi">
              <div class="col-md-2 center">
                <h5>Venerdi</h5>
              </div>
              <div class="col-2 larger">
                <input type="text" id="orarioInizio" value="<?php echo ((isset($orarioInizio['venerdi']['apertura'])) ? $orarioInizio['venerdi']['apertura'] : '');?>" class="timepicker vertical" name="start"/>
              </div>
              <div class="col-2 larger">
                <input type="text" id="orarioFine" value="<?php echo ((isset($orarioFine['venerdi']['chiusura'])) ? $orarioFine['venerdi']['chiusura'] : '');?>" class="timepicker vertical" name="end"/>
              </div>
              <div class="col-md-2 center">
                <input type="checkbox" onclick="checkChange(this, 'venerdi');" class="form-check-input" <?php echo ((isset($orarioInizioPausa['venerdi']['inizio_pausa'])) ? '' : 'checked');?>>
                <label class="form-check-label" for="exampleCheck1">Orario Continuato</label>
              </div>
              <div class="col-2 larger newline">
                <input type="text" id="orarioInizio" value="<?php echo ((isset($orarioInizioPausa['venerdi']['inizio_pausa'])) ? $orarioInizioPausa['venerdi']['inizio_pausa'] : '');?>" class="timepicker vertical optional" name="start"/>
              </div>
              <div class="col-2 larger newline">
                <input type="text" id="orarioFine" value="<?php echo ((isset($orarioFinePausa['venerdi']['fine_pausa'])) ? $orarioFinePausa['venerdi']['fine_pausa'] : '');?>" class="timepicker vertical optional" name="end"/>
              </div>
            </div>
            <div class="form-row center" id="sabato">
              <div class="col-md-2 center">
                <h5>Sabato</h5>
              </div>
              <div class="col-2 larger">
                <input type="text" id="orarioInizio" value="<?php echo ((isset($orarioInizio['sabato']['apertura'])) ? $orarioInizio['sabato']['apertura'] : '');?>" class="timepicker vertical" name="start"/>
              </div>
              <div class="col-2 larger">
                <input type="text" id="orarioFine" value="<?php echo ((isset($orarioFine['sabato']['chiusura'])) ? $orarioFine['sabato']['chiusura'] : '');?>" class="timepicker vertical" name="end"/>
              </div>
              <div class="col-md-2 center">
                <input type="checkbox" onclick="checkChange(this, 'sabato');" class="form-check-input" <?php echo ((isset($orarioInizioPausa['sabato']['inizio_pausa'])) ? '' : 'checked');?>>
                <label class="form-check-label" for="exampleCheck1">Orario Continuato</label>
              </div>
              <div class="col-2 larger newline">
                <input type="text" id="orarioInizio" value="<?php echo ((isset($orarioInizioPausa['sabato']['inizio_pausa'])) ? $orarioInizioPausa['sabato']['inizio_pausa'] : '');?>" class="timepicker vertical optional" name="start"/>
              </div>
              <div class="col-2 larger newline">
                <input type="text" id="orarioFine" value="<?php echo ((isset($orarioFinePausa['sabato']['fine_pausa'])) ? $orarioFinePausa['sabato']['fine_pausa'] : '');?>" class="timepicker vertical optional" name="end"/>
              </div>
            </div>
            <div class="form-row center" id="domenica">
              <div class="col-md-2 center">
                <h5>Domenica</h5>
              </div>
              <div class="col-2 larger">
                <input type="text" id="orarioInizio" value="<?php echo ((isset($orarioInizio['domenica']['apertura'])) ? $orarioInizio['domenica']['apertura'] : '');?>" class="timepicker vertical" name="start"/>
              </div>
              <div class="col-2 larger">
                <input type="text" id="orarioFine" value="<?php echo ((isset($orarioFine['domenica']['chiusura'])) ? $orarioFine['domenica']['chiusura'] : '');?>" class="timepicker vertical" name="end"/>
              </div>
              <div class="col-md-2 center">
                <input type="checkbox" onclick="checkChange(this, 'domenica');" class="form-check-input" <?php echo ((isset($orarioInizioPausa['domenica']['inizio_pausa'])) ? '' : 'checked');?>>
                <label class="form-check-label" for="exampleCheck1">Orario Continuato</label>
              </div>
              <div class="col-2 larger newline">
                <input type="text" id="orarioInizio" value="<?php echo ((isset($orarioInizioPausa['domenica']['inizio_pausa'])) ? $orarioInizioPausa['domenica']['inizio_pausa'] : '');?>" class="timepicker vertical optional" name="start"/>
              </div>
              <div class="col-2 larger newline">
                <input type="text" id="orarioFine" value="<?php echo ((isset($orarioFinePausa['domenica']['fine_pausa'])) ? $orarioFinePausa['domenica']['fine_pausa'] : '');?>" class="timepicker vertical optional" name="end"/>
              </div>
            </div>
            <div class="form-row topdistance">
              <div class="col">
                <button type="submit" class="btn green centered">Modifica</button>
              </div>
            </div>
          </form>
      </div>
  </body>
</html>
