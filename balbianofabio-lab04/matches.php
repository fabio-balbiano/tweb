<?php include("top.html"); ?>
<!--Una volta registrato , un utente puo cercare l'anima gemella e lo fa tramite questa pagina, inserendo il suo nome in un form-->
<form action="matches-submit.php" method="get">
 <fieldset>
   <legend>Returning User:</legend>
   <div>
      <p>
         <strong>Name: </strong><label><input type="text" name="name_log" size="16" required/></label>
      </p>
      <p>
         <label><input type="submit" value="View My Matches"></label>
      </p>
   </div>
 </fieldset>
</form>


<?php include("bottom.html"); ?>
