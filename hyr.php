<?php
     include 'php/func.php';

	 $kat="Login ";
     $admin=-1;
	 $perd=-1;
	 $lidhja=lidhu();
	 $dege=exec_query("select * from dege join fakultet on d_fakultet=f_id", $lidhja);
	 if(empty($dege))$dege=-1;
	 
	 
	 shfaq_koken_e_faqes($kat,"");
?>
<div class='content' id="login_id">

   <div class='logindivcontainerleft'>
       <div class='logindivinfo'>
           informacion per rregjistrimin e studentave 
       </div>
    </div>
<div class='logindivcontainerright'><div class='logindiv'><form action='kontrollo_hyrjen.php' method='post'>


<input type='text' name='email' id='username' placeholder='Email'></br><input type='password' name='pas' id='password' placeholder='Fjalkalimi'><br>

<input type='button' name='forgotpassbtn' id='forgotpassbtn' value='Keni harruar fjalkalimin?'>
<input type='submit' name='loginbtn' id='loginbtn' value='Hyr'>
</form>
</div>
</div>
</div>

<?php
   shfaq_footer("");
?>