<?php
     include 'php/func.php';
     
 
     session_start();
     $lidhja=lidhu();
    // ndryshimi i te dhenave te studentit #################################################################
     //kontrollojem a eshte i loguar klienti qe don me ba nji modifikim te dhenash
        if((isset($_POST["input_cel"]))&&(isset($_POST["s_id"]))&&(isset($_POST["input_email"]))&&(isset($_POST["input_emri"]))&&(isset($_POST["input_mbiemri"]))&&(isset($_POST["input_ditelindja_dita"]))&&(isset($_POST["input_ditelindja_muaji"]))&&(isset($_POST["input_ditelindja_viti"]))&&(isset($_POST["input_adr"]))){
		 $dita=$_POST["input_ditelindja_dita"];
		 $muaji=$_POST["input_ditelindja_muaji"];
		 $viti=$_POST["input_ditelindja_viti"];
		 $input_cel=$_POST["input_cel"];
		 $input_email=$_POST["input_email"];
		 $input_emri=$_POST["input_emri"];
		 $input_mbiemri=$_POST["input_mbiemri"];
		 $input_adr=$_POST["input_adr"];
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
     
	 if(isset($_POST["s_id"])){if(!is_numeric($_POST["s_id"])) header("location: admin.php?abuzim_me_te_drejtat=true");}else header("location: admin.php?abuzim_me_te_drejtat=true");
     $perd=exec_query("Select * from student where stud_id=".$_POST["s_id"], $lidhja);
	 
	 $student_admin=exec_query("Select * from student_admin where s_a_admin={$admin[0]["a_id"]} and s_a_student=".$perd[0]["stud_id"], $lidhja);
     if(empty($student_admin))header("Location: index.php?gabim_ne_nderrimin_e_fotos");
    
	 
	  $admin_tmp=exec_query("Select * from admin where a_id=".$admin[0]["a_id"], $lidhja);
	  if(!empty($admin_tmp))if($admin_tmp[0]["a_pas"]!=$admin[0]["a_pas"])header("Location: dil.php"); // nqs paswordi eshte ndryshu
       
     
     if(empty($perd))header("Location: index.php?gabim_ne_nderrimin_e_fotos");
     
    exec_query("update student set s_emri='{$input_emri}',s_mbiemri='{$input_mbiemri}',s_ditelindja='{$ditelindja}',s_cel='{$input_cel}',s_email='{$input_email}',s_adr='{$input_adr}' where `stud_id`=".$perd[0]["stud_id"], $lidhja);
    $_SESSION["perdorues"]=exec_query("Select * from student where stud_id=".$perd[0]["stud_id"], $lidhja);
   
   
   header("location: admin_student.php?student=".$perd[0]["stud_id"]); 
   
    }else header("location: index.php?abuzim_me_te_drejtat=true"); 
    
    // ndryshimi i te dhenave adr ,cel , email #################################################################
         
         

?>