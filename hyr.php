<?php
     include 'php/func.php';
<<<<<<< HEAD

	 $kat="Login ";

	 $perd=-1;
	 shfaq_koken_e_faqes($kat,"");
?>
<div class='content' id="login_id">
=======
     $kat="Login ";
	 $perd=-1;
	 shfaq_koken_e_faqes($kat,"");
?>
    	<div class='content' id="login_id">
>>>>>>> bba318064182a0abc3d35318f51e980452df9ee9
   <div class='logindivcontainerleft'>
       <div class='logindivinfo'>
           informacion per rregjistrimin e studentave 
       </div>
    </div>
<div class='logindivcontainerright'><div class='logindiv'><form action='login.php' method='post'>
<<<<<<< HEAD
<input type='text' name='emri' id='username' placeholder='Emri i perdoruesit '></br><input type='password' name='pas' id='password' placeholder='Fjalkalimi'><br>
=======
<input type='text' name='email' id='username' placeholder='Email'></br><input type='password' name='pas' id='password' placeholder='Fjalkalimi'><br>
>>>>>>> bba318064182a0abc3d35318f51e980452df9ee9
<input type='button' name='forgotpassbtn' id='forgotpassbtn' value='Keni harruar fjalkalimin?'>
<input type='submit' name='loginbtn' id='loginbtn' value='Hyr'>
</form>
</div>
</div>
</div>

<?php
   shfaq_footer("");
?>