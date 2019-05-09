<?php
function sec_session_start() {
        $session_name = 'sec_session_id';
        $secure = false; // Imposta il parametro a true se vuoi usare il protocollo 'https'.
        $httponly = true; // Questo impedirà ad un javascript di essere in grado di accedere all'id di sessione.
        ini_set('session.use_only_cookies', 1); // Forza la sessione ad utilizzare solo i cookie.
        $cookieParams = session_get_cookie_params(); // Legge i parametri correnti relativi ai cookie.
        session_set_cookie_params($cookieParams["lifetime"], $cookieParams["path"], $cookieParams["domain"], $secure, $httponly);
        session_name($session_name); // Imposta il nome di sessione con quello prescelto all'inizio della funzione.
        session_start(); // Avvia la sessione php.
        session_regenerate_id(); // Rigenera la sessione e cancella quella creata in precedenza.
}


function login($email, $password, $mysqli) {
   if ($stmt = $mysqli->prepare("SELECT user_id, password, salt, user_type, locked FROM users WHERE email = ? LIMIT 1")) {
      $stmt->bind_param('s', $email); // esegue il bind del parametro '$email'.
      $stmt->execute();
      $stmt->store_result();
      $stmt->bind_result($user_id, $db_password, $salt, $user_type, $locked);
      $stmt->fetch();
      if($locked){
          header('Location: ./ACCOUNT_LOCKED');
      }
      $password = hash('sha512', $password.$salt); // codifica la password usando una chiave univoca.
      if($stmt->num_rows == 1) {
         // verifichiamo che non sia disabilitato in seguito all'esecuzione di 10 tentativi di accesso errati.
         if(checkbrute($user_id, $mysqli, 5) == true) {
            // Account disabilitato
            $mysqli->query("UPDATE users SET locked=1 WHERE user_id =".$user_id);
            header('Location: ./ACCOUNT_LOCKED');
            // Invia un e-mail all'utente avvisandolo che il suo account è stato disabilitato.
         } else {
         if($db_password == $password) {
            // Password corretta!
               $user_browser = $_SERVER['HTTP_USER_AGENT']; // Recupero il parametro 'user-agent' relativo all'utente corrente.

               $user_id = preg_replace("/[^0-9]+/", "", $user_id); // ci proteggiamo da un attacco XSS
//VARIABILI DI SESSIONE
               $_SESSION['user_id'] = $user_id;
               $_SESSION['login_string'] = hash('sha512', $password.$user_browser);
               $_SESSION['user_type'] = $user_type;
               $_SESSION['email'] = $email;
//VARIABILI DI SESSIONE
               return true;
         } else {
            // Password incorretta.
            // Registriamo il tentativo fallito nel database.
            $now = time();
            $mysqli->query("INSERT INTO login_attempts (user_id, time) VALUES ('$user_id', '$now')");
            header('Location: ./WRONG_ATTEMPT');
         }
      }
      } else {
         header('Location: ./Register.php');
      }
   }
}

function checkbrute($user_id, $mysqli, $max_attempts) {
   // Recupero il timestamp
   $now = time();
   // Vengono analizzati tutti i tentativi di login a partire dalle ultime due ore.
   $valid_attempts = $now - (2 * 60 * 60);
   if ($stmt = $mysqli->prepare("SELECT time FROM login_attempts WHERE user_id = ? AND time > '$valid_attempts'")) {
      $stmt->bind_param('i', $user_id);
      // Eseguo la query creata.
      $stmt->execute();
      $stmt->store_result();
      // Verifico l'esistenza di più di  $max_attempts tentativi di login falliti.
      if($stmt->num_rows > $max_attempts) {
         return true;
      } else {
         return false;
      }
   }
}


function DB_check($mysqli) {
   // Verifica che tutte le variabili di sessione siano impostate correttamente
   if(isset($_SESSION['user_id'], $_SESSION['login_string'])) {
     $user_id = $_SESSION['user_id'];
     $login_string = $_SESSION['login_string'];
     $user_browser = $_SERVER['HTTP_USER_AGENT']; // reperisce la stringa 'user-agent' dell'utente.
     if ($stmt = $mysqli->prepare("SELECT password FROM users WHERE user_id = ? LIMIT 1")) {
        $stmt->bind_param('i', $user_id); // esegue il bind del parametro '$user_id'.
        $stmt->execute(); // Esegue la query creata.
        $stmt->store_result();

        if($stmt->num_rows == 1) { // se l'utente esiste
           $stmt->bind_result($password); // recupera le variabili dal risultato ottenuto.
           $stmt->fetch();
           $login_check = hash('sha512', $password.$user_browser);
           if($login_check == $login_string) {
              // Login eseguito!!!!
              return true;
           } else {
              return false;
           }
        } else {
            return false;
        }
     } else {
        return false;
     }
   } else {
     return false;
   }
}

function login_check($mysqli) {
    if(!DB_check($mysqli)){
        unset($_SESSION['user_id']);
        unset($_SESSION['login_string']);
        unset($_SESSION['email']);
    }
}

//TO BE CALLED AFTER CHECK LOGIN
function is_logged(){
    return isset($_SESSION['user_id']);
}



 ?>
