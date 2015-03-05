<?php
    include 'db.php';
    function exec_query($query,$lidhja){$res=$lidhja->prepare($query);$res->execute();return $res->FetchAll();} // Funksion qe ekzekuton dhe kthen rezultatin ne nje assoc array ku indexet jane emrat e kolonave ne mysql psh . arr[nr_rreshti]["emer_kolone"]
    function shfaq_kerkim_logim(){
	?>
	<!DOCTYPE html>
	<html>
		<head>
			<title>Miresevini !</title>
		<link rel='stylesheet' type='text/css' href='./css/stile_kryesore.css' />
			
		</head>
		<body>
		      <div class="trupi">
		      	<?php shfaq_koken_e_faqes_me_login();?>
		      	<div class="login">
		      		login
		      	</div>
		      </div>
		</body>
	</html>
	<?php
    }// funksion i cili do te shfaqe menune sapo te hapet faqja ku perdoruesi do te kete mundesi te logohet ose te kerkoje nje student
    function shfaq_koken_e_faqes_me_login(){
    	?>
    	       <div class="koka">
		      		<div class="logo" id="koka_el"> 
		      			<img width="300px" height="150px" src="img/logo_kryesore.png" />
		      		</div>
		      		<div class="k_login" id="koka_el">
		      			<form>
		      			Login : <input type="text" placeholder="Emri ..." name="emri" />
		      			        <input type="password" placeholder="Fjalekalimi" name="pas" />
		      			        <input type="submit" value="Login" />
		      			</form>
		      		</div>
		       </div>
    	
    	<?php
    	
    }


?>