<?php
#recupera tutti i dati di $username_log per salvarli in un array chiamato $user_data
function read_userLog_data($file, $username_log) {
  foreach (file($file) as $user) {
    list($username, $gender, $age, $personality_type, $os, $min_partner_age, $max_partner_age, $partner_gender) = explode(",", $user);
    if(!strcmp($username_log,$username)) {
      $user_data = array($username, $gender, $age, $personality_type, $os, $min_partner_age, $max_partner_age, $partner_gender);
      break;
    }
  }
  return $user_data;
}
?>
