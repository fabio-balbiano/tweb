<?php include("top.html"); ?>
<!--form di registrazione utente--> 
<form action="signup-submit.php" method="post">
 <fieldset>
   <legend>New User Signup:</legend>
   <div>
     <p>
        <strong>Name: </strong><label><input type="text" name="name" size="16" required/></label>
     </p>
     <p>
        <strong>Gender: </strong>
        <label><input type="radio" name="gender" value="M" />Male</label>
        <label><input type="radio" name="gender" value="F" checked="checked"/>Female</label>
     </p>
     <p>
        <strong>Age: </strong>
        <label><input type="text" name="age" size="6" maxlength="2" required/></label>
     </p>
     <p>
        <strong>Personality type: </strong>
        <label><input type="text" name="personality" size="6" maxlength="4" required/></label>
         (<a href="http://www.humanmetrics.com/cgi-win/JTypes2.asp" target="_blank">Don't know your type?</a>)
     </p>
     <p>
        <strong>Favorite OS: </strong>
        <label><select name="os">
           <option>Windows</option>
           <option>Mac OS X</option>
           <option selected="selected">Linux</option>
        </select></label>
     </p>
     <p>
        <strong>Seeking age: </strong>
        <label><input type="text" name="min_age" size="6" maxlength="2" placeholder="min" required/> to</label>
        <label><input type="text" name="max_age" size="6" maxlength="2" placeholder="max" required/></label>
     </p>
     <p>
        <strong>Partner Gender: </strong>
        <label><input type="radio" name="partner_gender" value="M" />Male</label>
        <label><input type="radio" name="partner_gender" value="F" checked="checked"/>Female</label>
     </p>
     <p>
        <label><input type="submit" value="Sign Up"></label>
     </p>
   </div>
 </fieldset>
</form>

<?php include("bottom.html"); ?>
