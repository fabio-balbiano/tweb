<?php include("top.html"); ?>
<!--questa pagina riceve i dati da signup.php di un utente che desidera registrarsi, e va ad inserire l'utente in singles.txt-->
<p><strong>Thank you!</strong></p>
<?php include("register_user.php"); ?>
<p>Welcome to NerdLuv, <?=$name?>!</p>
<p>Now <a href="matches.php">log in to see your matches!</a></p>

<?php include("bottom.html"); ?>
