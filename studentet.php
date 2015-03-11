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
  </div>
  <div class="rightdiv">
  <div id="profileheaderlabel">
  Te dhenat personale
  </div>
  <div id="te_dhenat_personale_div">
  <p>Emri i plote<input type="text" readonly id="emriplote" placeholder="emri i studentit"></p>
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