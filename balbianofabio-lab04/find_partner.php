<?php
/*
  sfruttando alcune funzioni di function_helper.php, effettua tutti i controlli necessari per risalire alle anime gemelle;
  ogni volta che ne viene trovata una, viene creato un array contenente i dati di questa, il quale viene aggiunto a $partner_list.
  $partener_list è quindi un array di array, dove ogni array rappresenta un partenr ideale con i suoi dati.
*/
function find_partner($file, $user_data) {
  $partner_list = array(); #array di array contentente tutti i partner ideali per l'utente loggato
  foreach (file($file) as $user) {
    list($username, $gender, $age, $personality_type, $os, $min_partner_age, $max_partner_age, $partner_gender) = explode(",", $user);
    $controll_affinity = compare_gender($user_data[7], $gender)&&compare_age($user_data[5], $user_data[6], $age)&&compare_os($user_data[4], $os)&&compare_pers($user_data[3], $personality_type);
    if($controll_affinity) {
      $partner_list[] = array($username, $gender, $age, $personality_type, $os);
    }
  }
  return $partner_list;
}
?>
