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
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script
            src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  <script src="../js/sha512.js" charset="utf-8"></script>
  <script src="../js/passwordFormClick.js" charset="utf-8"></script>
  <!-- Page informations and icon -->
  <title>UniHungry - Login</title>
  <link rel="shortcut icon" href="../res/icon.ico" />
</head>
<body>
    <div class="container">
            <form id="registerform" class="col" action="../php/action_login.php" method="post">
                    <h2>Accedi</h2>
                <div class="form-row">
                    <div class="form-group col">
                      <label for="email">Email</label>
                      <input type="email" class="form-control" name="email" id="email" placeholder="mario.rossi@mail.com">
                    </div>
                </div>
                <div class="form-row">
                  <div class="form-group col">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                  </div>
                </div>
                <div class="form-row">
                  <div class="col">
                    <button type="submit" onclick="formhash(this.form, this.form.password)" class="centered btn green">Accedi</button>
                  </div>
                </div>
            </form>
    </div>
</body>
</html>
