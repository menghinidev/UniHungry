<!DOCTYPE html>
<html>
<body>

    <?php
    require 'db_connect.php';
    require 'secure_func.php';
    sec_session_start(); // usiamo la nostra funzione per avviare una sessione php sicura
    if(isset($_POST['email'], $_POST['pw'], $_POST['user_type'], $_POST['nome'], $_POST['cognome'], $_POST['telefono'] )) {
        // Recupero i dati postati dal form
        $email = $_POST['email'];
        $password = $_POST['pw'];
        $user_type = $_POST['user_type'];

        // Crea una chiave casuale
        $random_salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
        // Crea una password usando la chiave appena creata.
        $password = hash('sha512', $password.$random_salt);

        if ($insert_stmt = $mysqli->prepare("INSERT INTO users (email, password, salt, user_type) VALUES (?, ?, ?, ?)")) {
           $insert_stmt->bind_param('ssss', $email, $password, $random_salt, $user_type);
           if($insert_stmt->execute())
           {
               $last_id = $mysqli->insert_id;
           }
       }
        ###INSERT PERSONAL DATA IN SPECIFIC TABLE###
        if($user_type == "Cliente"){
            if ($insert_stmt = $mysqli->prepare("INSERT INTO clienti  (id_cliente, nome, cognome, telefono) VALUES (?, ?, ?, ?)")) {
               $insert_stmt->bind_param('isss',$last_id ,$_POST['nome'] , $_POST['cognome'], $_POST['telefono']);
               if($insert_stmt->execute())
               {
                   #####AUTO LOGIN#####
                   if(login($email, $password, $mysqli) == true) {
                      header('Location: ../php/HomePage.php');
                   } else {
                      header('Location: NOT LOGGED');
                   }
               } else {
                   echo "ERROR";
               }

            }
        }
        else if($user_type == "Fornitore") {
            ####CREARE MODIFICA DA SOTTOPORRE AD APPROVAZIONE ADMIN###
            $query_modifica = "INSERT INTO fornitore  (id_fornitore, nome, cognome, telefono, nome_fornitore, descrizione_breve, indirizzo) VALUES ($last_id, {$_POST['nome']}, {$_POST['cognome']},{$_POST['telefono']}, {$_POST['nome_fornitore']}, {$_POST['descrizione_breve']}, {$_POST['indirizzo']})";

            $oggetto = "Registrazione fornitore {$_POST['nome_fornitore']} ";
            $descrizione = "{$_POST['descrizione_breve']}<\br> Il fornitore si trova in {$_POST['indirizzo']}";
            if ($insert_stmt = $mysqli->prepare("INSERT INTO modifiche  (oggetto, descrizione, query, id_fornitore) VALUES (?, ?, ?, ?)")) {
               $insert_stmt->bind_param('sssi', $oggetto, $descrizione, $query_modifica, $last_id);
               if($insert_stmt->execute())
               {
                  header('Location: CONFIRM')
               } else {
                   header('Location: ERROR');
               }
            }
        }
    }
    else {
       // Le variabili corrette non sono state inviate a questa pagina dal metodo POST.
       echo 'Invalid Request';
    } ?>

</body>
</html>
