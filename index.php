<?php
     include '/php/func.php';
     if(isset($_COOKIE["lg"]))$perd=$_COOKIE["lg"]; // Kontrollojme nqs ndonje perdorues eshte i loguar
	 else $perd=-1;
	 
	 if(isset($_GET["emri"]))$kerk=$_GET["emri"];  // kontrollojme nqs eshte duke u kerkuar ndonje student
	 else $kerk=-1;
	 
	 if(isset($_GET["kat"]))$kat=$_GET["kat"]; // kontrollojme nqs eshte zgjedhure ndonje kat ... psh kur do te modifikohen te dhenat e perdoruesit ose ndonje gjwe tjeter
	 else $kat=-1;
	 
	 if(($kerk==-1)&&($perd==-1))shfaq_kerkim_logim();
	 

?>