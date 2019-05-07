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
        if($user_type == "Admin"){
            if ($insert_stmt = $mysqli->prepare("INSERT INTO admins (id_admin, nome, cognome, telefono) VALUES (?, ?, ?, ?)")) {
               $insert_stmt->bind_param('isss',$last_id ,$_POST['nome'] , $_POST['cognome'], $_POST['telefono']);
               if($insert_stmt->execute())
               {
                   #####AUTO LOGIN#####
                   if(login($email, $password, $mysqli) == true) {
                      header('Location: ./php/HomePage.php');
                   } else {
                      header('Location: NOT LOGGED');
                   }
               } else {
                   echo "ERROR";
               }

            }
        }
    }
    else {
       // Le variabili corrette non sono state inviate a questa pagina dal metodo POST.
       echo $_POST['email'], $_POST['pw'], $_POST['user_type'], $_POST['nome'], $_POST['cognome'], $_POST['telefono'];
    } ?>

</body>
</html>
