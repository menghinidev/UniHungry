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
<nav class="navbar navbar-expand-md sticky-top selectDisable">
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
                 <a class="nav-link scrolling" href="#partners">Partners</a>
                </li>
                <li class="nav-item">
                 <a class="nav-link scrolling" href="#chisiamo">Chi Siamo</a>
                </li>
                <?php } else { ?>
                <li class="nav-item">
                  <i class="fa fa-home"></i><a class="nav-link" href="./HomePage.php">Home</a>
                </li>
                <?php } ?>
                <?php if(is_logged()){ ?>
                    <li class="nav-item">
                     <a class="nav-link" href="./script_profile.php">
                         <i class="fa fa-user"></i> Profilo</a>
                    </li>

                    <!--ProfiloFornitore-->
                    <?php if($_SERVER['PHP_SELF'] == $PROFILO_FORNITORE) { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="./GestioneOrdini.php">Ordini</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="./********">Modifiche</a>
                        </li>
                    <?php } ?>

                    <!-- Notification dropdown extended page -->
                    <?php if($_SESSION['user_type'] != 'Admin'){ ?>
                    <div id="dropdown_parent" class=" nav-item dropdown">
                      <button type="button" id="notifiche_button" class="btn green" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                         <i class="fa fa-bell"></i> Notifiche
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
            <button type="button" class="nav-item btn green dropdown-toggle navbar-toggler" data-toggle="dropdown">
                <span class="badge notifiche_count badge-pill badge-danger"></span>
            </button>
            <div class="dropdown-menu dropdown-menu-right">
                <!--Homepage behaviour-->
                <?php if($_SERVER['PHP_SELF'] == $HOME) { ?>
                    <a class="dropdown-item scrolling" href="#partners">Partners</a>
                    <a class="dropdown-item scrolling" href="#chisiamo">Chi siamo</a>
                <?php } else { ?>
                    <a class="dropdown-item" href="./HomePage.php">Home</a>
                <?php } ?>

                <!--not logged-->
                <?php if(!is_logged()){ ?>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="./Login.php">Accedi</a>
                    <a class="dropdown-item" href="./Register.php">Registrati</a>
                <?php } else { ?>
                <?php if($_SERVER['PHP_SELF'] == $PROFILO_FORNITORE) { ?>
                    <a class="dropdown-item" href="./GestioneOrdini.php">Ordini</a>
                    <a class="dropdown-item" href="./******">Modifiche</a>
                <?php } ?>
                <!--logged in mobile-->
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="./script_profile.php">Profilo</a>
                    <?php if($_SESSION['user_type'] != 'Admin'){ ?>
                        <a class="dropdown-item" href="./Notifications.php">Notifiche <span id="dropdownCount" class="badge badge-secondary"></span></a>
                    <?php } ?>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="./script_logout.php"> <i class="fa fa-sign-out"></i> Logout</a>
                <?php } ?>
            </div>
        </div>


        <!-- Right side buttons -->
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <!-- Login -->
            <ul class="navbar-nav">
                <?php if(!is_logged()){ ?>
                 <li class="nav-item">
                   <a class="btn orange noVisitedLink" href="./Login.php">Accedi</a>
                 </li>
                 <li class="nav-item">
                   <a class="btn purple noVisitedLink" href="./Register.php">Registrati</a>
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
                      <a class="btn purple noVisitedLink" href="./script_logout.php">Logout</a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>
