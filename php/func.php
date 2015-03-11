<?php
    $server='localhost';  // serveri I Databazes
	$db='unishk';  // Databaza
	$dbuser='root';  // perdorues I Databazes
	$dbpas='';  // paswordi I Databazes
	function lidhu(){return new PDO('mysql:host=localhost;dbname=unishk', 'root', '');}
    function exec_query($query,$lidhja){$res=$lidhja->prepare($query);$res->execute();return $res->FetchAll();} // Funksion qe ekzekuton dhe kthen rezultatin ne nje assoc array ku indexet jane emrat e kolonave ne mysql psh . arr[nr_rreshti]['emer_kolone']
    function shfaq_kerkim(){
    	shfaq_koken_e_faqes("Kerko","");
	?>
	<div class="content" >
	<div id="divqendror" > 
	<div id="filtersearchdiv">
	         <div id="divheaderlabel">
	          Filtro kerkimin
	          </div>
	          <div id="filteritemdiv">
	               <div id="divheaderlabelgray">
	                Dega
	               </div>
	               <select id="combobox">
                    <option value="informatike" selected="selected">Informatike</option>
                   <option value="matematike">Matematike</option>
                   <option value="fizike">Fizike</option>
                   <option value="letersi">Letersi</option>
                   </select>
	           </div>
	           <div id="filteritemdiv">
	                <div id="divheaderlabelgray">
	                Gjinia
	               </div>
	              <select id="combobox">
                 <option value="mashkull" selected="selected">Mashkull</option>
                  <option value="femer">Femer</option>
                 </select>
	          </div>
	         <div id="filteritemdiv">
	              <div id="divheaderlabelgray">
	              Qyteti
	 			 </div>
				   <select id="combobox">
                 <option value="shkoder" selected="selected">Shkoder</option>
                  <option value="lezhe">Lezhe</option>
				  <option value="tirane">Tirane</option>
				  <option value="durres">Durres</option>
				  <option value="etj">etj...</option>
                 </select>
	  		</div>
	  		 <div id="filteritemdiv">
	   			<div id="divheaderlabelgray">
	  			 Mosha
	  			</div>
				 <select id="combobox">
                 <option value="18" selected="18">18</option>
                  <option value="19">19</option>
				  <option value="20">20</option>
				  <option value="21">21</option>
				  <option value="22">22</option>
				  <option value="23">23</option>
				  <option value="24">24</option>
				  <option value="25">25</option>
				  <option value="26">27</option>
				  
                 </select>
	  		</div>
	  		<div id="filteritemdiv">
	  			 <div id="divheaderlabelgray">
	   				Viti 
	  			</div>
				<select id="combobox">
                 <option value="1" selected="1">1 (I pare)</option>
                  <option value="2">2 (I dyte)</option>
				  <option value="3">3 (I trete)</option>
				  </select>
	  		</div>
	  </div>
       <div class="searchdiv" >
           <form action="funksioni search" method="post">
               <input type="text" name="search" id="search" placeholder="Kerko student ...">
               <input type="button" name="searchbtn" id="searchbtn" value="Kerko">
           </form>
       </div>
	   
	 
	   
	   
	   </div>
    </div><!--fundi i DIV content -->
	<?php
	shfaq_footer();
    }// funksion i cili do te shfaqe menune sapo te hapet faqja ku perdoruesi do te kete mundesi te logohet ose te kerkoje nje student
    function shfaq_koken_e_faqes($kat,$skripte){// kat do ta perdorim si "title" i html dhe $skripte kur dona me perdor skripte shtese si ne rasin e profili.php ku i shtojme nje css
    	?>
    	      <html>
                   <head>
                       <title><?php echo $kat.' | student site';// printojme titullin e faqes ?></title>              
                       <link href='css/stile_kryesore.css' rel='stylesheet' type='text/css'>
                       <script src="js/jquerylib.js"></script>
                       <?php echo $skripte; // printojme skriptet shtese ?>
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
<li><a id="kycu"href="index.php?login=true">Kycuni</a></li><li>
     <a id="informacion"href="index.php?pageid=informacion">Informacion</a>
       <ul>
	   <li><a id="rrethnesh" href="#">Rreth nesh</a></li>
	   <li><a id="kontakt" href="#">Kontakt</a></li>
	   </ul>
</li>
<li>
<a id="studentet" href="studentet.php?pageid=studentet">Studentet</a>
<ul>
	   <li><a id="shkencanatyrore" href="#">Shkenca Natyrore</a></li>
	   <li><a id="shkencashoqerore"href="#">Shkenca Shoqerore</a></li>
	   </ul>
</li><li>
<a id="faqjakryesore" href="index.php">Faqja Kryesore</a></li>
</ul>
    
</div>
</div>

</div>
    	<?php
    	
    }
    function shfaq_stud_me_id($id){
    	
    }
    function shfaq_footer(){
    	?> <div class="footer">
<div class="sitefooterinfodiv">

</div>
<div class="copyrightdiv">

<h5>Copyright( M.Piranej , M.Curoviq ,B.Bajraktari ) 2015</h5>
</div>
</div></body></html><?php // kthen footerin ne menyre qe te printohet
    }
    function shfaq_login(){
    	shfaq_koken_e_faqes("Login","");
		?><div class='content' ><div class='logindivcontainer'><div class='logindiv'><form action='login.php' method='post'>
<input type='text' name='emri' id='username' placeholder='Emri i perdoruesit '></br><input type='password' name='pas' id='password' placeholder='Fjalkalimi'><br>
<input type='button' name='forgotpassbtn' id='forgotpassbtn' value='Keni harruar fjalkalimin?'>
<input type='submit' name='loginbtn' id='loginbtn' value='Hyr'>
</form>
</div>
</div>
</div><?php
	    shfaq_footer();
    }
?>