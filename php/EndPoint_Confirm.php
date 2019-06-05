<!DOCTYPE html>
<html lang="it" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/theme.css">
  <link rel="stylesheet" href="../css/sheet.css">
  <link rel="stylesheet" href="../css/confirm.css">
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script
      src="https://code.jquery.com/jquery-3.3.1.min.js"
      integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
      crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

  <!-- Page informations and icon -->
  <title>Conferma ordine</title>
  <link rel="shortcut icon" href="../res/icon.ico" />
</head>
  <body>
    <?php include 'navbar.php'; ?>
    <div class="message">
      <?php if(isset($_SESSION['endpoint'])) {
        if($_SESSION['endpoint'] == "Confirm") {
          echo '<h1>Grazie per aver ordinato!</h1>
          <hr/>
          <p class="centered">Ti invieremo una notifica quando il tuo ordine sarà in consegna.</p>';
        } else if ($_SESSION['endpoint'] == "Locked") {
          echo '<h1>Attenzione! sei stato bloccato per troppi tentativi di login</h1>
          <hr/>
          <p class="centered">Contatta gli admin all\'indirizzo unihungry@gmail.com per rimediare.</p>';
        } else if ($_SESSION['endpoint'] == "NotApproved") {
          echo '<h1>Attenzione! non sei ancora stato approvato come fornitore</h1>
          <hr/>
          <p class="centered">Ti invieremo una email quando avremo valutato la tua richiesta.</p>';
        } else if ($_SESSION['endpoint'] == "Error") {
          echo '<h1>Ops! qualcosa è andato storto :/ </h1>
          <hr/>
          <p class="centered"><iframe width="560" height="315" src="https://www.youtube.com/embed/dQw4w9WgXcQ?start=43" frameborder="0" allow="accelerometer; autoplay=1; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></p>';
        }
      } ?>
      <div class="distance">
        <a class="btn noVisitedLink green" href="HomePage.php">Torna alla HomePage</a>
      </div>
    </div>
  </body>
</html>
