<?php
     include 'php/func.php';
     if(isset($_GET["kerko"]))$kerkim=$_GET["kerko"];
	 else $kerkim=-1;
	 
	 $lidhja=lidhu();
     if ($kerkim!=-1)$fjale=explode(" ",$kerkim);
     else $fjale=array("");
     
     $gjatesi=sizeof($fjale);
     switch ($gjatesi) {
         case 1:if(stripos($kerkim,"@")==-1) $persona=exec_query("select * from student where (emri like '%{$fjale[0]}%' or strcmp(soundex(emri), soundex('{$fjale[0]}')) = 0 or mbiemri like '%{$fjale[0]}%' or strcmp(soundex(mbiemri), soundex('{$fjale[0]}')) = 0)", $lidhja);
	            else $persona=exec_query("select * from student where (email like '%{$kerkim}%' or strcmp(soundex(email), soundex('{$kerkim}')) = 0)",$lidhja);
             break;
         case 2:$persona=exec_query("select * from student where (emri like '%{$fjale[0]}%' and mbiemri like '%{$fjale[1]}%') or (emri like '%{$fjale[1]}%' and mbiemri like '%{$fjale[0]}%') or ((strcmp(soundex(emri), soundex('{$fjale[0]}')) = 0) and (strcmp(soundex(mbiemri), soundex('{$fjale[1]}')) = 0)) or ((strcmp(soundex(emri), soundex('{$fjale[1]}')) = 0) and (strcmp(soundex(mbiemri), soundex('{$fjale[0]}')) = 0))", $lidhja);
             break;
     }
	 
     if(!empty($persona))echo json_encode($persona);
	 else echo json_encode( array(-1) );
	 $lidhja=null;
     ?>