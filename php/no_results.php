<?php
$prefix = "/unihungry/php/";
$PROFILO_FORNITORE = $prefix.'ProfiloFornitore.php';
$SEARCH = $prefix.'Search.php';
$CART= $prefix.'Cart.php';
 ?>

<div id="no_results">
      <h3>Qui non c'è niente!</h3>
      <p id="centered">
           <?php if($_SERVER['PHP_SELF'] == $SEARCH) { ?>
             La ricerca non ha prodotto risultati.
         <?php } else if($_SERVER['PHP_SELF'] == $CART) { ?>
             Prova ad aggiungere dei prodotti.
         <?php } else if($_SERVER['PHP_SELF'] == $PROFILO_FORNITORE){ ?>
             Inserisci i tuoi prodotti.
         <?php } ?>
     </p>
</div>
