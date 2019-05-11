<?php
function conferma_fornitore($emailFornitore) {
    $to  = $emailFornitore;
    $subject = 'Conferma registrazione a UniHungry';

    $message = '
    <html>
    <head>
    <title>Benvenuto in UniHungry!</title>
    </head>
    <body>
    <p>Ti diamo il benvenuto nella famiglia di UniHungry.</p>
    <p>I nostri amministratori hanno approvato la tua iscrizione come fornitore.<br/>
    Ora puoi compilare il tuo listino ed entrare in contatto con i nostri clienti.
    </p>

    <a href ="http://localhost/unihungry/php/HomePage.php">Clicca qua per cominciare!</a>
    </body>
    </html>
    ';

    $headers = 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= 'From: UniHungry <unihungry@gmail.com>' . "\r\n";

    mail($to, $subject, $message, $headers);
}

function rifiuta_fornitore($emailFornitore) {
    $to  = $emailFornitore;
    $subject = 'Richiesta rifiutata';

    $message = '
    <html>
    <head>
    <title>Richiesta rifiutata</title>
    </head>
    <body>
    <p>I nostri amministratori non hanno reputato come idonea la tua richiesta.<br/>
    Se ritieni che ci sia stato un errore non esitare a contattarci rispondendo a questa mail.
    </p>
    </body>
    </html>
    ';

    $headers = 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= 'From: UniHungry <unihungry@gmail.com>' . "\r\n";

    mail($to, $subject, $message, $headers);
}
?>
