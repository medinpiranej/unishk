<?php
     include 'php/func.php';
     if(isset($_COOKIE["lg"]))$perd=$_COOKIE["lg"]; // Kontrollojme nqs ndonje perdorues eshte i loguar
	 else $perd=-1;
	 
	 if(isset($_GET["login"]))shfaq_login();
	 else shfaq_kerkim();
?>