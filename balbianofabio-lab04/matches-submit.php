<?php include("top.html"); ?>
<!--Questo file implementa la pagina php che ,una volta immesso in matches.php il nome di un single, analizza gli iscritti
alla piattaforma in cerca di persone a lui affini-->
<?php
  if ($_SERVER["REQUEST_METHOD"] == "GET") { #verifico che la richiesta HTTP sia di tipo GET, come voluto da specifiche
    $username_log = $_GET["name_log"];#$username_log contiene il nome del single sta cercando le persone a lui affini
    include("read_userLog_data.php");
    include("function_helper.php");
    include("find_partner.php");
    $user_data = read_userLog_data("singles.txt", $username_log);
    $user_data = delete_space($user_data);
    $partner_list = find_partner("singles.txt", $user_data);
?>

    <h1>Matches for <?=$user_data[0]?></h1>

<?php
    /*ciclo per generare la struttura html che conterrà il profilo di una singola anima gemella;
      in tal modo il codice risulta piu leggibile e meno ridondante.
    */
    for($i = 0; $i<count($partner_list); $i++) {
?>

      <div class="match">
        <p>
          <img src="http://www.cs.washington.edu/education/courses/cse190m/12sp/homework/4/user.jpg" alt="user_icon">
          <?=$partner_list[$i][0]?>
        </p>
        <ul>
          <li><strong>gender: </strong><?=$partner_list[$i][1]?></li>
          <li><strong>age: </strong><?=$partner_list[$i][2]?></li>
          <li><strong>type: </strong><?=$partner_list[$i][3]?></li>
          <li><strong>OS: </strong><?=$partner_list[$i][4]?></li>
        </ul>
      </div>

<?php
    }

  }
?>
<?php include("bottom.html"); ?>
