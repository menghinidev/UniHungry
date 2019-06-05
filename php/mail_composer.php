<?php
function conferma_fornitore($emailFornitore) {
    $headers = 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= 'From: UniHungry <unihungry@gmail.com>' . "\r\n";
    $to  = $emailFornitore;
    $subject = 'Conferma registrazione a UniHungry';

    $message = '
    <html>
    <head>
    </head>
    <body>
    <h2>Benvenuto in UniHungry!</h2>
    <p>Ti diamo il benvenuto nella famiglia di UniHungry!</p>
    <p>I nostri amministratori hanno approvato la tua iscrizione come fornitore.<br/>
    Ora puoi compilare il tuo listino ed entrare in contatto con i nostri clienti.
    </p>

    <a href ="http://localhost/unihungry/php/HomePage.php">Clicca qua per cominciare!</a>
    </body>
    </html>
    ';
    mail($to, $subject, $message, $headers);
}

function rifiuta_fornitore($emailFornitore) {

    $headers = 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= 'From: UniHungry <unihungry@gmail.com>' . "\r\n";
    $to  = $emailFornitore;
    $subject = 'Richiesta rifiutata';

    $message = '
    <html>
    <head>
    <title></title>
    </head>
    <body>
    <h2>La tua richiesta di iscrizione è stata rifiutata</h2>
    <p>I nostri amministratori non hanno reputato come idonea la tua richiesta.<br/>
    Se ritieni che ci sia stato un errore non esitare a contattarci rispondendo a questa mail.
    </p>
    </body>
    </html>
    ';

    mail($to, $subject, $message, $headers);
}

function conferma_utente($email, $nome, $cognome) {

    $headers = 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= 'From: UniHungry <unihungry@gmail.com>' . "\r\n";
    $to  = $email;
    $subject = 'Conferma registrazione a UniHungry';

    $message = '
    <html>
    <head>
    <title></title>
    </head>
    <body>
    <h2>Benvenuto in UniHungry!</h2>
    <p>Gentile '.$nome.' '.$cognome.', ti diamo il benvenuto nella famiglia di UniHungry!<br/>
    Inizia subito a scoprire tutti i nostri partener e i loro fantastici prodotti!
    </p>

    <a href ="http://localhost/unihungry/php/HomePage.php">Clicca qua per cominciare!</a>
    </body>
    </html>
    ';
    mail($to, $subject, $message, $headers);
}

function attendi_approvazione($email, $nome, $cognome, $nome_fornitore) {

    $headers = 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= 'From: UniHungry <unihungry@gmail.com>' . "\r\n";
    $to  = $email;
    $subject = 'La tua richiesta è stata ricevuta';

    $message = '
    <html>
    <head>
    <title></title>
    </head>
    <body>
    <p>Gentile '.$nome.' '.$cognome.', la richiesta di iscrizione per la tua attività '.$nome_fornitore.' è stata ricevuta.<br/>
    Ti preghiamo di attendere una mail da parte dei nostri amministratori che provvederanno ad approvare la tua iscrizione al più presto.
    </p>
    </body>
    </html>
    ';
    mail($to, $subject, $message, $headers);
}

function account_bloccato($email) {

    $headers = 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= 'From: UniHungry <unihungry@gmail.com>' . "\r\n";
    $to  = $email;
    $subject = 'Il tuo account è stato bloccato';

    $message = '
    <html>
    <head>
    <title></title>
    </head>
    <body>
    <h2>Il tuo account è stato bloccato!</h2>
    <p>A seguito di troppi tentativi di accesso di seguito errati questo account è stato bloccato.<br/>
    Rispondi pure a questa email per avviare la procedura di sblocco.
    </p>
    </body>
    </html>
    ';
    mail($to, $subject, $message, $headers);
}

function nuovoOrdineRicevuto($email, $id_ordine){

    $headers = 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= 'From: UniHungry <unihungry@gmail.com>' . "\r\n";
    $to  = $email;
    $subject = 'Hai ricevuto un nuovo ordine!';

    $message = '
    <html>
    <head>
    <title></title>
    </head>
    <body>
    <p>Hai ricevuto un nuovo ordine con id '.$id_ordine.'. Puoi approvarlo dalla sezione ordini del tuo profilo.
    </p>
    <a href ="http://localhost/unihungry/php/GestioneOrdini.php?oid='.$id_ordine.'">Clicca per vedere l\'ordine</a>
    </body>
    </html>
    ';
    mail($to, $subject, $message, $headers);
}

function ordineApprovato($email, $id_ordine, $fornitore){

    $headers = 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= 'From: UniHungry <unihungry@gmail.com>' . "\r\n";
    $to  = $email;
    $subject = 'Il tuo ordine è stato approvato';

    $message = '
    <html>
    <head>
    <title></title>
    </head>
    <body>
    <p>'.$fornitore.' ha approvato il tuo ordine e lo sta preparando per te! Segui l\'avanzamento sul tuo profilo.
    </p>
    <a href ="http://localhost/unihungry/php/ProfiloCliente.php?oid='.$id_ordine.'">Clicca per vedere lo stato dell\'ordine</a>
    </body>
    </html>
    ';
    mail($to, $subject, $message, $headers);
}

function utenteSbloccato($email, $nuovapassword){

    $headers = 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= 'From: UniHungry <unihungry@gmail.com>' . "\r\n";
    $to  = $email;
    $subject = 'Il tuo account è stato sbloccato';

    $message = '
    <html>
    <head>
    <title></title>
    </head>
    <body>
    <p>Il tuo account è stato sbloccato dai nostri amministratori.</p>
    <p>Usa questa nuova password per accedere: '.$password.'</p>
    <p>Ricordati di cambiarla con una scelta da te!</p>
    <a href ="http://localhost/unihungry/php/Login.php">Accedi a UniHungry</a>
    </body>
    </html>
    ';
    mail($to, $subject, $message, $headers);
}
?>
