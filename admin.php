<?php
     include 'php/func.php';
     session_start();
     if(isset($_SESSION["admin"]))$admin=$_SESSION["admin"];
     else $admin=-1;  //kontrollohet nqs eshte i loguar ndonje admin 
     
	 $lidhja=lidhu();
	 if(isset($_SESSION["perdorues"]))$perd=$_SESSION["perdorues"];
	 else $perd=-1;   //kontrollohet nqs eshte i loguar ndonje student
	 
	 $admin_i_hapur=-1;
     if(($admin==-1)&&(!isset($_GET["admin"])))header("location: hyr_admin.php");
	 else if(isset($_GET["admin"]))if(is_numeric($admin_i_hapur))$admin_i_hapur=$_GET["admin"];
    
	 $admin_i_loguar=false;
	 if(($admin!=-1))if($admin[0]["a_id"]==$admin_i_hapur)$admin_i_loguar=true;
	
	 $dege=exec_query("select * from dege join fakultet on d_fakultet=f_id", $lidhja);
	 if(empty($dege))$dege=-1;
	 
	 
	 
	 $skripte="";
	 if($admin_i_hapur!=-1){
	     $admin_obj=exec_query("Select * from admin where a_id=$admin_i_hapur", $lidhja);
	     if(empty($admin_obj))header("Location: admin.php?admini_nuk_ekziston=true");// nqs studenti nuk ekziston e redirektojm kete faqe
         $skripte="<link href='css/cssEprofilit.css' rel='stylesheet' type='text/css'>";
		 
		 	        //llogaritet mosha duke u bazuar ne ditelindjen dhe i jepet formati dd-mm-yyyy ditelindjes
	  				$ditelindja_orig = new DateTime($admin_obj[0]["a_ditelindja"]);
					$ditelindja_formatizuar = $ditelindja_orig->format('d-m-Y');// kthehet ne string ditelindja e formatizuar
                    $tani = new DateTime();// data aktuale
                    $mosha = $tani->diff($ditelindja_orig);
                    //*****************************************************************************************
	
		 
	 }
	 
      $perd=-1;
     $kat="admin ";
     shfaq_koken_e_faqes($kat,$skripte);// te krijohet koka e faqes per adminat #########
     
     echo "<div class='content' id='kerko_id' >";
	 
	 if($admin !=-1)echo"    <div id='divqendror' > 
        <div id='filtersearchdiv' class='topfilterdiv'>
            
        </div>
       <div class='searchdiv' >
           
               <input type='text' name='search' id='search' placeholder='Kerko student ...'>
               <input type='button' name='searchbtn' onclick='kerko(1)' id='searchbtn' value='Kerko'>
           
       </div>
        <div id='filtersearchdiv' class='bottomfilterdiv'>
             <div id='divheaderlabel'>
              Filtro kerkimin
              </div>
              <div id='filteritemdiv'>
                   <div id='divheaderlabelgray'>
                    Dega
                   </div>
                   <select id='combobox'>
                    <option value='informatike' selected='selected'>Informatike</option>
                   <option value='matematike'>Matematike</option>
                   <option value='fizike'>Fizike</option>
                   <option value='letersi'>Letersi</option>
                   </select>
               </div>
               <div id='filteritemdiv'>
                    <div id='divheaderlabelgray'>
                    Gjinia
                   </div>
                  <select id='combobox'>
                 <option value='mashkull' selected='selected'>Mashkull</option>
                  <option value='femer'>Femer</option>
                 </select>
              </div>
             <div id='filteritemdiv'>
                  <div id='divheaderlabelgray'>
                  Qyteti
                 </div>
                   <select id='combobox'>
                 <option value='shkoder' selected='selected'>Shkoder</option>
                  <option value='lezhe'>Lezhe</option>
                  <option value='tirane'>Tirane</option>
                  <option value='durres'>Durres</option>
                  <option value='etj'>etj...</option>
                 </select>
            </div>
             <div id='filteritemdiv'>
                <div id='divheaderlabelgray'>
                 Mosha
                </div>
                 <select id='combobox'>
                 <option value='18' selected='18'>18</option>
                  <option value='19'>19</option>
                  <option value='20'>20</option>
                  <option value='21'>21</option>
                  <option value='22'>22</option>
                  <option value='23'>23</option>
                  <option value='24'>24</option>
                  <option value='25'>25</option>
                  <option value='26'>27</option>
                  
                 </select>
            </div>
            <div id='filteritemdiv'>
                 <div id='divheaderlabelgray'>
                    Viti 
                </div>
                <select id='combobox'>
                 <option value='1' selected='1'>1 (I pare)</option>
                  <option value='2'>2 (I dyte)</option>
                  <option value='3'>3 (I trete)</option>
                  </select>
            </div>
      </div>
     <div id='divi_i_rezultatit' >
        <img src='img/loadingimg.gif'>
        
     </div>
       
       <div style='display: none' id='divi_listes_se_studentave'>
       	
       </div>
       </div>";
	 if($admin_i_hapur!=-1){?>
	 	 <div class='tedhenatcontainer'>

  			<div class='leftdiv'>
  					<div id='profileheaderlabel'>Fotoja e profilit
					<?php if($admin_i_loguar){ ?>
                        <input type='button' id='ndryshofotobtn' onclick='shfaq_div_ndrysho_foto_profili()' value='Ndrysho foton'><?php } ?> 
                    </div>

                    <div id='profpiccont'>
                    <img src=<?php echo "'". $admin_obj[0]['a_foto']."'"; ?> >
                    </div>
                    <?php if($admin_i_loguar){ ?>
                    <form method='post' action='ndrysho_admin_foto.php' enctype='multipart/form-data' id='forma_ndryshimit'>
                    <div id='uploadprofilepic' align='middle'>
                     <input type='text'  id='upload_pic_path' value='Asnje foto e perzgjedhur ..' readonly='true'>
                     <input type='file' style='width: 87px;'  id='ngarko' onchange='umor_foto(1)' name='f_profili'>
                     <input type='button' onclick='umor_foto(-1)' id='anulo' style='width: 70px;' value='Anulo'>
                     <input type='submit' style='display: none;width: 60%;color:white;height:25px;background-color: #207cca;' id='konfirmo_foto' value='konfirmo'>
                    </div>
                    </form>
                      <?php } ?> 
  
  
 			 </div>
  			<div class='rightdiv'>
  					<div id='profileheaderlabel'>
  					Te dhenat personale
  					</div>
  					<div id='te_dhenat_personale_div'>
  						<?php if($admin_i_loguar){ ?>
  						<img align='right' style='margin-top: -10px;' id='img_men_ndrysho' src='img/ndrysho.png' width='50px' height='50px' onclick='shfaq_menu_djathtas()'  />
  						<?php } ?>
  						<p>Emri i plote<br><font style='color:black'><?php echo $admin_obj[0]['a_emri'].' '.$admin_obj[0]['a_mbiemri'];   ?></font></p>
 					 </div>
    				<div id='te_dhenat_personale_div'>
  					<p>Adresa<br><font style='color:black'><?php echo $admin_obj[0]['a_adr']; ?></font></p>
  					</div>
    				<div id='te_dhenat_personale_div'>
  					<p>Kontakt<br><font style='color:black'>CEL : <?php echo $admin_obj[0]['a_cel']; ?> , Email : <?php echo $admin_obj[0]['a_email']; ?></font></p>
  					</div>
                    <div id='te_dhenat_personale_div'>
  					<p>Datelindja <br><font style='color:black'><?php echo $ditelindja_formatizuar.' ( '.$mosha->y.' vjec )'; ?></font></p>
  					</div>
                    <div id='te_dhenat_personale_div'>
  					<p>Roli ne universitet<br><font style='color:black'><?php echo  $admin_obj[0]['a_puna']; ?></font></p>
  					</div>
  					 <?php if($admin_i_loguar){ ?>
                     <p id='ndryshofjalkalimintext' onclick='shfaq_div_ndrysho_pas()'>Ndrysho fjalkalimin</p>
                     <div id='ndryshofjalkalimindiv' style='display:none;'  >
                   
                   
  							<div id='ndryshofjalkalimin_kutite'>
  								<form method='post' action='ndrysho_admin_pas.php'>
                   				 <p  >Fjalkalimi i vjeter</p>
                    			<input type='password' name='pas_ekz' id='old_pass'>
                   					 <p>Fjalkalimi i ri</p>
                    			<input type='password'  name='pas_i_ri'  id='new_pass'>
                    			<p>Kofirmo fjalkalimin e ri</p>
                   			    <input type='password'  name='pas_i_ri2'   id='confirm_pass'>
                    
                    <input type='submit' value='Ruaj'  id='ruaj'>
                    <input type='button' value='Anullo' onclick='shfaq_div_ndrysho_pas()'  id='anullo_pass'>
                    			</form>	
                    		
                    		</div>
  					</div>
  					<?php } ?>
  				</div>
      </div>
 
    </div>
<div class='menu_ndrysho_container'>
	<img src='img/mbyll_menu.png' onclick='shfaq_menu_djathtas()' width='100px' style='margin-left: 10px;' />
	<div style='margin: 15px;'>
		<form method='post' action='ndrysho_admin_te_dhena.php' >
			<div class='menu_tituj' style='font-size: 20px;'>Ndrysho te dhenat tuaja ...</div>
			<hr />
			<div style='padding: 5px;padding-top: 15px;'>
			<div class='menu_tituj' style='font-size: 18px;'>Te dhena personale</div>
			<div class='menu_tituj' align='right'> Emri <input name='input_emri' type='text' value='<?php echo $admin[0]['a_emri']; ?>' style='width: 90px;' placeholder='Emri' /><input name='input_mbiemri' style='width: 90px;' type='text' value='<?php echo $admin[0]['a_mbiemri']; ?>' placeholder='Mbiemri' /></div>
			<div class='menu_tituj' align='right'> Ditelindja 
				<input name='input_ditelindja_dita' size="2" maxlength="2" value="<?php echo $ditelindja_orig->format("d"); ?>" type='text' id="input_ditelindja_dita" style='width: 45px;' placeholder='dita' />
				<input name='input_ditelindja_muaji' size="2" maxlength="2" value="<?php echo $ditelindja_orig->format("m"); ?>" type='text' id="input_ditelindja_muaji" style='width: 55px;' placeholder='muaji' />
				<input name='input_ditelindja_viti' size="4" maxlength="4" value="<?php echo $ditelindja_orig->format("Y"); ?>" type='text' id="input_ditelindja_viti" style='width: 50px;' placeholder='viti' /></div>
			
			</div>
			<hr />
			<div style='padding: 5px;padding-top: 15px;'>
			<div class='menu_tituj' style='font-size: 18px;'>Kontakt</div>
			<div class='menu_tituj' align='right'> Cel <input name='input_cel' type='text' value='<?php echo $admin[0]['a_cel']; ?>' placeholder='Nr Cel' /></div>
			<div class='menu_tituj' align='right'>Email <input name='input_email' type='text' value='<?php echo $admin[0]['a_email']; ?>' placeholder='Email' /></div>
			</div>
			<hr />
			<div style='padding: 5px;padding-top: 15px;'>
			<div class='menu_tituj' style='font-size: 18px;'>Adresa</div>
			<div class='menu_tituj' align='right'><input name='input_adr' type='text' value='<?php echo $admin[0]['a_adr']; ?>' placeholder='Adresa' /></div>
			</div>
			<hr />
                     <input type='hidden' name='src' value='admin'>
                     <input type='hidden' name='a_id' value=<?php echo "'".$admin[0]['a_id']."'"; ?>>
			         <div class='menu_tituj' align='right'><input type='submit' style='width: 60%;background-color: #0099ff;color: #FFFFFF;' value='Ndrysho !' /></div>
		
		
		</form>
	</div>
</div>
	<?php } 

shfaq_footer(""); ?>

