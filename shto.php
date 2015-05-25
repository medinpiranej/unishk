<?php
     include 'php/func.php';
     session_start();
     if(isset($_SESSION["admin"]))$admin=$_SESSION["admin"];
     else header("Location: index.php?abuzim_me_te_drejtat=true"); //kontrollohet nqs eshte i loguar ndonje admin 

     $perd=-1;     
	 $lidhja=-1;
	 
	 $skripte="";
	 
	 $lidhja=lidhu();
	 
	 $dege=exec_query("select * from dege join fakultet on d_fakultet=f_id", $lidhja);
	 if(empty($dege))$dege=-1;
	 
	 $fakultet=exec_query("select * from fakultet", $lidhja);
	 if(empty($fakultet))$fakultet=-1;
	 
	 if(isset($_GET["shto"]))$shto=$_GET["shto"];
	 else $shto="";
	 
	 $skripte="<script type='text/javascript'>";
	 if($shto=="student")$skripte.="var shto_student_hapur=true;";
	 else $skripte.="var shto_student_hapur=false;";
	 if($shto=="admin")$skripte.="var shto_admin_hapur=true;";
	 else $skripte.="var shto_admin_hapur=false;";
	 if($shto=="dege")$skripte.="var shto_dege_hapur=true;";
	 else $skripte.="var shto_dege_hapur=false;";
	 if($shto=="fakultet")$skripte.="var shto_fakultet_hapur=true;";
	 else $skripte.="var shto_fakultet_hapur=false;";
	 
	 $skripte.="</script>";
	 
	 
     $kat="admin ";
     shfaq_koken_e_faqes($kat,$skripte);// te krijohet koka e faqes per adminat #########
     
     ?>
     <script type="text/javascript">
function hap_mbyll_shto_student(){
	        if(shto_student_hapur){
				$("#div_shto_student").slideUp('normal');
				shto_student_hapur=false;
		    }else{
			  if(shto_admin_hapur){
				$("#div_shto_admin").slideUp('normal');
				shto_admin_hapur=false;
		      }
			  if(shto_dege_hapur){
				$("#div_shto_dege").slideUp('normal');
				shto_dege_hapur=false;
		      }
			  if(shto_fakultet_hapur){
				$("#div_shto_fakultet").slideUp('normal');
				shto_fakultet_hapur=false;
		      }
		      
		      $("#div_shto_student").slideDown('normal');
				shto_student_hapur=true;
		}
}
function hap_mbyll_shto_admin(){
	          if(shto_admin_hapur){
				$("#div_shto_admin").slideUp('normal');
				shto_admin_hapur=false;
		      }else{
			  
		      if(shto_student_hapur){
				$("#div_shto_student").slideUp('normal');
				shto_student_hapur=false;
		       }
			  if(shto_dege_hapur){
				$("#div_shto_dege").slideUp('normal');
				shto_dege_hapur=false;
		      }
			  if(shto_fakultet_hapur){
				$("#div_shto_fakultet").slideUp('normal');
				shto_fakultet_hapur=false;
		      }
		      
		      $("#div_shto_admin").slideDown('normal');
				shto_admin_hapur=true;
		}
}
function hap_mbyll_shto_dege(){
	        
		      if(shto_dege_hapur){
				$("#div_shto_dege").slideUp('normal');
				shto_dege_hapur=false;
		      }else{
			  if(shto_admin_hapur){
				$("#div_shto_admin").slideUp('normal');
				shto_admin_hapur=false;
		      }
			  if(shto_student_hapur){
				$("#div_shto_student").slideUp('normal');
				shto_student_hapur=false;
		      }
			  if(shto_fakultet_hapur){
				$("#div_shto_fakultet").slideUp('normal');
				shto_fakultet_hapur=false;
		      }
		      
		      $("#div_shto_dege").slideDown('normal');
				shto_dege_hapur=true;
		}
}
function hap_mbyll_shto_fakultet(){
	        
			  if(shto_fakultet_hapur){
				$("#div_shto_fakultet").slideUp('normal');
				shto_fakultet_hapur=false;
		      }else{
			  if(shto_admin_hapur){
				$("#div_shto_admin").slideUp('normal');
				shto_admin_hapur=false;
		      }
			  if(shto_student_hapur){
				$("#div_shto_student").slideUp('normal');
				shto_student_hapur=false;
		      }
		      if(shto_dege_hapur){
				$("#div_shto_dege").slideUp('normal');
				shto_dege_hapur=false;
		      }
		      
		      $("#div_shto_fakultet").slideDown('normal');
				shto_fakultet_hapur=true;
		}
}
     </script>
<div class="content" >
	
	<div id="divqendror" > 
        <div class="shto" >
        	<form action="shto_student_nga_admin.php" method="post">
        	<div class='shto_koka' onclick="hap_mbyll_shto_student()">Shto Student<hr /></div>
			<div  id="div_shto_student" <?php if($shto!="student")echo"style='display:none;'"; ?>>
			<div style=' width:500px; margin-left: auto;margin-right:auto; '>
			<div class='menu_tituj' style='font-size: 18px;'>Te dhena personale</div>
			<div class='menu_tituj' align='right'> Emri <input name='input_emri' type='text'  style='width: 177px;' placeholder='Emri' />
				                                        <input name='input_mbiemri' style='width: 177px;' type='text' placeholder='Mbiemri' /></div>
			<div class='menu_tituj' align='right'> Ditelindja 
				<input name='input_ditelindja_dita' size="2" maxlength="2"  type='text' id="input_ditelindja_dita" style='width: 110px;' placeholder='dita' />
				<input name='input_ditelindja_muaji' size="2" maxlength="2"  type='text' id="input_ditelindja_muaji" style='width: 120px;' placeholder='muaji' />
				<input name='input_ditelindja_viti' size="4" maxlength="4"   type='text' id="input_ditelindja_viti" style='width: 120px;' placeholder='viti' /></div>
			
			<div class='menu_tituj' align='right'> Gjinia <select name="input_gjinia" style="width: 359px;">
																<option value="1">Mashkull</option>
																<option value="0">Femer</option>
			                                               </select>
			<hr />
			</div>
			<div style=' width:500px; margin-left: auto;margin-right:auto;'>
			<div class='menu_tituj' style='font-size: 18px;'>Kontakt</div>
			<div class='menu_tituj' align='right'> Cel <input style='width: 355px;'  name='input_cel' type='text' placeholder='Nr Cel' /></div>
			<div class='menu_tituj' align='right'>Email <input style='width: 355px;'  name='input_email' type='text'  placeholder='Email' /></div>
			<div class='menu_tituj' align='right'>Adresa <input name='input_adr' type='text' style='width: 355px;'  placeholder='Adresa' /></div>
			<hr />
			</div>
			<div style=' width:500px; margin-left: auto;margin-right:auto;'>
			<div class='menu_tituj' style='font-size: 18px;'>Fjalekalimi</div>
			<div class='menu_tituj' align='right'>Fjalekalimi <input name='input_pas1' type='password' style='width: 355px;'  placeholder='Fjalekalimi' /></div>
			<div class='menu_tituj' align='right'>Konfirmimi <input name='input_pas2' type='password' style='width: 355px;'  placeholder='Konfirmimi i fjalekalimit' /></div>
			<hr />
			</div>
			<div style=' width:500px; margin-left: auto;margin-right:auto;'>
			<div class='menu_tituj' style='font-size: 18px;'>Dega e Studimeve</div>
			<div class='menu_tituj' align='right'> <select name="input_dega" style="width: 359px;">
																<?php
																    for($i=0;$i<sizeof($dege);$i++){
																    	echo "<option value='{$dege[$i]["d_id"]}' >".$dege[$i]["d_emri"]."</option>";
																    }
																?>
			                                               </select></div>
			<hr />
			</div>
                     <input type='hidden' name='a_id' value=<?php echo "'".$admin[0]['a_id']."'"; ?>>
			         <div class='menu_tituj' align='right'><input type='submit' style='width: 50%;background-color: #0099ff;color: #FFFFFF;' value='Shto !' /></div>
		
		
        </div>  
	   
	   <hr />
	   </div>
	   </form>
	   </div>
<div class="shto" >
	<form action="shto_admin_nga_admin.php" method="post">
        	<div class='shto_koka' onclick="hap_mbyll_shto_admin()">Shto Administrator<hr /></div>
        	<div  id="div_shto_admin" <?php  if($shto!="admin")echo"style='display:none;'"; ?>>
			<div style=' width:500px; margin-left: auto;margin-right:auto; '>
			<div class='menu_tituj' style='font-size: 18px;'>Te dhena personale</div>
			<div class='menu_tituj' align='right'> Emri <input name='input_emri' type='text'  style='width: 177px;' placeholder='Emri' />
				                                        <input name='input_mbiemri' style='width: 177px;' type='text' placeholder='Mbiemri' /></div>
			<div class='menu_tituj' align='right'> Ditelindja 
				<input name='input_ditelindja_dita' size="2" maxlength="2"  type='text' id="input_ditelindja_dita" style='width: 110px;' placeholder='dita' />
				<input name='input_ditelindja_muaji' size="2" maxlength="2"  type='text' id="input_ditelindja_muaji" style='width: 120px;' placeholder='muaji' />
				<input name='input_ditelindja_viti' size="4" maxlength="4"   type='text' id="input_ditelindja_viti" style='width: 120px;' placeholder='viti' /></div>
			
			<div class='menu_tituj' align='right'>Gjinia <select name="input_gjinia" style="width: 359px;">
																<option value="1">Mashkull</option>
																<option value="0">Femer</option>
			                                               </select>
			<hr />
			</div>
			<div style=' width:500px; margin-left: auto;margin-right:auto;'>
			<div class='menu_tituj' style='font-size: 18px;'>Kontakt</div>
			<div class='menu_tituj' align='right'> Cel <input style='width: 355px;'  name='input_cel' type='text' placeholder='Nr Cel' /></div>
			<div class='menu_tituj' align='right'>Email <input style='width: 355px;'  name='input_email' type='text'  placeholder='Email' /></div>
			<div class='menu_tituj' align='right'>Website <input style='width: 355px;'  name='input_ws' type='text'  placeholder='Website (opsional)' /></div>
			<div class='menu_tituj' align='right'>Adresa <input name='input_adr' type='text' style='width: 355px;'  placeholder='Adresa' /></div>
			<hr />
			</div>
			<div style=' width:500px; margin-left: auto;margin-right:auto;'>
			<div class='menu_tituj' style='font-size: 18px;'>Fjalekalimi</div>
			<div class='menu_tituj' align='right'>Fjalekalimi <input name='input_pas1' type='password' style='width: 355px;'  placeholder='Fjalekalimi' /></div>
			<div class='menu_tituj' align='right'>Konfirmimi <input name='input_pas2' type='password' style='width: 355px;'  placeholder='Konfirmimi i fjalekalimit' /></div>
			<hr />
			</div>
			<div style=' width:500px; margin-left: auto;margin-right:auto;'>
			<div class='menu_tituj' style='font-size: 18px;'>Puna</div>
			<div class='menu_tituj' align='right'><textarea name='input_puna' type='text' style='width: 355px;height: 100px; resize: vertical'  placeholder='Puna' ></textarea>  </div>
			<hr />
			</div>
                     <input type='hidden' name='a_id' value=<?php echo "'".$admin[0]['a_id']."'"; ?>>
			         <div class='menu_tituj' align='right'><input type='submit' style='width: 50%;background-color: #0099ff;color: #FFFFFF;' value='Shto !' /></div>
		
		
        </div>  
	   
	   <hr />
	   </div>
	   </form>
	   </div>
	   
<div class="shto" >
	<form method="post" action="shto_dege_nga_admin.php">
        	<div class='shto_koka' onclick="hap_mbyll_shto_dege()">Shto Dege Studimesh<hr /></div>
        	<div  id="div_shto_dege" <?php if($shto!="dege")echo"style='display:none;'"; ?>>
			<div style=' width:500px; margin-left: auto;margin-right:auto; '>
			<div class='menu_tituj' style='font-size: 18px;'>Te dhena per degen</div>
			<div class='menu_tituj' align='right'> Emri <input name='input_emri' type='text'  style='width: 355px;' placeholder='Emri' /></div>
			<div class='menu_tituj' align='right'> Adresa <input name='input_adr' type='text'  style='width: 355px;' placeholder='Adresa' /></div>
			<div class='menu_tituj' align='right'> Email <input name='input_email' type='text'  style='width: 355px;' placeholder='Email' /></div>
			<div class='menu_tituj' align='right'> Cel <input name='input_cel' type='text'  style='width: 355px;' placeholder='Cel' /></div>
			<div class='menu_tituj' align='right'> Website <input name='input_ws' type='text'  style='width: 355px;' placeholder='Website' /></div>
			<div class='menu_tituj' align='right'> Dekani <input name='input_dekani' type='text'  style='width: 355px;' placeholder='Dekani' /></div>
			<div class='menu_tituj' align='right'> Fakulteti <select name="input_fakulteti" style="width: 355px;"><?php for($i=0;$i<sizeof($fakultet);$i++){echo "<option value='{$fakultet[$i]["f_id"]}'>".$fakultet[$i]["f_emri"]."</option>";}?></select></div>
			<hr />
	    		<input type='hidden' name='a_id' value=<?php echo "'".$admin[0]['a_id']."'"; ?>>
	            <div class='menu_tituj' align='right'><input type='submit' style='width: 50%;background-color: #0099ff;color: #FFFFFF;' value='Shto !' /></div>
		</div>  
	   <hr />
	   </div>
	   </form>
	   </div>
	   
<div class="shto" >
	<form action="shto_fakultet_nga_admin.php" method="post">
        	<div class='shto_koka' onclick="hap_mbyll_shto_fakultet()">Shto Fakultet<hr /></div>
        	<div  id="div_shto_fakultet" <?php if($shto!="fakultet")echo"style='display:none;'"; ?>>
			<div style=' width:500px; margin-left: auto;margin-right:auto; '>
			<div class='menu_tituj' style='font-size: 18px;'>Te dhena per Fakultetin</div>
			<div class='menu_tituj' align='right'> Emri <input name='input_emri' type='text'  style='width: 355px;' placeholder='Emri' /></div>
			<div class='menu_tituj' align='right'> Adresa <input name='input_adr' type='text'  style='width: 355px;' placeholder='Adresa' /></div>
			<div class='menu_tituj' align='right'> Email <input name='input_email' type='text'  style='width: 355px;' placeholder='Email' /></div>
			<div class='menu_tituj' align='right'> Cel <input name='input_cel' type='text'  style='width: 355px;' placeholder='Cel' /></div>
			<div class='menu_tituj' align='right'> Website <input name='input_ws' type='text'  style='width: 355px;' placeholder='Website' /></div>
			<div class='menu_tituj' align='right'> Dekani <input name='input_dekani' type='text'  style='width: 355px;' placeholder='Dekani' /></div>
			
			<hr />
			         <div class='menu_tituj' align='right'><input type='submit' style='width: 50%;background-color: #0099ff;color: #FFFFFF;' value='Shto !' /></div>
		
			</div>
		
        </div>  
	   </form>
	   </div>
	   </div>
	   
	   
    </div><!--fundi i DIV content -->
     
	 
	
      
<?php shfaq_footer(""); ?>

