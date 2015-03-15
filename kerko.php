<?php
     include 'php/func.php';
     if(isset($_GET["kerko"]))$kerkim=$_GET["kerko"];
	 else $kerkim=-1;
	 
	 $lidhja=lidhu();
	 
	 $persona=exec_query("select * from student where emri like '%{$kerkim}%'", $lidhja);
	 
     if(!empty($persona))echo json_encode($persona);
	 else echo json_encode( array(-1) );
	 
	 $lidhja=null;
?>