<?php
  #mi aspetto un messaggio http con una richiesta di tipo POST, dunque lo verifico
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    #salvataggio di tutti i dati ricevuti da signup.php in variabili, per favorire la leggibilità e chiarezza del codice
    $name = $_POST["name"];
    $gender = $_POST["gender"];
    $age = $_POST["age"];
    $personality_type = $_POST["personality"];
    $os = $_POST["os"];
    $min_age = $_POST["min_age"];
    $max_age = $_POST["max_age"];
    $partner_gender = $_POST["partner_gender"];
    #$new_user è una stringa contenente tutti i dati realtivi all'utente che si sta registrando
    $new_user = $name.",".$gender.",".$age.",".$personality_type.",".$os.",".$min_age.",".$max_age.",".$partner_gender."\r\n";
    #aggiunge a piè del file singles.txt il nuovo utente
    file_put_contents("singles.txt", $new_user, FILE_APPEND);
  }
?>
