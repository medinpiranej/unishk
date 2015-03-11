<?php
   include '/php/func.php';//perfshihet skedari me funksione
   if (!isset($_GET["student"]))header("location: index.php"); // nqs nuk kemi student id e cojme faqen ne index.php ku te kerkojme nje student
   $id=$_GET["student"];
   
   try{
   $lidhja=lidhu();
   
   $student=exec_query("Select * from student", $lidhja);
   
   if(empty($student))header("location: index.php?studenti_nuk_ekziston=true&src=student.php");// nqs nuk ka nje student me kete id i bejem redirekt te index.php ku gjithashtu me ane te "get" i cojme te dhena per kerkesen e "pazakonte"
   
   
   shfaq_koken_e_faqes($student[0]["emri"]." ".$student[0]["mbiemri"],"<link href='css/cssEprofilit.css' rel='stylesheet' type='text/css'>");

   }catch ( Exeption $ex){
   	   echo " Gabim";
   }
?>
<div class="content" >
  <div class="tedhenatcontainer">

  <div class="leftdiv">
  <div id="profileheaderlabel">
Fotoja e profilit<input type="button" id="ndryshofotobtn" value="Ndrysho foton">
  </div>
  <div id="profpiccont">
  <img src="img/def_profile_pic.jpg" >
  </div>
  </div>
  <div class="rightdiv">
  <div id="profileheaderlabel">
  Te dhenat personale
  </div>
  <div id="te_dhenat_personale_div">
  <p>Emri i plote<input type="text" readonly="true" id="emriplote" placeholder="emri i studentit"></p>
  </div>
  </div>
  </div>
</div>
<div class="footer">

<div class="copyrightdiv">

<h5>Copyright( M.Piranej , M.Curoviq ,B.Bajraktari ) 2015</h5>
</div>
</div>

</body>

</html>