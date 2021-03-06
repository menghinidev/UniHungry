<!DOCTYPE html>
<html lang="it">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/theme.css">
  <link rel="stylesheet" href="../css/login.css">
  <!--FontAwsome-->
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script
            src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  <script src="../js/sha512.js" charset="utf-8"></script>
  <script src="../js/passwordFormClick.js" charset="utf-8"></script>
  <script src="../js/LoginValidation.js" charset="utf-8"></script>
  <!-- Page informations and icon -->
  <title>UniHungry - Login</title>
  <link rel="shortcut icon" href="../res/icon.ico" />
</head>
<body>
    <?php include 'navbar.php'; ?>
    <div class="container">
            <form id="registerform" class="col needs-validation" action="../php/action_login.php" method="post" novalidate>
                    <h2>Accedi</h2>
                <div class="form-row">
                    <div class="form-group col">
                      <label for="email">Email</label>
                      <input type="email" class="form-control" name="email" id="email" placeholder="mario.rossi@mail.com" required>
                      <div class="invalid-feedback">
                         Non hai inserito un'email valida.
                      </div>
                    </div>
                </div>
                <div class="form-row">
                  <div class="form-group col">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                     <div class="invalid-feedback">
                        Non hai inserito una password.
                     </div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="col">
                    <button type="submit" onsubmit="" class="centered btn green">Accedi</button>
                  </div>
                </div>
                <div class="form-row">
                    <p class="col">Non hai un account?
                    <a id="registratiLink" href="./Register.php"> Registrati qui</a>
                    </p>
                </div>
            </form>

            <?php if(isset($_SESSION['should_login'])) {
                unset($_SESSION['should_login']);?>
                <div class="alert alert-warning" role="alert">
                  <strong>Attenzione</strong> devi essere loggato per eseguire azioni sul nostro sito!
                </div>
            <?php } ?>
            <?php if(isset($_SESSION['login_fail'], $_SESSION['remaining'])) {
                    if($_SESSION['login_fail'] == 'pw'){ ?>
            <div class="alert alert-warning" role="alert">
              <strong>Attenzione</strong> hai inserito una password non valida, ti rimangono soltanto <?php echo $_SESSION['remaining']; ?> tentativi!
            </div>
        <?php }}  ?>

        <?php if(isset($_SESSION['login_fail'])) {
                if($_SESSION['login_fail'] == 'email'){ ?>
        <div class="alert alert-warning" role="alert">
          <strong>Attenzione</strong> l'email che hai inserito non corrisponde a nessun account. Prova a registrarti prima a questo <a class=".alert-link" href="./Register.php">link</a>
        </div>
    <?php }} unset($_SESSION['login_fail']); unset($_SESSION['remaining'])?>
    </div>

</body>
</html>
