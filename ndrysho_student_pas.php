<?php
     include 'php/func.php';
     
 
     session_start();
     $lidhja=lidhu();
    // ndryshimi i te dhenave te studentit #################################################################
     //kontrollojem a eshte i loguar klienti qe don me ba nji modifikim te dhenash
     if(isset($_POST["src"])&&(isset($_POST["s_id"]))&&(isset($_POST["pas_ekz"]))&&(isset($_POST["pas_i_ri"]))&&(isset($_POST["pas_i_ri2"]))){
         $src=$_POST["src"];
		 $pas_ekz=$_POST["pas_ekz"];
		 $pas_i_ri=$_POST["pas_i_ri"];
		 $pas_i_ri2=$_POST["pas_i_ri"];
         if($_POST["src"]=="admin"){
             if(isset($_SESSION["admin"]))$admin=$_SESSION["admin"];
             else header("location: index.php?abuzim_me_te_drejtat=true"); 
             $perd=-1;
         }else if($_POST["src"]=="student") {
             if(isset($_SESSION["perdorues"]))$perd=$_SESSION["perdorues"];
             else header("location: index.php?abuzim_me_te_drejtat=true"); 
             $admin=-1;
         }
              
     if($perd!=-1)$perd=exec_query("Select * from student where stud_id=".$perd[0]["stud_id"], $lidhja);//
     else $perd=exec_query("Select * from student where stud_id=".$_POST["s_id"], $lidhja);
     
     if(empty($perd))
        if($src="admin")header("Location: admin.php?gabim_ne_nderrimin_e_te_dhenave=".$_POST["s_id"]);
        else header("Location: index.php?gabim_ne_nderrimin_e_te_dhenave=".$_POST["s_id"]);

    if($perd[0]["s_pas"]==$pas_ekz){
    	if ($pas_i_ri==$pas_i_ri2) {
			exec_query("update student set s_pas='{$pas_i_ri}' where `stud_id`=".$perd[0]["stud_id"], $lidhja);
        }else header("Location: dil.php");
		
    }else header("Location: dil.php");

    
   if($src=="student")header("location: student.php?student=".$perd[0]["stud_id"]);
   else header("location: admin_student.php?student=".$perd[0]["stud_id"]); 
   
    }else header("location: index.php?abuzim_me_te_drejtat=true"); 
    
    // ndryshimi i te dhenave adr ,cel , email #################################################################
         
         

?>