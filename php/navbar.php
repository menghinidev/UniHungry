<?php
require 'secure_func.php';
sec_session_start();
require 'db_connect.php';
login_check($mysqli);
$prefix = "/unihungry/php/";
$HOME = $prefix.'HomePage.php';
?>
<nav class="navbar navbar-expand-md sticky-top">
     <!-- Brand -->
     <a id="brand" class="navbar-brand nav-link" href="#">
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
                 <a class="nav-link" href="./Home.php">Home</a>
                </li>
                <?php } ?>
                <?php if(is_logged()){ ?>
                    <li class="nav-item">
                     <a class="nav-link" href="*******">Profilo</a>
                    </li>
                    <!-- Notification dropdown extended page -->
                    <div class="btn-group">
                      <button type="button" class="btn green dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Notifiche
                      </button>
                      <div class="dropdown-menu dropdown-menu-right">
                        <a href="#">Notifica 1 ...........................</a>
                      </div>
                    </div>
                    <!--ProfiloUtente-->

                    <!--ProfiloFornitore-->

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
                    <a class="dropdown-item" href="./Login.html">Accedi</a>
                    <a class="dropdown-item" href="./Registrati.html">Registrati</a>
                <?php } else { ?>
                <!--ProfiloUtente-->

                <!--ProfiloFornitore-->

                <!--logged in mobile-->
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="*******">Notifiche</a>
                    <a class="dropdown-item" href="*******">Profilo</a>
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
