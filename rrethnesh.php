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
			<div class="divi_fotos" >
				<img width="200px" src="perd1/foto/export.jpg" />
			</div>
			</div>
			<div class="divi_pershkrimi" width="200px" >
			<div class="emri">Medina Cura</div>
			<div class="pershkrimi">medina cura asefsadsadsadsafds afsdgdsgfsdfjksdhfsdiuhfjkdshfuidshfis</div>
			</div>
		</div>
		
		
	</div>
	
	
    </div><!--fundi i DIV content -->

<?php shfaq_footer(""); ?>

