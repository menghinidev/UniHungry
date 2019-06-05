<?php
require 'secure_func.php';
sec_session_start();
require 'db_connect.php';
login_check($mysqli);
$prefix = "/unihungry/php/";
$HOME = $prefix.'HomePage.php';
$PROFILO_UTENTE = $prefix.'ProfiloCliente.php';
$PROFILO_FORNITORE = $prefix.'ProfiloFornitore.php';
$SEARCH = $prefix.'Search.php';
?>
<script src="../js/navbar_notifications.js" charset="utf-8"></script>
<nav class="navbar navbar-expand-lg sticky-top selectDisable">
     <!-- Brand -->
     <?php if($_SERVER['PHP_SELF'] == $HOME) { ?>
         <a id="brand" class="navbar-brand" href="#">
     <?php }else{ ?>
         <a id="brand" class="navbar-brand" href="./HomePage.php">
     <?php } ?>
            <img src="../res/logo.png" height="40" alt="UniHungry">
        </a>

     <div class="collapse navbar-collapse" id="collapsibleNavbarLeft">
          <ul class="navbar-nav">
                <!--HomePage-->
                <?php if($_SERVER['PHP_SELF'] == $HOME) { ?>
                <li class="nav-item">
                 <a class="nav-link scrolling" href="#partners">
                      <span class="fa fa-fw  fa-briefcase"></span> Partners</a>
                </li>
                <li class="nav-item">
                 <a class="nav-link scrolling" href="#chisiamo">
                      <span class="fa fa-fw  fa-flag"></span> Chi Siamo</a>
                </li>
                <?php } else { ?>
                <li class="nav-item">
                 <a class="nav-link" href="./HomePage.php">
                      <span class="fa fa-fw  fa-home"></span> Home</a>
                </li>
                <?php } ?>
                <?php if(is_logged()){ ?>
                    <?php if($_SESSION['user_type'] == 'Admin') { ?>
                        <li class="nav-item">
                          <a class="nav-link" href="./AdminPage.php"><span class="fa fa-fw  fa-question"></span> Richieste</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./UnlockUsers.php"><span class="fa fa-fw  fa-unlock-alt"></span> Sblocco Utenti</a>
                        </li>
                    <?php } else { ?>
                        <li class="nav-item">
                         <a class="nav-link" href="./script_profile.php">
                             <span class="fa fa-fw  fa-user"></span> Profilo</a>
                        </li>
                    <?php } ?>

                    <!--Fornitore-->
                    <?php if($_SESSION['user_type'] == 'Fornitore') { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="./GestioneOrdini.php"><span class="fa fa-fw  fa-list-ul"></span> Ordini</a>
                        </li>
                    <?php } ?>

                    <?php if($_SERVER['PHP_SELF'] == $PROFILO_FORNITORE) { ?>
                        <li class="nav-item">
                          <a class="nav-link" href="./RichiesteFornitore.php"><span class="fa fa-fw  fa-question"></span> Richieste</a>
                        </li>
                    <?php } ?>


                    <!-- Notification dropdown extended page -->
                    <?php if($_SESSION['user_type'] != 'Admin'){ ?>
                    <div id="dropdown_parent" class=" nav-item dropdown">
                      <button type="button" id="notifiche_button" class="btn nav-link" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                         <span class="fa fa-fw fa-bell"></span> Notifiche
                        <span class="badge notifiche_count badge-pill badge-danger"></span>
                      </button>
                      <div id="drop_notifiche" class="dropdown-menu dropdown-menu-right">
                      </div>
                    </div>
                <?php }
                    }
                ?>

            </ul>
    </div>
    <div class= "ml-auto">
        <div class="dropdown">
            <button type="button" class="nav-item btn green navbar-toggler" data-toggle="dropdown">
                <span class="fa fa-bars"></span>
                <span class="badge notifiche_count badge-pill badge-danger"></span>
            </button>
            <div class="dropdown-menu dropdown-menu-right">
                <!--Homepage behaviour-->
                <?php if($_SERVER['PHP_SELF'] == $HOME) { ?>
                    <a class="dropdown-item scrolling" href="#partners">
                        <span class="fa fa-fw  fa-briefcase"></span> Partners</a>
                    <a class="dropdown-item scrolling" href="#chisiamo">
                        <span class="fa fa-fw  fa-flag"></span> Chi Siamo</a>
                <?php } else { ?>
                    <a class="dropdown-item" href="./HomePage.php"> <span class="fa fa-fw fa-home"></span> Home</a>
                <?php } ?>

                <!--not logged-->
                <?php if(!is_logged()){ ?>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="./Login.php"><span class="fa fa-fw fa-sign-in"></span> Accedi</a>
                    <a class="dropdown-item" href="./Register.php"><span class="fa fa-fw fa-pencil-square-o"></span> Registrati</a>
                <?php } else { ?>
                <!--logged in mobile-->
                <div class="dropdown-divider"></div>
                <?php if($_SESSION['user_type'] == 'Admin') { ?>
                    <a class="dropdown-item" href="./AdminPage.php"><span class="fa fa-fw fa-question"></span> Richieste</a>
                    <a class="dropdown-item" href="./UnlockUsers.php"><span class="fa fa-fw fa-unlock-alt"></span> Sblocco Utenti</a>
                <?php }else { ?>
                    <a class="dropdown-item" href="./script_profile.php"><span class="fa fa-fw fa-user"></span> Profilo</a>
                <?php } ?>

                    <?php if($_SESSION['user_type'] == 'Fornitore') { ?>
                        <a class="dropdown-item" href="./GestioneOrdini.php">
                            <span class="fa fa-fw  fa-list-ul"></span> Ordini</a>
                        <a class="dropdown-item" href="./RichiesteFornitore.php">
                            <span class="fa fa-fw  fa-question"></span> Richieste</a>
                    <?php } ?>
                    <?php if($_SESSION['user_type'] != 'Admin'){ ?>
                        <a class="dropdown-item" href="./Notifications.php"><span class="fa fa-fw fa-bell"></span> Notifiche <span id="dropdownCount" class="badge badge-secondary"></span></a>
                    <?php } ?>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="./script_logout.php"><span class="fa fa-fw fa-sign-out"></span> Logout</a>
                <?php } ?>
            </div>
        </div>


        <!-- Right side buttons -->
        <div class="collapse navbar-collapse" id="collapsibleNavbarRight">
            <!-- Login -->
            <ul class="navbar-nav">
                <?php if(!is_logged()){ ?>
                 <li class="nav-item">
                   <a class="btn orange noVisitedLink" href="./Login.php"> <span class="fa fa-fw  fa-sign-in"></span> Accedi</a>
                 </li>
                 <li class="nav-item">
                   <a class="btn purple noVisitedLink" href="./Register.php"> <span class="fa fa-fw  fa-pencil-square-o"></span> Registrati</a>
                 </li>
                <?php } else { ?>
                    <li class="nav-item">
                      <a class="nav-link" id="nav_username" href="./script_profile.php">
                          <?php
                            echo $_SESSION['email'];
                          ?>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="btn purple noVisitedLink" href="./script_logout.php"> <span class="fa fa-fw  fa-sign-out"></span>  Logout</a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>
