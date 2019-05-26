<!doctype html>
<html lang="it">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/theme.css">
    <link rel="stylesheet" href="../css/tab.css">
    <link rel="stylesheet" href="../css/ordini.css">
    <link rel="stylesheet" href="../css/profile.css">

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script
			  src="https://code.jquery.com/jquery-3.3.1.min.js"
			  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
			  crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../js/ProfiloCliente.js"></script>
    <!-- Page informations and icon -->
    <title>UniHungry - Il tuo profilo</title>
    <link rel="shortcut icon" href="../res/icon.ico" />
  </head>
  <body>
     <?php include 'navbar.php';
     if(!is_logged()){
         header('Location: ./ERROR');
     }
     $id = $_SESSION['user_id'];
     $query = "SELECT * FROM clienti INNER JOIN users ON clienti.id_cliente = users.user_id WHERE id_cliente = $id";
     $result = $mysqli->query($query);
     $row = $result->fetch_assoc();
     ?>
      <div class="col" id="menu-box">
          <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
              <a class="nav-item nav-link tabLink active" id="ordini-tab" data-toggle="tab" href="#ordini" role="tab" aria-controls="ordini" aria-selected="true">I miei Ordini</a>
              <a class="nav-item nav-link tabLink" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Modifica profilo</a>
            </div>
          </nav>
          <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="ordini" role="tabpanel" aria-labelledby="ordini-tab">

                <div class="container riepilogoOrdine fullScreen">
                    <h4>Ordini in corso</h4>
                    <div class=" row">
                        <p class="col-4">Id ordine: </p>
                        <p class="col-4">Data e ora: </p>
                        <p class="col-4">Stato ordine </p>
                    </div>
                </div>

                <div id="accordion">
                  <div class="card">
                    <div class="card-header nopadding" id="headingOne">
                            <button class="container fullScreen btn" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <div class=" row">
                                    <p class="col-4">#222222222 </p>
                                    <p class="col-4">30/01/19 - 10:14 </p>
                                    <p class="col-4">In consegna </p>
                                </div>
                            </button>
                    </div>

                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                      <div class="card-body">
                          <p>Luogo ritiro: [campus]</p>
                        <ul>
                            <li>
                                <div class="row">
                                    <div class="col-9">
                                        <a href="./Search.html">Prodotto</a> x2
                                    </div>
                                    <div class="col prezzo">
                                        8.50€
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="row">
                                    <div class="col-9">
                                        Prodotto x1
                                    </div>
                                    <div class="col prezzo">
                                        12.99€
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="row">
                                    <div class="col-9">
                                        Prodotto con nome lungo
                                    </div>
                                    <div class="col prezzo">
                                        3.50€
                                    </div>
                                </div>
                            </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="container riepilogoOrdine fullScreen">
                    <h4>Ordini Passati</h4>
                    <div class="row">
                        <p class="col-4">Id ordine: </p>
                        <p class="col-4">Data e ora: </p>
                        <p class="col-4">Stato ordine </p>
                    </div>
                </div>

                <div id="accordion">
                  <div class="card">
                    <div class="card-header nopadding" id="headingtwo">
                            <button class="container fullScreen btn" data-toggle="collapse" data-target="#collapsetwo" aria-expanded="true" aria-controls="collapseOne">
                                <div class=" row">
                                    <p class="col-4">#222222222 </p>
                                    <p class="col-4">27/01/18 - 12:45 </p>
                                    <p class="col-4">Consegnato </p>
                                </div>
                            </button>
                    </div>

                    <div id="collapsetwo" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                      <div class="card-body">
                          <p>Luogo ritiro: [campus]</p>
                        <ul>
                            <li>
                                <div class="row">
                                    <div class="col-9">
                                        <a href="./Search.html">Prodotto</a> x2
                                    </div>
                                    <div class="col prezzo">
                                        8.50€
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="row">
                                    <div class="col-9">
                                        Prodotto x1
                                    </div>
                                    <div class="col prezzo">
                                        12.99€
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="row">
                                    <div class="col-9">
                                        Prodotto con nome lungo
                                    </div>
                                    <div class="col prezzo">
                                        3.50€
                                    </div>
                                </div>
                            </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <form id="modificaform" class="col needs-validation" method="post" action="action_profile_update.php" novalidate>
                        <h2>Modifica informazioni</h2>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="nome">Nome</label>
                          <input type="text" class="form-control" name="nome" value="<?php echo $row['nome']; ?>" id="nome" required>
                        </div>
                        <div class="form-group col-md-6">
                          <label for="cognome">Cognome</label>
                          <input type="text" class="form-control"name="cognome" value="<?php echo $row['cognome']; ?>" id="cognome" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="email">Email</label>
                          <input type="email" class="form-control" value="<?php echo $row['email']; ?>" id="email" disabled>
                          <small id="emailHelp" class="form-text">Ci dispiace non puoi modificare la tua mail</small>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="cellulare">Numero cellulare</label>
                            <input type="text" class="form-control" name="telefono" value="<?php echo $row['telefono']; ?>" id="cellulare" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="passwordOld">Vecchia Password</label>
                        <input type="password" class="form-control" id="passwordOld">
                        <label for="passwordNew">Nuova Password</label>
                        <input type="password" class="form-control" id="passwordNew">
                        <label for="passwordNewConfirm">Conferma nuova Password</label>
                        <input type="password" class="form-control" id="passwordNewConfirm">
                    </div>
                    <div class="form-row">
                    <div class="col-4"></div>
                    <button id="registrati" type="submit" class="col-4 btn green">Modifica</button>
                    <div class="col-4"></div>
                    </div>
                </form>
            </div>
          </div>
      </div>





  <!-- Optional JavaScript -->
  </body>
</html>s
