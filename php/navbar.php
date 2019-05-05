<?php
require secure_func.php:
sec_session_start();
require db_connect.php;
login_check()
?>
<nav class="navbar navbar-expand-md sticky-top">
     <!-- Brand -->
     <a id="brand" class="navbar-brand nav-link" href="#">
          <img src="../res/logo.png" height="40" alt="UniHungry">
     </a>

         <div class="collapse navbar-collapse" id="collapsibleNavbar">
             <?php
             if(!is_logged()){
                 echo
                 '<ul class="navbar-nav">
                    <li class="nav-item">
                     <a class="nav-link scrolling" href="#partners">Partners</a>
                    </li>
                    <li class="nav-item">
                     <a class="nav-link scrolling" href="#chisiamo">Chi Siamo</a>
                     </li>
                 </ul>'
             }
             ?>

         </div>
         <div class= "ml-auto">
            <div class="dropdown">
                <button type="button" class="nav-item btn green dropdown-toggle navbar-toggler" data-toggle="dropdown">
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item scrolling" href="#partners">Partners</a>
                    <a class="dropdown-item scrolling" href="#chisiamo">Chi siamo</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="Login.html">Accedi</a>
                    <a class="dropdown-item" href="./Registrati.html">Registrati</a>
                </div>
            </div>

             <!-- Navbar links -->
             <div class="collapse navbar-collapse" id="collapsibleNavbar">
               <ul class="navbar-nav">
                 <li class="nav-item">
                   <a class="btn orange noVisitedLink" href="Login.html">Accedi</a>
                 </li>
                 <li class="nav-item">
                   <a class="btn purple noVisitedLink" href="./Registrati.html">Registrati</a>
                 </li>
               </ul>
             </div>
        </div>
</nav>
