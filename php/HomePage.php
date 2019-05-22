<!DOCTYPE html>
<html lang="it">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/theme.css">
    <link rel="stylesheet" href="../css/home.css">
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script
			  src="https://code.jquery.com/jquery-3.3.1.min.js"
			  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
			  crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <!-- Optional JavaScript -->
    <script src="../js/home.js" charset="utf-8"></script>
    <!-- Page informations and icon -->
    <title>UniHungry - HomePage</title>
    <link rel="shortcut icon" href="../res/icon.ico" />
  </head>
  <body>
      <?php include 'navbar.php';?>
      <div id="slideshow" class="carousel slide" data-ride="carousel"  data-interval="7000">
        <div class="carousel-inner">
            <div class="row" id="searchBox">
            <div class="col-2"></div>
            <div class="col-8 container">
                <div class="row">
                    <div class="col">
                        <h1 id="caption">Attacco di fame in università?</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <form  id="searchForm" class="input-group mb-3" action="./Search.php" method="get">
                            <input type="text" class="form-control" name="s" placeholder="Cerca...">
                            <input type="hidden" name="cat" value="">
                            <input type="hidden" name="price" value="Indifferente">
                            <div class="input-group-append">
                              <button type="submit" class="btn green">Vai</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <a href="./Search.php?s=&cat=&price=Indifferente">o visualizza i nostri prodotti</a>
                    </div>
                </div>
            </div>
            <div class="col-2"></div>
          </div>
          <div class="carousel-item active">
            <img class="d-block w-100 background img-fluid selectDisable" src="../res/slideshow1.jpg" alt="First slide" >
          </div>
          <div class="carousel-item">
            <img class="d-block w-100 background img-fluid selectDisable" src="../res/slideshow2.jpg" alt="Second slide" >
          </div>
          <div class="carousel-item">
            <img class="d-block w-100 background img-fluid selectDisable" src="../res/slideshow3.jpg" alt="Third slide" >
          </div>
        </div>
        <a class="carousel-control-prev" href="#slideshow" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#slideshow" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
      <div id="pageFlow">

          <div id="partners" class="container fullScreen">
              <div class ="row">
                  <div class="col-4 nopadding resBlock">
                      <div class="resback">
                          <div class="rescaption">
                              <h5>Melting Pot</h5>
                              <p>Cucina contaminata per un incontro tra culture differenti</p>
                              <a href="#">scopri di più</a>
                          </div>
                      </div>

                      <img class="reslogo nopadding img-fluid" src="../res/res1.jpg" alt="logo">

                  </div>
                  <div class="col-4 nopadding resBlock">
                      <div class="resback">
                          <div class="rescaption">
                              <h5>Melting Pot</h5>
                              <p>Cucina contaminata per un incontro tra culture differenti</p>
                              <a href="#">scopri di più</a>
                          </div>
                      </div>

                      <img class="reslogo nopadding img-fluid" src="../res/res2.jpg" alt="logo">
                  </div>
                  <div class="col-4 nopadding resBlock">
                      <div class="resback">
                          <div class="rescaption">
                              <h5>Melting Pot</h5>
                              <p>Cucina contaminata per un incontro tra culture differenti</p>
                              <a href="#">scopri di più</a>
                          </div>
                      </div>

                      <img class="reslogo nopadding img-fluid" src="../res/res3.jpg" alt="logo">
                  </div>
              </div>

          </div>
          <div id="chisiamo" class="container fullScreen">
              <div class="title">
                  <h1>Chi siamo</h1>
                  <hr/>
                  <p>
                  <em>
                      La famiglia di UniHungry nasce nel 2019 per essere vicina agli studenti universitari
                      di Cesena.
                      Un servizio pensato appositamente per soddisfare i bisogni dei ragazzi sempre presi dallo studio.<br/>
                      Per noi la "pausa-pranzo" è un momento per ricaricarsi e affrontare al meglio il resto della giornata, quindi offriamo una scelta
                      sempre varia e piena di soluzioni, dalle più healty alle più strong, tutte selezionate per dare il meglio delle materie prime
                      ed una qualità da ristorante.<br/>
                      Combattiamo insieme gli attacchi di fame!
                  </em>
                  </p>
                  <hr/>
              </div>
              <div class="row">
                  <div class="col-sm chisiamoBoxorange">
                    <h2>Professionalità</h2>
                    <p>
                        Prendiamo il nostro lavoro con massima serietà, offrendo un servizio
                        affidabile, sicuro e attivo 24 ore su 24.
                        Ascoltiamo i nostri clienti e cerchiamo di metterli in contatto con fornitori selezionati
                        accuratamente.
                    </p>
                  </div>
                  <div class="col-sm chisiamoBoxpurple">
                    <h2>Qualità</h2>
                    <p>
                        Selezioniamo i nostri fornitori per portarti solo il meglio delle materie prime ed una
                        qualità da ristorante direttamente sul tuo banco...
                        <em>mens sana in corpore sano</em>
                        è il nostro motto!
                    </p>
                  </div>
                  <div class="col-sm chisiamoBoxorange">
                    <h2>Rapidità</h2>
                    <p>
                        Garantiamo tempi di consegna efficaci per i nostri prodotti per non lasciarti mai a corto di energie... sappiamo
                        che è dura resistere ad un attacco di fame!
                    </p>
                  </div>
              </div>

              <div class="row container fullScreen nopadding">
                  <div class="col-lg title">
                      <h1>Lavora con noi</h1>
                      <p>
                      <em>Entra a far parte della famiglia di UniHungry: la nostra esperienza al tuo servizio</em>
                      </p>
                      <a class="btn orange noVisitedLink" href="./Register.php?type=fornitore" >Diventa un fornitore</a>
                  </div>
                  <div class="col-lg inputForm">
                      <form>
                      <h4>Contattaci per maggiori informazioni</h4>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                  <label for="email">Email</label>
                                  <input type="email" class="form-control" id="email" placeholder="Indirizzo email">
                                </div>
                                <div class="form-group">
                                  <label for="messaggio">Che cosa vuoi sapere?</label>
                                  <textarea class="form-control" id="messaggio" rows="4"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <button type="submit" class="btn purple">Invia richiesta</button>
                            </div>
                        </div>
                      </form>
                  </div>
              </div>


          </div>

          <footer class="container footer fullScreen">
              <a class="goto-top">
              <div class="row backToTop">
                  <div class="col">
                      Torna su
                  </div>
              </div>
              </a>
              <div class="row">
                  <div class="col-4">

                  </div>
                  <div class="col-4">

                  </div>
                  <div class="col-4">
                      Copyright UniHungry
                  </div>
              </div>
          </footer>



      </div>

  </body>
</html>
