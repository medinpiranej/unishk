<html>

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
	   <li><a id="studentnamenav" >Emer studenti</a      ></li>
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
  						<p>Emri i plote<input type="text" class="disablettext" readonly id="emriplote" placeholder		="emri i studentit"></p>
 					 </div>
   					 <div id="te_dhenat_personale_div">
  					<p>Dega<input type="text" class="disablettext" readonly id="dega" placeholder="informatike"></p>
  					</div>
    				<div id="te_dhenat_personale_div">
  					<p>Adresa<input type="text" class="disablettext"readonly id="adresa" placeholder="shkoder"></p>
  					</div>
                    <div id="te_dhenat_personale_div">
  					<p>Tema e diplomes<input type="text" class="disablettext"readonly id="adresa" placeholder="teme diplome"></p>
  					</div>
                     <div id="te_dhenat_personale_div">
  					<p>Datelindja<input type="text" class="disablettext"readonly id="adresa" placeholder="21/03/1994"></p>
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