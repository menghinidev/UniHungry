<?php
require 'secure_func.php';
sec_session_start();

if($_SESSION['user_type'] == 'Cliente'){
  header('Location: ./ProfiloCliente.php');
}

if($_SESSION['user_type'] == 'Fornitore'){
  header('Location: ./ProfiloFornitore.php');
}
 ?>
