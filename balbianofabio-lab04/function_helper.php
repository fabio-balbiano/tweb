<?php
/*
  function_helper.php: file contenente un insieme di funzioni che vengono richiamate in matches-submit.php;
  la sua funzionalità è quella di svincolare il file contenente codice html, da codice che ne appesantirebbe la lettura.
*/


#per eliminare spazi di inizio e fine parola, che altrimenti invalideranno i controlli per trovare l'anima gemella
function delete_space($user_data) {
  for($i = 0; $i<count($user_data); $i++) {
    $user_data[$i] = trim($user_data[$i]);
  }
  return $user_data;
}

#conta quante lettere in $str1 e $str2 nelle stesse posizioni sono uguali; compara due personalità di profili differenti
function compare_pers($str1, $str2) {
    $count = 0;
    $res = false;
    for($i = 0; $i<=3; $i++) {
      if(!strcmp($str1[$i],$str2[$i])) {
        $count++;
      }
    }
    if($count>=1) {
      $res = true;
    }
    return $res;
}

#restituisce 1(true) se la persona rispecchia il sesso desiderato, ""(false) altrimenti
function compare_gender($gen1, $gen2) {
  if(!strcmp($gen1,$gen2)) {
    $res = true;
  } else {
    $res = false;
  }
  return $res;
}

#verifica la compatibilità di età tra due profili
function compare_age($min_age, $max_age, $partner_age) {
  $res = false;
  if(($partner_age>=$min_age)&&($partner_age<=$max_age)) {
    $res = true;
  }
  return $res;
}

#verifica che i due utenti abbiano come OS preferito lo stesso, vincolo indispensabile per trovare l'anima gemella
function compare_os($os1, $os2) {
  $res = false;
  if(!strcmp($os1,$os2)) {
    $res = true;
  }
  return $res;
}

?>
