<?php
     include 'php/func.php';
     session_start();
     $lidhja=lidhu();
    // ndryshimi i te dhenave te studentit #################################################################
     //kontrollojem a eshte i loguar klienti qe don me ba nji modifikim te dhenash
     if((isset($_POST["pas_ekz"]))&&(isset($_POST["pas_i_ri"]))&&(isset($_POST["pas_i_ri2"]))){
		 $pas_ekz=$_POST["pas_ekz"];
		 $pas_i_ri=$_POST["pas_i_ri"];
		 $pas_i_ri2=$_POST["pas_i_ri"];
		 if(isset($_SESSION["perdorues"]))$perd=$_SESSION["perdorues"];
         else header("location: index.php?abuzim_me_te_drejtat=true"); 
     $perd=exec_query("Select * from student where stud_id=".$perd[0]["stud_id"], $lidhja);
     if(empty($perd))header("Location: index.php?gabim_ne_nderrimin_e_te_dhenave=".$_POST["s_id"]);
        $perd_tmp=exec_query("Select * from student where stud_id=".$perd[0]["stud_id"], $lidhja);
		if(!empty($perd_tmp))if($perd_tmp[0]["s_pas"]!=$perd[0]["s_pas"])header("Location: dil.php"); // nqs tentohet te ndryshohet paswordi kur perdoruesi nuk ekz ose kur perdoruesi e ka ndryshu
    if($perd[0]["s_pas"]==$pas_ekz){
    	if ($pas_i_ri==$pas_i_ri2) {
			exec_query("update student set s_pas='{$pas_i_ri}' where `stud_id`=".$perd[0]["stud_id"], $lidhja);
        }else header("Location: dil.php");
	}else header("Location: dil.php");
	header("location: student.php?student=".$perd[0]["stud_id"]);
    }else header("location: index.php?abuzim_me_te_drejtat=true"); 
    // ndryshimi i te dhenave adr ,cel , email #################################################################
?>