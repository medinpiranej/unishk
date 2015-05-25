<?php
     include 'php/func.php';
	 
	 session_start();
	 
	 if(isset($_SESSION["perdorues"]))$perd=$_SESSION["perdorues"];
	 else $perd=-1;
	 $admin=-1;
	 if(isset($_GET['login']))$kat="Login";
	 else $kat="Miresevini";
	 
	 
	 $lidhja=lidhu();
	 $dege=exec_query("select * from dege join fakultet on d_fakultet=f_id", $lidhja);
	 if(empty($dege))$dege=-1;
	 
	 
	 
	 shfaq_koken_e_faqes($kat,"");
?>
<div class="content" id="kerko_id" >
	<div  class="info_div"  style="width: 80%;margin-left:auto;margin-right:auto;margin-top: 40px;">
		
		
			<a href='admin.php?admin=1'> <div class='rezdivleft'  style="width: 100%; height: 300px;" ><div id='div_rez_foto' style="width: 220px;" ><img src='admin/1/foto/export.jpg' ></div><h4 style="font-size: 30px;" id='div_rez_emer'>Medin Piranej</h4><h5 style="font-size: 16px;" id='div_rez_dega'>Email:&nbsp;<i>mpiranej@gmail.com</i></h5><h5 style="font-size: 16px;" id='div_rez_adresa'>Adresa:&nbsp;<i>Mushan , Dajc , Shkoder , Shqiperi</i></h5><h5 style="font-size: 16px;" id='div_rez_adresa'>Roli ne faqe :&nbsp;Krijuesi , Administatori</h5></div></a>
	
			<a href='student.php?student=3'> <div class='rezdivleft'  style="width: 100%; height: 300px;" ><div id='div_rez_foto' style="width: 220px;" ><img src='studente/3/foto/medina.jpg' ></div><h4 style="font-size: 30px;" id='div_rez_emer'>Medina Cura</h4><h5 style="font-size: 16px;" id='div_rez_dega'>Email:&nbsp;<i>Medinacuraemail</i></h5><h5 style="font-size: 16px;" id='div_rez_adresa'>Adresa:&nbsp;<i> Shkoder , Shqiperi</i></h5></div></a>
	
			<a href='student.php?student=2'> <div class='rezdivleft'  style="width: 100%; height: 300px;" ><div id='div_rez_foto' style="width: 220px;" ><img src='img/def_profile_pic.jpg' ></div><h4 style="font-size: 30px;" id='div_rez_emer'>Bamirs Bajraktari</h4><h5 style="font-size: 16px;" id='div_rez_dega'>Email:&nbsp;<i>bamirs@gmail.com</i></h5><h5 style="font-size: 16px;" id='div_rez_adresa'>Adresa:&nbsp;<i>Shkoder , Shqiperi</i></h5><h5 style="font-size: 16px;" id='div_rez_adresa'>Roli ne faqe :&nbsp;Dizajner</h5></div></a>
	
		
		
		
	</div>
	
	
    </div><!--fundi i DIV content -->

<?php shfaq_footer(""); ?>

