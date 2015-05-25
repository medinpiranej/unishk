<?php
     include 'php/func.php';
     session_start();
     $lidhja=lidhu();
    // ndryshimi i te dhenave te studentit #################################################################
     //kontrollojem a eshte i loguar klienti qe don me ba nji modifikim te dhenash
     if((isset($_POST["pas_i_ri"]))&&(isset($_POST["pas_i_ri2"]))){
		 $pas_i_ri=$_POST["pas_i_ri"];
		 $pas_i_ri2=$_POST["pas_i_ri"];
	
     if(isset($_SESSION["admin"]))$admin=$_SESSION["admin"];
     else header("location: admin.php?abuzim_me_te_drejtat=true"); 
     
	 if(isset($_POST["s_id"])){if(!is_numeric($_POST["s_id"])) header("location: admin.php?abuzim_me_te_drejtat=true");}else header("location: admin.php?abuzim_me_te_drejtat=true");
     $perd=exec_query("Select * from student where stud_id=".$_POST["s_id"], $lidhja);
	 
	 $student_admin=exec_query("Select * from student_admin where s_a_admin={$admin[0]["a_id"]} and s_a_student=".$perd[0]["stud_id"], $lidhja);
     // if(empty($student_admin))header("Location: index.php?gabim_ne_nderrimin_e_fotos");  kjo do ti lejoje te gjithe admina te modifikojne studentat ... duhet hequr kur te behet komplet funksionale ##################
    
    
	  $admin_tmp=exec_query("Select * from admin where a_id=".$admin[0]["a_id"], $lidhja);
	  if(!empty($admin_tmp))if($admin_tmp[0]["a_pas"]!=$admin[0]["a_pas"])header("Location: dil.php"); // nqs paswordi eshte ndryshu
       
     
     
     
   
    
    	if ($pas_i_ri==$pas_i_ri2) {
			exec_query("update student set s_pas='{$pas_i_ri}' where `stud_id`=".$_POST["s_id"], $lidhja);
        }else header("Location: dil.php");
	
	header("location: admin_student.php?student=".$perd[0]["stud_id"]);
    }else header("location: index.php?abuzim_me_te_drejtat=true"); 
    // ndryshimi i te dhenave adr ,cel , email #################################################################
?>