<?php
     include '/php/func.php';
     if(isset($_COOKIE["lg"]))$perd=$_COOKIE["lg"]; // Kontrollojme nqs ndonje perdorues eshte i loguar
	 else $perd=-1;
	 
	 if(isset($_GET["emri"]))$kerk=$_GET["emri"];  // kontrollojme nqs eshte duke u kerkuar ndonje student me emer
	 else $kerk=-1;
	 
	 if(isset($_GET["student"]))$stud=$_GET["student"];  // kontrollojme nqs eshte duke u kerkuar ndonje student me id
	 else $stud=-1;
	 
	 if(isset($_GET["login"]))shfaq_login();
	 else if(($kerk==-1)&&($stud==-1))shfaq_kerkim();
	 else if($stud!=-1){
	 	
	 }

?>