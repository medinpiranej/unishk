<?php
     include 'php/func.php';
     
 
     session_start();
     $lidhja=lidhu();
    // ndryshimi i te dhenave te studentit #################################################################
     //kontrollojem a eshte i loguar klienti qe don me ba nji modifikim te dhenash
        if((isset($_POST["input_ws"]))&&(isset($_POST["input_cel"]))&&(isset($_POST["input_email"]))&&(isset($_POST["input_emri"]))&&(isset($_POST["input_adr"]))&&(isset($_POST["input_dekani"]))&&(isset($_POST["input_fakulteti"]))){
		
		 $input_cel=$_POST["input_cel"];
		 $input_email=$_POST["input_email"];
		 $input_emri=$_POST["input_emri"];
		 $input_adr=$_POST["input_adr"];
		 $input_ws=$_POST["input_ws"];
		 $input_dekani=$_POST["input_dekani"];
		 $input_fakulteti=$_POST["input_fakulteti"];
		 
		
		   if(isset($_SESSION["admin"]))$admin=$_SESSION["admin"];
     else header("location: admin.php?abuzim_me_te_drejtat=true"); 
     
	
	 
	  $admin_tmp=exec_query("Select * from admin where a_id=".$admin[0]["a_id"], $lidhja);
	  if(!empty($admin_tmp))if($admin_tmp[0]["a_pas"]!=$admin[0]["a_pas"])header("Location: dil.php"); // nqs paswordi eshte ndryshu
    
    exec_query("INSERT INTO dege (`d_emri`, `d_email`, `d_cel`, `d_adr`, `d_ws`, `d_dekan`, `d_fakultet`) VALUES ('{$input_emri}','{$input_email}','{$input_cel}', '{$input_adr}', '{$input_ws}', '{$input_dekani}', '{$input_fakulteti}');", $lidhja);
  //echo "INSERT INTO `unishk`.`admin` (`a_emri`, `a_mbiemri`,  `a_email`, `a_pas`, `a_cel`, `a_adr`, `a_gjinia`, `a_ditelindja`, `a_ws`, `a_puna`, `a_foto`) VALUES ('{$input_emri}', '{$input_mbiemri}','{$input_email}', '{$input_pas1}', '{$input_cel}', '{$input_adr}','{$input_gjinia}', '{$ditelindja}', '{$input_ws}', '{$input_puna}','img/def_profile_pic.jpg');";
  header("location: admin.php"); 
   
    }else   header("location: index.php?abuzim_me_te_drejtat=true");?>