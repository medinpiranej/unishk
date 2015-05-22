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
         
        if(isset($_SESSION["admin"]))$admin=$_SESSION["admin"];
        else header("location: index.php?abuzim_me_te_drejtat=true"); 
            
         
        $admin_tmp=exec_query("Select * from admin where a_id=".$admin[0]["a_id"], $lidhja);
		
		if(!empty($admin_tmp))if($admin_tmp[0]["a_pas"]!=$admin[0]["a_pas"])header("Location: dil.php"); // nqs tentohet te ndryshohet paswordi kur perdoruesi nuk ekz ose kur perdoruesi e ka ndryshu
              
    if($admin[0]["a_pas"]==$pas_ekz){
    	if ($pas_i_ri==$pas_i_ri2) {
			exec_query("update admin set a_pas='{$pas_i_ri}' where `a_id`=".$admin[0]["a_id"], $lidhja);
            $_SESSION["admin"]=exec_query("Select * from admin where a_id=".$admin[0]["a_id"], $lidhja);
        }else header("Location: dil.php");
		
    }else header("Location: dil.php");

    
    header("location: admin.php?admin=".$admin[0]["a_id"]); 
   
    }else header("location: index.php?abuzim_me_te_drejtat=true"); 
    
    // ndryshimi i te dhenave adr ,cel , email #################################################################
         
         

?>