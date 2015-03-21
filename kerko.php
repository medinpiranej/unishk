<?php
     include 'php/func.php';
     if(isset($_GET["kerko"]))$kerkim=$_GET["kerko"];
	 else $kerkim=-1;
	 
	 $lidhja=lidhu();
     if ($kerkim!=-1)$fjale=explode(" ",$kerkim);
     else $fjale=array("");
     
     $gjatesi=sizeof($fjale);
     switch ($gjatesi) {
         case 1:if(!stripos($kerkim,"@")) $persona=exec_query("select * from student where (s_emri like '%{$kerkim}%' or strcmp(soundex(s_emri), soundex('{$kerkim}')) = 0 or s_mbiemri like '%{$kerkim}%' or strcmp(soundex(s_mbiemri), soundex('{$kerkim}')) = 0)", $lidhja);
	            else $persona=exec_query("select * from student where (s_email like '%{$kerkim}%' or strcmp(soundex(s_email), soundex('{$kerkim}')) = 0)",$lidhja);
             break;
         case 2:$persona=exec_query("select * from student where (s_emri like '%{$fjale[0]}%' and s_mbiemri like '%{$fjale[1]}%') or (s_emri like '%{$fjale[1]}%' and s_mbiemri like '%{$fjale[0]}%') or ((strcmp(soundex(s_emri), soundex('{$fjale[0]}')) = 0) and (strcmp(soundex(s_mbiemri), soundex('{$fjale[1]}')) = 0)) or ((strcmp(soundex(s_emri), soundex('{$fjale[1]}')) = 0) and (strcmp(soundex(s_mbiemri), soundex('{$fjale[0]}')) = 0))", $lidhja);
             break;
     }
	 if(!empty($persona))echo json_encode($persona);
	 else echo json_encode( array(-1) );
	 $lidhja=null;
     ?>