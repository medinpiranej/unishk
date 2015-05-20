<?php // kontrollojme nqs perdoruesi eshte i loguar dhe nqs kredencialet e loginit jane derguar dhe nqs nuk jane i bajme redirekt ne index.php
session_start();
if((!isset($_SESSION["admin"]))&&(isset($_POST["email"],$_POST["pas"]))){
   include 'php/func.php';//perfshihet skedari me funksione
   $email=$_POST["email"]; // me von duhet ti shtojme funksione anti injektim dhe filtra te tjera
   $pas=$_POST["pas"]; // me vone duhet te bejme hashimin dhe skanimin per siguri
   try{
      $lidhja=lidhu();  
      $admin=exec_query("Select * from admin where a_email='{$email}'", $lidhja);
      if(!empty($admin)){
          if($admin[0]["a_pas"]==$pas){
          	if(isset($_SESSION["perdorues"])){session_destroy();session_start();}// fshijme nqs eshte i loguar si student
			$_SESSION["admin"]=$admin;
            header("location: admin.php");
          }else header("Location:hyr_admin.php?gabim_ne_login=true");
      }else header("Location:hyr_admin.php?gabim_ne_login=true");
   }catch(exception $e){
       echo "Gabim ne lidhje";
   }
}else header("Location:hyr_admin.php");
?>