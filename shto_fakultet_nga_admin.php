<?php
     include 'php/func.php';
     
 
     session_start();
     $lidhja=lidhu();
    // ndryshimi i te dhenave te studentit #################################################################
     //kontrollojem a eshte i loguar klienti qe don me ba nji modifikim te dhenash
        if((isset($_POST["input_ws"]))&&(isset($_POST["input_cel"]))&&(isset($_POST["input_email"]))&&(isset($_POST["input_emri"]))&&(isset($_POST["input_adr"]))&&(isset($_POST["input_dekani"]))){
		
		 $input_cel=$_POST["input_cel"];
		 $input_email=$_POST["input_email"];
		 $input_emri=$_POST["input_emri"];
		 $input_adr=$_POST["input_adr"];
		 $input_ws=$_POST["input_ws"];
		 $input_dekani=$_POST["input_dekani"];
		 
		
		   if(isset($_SESSION["admin"]))$admin=$_SESSION["admin"];
     else header("location: admin.php?abuzim_me_te_drejtat=true"); 
     
	
	 
	  $admin_tmp=exec_query("Select * from admin where a_id=".$admin[0]["a_id"], $lidhja);
	  if(!empty($admin_tmp))if($admin_tmp[0]["a_pas"]!=$admin[0]["a_pas"])header("Location: dil.php"); // nqs paswordi eshte ndryshu
    
    exec_query("INSERT INTO fakultet (`f_emri`, `f_email`, `f_cel`, `f_adr`, `f_ws`, `f_dekan`) VALUES ('{$input_emri}','{$input_email}','{$input_cel}', '{$input_adr}', '{$input_ws}', '{$input_dekani}');", $lidhja);
  header("location: admin.php"); 
   
    }else   header("location: index.php?abuzim_me_te_drejtat=true");?>