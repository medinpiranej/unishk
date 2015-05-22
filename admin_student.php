<?php 
    include 'php/func.php';
     
     session_start();
     $kam_akses_ne_profil=false; // variabel qe me vone do ta perdorim per te pare nqs admini ka te drejte ta modifikoje profilin e hapur
     
     if(isset($_SESSION["admin"]))$admin=$_SESSION["admin"];
     else header("Location: index.php?abuzim_me_te_drejtat=true");
     
     
    //if(!isset($_GET["student"]))shfaq listen_e studentave qe mund te modifikosh   gthyujik
    $stud_id=$_GET["student"];
    $lidhja=lidhu();
    
    $student=exec_query("Select * from student join dege on s_dega=d_id join fakultet on d_fakultet=f_id where stud_id=$stud_id", $lidhja);
    if(empty($student))header("Location: admin.php?studenti_nuk_ekziston=true");// nqs studenti nuk ekziston e redirektojm kete faqe
    
    $student_admin=exec_query("Select * from student_admin where s_a_admin={$admin[0]["a_id"]} and s_a_student=$stud_id", $lidhja);
    
    if(empty($student_admin))$kam_akses_ne_profil=false;
    else $kam_akses_ne_profil=true;
    
    $lista_admineve_per_kete_student=exec_query("Select * from student_admin join admin on s_a_admin=a_id where s_a_student=1", $lidhja);
    
    if(empty($lista_admineve_per_kete_student))header("location: admin.php?student_pa_admin=$stud_id");
    
    $kat=$student[0]["s_emri"]." ".$student[0]["s_mbiemri"];
    $tema=exec_query("Select * from tema_diplome where t_id=".$student[0]["stud_id"], $lidhja);
    if(empty($tema))$tema=-1;
    
    $perd=-1;
    
    shfaq_koken_e_faqes($kat,"<link href='css/cssEprofilit.css' rel='stylesheet' type='text/css'>");// te shtohet koka e adminit
                    //llogaritet mosha duke u bazuar ne ditelindjen dhe i jepet formati dd-mm-yyyy ditelindjes
                    $ditelindja_orig = new DateTime($student[0]["s_ditelindja"]);
                    $ditelindja_formatizuar = $ditelindja_orig->format('d-m-Y');// kthehet ne string ditelindja e formatizuar
                    $tani = new DateTime();// data aktuale
                    $mosha = $tani->diff($ditelindja_orig);
                    //*****************************************************************************************
    
  ?>

<div class="content" >

  <div class="tedhenatcontainer">

  			<div class="leftdiv">
  					<div id="profileheaderlabel">



					Fotoja e profilit
					<?php if($kam_akses_ne_profil){ ?>
                        <input type='button' id='ndryshofotobtn' onclick="shfaq_div_ndrysho_foto_profili()" value='Ndrysho foton'><?php } ?> 
                    </div>

                    <div id="profpiccont">
                    <img src=<?php echo "'". $student[0]["s_foto"]."'"; ?> >
                    </div>
                    <?php if($kam_akses_ne_profil){ ?>
                    <form method='post' action='ndrysho_student_foto_nga_admin.php' enctype='multipart/form-data' id='forma_ndryshimit'>
                    <div id="uploadprofilepic" align="middle">
                     <input type="text"  id="upload_pic_path" value="Asnje foto e perzgjedhur .." readonly="true">
                     <input type="file" style="width: 87px;"  id="ngarko" onchange="umor_foto(1)" name="f_profili">
                     <input type="button" onclick="umor_foto(-1)" id="anulo" style="width: 70px;" value="Anulo">
                     <input type="hidden" name="src" value="student">
                     <input type="hidden" name="s_id" value=<?php echo "'".$student[0]['stud_id']."'"; ?>>
                     <input type="submit" style="display: none;width: 60%;color:white;height:25px;background-color: #207cca;" id="konfirmo_foto" value="konfirmo">
                    </div>
                    </form>
                      <?php } ?> 
  
  
 			 </div>
  			<div class="rightdiv">
  					<div id="profileheaderlabel">
  					Te dhenat personale
  					</div>
  					<div id="te_dhenat_personale_div">
  						<?php if($kam_akses_ne_profil){ ?>
  						<img align="right" style="margin-top: -10px;" id="img_men_ndrysho" src="img/ndrysho.png" width="50px" height="50px" onclick="shfaq_menu_djathtas()"  />
  						<?php } ?>
  						<p>Emri i plote<br><font style="color:black"><?php echo $student[0]["s_emri"]." ".$student[0]["s_mbiemri"];   ?></font></p>
 					 </div>
   					 <div id="te_dhenat_personale_div">
  					<p>Studion ne :<br><font style="color:black"><?php echo $student[0]["f_emri"]."<br>Dega ".$student[0]["d_emri"]; ?></font></p>
  					</div>
    				<div id="te_dhenat_personale_div">
  					<p>Adresa<br><font style="color:black"><?php echo $student[0]["s_adr"]; ?></font></p>
  					</div>
    				<div id="te_dhenat_personale_div">
  					<p>Kontakt<br><font style="color:black">CEL : <?php echo $student[0]["s_cel"]; ?> , Email : <?php echo $student[0]["s_email"]; ?></font></p>
  					</div>
                    <div id="te_dhenat_personale_div">
  					<p>Datelindja <br><font style="color:black"><?php echo $ditelindja_formatizuar." ( ".$mosha->y." vjec )"; ?></font></p>
  					</div>
  					 <?php if($kam_akses_ne_profil){ ?>
                     <p id="ndryshofjalkalimintext" onclick="shfaq_div_ndrysho_pas()">Ndrysho fjalkalimin</p>
                     <div id="ndryshofjalkalimindiv" style='display:none;'  >
                   
                   
  							<div id="ndryshofjalkalimin_kutite">
  								<form method="post" action="ndrysho_student_pas_nga_admin.php">
                   				 <p  >Fjalkalimi i vjeter</p>
                    			<input type="password" name="pas_ekz" id="old_pass">
                   					 <p>Fjalkalimi i ri</p>
                    			<input type="password"  name="pas_i_ri"  id="new_pass">
                    			<p>Kofirmo fjalkalimin e ri</p>
                   			    <input type="password"  name="pas_i_ri2"   id="confirm_pass">
                     <input type="hidden" name="src" value="student">
                     <input type="hidden" name="s_id" value=<?php echo "'".$student[0]['stud_id']."'"; ?>>
                    
                    <input type="submit" value="Ruaj"  id="ruaj">
                    <input type="button" value="Anullo" onclick="shfaq_div_ndrysho_pas()"  id="anullo_pass">
                    			</form>	
                    		
                    		</div>
  					</div>
  					<?php } ?>
  				</div>
      </div>
      <div class="tema_cv" id="cv_tema">
      	  <div class="but_tema_cv" align="middle">
      	  <input type="button" value="Hap temen e diplomes" id='but_hap_tema' onclick="hap_mbyll_teme()" />
      	  <input type="button" value="Hap CV e studentit" id='but_hap_cv' onclick="hap_mbyll_cv()" />
      	  </div>
      <div class="tema_div" align="middle" style="display: none;padding-bottom: 20px;">
      <?php if($student[0]['s_tema']!=0){
      	 echo "<div id='pershkrim_teme_div' align='left'>
  			   Tiltulli i temes se diplomes<br><font>{$tema[0]["t_tema"]}</font>
  			   </div>";
      	 echo "<div id='pershkrim_teme_div' align='left'>
  			   Objektivat e temes se diplomes<br><font>{$tema[0]["t_objektivat"]}</font>
  			   </div>";
      	 echo "<div id='pershkrim_teme_div' align='left'>
  			   Pershkrimi i temes se diplomes<br><font>{$tema[0]["t_pershkrimi"]}</font>
  			   </div>";
      	 echo "<div id='pershkrim_teme_div' align='left'>
  			   Dokumenti i temes se diplomes<br>
  			   </div>";
      	 echo "<iframe   width='95%' src='{$tema[0]["t_tema_sked"]}' height='100%'></iframe>";
	  
	  		}else echo "<h2 style='color:black'>Studenti akoma nuk eshte diplomuar ... :( </h2>";
      	?>
      	
  	  </div>
  	  <div class="cv_div" align="middle" style="display: none;padding-bottom: 20px;">
      <?php if($kam_akses_ne_profil){ ?>
      	<input type="button" value="ngarko ne cv te re" onclick="shfaq_div_ndrysho_cv()" id="but_ndr_cv"  />
      	   <div id="div_ngarko_cv" style="margin:15px;display: none;width: 400px;">
      		<form method='post' action='ndrysho_student_cv.php' enctype='multipart/form-data' id='forma_ndryshimit_te_cv'>
                     <input type="file" style="color:#000000" id="ngarko_cv" onchange="umor_cv(1)" name="cv_e_re">
                     <input type="button" onclick="umor_cv(-1)" value="Anulo" style="width: 100px;">
                     <input type="hidden" name="src" value="student">
                     <input type="hidden" name="s_id" value=<?php echo "'".$student[0]['stud_id']."'"; ?>>
                     <input type="submit" style="display: none;width: 200px; height:35px;color:white;background-color: #207cca;" id="konfirmo_cv" value="konfirmo">
            </form>
      	</div>
      	<?php } ?>
      	<?php if($student[0]['s_cv']!="") echo "<iframe   width='95%' src='{$student[0]['s_cv']}' height='100%'></iframe>";
              else echo "<h2 style='color:black'>Akoma nuk ka asnje CV ...</h2>";
      	?>
      	
  	  </div>
       
      </div>
    </div>
<div class='menu_ndrysho_container'>
	<img src='img/mbyll_menu.png' onclick='shfaq_menu_djathtas()' width='100px' style='margin-left: 10px;' />
	<div style='margin: 15px;'>
		<form method='post' action='ndrysho_student_te_dhena_nga_admin.php' >
			<div class='menu_tituj' style='font-size: 20px;'>Ndrysho te dhenat e studentit</div>
			<hr />
			<div style='padding: 5px;padding-top: 15px;'>
			<div class='menu_tituj' style='font-size: 18px;'>Te dhena personale</div>
			<div class='menu_tituj' align='right'> Emri <input name='input_emri' type='text' value='<?php echo $student[0]['s_emri']; ?>' style='width: 90px;' placeholder='Emri' /><input name='input_mbiemri' style='width: 90px;' type='text' value='<?php echo $student[0]['s_mbiemri']; ?>' placeholder='Mbiemri' /></div>
			<div class='menu_tituj' align='right'> Ditelindja 
				<input name='input_ditelindja_dita' size="2" maxlength="2" value="<?php echo $ditelindja_orig->format("d"); ?>" type='text' id="input_ditelindja_dita" style='width: 45px;' placeholder='dita' />
				<input name='input_ditelindja_muaji' size="2" maxlength="2" value="<?php echo $ditelindja_orig->format("m"); ?>" type='text' id="input_ditelindja_muaji" style='width: 55px;' placeholder='muaji' />
				<input name='input_ditelindja_viti' size="4" maxlength="4" value="<?php echo $ditelindja_orig->format("Y"); ?>" type='text' id="input_ditelindja_viti" style='width: 50px;' placeholder='viti' /></div>
			
			</div>
			<hr />
			<div style='padding: 5px;padding-top: 15px;'>
			<div class='menu_tituj' style='font-size: 18px;'>Kontakt</div>
			<div class='menu_tituj' align='right'> Cel <input name='input_cel' type='text' value='<?php echo $student[0]['s_cel']; ?>' placeholder='Nr Cel' /></div>
			<div class='menu_tituj' align='right'>Email <input name='input_email' type='text' value='<?php echo $student[0]['s_email']; ?>' placeholder='Email' /></div>
			</div>
			<hr />
			<div style='padding: 5px;padding-top: 15px;'>
			<div class='menu_tituj' style='font-size: 18px;'>Adresa</div>
			<div class='menu_tituj' align='right'><input name='input_adr' type='text' value='<?php echo $student[0]['s_adr']; ?>' placeholder='Adresa' /></div>
			</div>
			<hr />
                     <input type='hidden' name='src' value='admin'>
                     <input type='hidden' name='s_id' value=<?php echo "'".$student[0]['stud_id']."'"; ?>>
			         <div class='menu_tituj' align='right'><input type='submit' style='width: 60%;background-color: #0099ff;color: #FFFFFF;' value='Ndrysho !' /></div>
		
		
		</form>
	</div>
</div>
<div class="footer">

<div  class="copyrightdiv">

<h5>Copyright( M.Piranej , M.Curoviq ,B.Bajraktari ) 2015</h5>
</div>
</div>


</body>

</html>