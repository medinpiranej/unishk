<?php
     include 'php/func.php';
     
 
     session_start();
     $lidhja=lidhu();
    // ndryshimi i te dhenave te studentit #################################################################
     //kontrollojem a eshte i loguar klienti qe don me ba nji modifikim te dhenash
        if((isset($_POST["input_gjinia"]))&&(isset($_POST["input_dega"]))&&(isset($_POST["input_pas1"]))&&(isset($_POST["input_pas2"]))&&(isset($_POST["input_cel"]))&&(isset($_POST["input_email"]))&&(isset($_POST["input_emri"]))&&(isset($_POST["input_mbiemri"]))&&(isset($_POST["input_ditelindja_dita"]))&&(isset($_POST["input_ditelindja_muaji"]))&&(isset($_POST["input_ditelindja_viti"]))&&(isset($_POST["input_adr"]))){
		
		 $dita=$_POST["input_ditelindja_dita"];
		 $muaji=$_POST["input_ditelindja_muaji"];
		 $viti=$_POST["input_ditelindja_viti"];
		 $input_cel=$_POST["input_cel"];
		 $input_email=$_POST["input_email"];
		 $input_emri=$_POST["input_emri"];
		 $input_mbiemri=$_POST["input_mbiemri"];
		 $input_adr=$_POST["input_adr"];
		 $input_pas1=$_POST["input_pas1"];
		 $input_pas2=$_POST["input_pas2"];
		 $input_dega=$_POST["input_dega"];
		 $input_gjinia=$_POST["input_gjinia"];
         $ditelindja=0;
		 
        if(isset($_SESSION["admin"]))$admin=$_SESSION["admin"];
        else header("location: index.php?abuzim_me_te_drejtat=true"); 
          
		  // Perpunohet ditelindja per te shmangur gabimet e mundshme
		if(is_numeric($viti)){
			if(($viti<1900)||($viti>2020))$ditelindja="1900-";
			else $ditelindja="{$viti}-";
		}else $ditelindja="1900-";
		if(is_numeric($muaji)){
			if(($muaji<=0)||($muaji>12))$ditelindja.="01-";
			else $ditelindja.="{$muaji}-";
		}else $ditelindja.="01-";	
		if(is_numeric($dita)){
			if(($dita<=0)||($dita>31))$ditelindja.="01";
			else $ditelindja.="{$dita}";
		}else $ditelindja.="01";	
			//    ##########################################################
		
		  
     if(isset($_SESSION["admin"]))$admin=$_SESSION["admin"];
     else header("location: admin.php?abuzim_me_te_drejtat=true"); 
     
	  if($input_pas1!=$input_pas2)header("location: dil.php");
	 
	  $admin_tmp=exec_query("Select * from admin where a_id=".$admin[0]["a_id"], $lidhja);
	  if(!empty($admin_tmp))if($admin_tmp[0]["a_pas"]!=$admin[0]["a_pas"])header("Location: dil.php"); // nqs paswordi eshte ndryshu
    
    exec_query("INSERT INTO student (`s_emri`, `s_mbiemri`, `s_dega`, `s_email`, `s_pas`, `s_cel`, `s_adr`, `s_gjinia`, `s_ditelindja`, `s_foto`)VALUES ('{$input_emri}', '{$input_mbiemri}','{$input_dega}','{$input_email}', '{$input_pas1}', '{$input_cel}', '{$input_adr}','{$input_gjinia}', '{$ditelindja}','img/def_profile_pic.jpg');", $lidhja);
    header("location: admin.php"); 
   
    }else header("location: index.php?abuzim_me_te_drejtat=true");?>