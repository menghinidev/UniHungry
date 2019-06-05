<!DOCTYPE html>
<html lang="it">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/notifiche.css">
    <link rel="stylesheet" href="../css/theme.css">
    <!--FontAwsome-->
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script
			  src="https://code.jquery.com/jquery-3.3.1.min.js"
			  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
			  crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <!-- Optional JavaScript -->
    <script src="../js/notification.js" charset="utf-8"></script>
    <!-- Page informations and icon -->
    <title>UniHungry - Notifiche</title>
    <link rel="shortcut icon" href="../res/icon.ico" />
  </head>
  <body>
      <?php include 'navbar.php';
      if(!is_logged()){
        header('Location: ./Login.php');
    } else if($_SESSION['user_type'] == 'Admin'){
            include 'error.php';
        } else {
      ?>
      <div class="container">
      <div class="row title">
         <h3>Le tue notifiche</h3>
      </div>
      <div id="notifications">
      <?php
      $u_id = $_SESSION['user_id'];
      $query = "";
      if($_SESSION['user_type'] == 'Fornitore'){
        $query="SELECT * FROM notifiche WHERE id_fornitore = {$u_id} AND per_utente = false ORDER BY time_stamp DESC";
        } else {
        //Cliente
        $query="SELECT N.* from notifiche N, ordini O WHERE O.id_ordine = N.id_ordine AND O.id_cliente = {$u_id} AND N.per_utente = true ORDER BY time_stamp DESC";
        }
      $notifications = $mysqli->query($query);
      if($notifications->num_rows == 0){
          echo "Nessuna notifica!";
      } else {
          while($n = $notifications->fetch_assoc()){
              $href="#";
              if($_SESSION['user_type'] == 'Fornitore'){
                  $href="./GestioneOrdini.php?oid={$n['id_ordine']}";
              } else {
                  $href="./ProfiloCliente.php?oid={$n['id_ordine']}";
              }
    ?>
        <a id="notifica<?php echo $n['id_notifica'];?>" href="<?php echo $href ?>" class="row notify-row justify-content-between <?php echo (!$n['visualizzata'])?"not-seen":"" ;?>">
            <div class="col-12">
                <?php echo $n['testo']; ?>
            </div>
            <div class="col text-right time">
                <?php echo date("d/m/y - H:i ", strtotime($n['time_stamp'])); ?>
            </div>

        </a>

     <?php
          }
      }
      ?>
      </div>
      </div>
  </body>
