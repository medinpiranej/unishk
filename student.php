<?php 
    include 'php/func.php';
    if(isset($_COOKIE["lg"]))$perd=$_COOKIE["lg"]; // Kontrollojme nqs ndonje perdorues eshte i loguar
	else $perd=-1;   
    
    if(!isset($_GET["student"]))header("Location: index.php");// nqs nuk jemi duke kerkuar e redirektojm kete faqe
    $stud_id=$_GET["student"];
    $lidhja=lidhu();
	
    $student=exec_query("Select * from student where stud_id=$stud_id", $lidhja);
	
	if(empty($student))header("Location: index.php?studenti_nuk_ekziston=true");// nqs studenti nuk ekziston e redirektojm kete faqe
    
    $kat=$student[0]["emri"]." ".$student[0]["mbiemri"];
	
	shfaq_koken_e_faqes($kat,"<link href='css/cssEprofilit.css' rel='stylesheet' type='text/css'>");
  ?>
<!--<html>   // punim per tu diskutuar ##################

<head>
<title>Studens Site</title>


<link href="css/stile_kryesore.css" rel="stylesheet" type="text/css">
<link href="css/cssEprofilit.css" rel="stylesheet" type="text/css">
<script src="js/jquerylib.js"></script>
<script src="js/skriptiJquery.js" type="text/javascript" ></script>
</head>
<body>

<div class="header-container">
<div class="header" >
<div class="divlogo">
students site
</div>
<div class="divnav">


<ul>
  <li><a id="butonprofili" href="index.php?login=true&pageid=kycu">Dilni <img id="atagfoto"src="img/def_profile_pic.jpg" alt="foto profili" ></a>
  <ul id="fotoprofiliUL">
	   <li><a id="studentnamenav" >emri i loguar</li>
	   <li><a href="#">Dilni</a></li>
	   </ul>
  </li>
  <li>
     <a id="tedhenat" href="tedhenat.php?pageid=tedhenat">Te Dhenat</a>
       
</li>
<li>
<a id="studentet" href="studentet.php?pageid=studentet">Studentet</a>
<ul>
	   <li><a href="#">Shkenca Natyrore</a></li>
	   <li><a href="#">Shkenca Shoqerore</a></li>
	   </ul>
</li>
<li> <a href="tedhenat.php">Profili</a></li>
</ul>
    
</div>
</div>

</div>
-->

<div class="content" >
  <div class="tedhenatcontainer">

  			<div class="leftdiv">
  					<div id="profileheaderlabel">
					Fotoja e profilit<input type="button" id="ndryshofotobtn" value="Ndrysho foton">
  					</div>
  					<div id="profpiccont">
  					<img src="img/def_profile_pic.jpg" >
  					</div>
  
  					<div id="uploadprofilepic">
 					 <input type="text"  id="upload_pic_path" value="Asnje foto e perzgjedhur .." readonly="true">
 					 <input type="button"  id="ngarko" value="Ngarko">
  					<input type="button"   id="anulo" value="Anulo">
  					</div>
  
  
 			 </div>
  			<div class="rightdiv">
  					<div id="profileheaderlabel">
  					Te dhenat personale
  					</div>
  					<div id="te_dhenat_personale_div">
  						<p>Emri i plote<input type="text" class="disablettext" readonly id="emriplote" value=<?php echo "'".$student[0]["emri"]." ".$student[0]["mbiemri"]."'";   ?>"></p>
 					 </div>
   					 <div id="te_dhenat_personale_div">
  					<p>Dega<input type="text" class="disablettext" readonly id="dega" value=<?php echo "'".$student[0]["dega"]."'"; ?>  ></p>
  					</div>
    				<div id="te_dhenat_personale_div">
  					<p>Adresa<input type="text" class="disablettext"readonly id="adresa" value=<?php echo "'".$student[0]["adresa"]."'"; ?>></p>
  					</div>
                    <div id="te_dhenat_personale_div">
  					<p>Tema e diplomes<input type="text" class="disablettext"readonly id="adresa" value=<?php echo "'".$student[0]["tema_diplomes"]."'"; ?>></p>
  					</div>
                     <div id="te_dhenat_personale_div">
  					<p>Datelindja<input type="text" class="disablettext"readonly id="adresa" value="mosha per te plotesu" ></p>
  					</div>
                      <div id="ndryshofjalkalimindiv">
                    <p id="ndryshofjalkalimintext" >Ndrysho fjalkalimin</p>
                    </div>
                     <div id="ndryshofjalkalimindiv2">
  								
                    
                   			 <div id="ndryshofjalkalimin_kutite">
                   				 <p  >Fjalkalimi i vjeter</p>
                    			<input type="password"  id="old_pass">
                   					 <p  >Fjalkalimi i ri</p>
                    			<input type="password"  id="new_pass">
                    			<p  >Kofirmo fjalkalimin e ri</p>
                   					 <input type="password"  id="confirm_pass">
                    
                    <input type="button" value="Ruaj"  id="ruaj">
                    <input type="button" value="Anullo"  id="anullo_pass">
                    				</div>
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