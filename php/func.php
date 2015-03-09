<?php
    $server='localhost';  // serveri I Databazes
	$db='unishk';  // Databaza
	$dbuser='root';  // perdorues I Databazes
	$dbpas='';  // paswordi I Databazes
	function lidhu(){return new PDO('mysql:host=localhost;dbname=unishk', 'root', '');}
    function exec_query($query,$lidhja){$res=$lidhja->prepare($query);$res->execute();return $res->FetchAll();} // Funksion qe ekzekuton dhe kthen rezultatin ne nje assoc array ku indexet jane emrat e kolonave ne mysql psh . arr[nr_rreshti]['emer_kolone']
    function shfaq_kerkim(){
    	shfaq_koken_e_faqes();
	?>
	<div class="content" >
       <div class="searchdiv">
           <form action="funksioni search" method="post">
               <input type="text" name="search" id="search" placeholder="Kerko student ...">
               <input type="button" name="searchbtn" id="searchbtn" value="Kerko">
           </form>
       </div>
    </div>
	<?php
	shfaq_footer();
    }// funksion i cili do te shfaqe menune sapo te hapet faqja ku perdoruesi do te kete mundesi te logohet ose te kerkoje nje student
    function shfaq_koken_e_faqes(){
    	?>
    	      <html>
                   <head>
                       <title>Studens Site</title>
                       <link href='css/stile_kryesore.css' rel='stylesheet' type='text/css'>
                   </head>
                   <body>
                        <div class='header-container'>
                        <div class='header' >
                        <div class='divlogo'>students site</div>
                   <div class='divnav'>
                       <ul>
                           <li><a href='index.php?login=true'>Hyr</a></li>
                           <li><a href='index.php'>Info</a></li>
                           <li><a href='index.php'>Studentet</a></li>
                           <li><a href='index.php'>Faqja Kryesore</a></li>
                       </ul>
                   </div>
                   </div>
                   </div>
    	<?php
    	
    }
    function shfaq_stud_me_id($id){
    	
    }
    function shfaq_footer(){
    	echo"<div class='footer'><div class='sitefooterinfodiv'><h5>vend bosh per informacione</h5></div><div class='copyrightdiv'>
               <h5>Copyright( M.Piranej , M.Curoviq ,B.Bajraktari ) 2015</h5></div></div></body></html>"; // kthen footerin ne menyre qe te printohet
    }
    function shfaq_login(){
    	
    	shfaq_koken_e_faqes();
		echo "<div class='content' ><div class='logindivcontainer'><div class='logindiv'><form action='funksioni login' method='post'>
<input type='text' name='username' id='username' placeholder='Emri i perdoruesit '></br><input type='password' name='password' id='password' placeholder='Fjalkalimi'><br>
<input type='button' name='forgotpassbtn' id='forgotpassbtn' value='Keni harruar fjalkalimin?'>
<input type='submit' name='loginbtn' id='loginbtn' value='Hyr'>
</form>
</div>
</div>
</div>";
	    shfaq_footer();
    }
?>