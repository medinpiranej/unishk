<?php
     include 'php/func.php';
     
 
     session_start();
     $lidhja=lidhu();
    // ndryshimi i te dhenave te studentit #################################################################
     //kontrollojem a eshte i loguar klienti qe don me ba nji modifikim te dhenash
     if(isset($_POST["src"])&&(isset($_POST["s_id"]))&&(isset($_POST["input_cel"]))&&(isset($_POST["input_email"]))&&(isset($_POST["input_adr"]))){
         $src=$_POST["src"];
		 $input_cel=$_POST["input_cel"];
		 $input_email=$_POST["input_email"];
		 $input_adr=$_POST["input_adr"];
         
             if(isset($_SESSION["perdorues"]))$perd=$_SESSION["perdorues"];
             else header("location: index.php?abuzim_me_te_drejtat=true"); 
            
      
              
     if($perd!=-1)$perd=exec_query("Select * from student where stud_id=".$perd[0]["stud_id"], $lidhja);
     
     if(empty($perd))
        header("Location: index.php?gabim_ne_nderrimin_e_te_dhenave=".$_POST["s_id"]);

    exec_query("update student set s_cel='{$input_cel}',s_email='{$input_email}',s_adr='{$input_adr}' where `stud_id`=".$perd[0]["stud_id"], $lidhja);
    $_SESSION["perdorues"]=exec_query("Select * from student where stud_id=".$perd[0]["stud_id"], $lidhja);
   
   header("location: student.php?student=".$perd[0]["stud_id"]);
   
   
    }else header("location: index.php?abuzim_me_te_drejtat=true"); 
    
    // ndryshimi i te dhenave adr ,cel , email #################################################################
         
         

?>