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

     <div class="collapse navbar-collapse" id="collapsibleNavbar">
          <ul class="navbar-nav">
                <!--HomePage-->
                <?php if($_SERVER['PHP_SELF'] == $HOME) { ?>
                <li class="nav-item">
                 <a class="nav-link scrolling" href="#partners">
                      <i class="fa fa-fw  fa-briefcase"></i> Partners</a>
                </li>
                <li class="nav-item">
                 <a class="nav-link scrolling" href="#chisiamo">
                      <i class="fa fa-fw  fa-flag"></i> Chi Siamo</a>
                </li>
                <?php } else { ?>
                <li class="nav-item">
                 <a class="nav-link" href="./HomePage.php">
                      <i class="fa fa-fw  fa-home"></i> Home</a>
                </li>
                <?php } ?>
                <?php if(is_logged()){ ?>
                    <li class="nav-item">
                     <a class="nav-link" href="./script_profile.php">
                         <i class="fa fa-fw  fa-user"></i> Profilo</a>
                    </li>

                    <!--Fornitore-->
                    <?php if($_SESSION['user_type'] == 'Fornitore') { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="./GestioneOrdini.php"><i class="fa fa-fw  fa-list-ul"></i> Ordini</a>
                        </li>
                    <?php } ?>

                    <?php if($_SERVER['PHP_SELF'] == $PROFILO_FORNITORE) { ?>
                        <li class="nav-item">
                          <a class="nav-link" href="./RichiesteFornitore.php"><i class="fa fa-fw  fa-question"></i> Richieste</a>
                        </li>
                    <?php } ?>


                    <!-- Notification dropdown extended page -->
                    <?php if($_SESSION['user_type'] != 'Admin'){ ?>
                    <div id="dropdown_parent" class=" nav-item dropdown">
                      <button type="button" id="notifiche_button" class="btn nav-link" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                         <i class="fa fa-fw fa-bell"></i> Notifiche
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
                <i class="fa fa-bars"></i>
                <span class="badge notifiche_count badge-pill badge-danger"></span>
            </button>
            <div class="dropdown-menu dropdown-menu-right">
                <!--Homepage behaviour-->
                <?php if($_SERVER['PHP_SELF'] == $HOME) { ?>
                    <a class="dropdown-item scrolling" href="#partners">
                        <i class="fa fa-fw  fa-briefcase"></i> Partners</a>
                    <a class="dropdown-item scrolling" href="#chisiamo">
                        <i class="fa fa-fw  fa-flag"></i> Chi Siamo</a>
                <?php } else { ?>
                    <a class="dropdown-item" href="./HomePage.php"> <i class="fa fa-fw fa-home"></i> Home</a>
                <?php } ?>

                <!--not logged-->
                <?php if(!is_logged()){ ?>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="./Login.php"><i class="fa fa-fw fa-sign-in"></i> Accedi</a>
                    <a class="dropdown-item" href="./Register.php"><i class="fa fa-fw fa-pencil-square-o"></i> Registrati</a>
                <?php } else { ?>
                <!--logged in mobile-->
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="./script_profile.php"><i class="fa fa-fw fa-user"></i> Profilo</a>
                    <?php if($_SESSION['user_type'] == 'Fornitore') { ?>
                        <a class="dropdown-item" href="./GestioneOrdini.php">
                            <i class="fa fa-fw  fa-list-ul"></i> Ordini</a>
                        <a class="dropdown-item" href="./RichiesteFornitore.php">
                            <i class="fa fa-fw  fa-question"></i> Richieste</a>
                    <?php } ?>
                    <?php if($_SESSION['user_type'] != 'Admin'){ ?>
                        <a class="dropdown-item" href="./Notifications.php"><i class="fa fa-fw fa-bell"></i> Notifiche <span id="dropdownCount" class="badge badge-secondary"></span></a>
                    <?php } ?>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="./script_logout.php"><i class="fa fa-fw fa-sign-out"></i> Logout</a>
                <?php } ?>
            </div>
        </div>


        <!-- Right side buttons -->
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <!-- Login -->
            <ul class="navbar-nav">
                <?php if(!is_logged()){ ?>
                 <li class="nav-item">
                   <a class="btn orange noVisitedLink" href="./Login.php"> <i class="fa fa-fw  fa-sign-in"></i> Accedi</a>
                 </li>
                 <li class="nav-item">
                   <a class="btn purple noVisitedLink" href="./Register.php"> <i class="fa fa-fw  fa-pencil-square-o"></i> Registrati</a>
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
                      <a class="btn purple noVisitedLink" href="./script_logout.php"> <i class="fa fa-fw  fa-sign-out"></i>  Logout</a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>
