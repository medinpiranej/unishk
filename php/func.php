<?php
    $server='localhost';  // serveri I Databazes
	$db='unishk';  // Databaza
	$dbuser='root';  // perdorues I Databazes
	$dbpas='';  // paswordi I Databazes
	function lidhu(){return new PDO('mysql:host=localhost;dbname=unishk;charset=utf8', 'root', '');}
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



     <?php if(($GLOBALS["perd"]==-1)&&($GLOBALS["admin"]==-1))echo "<li><a href='hyr.php?pageid=kycu' id='kycu'>Kycuni</a></li>";
           else if (($GLOBALS["perd"]!=-1)) echo "<li><a href='student.php?student=".$GLOBALS["perd"][0]['stud_id']."' id='kycu'>". $GLOBALS["perd"][0]['s_emri']." ".$GLOBALS["perd"][0]['s_mbiemri'] ."</a><ul><li><a href='dil.php'>Dil !</a></li></ul></li>"; 
           else if (($GLOBALS["admin"]!=-1)) echo "<li><a href='admin.php?admin=".$GLOBALS["admin"][0]['a_id']."'>". $GLOBALS["admin"][0]['a_emri']." ".$GLOBALS["admin"][0]['a_mbiemri'] ."</a><ul><li><a href='#' onclick='shfaq_listen_e_studentave()' >Studentat e mi</a></li><li><a href='log.php'>Log I faqes</a></li><li><a href='admin.php?admin=".$GLOBALS["admin"][0]['a_id']."'>Profili im</a></li><li><a href='dil.php'>Dil !</a></li></ul></li>";  ?>

<li>
     <a id="informacion"href="index.php?pageid=informacion">Informacion</a>
       <ul>
	   <li><a href="info_fakultetet.php">Rreth Fakulteteve</a></li>
	   <li><a href="rrethnesh.php">Rreth nesh</a></li>
	   </ul>
</li>
<li>
<a id="studentet" href="studentet.php?pageid=studentet">Studentet</a>
<ul>
	<?php 
	     if($GLOBALS["dege"]!=-1){
	     		for($i=0;$i<sizeof($GLOBALS["dege"]);$i++)echo "<li><a href='info.php?dege={$GLOBALS["dege"][$i]["d_id"]}'>{$GLOBALS["dege"][$i]["d_emri"]}</a></li>";
		 }else echo"<li><a href='shto.php?shto=dege'>shto nje dege</a></li>"
	
	?>
	   </ul>
</li>

<?php  if (($GLOBALS["admin"]!=-1)) { ?>

<li>
<a  href="ndrysho.php">Ndrysho</a>
<ul>
	   <li><a href="ndrysho.php?ndrysho=student">Student</a></li>
	   <li><a href="ndrysho.php?ndrysho=admin">Admin</a></li>
	   <li><a href="ndrysho.php?ndrysho=dege">Dege</a></li>
	   <li><a href="ndrysho.php?ndrysho=fakultet">Fakultet</a></li>
	   </ul>
</li>

<li>
<a id="shto" href="shto.php">Shto</a>
<ul>
	   <li><a href="shto.php?shto=student">Student</a></li>
	   <li><a href="shto.php?shto=admin">Admin</a></li>
	   <li><a href="shto.php?shto=dege">Dege</a></li>
	   <li><a href="shto.php?shto=fakultet">Fakultet</a></li>
	   </ul>
</li>

<?php } ?>

<li>
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