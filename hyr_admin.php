<?php
     include 'php/func.php';
     session_start();
     if(isset($_SESSION["admin"]))$admin=$_SESSION["admin"];
     else $admin=-1;
     
     if($admin!=-1)header("location: admin.php");

     $perd=-1;
     $kat="Login Admin ";

     shfaq_koken_e_faqes($kat,"");// te krijohet koka e faqes per adminat #########
?>
<div class='content' id="login_id">
Zona admin
   <div class='logindivcontainerleft'>
       <div class='logindivinfo'>
           informacion per rregjistrimin e administeratoreve dhe stafit te unishk
       </div>
    </div>
<div class='logindivcontainerright'><div class='logindiv'><form action='kontrollo_hyrjen_admin.php' method='post'>


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