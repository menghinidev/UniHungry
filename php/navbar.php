<?php
require 'secure_func.php';
sec_session_start();
require 'db_connect.php';
login_check($mysqli);
$prefix = "/unihungry/php/";
$HOME = $prefix.'HomePage.php';
$PROFILO_UTENTE = $prefix.'ProfiloCliente.php';
$PROFILO_FORNITORE = $prefix.'ProfiloFornitore.php'
?>
<nav class="navbar navbar-expand-md sticky-top">
     <!-- Brand -->
     <?php if($_SERVER['PHP_SELF'] == $HOME) { ?>
         <a id="brand" class="navbar-brand nav-link" href="#">
     <?php }else{ ?>
         <a id="brand" class="navbar-brand nav-link" href="./HomePage.php">
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
                 <a class="nav-link" href="./HomePage.php">Home</a>
                </li>
                <?php } ?>
                <?php if(is_logged()){ ?>
                    <li class="nav-item">
                     <a class="nav-link" href="./script_profile.php">Profilo</a>
                    </li>

                    <!--ProfiloUtente-->
                    <?php if($_SERVER['PHP_SELF'] == $PROFILO_UTENTE) { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="./******">Prodotti</a>
                        </li>
                    <?php } ?>
                    <!--ProfiloFornitore-->
                    <?php if($_SERVER['PHP_SELF'] == $PROFILO_FORNITORE) { ?>
                        <li>
                            <a class="nav-link" href="./*****">Ordini</a>
                        </li>
                        <li>
                          <a class="nav-link" href="./********">Modifiche</a>
                        </li>
                    <?php } ?>

                    <!-- Notification dropdown extended page -->
                    <div class="btn-group">
                      <button type="button" class="btn green dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Notifiche
                      </button>
                      <div class="dropdown-menu dropdown-menu-right">
                        <a href="#">Notifica 1 ...........................</a>
                      </div>
                    </div>
                <?php } ?>
            </ul>
    </div>
    <div class= "ml-auto">
        <div class="dropdown">
            <button type="button" class="nav-item btn green dropdown-toggle navbar-toggler" data-toggle="dropdown">
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
                    <a class="dropdown-item" href="./Registrati.php">Registrati</a>
                <?php } else { ?>
                <!--ProfiloUtente-->
                <?php if($_SERVER['PHP_SELF'] == $PROFILO_UTENTE) { ?>
                     <a class="dropdown-item" href="./******">Prodotti</a>
                 <?php } ?>
                <!--ProfiloFornitore-->
                <?php if($_SERVER['PHP_SELF'] == $PROFILO_FORNITORE) { ?>
                    <a class="dropdown-item" href="./******">Ordini</a>
                    <a class="dropdown-item" href="./******">Modifiche</a>
                <?php } ?>
                <!--logged in mobile-->
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="*******">Notifiche</a>
                    <a class="dropdown-item" href="./script_profile.php">Profilo</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="./script_logout.php">Logout</a>
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
                  <a class="btn purple noVisitedLink" href="./script_logout.php">Logout</a>
                </li>
            <?php } ?>
            </ul>
        </div>
    </div>
</nav>