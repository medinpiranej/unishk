<?php
     include 'php/func.php';
	 
	 session_start();
	 
	 if(isset($_SESSION["perdorues"]))$perd=$_SESSION["perdorues"];
	 else $perd=-1;
	 
	 if(isset($_GET['login']))$kat="Login";
	 else $kat="Miresevini";
	 
	 shfaq_koken_e_faqes($kat,"");
?>
<div class="content" id="kerko_id" >
	<div width="80%" class="info_div">
		
		<div class="post">
			<div class="post_mrena">
			<div class="divi_fotos" width="200px" >
				<img width="200px" src="perd1/foto/export.jpg" />
			</div>
			</div>
			<div class="divi_pershkrimi">
			<div class="emri">Medin Piranej</div>
			<div class="pershkrimi">Medin Piranej asefsadsadsadsafdsafsdg dsgfsdfjksdhfsdiuhfjkdshfuidshfis</div>
			</div>
		</div>
		<div class="post">
			<div class="post_mrena">
			<div class="divi_fotos" idth="200px">
				<img width="200px" src="perd3/foto/11225513_904146869627964_1080658095_n.jpg" />
			</div>
			</div>
			<div class="divi_pershkrimi" >
			<div class="emri">Medina Cura</div>
			<div class="pershkrimi">Medina dghasks fgnj jh hj h l afsdgdsgfsdfjksdhfsdiuhfjkdshfuidshfis</div>
			</div>
		</div>
		
		<div class="post">
			<div class="post_mrena">
			<div class="divi_fotos" >
				<img width="200px" src="perd1/foto/10455123_840499562680528_7050392933953884544_n.jpg" />
			</div>
			</div>
			<div class="divi_pershkrimi" width="300px" >
			<div class="emri">Bamirs Bajraktari</div>
			<div class="pershkrimi">Medina ds afsdgdsgfsdfjksdhfsdiuhfjkdshfuidshfis</div>
			</div>
		</div>
		
		
	</div>
	
	
    </div><!--fundi i DIV content -->

<?php shfaq_footer(""); ?>

