<?php // kontrollojme nqs perdoruesi eshte i loguar dhe nqs kredencialet e loginit jane derguar dhe nqs nuk jane i bajme redirekt ne index.php
session_start();
if((!isset($_SESSION["perdorues"]))&&(isset($_POST["email"],$_POST["pas"]))){
   include 'php/func.php';//perfshihet skedari me funksione
   $email=$_POST["email"]; // me von duhet ti shtojme funksione anti injektim dhe filtra te tjera
   $pas=$_POST["pas"]; // me vone duhet te bejme hashimin dhe skanimin per siguri
   try{
   $lidhja=lidhu();	 
      $student=exec_query("Select * from student where s_email='{$email}'", $lidhja);
	  if(!empty($student)){
	  	  if($student[0]["s_pas"]==$pas){
	  	  	$_SESSION["perdorues"]=$student;
	  	  	header("location: student.php?student={$student[0]["stud_id"]}");
		  }else header("Location:index.php?gabim_ne_login=true");
	  }else header("Location:index.php?gabim_ne_login=true");
   }catch(exception $e){
   	   echo "Gabim ne lidhje";
   }
}else header("Location: index.php");
?>