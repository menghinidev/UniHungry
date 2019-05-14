<?php
$id = $_SESSION['user_id'];
$sql = "SELECT * FROM orari_giornalieri WHERE id_fornitore = $id";
$result = $mysqli->query($sql);
$_SESSION['day'] = 'lunedi';
while ($row = $result->fetch_assoc()) {
  $day = $row['giorno_settimana'];
  $orarioInizio[$day]['apertura'] = substr_replace($row['apertura'] ,"",-3);
  $orarioFine[$day]['chiusura'] = substr_replace($row['chiusura'] ,"",-3);
  if (isset($row['inizio_pausa'])) {
    $orarioInizioPausa[$day]['inizio_pausa'] = substr_replace($row['inizio_pausa'] ,"",-3);
    $orarioFinePausa[$day]['fine_pausa'] = substr_replace($row['fine_pausa'] ,"",-3);
  }
}

 ?>
