<?php
$prefix = "/unihungry/php/";
$PROFILO_FORNITORE = $prefix.'ProfiloFornitore.php';
$SEARCH = $prefix.'Search.php';
$CART= $prefix.'Cart.php';
$UNLOCK = $prefix.'UnlockUsers.php';
$ORDINI = $prefix.'GestioneOrdini.php';
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
         <?php } else if($_SERVER['PHP_SELF'] == $UNLOCK){ ?>
             Non ci sono utenti da sbloccare.
         <?php } else if($_SERVER['PHP_SELF'] == $ORDINI){ ?>
             Non ci sono ordini con queste caratteristiche.
         <?php } ?>
     </p>
</div>
