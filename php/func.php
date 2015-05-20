<?php
    $server='localhost';  // serveri I Databazes
	$db='unishk';  // Databaza
	$dbuser='root';  // perdorues I Databazes
	$dbpas='';  // paswordi I Databazes
	function lidhu(){return new PDO('mysql:host=localhost;dbname=unishk', 'root', '');}
    function exec_query($query,$lidhja){$res=$lidhja->prepare($query);$res->execute();return $res->FetchAll();} // Funksion qe ekzekuton dhe kthen rezultatin ne nje assoc array ku indexet jane emrat e kolonave ne mysql psh . arr[nr_rreshti]['emer_kolone']
    function shfaq_koken_e_faqes($kat,$skripte){// kat do ta perdorim si "title" i html dhe $skripte kur dona me perdor skripte shtese si ne rasin e profili.php ku i shtojme nje css
    	?>
    	      <html>
                   <head>
                       <title><?php echo $kat.' | student site';// printojme titullin e faqes ?></title>              
                       <link href='css/stile_kryesore.css' rel='stylesheet' type='text/css'>
                  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
                       <script src="js/skripte.js"></script>
                       <?php echo $skripte; // printojme skriptet shtese ?>
                   </head>
                   <body>
                        <div class="header-container">
<div class="header" >
<div class="divlogo">
students site
</div>
<div class="divnav">


<ul>



     <?php if($GLOBALS["perd"]==-1)echo "<li><a href='hyr.php?pageid=kycu' id='kycu'>Kycuni</a></li>";

           else echo "<li><a href='student.php?student=".$GLOBALS["perd"][0]['stud_id']."' id='kycu'>". $GLOBALS["perd"][0]['s_emri']." ".$GLOBALS["perd"][0]['s_mbiemri'] ."</a><ul><li><a href='dil.php'>Dil !</a></li></ul></li>";  ?>

<li>
     <a id="informacion"href="index.php?pageid=informacion">Informacion</a>
       <ul>
	   <li><a id="rrethnesh" href="rrethnesh.php">Rreth nesh</a></li>
	   <li><a id="kontakt" href="#">Kontakt</a></li>
	   </ul>
</li>
<li>
<a id="studentet" href="studentet.php?pageid=studentet">Studentet</a>
<ul>
	   <li><a id="shkencanatyrore" href="#">Informatik</a></li>
	   <li><a id="shkencashoqerore"href="#">Bio-Kimi</a></li>
	   </ul>
</li><li>
<a id="faqjakryesore" href="index.php">Faqja Kryesore</a></li>
</ul>
    
</div>
</div>

</div>
    	<?php
    	
    }
    function shfaq_footer($skripte){
    	?> <div class="footer">
<div class="sitefooterinfodiv">

</div>
<div class="copyrightdiv">

<h5>Copyright( M.Piranej , M.Curoviq ,B.Bajraktari ) 2015</h5>
</div>
</div>
<?php echo $skripte;  ?>
</body></html><?php // kthen footerin ne menyre qe te printohet
    }
    
?>