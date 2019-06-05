<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/theme.css">
  <link rel="stylesheet" href="../css/locked.css">
  <!--FontAwsome-->
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script
      src="https://code.jquery.com/jquery-3.3.1.min.js"
      integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
      crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  <script type="text/javascript" src="../js/unlock.js"></script>
  <script type="text/javascript" src="../js/sha512.js"></script>
  <!-- Page informations and icon -->
  <title>UniHungry - Modifiche</title>
  <link rel="shortcut icon" href="../res/icon.ico" />
</head>
  <body>
      <?php include 'navbar.php';
      if(!is_logged()){
        header('Location: ./Login.php');
        } else if($_SESSION['user_type'] != 'Admin'){
            include 'error.php';
        } else {
        $sql = "SELECT user_id, email, user_type FROM users WHERE locked = 1";
        $locked = $mysqli->query($sql);
      }
      ?>
      <div class="mainContainer">
        <div class="content">
          <div class="row">
            <div class="col-5">
              <h5>Email</h5>
            </div>
            <div class="col-5">
              <h5>Tipo Utente</h5>
            </div>
          </div>
          <hr>
          <?php
          if($locked->num_rows > 0) {
            while ($user = $locked->fetch_assoc()) {
              echo '<div class="row distanced">
                <div class="col-5">
                  '.$user['email'].'
                </div>
                <div class="col-5">
                  '.$user['user_type'].'
                </div>
                <div class="col-2">
                  <button class="btn green" name="button" onclick="unLock(this)" id="'.$user['user_id'].'">Unlock</button>
                </div>
              </div>';
            }
          } else {
            echo "No Results";
          }
          ?>
        </div>
      </div>
  </body>
</html>
