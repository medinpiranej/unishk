<?php 
    include 'php/func.php';
     
     session_start();
     
     if(isset($_SESSION["admin"]))$admin=$_SESSION["admin"];
     else header("Location: index.php?abuzim_me_te_drejtat=true");
     
	 $lidhja=lidhu();
	 
     $student=exec_query("Select * from student_admin join student on s_a_student=stud_id where s_a_admin={$admin[0]["a_id"]}", $lidhja);
    
     if(!empty($student))echo json_encode($student);
	 else echo json_encode(array(-1));	
?>