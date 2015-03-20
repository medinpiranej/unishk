<?php 
    include 'php/func.php';
     
     session_start();
	 $profili_i_loguar=false; // variabel qe me vone do ta perdorim per te pare nqs profili i hapur eshte i atij qe eshte loguar
	 
	 if(isset($_SESSION["perdorues"]))$perd=$_SESSION["perdorues"];
	 else $perd=-1;
	 
	 
    if(!isset($_GET["student"]))header("Location: index.php");// nqs nuk jemi duke kerkuar e redirektojm kete faqe
    $stud_id=$_GET["student"];
    $lidhja=lidhu();
	
	if($perd!=-1)if($perd[0]["stud_id"]==$stud_id)$profili_i_loguar=true;// tani jemi duge naviguar ne profilin e atij qe eshte loguar
	
    $student=exec_query("Select * from student where stud_id=$stud_id", $lidhja);
	
	if(empty($student))header("Location: index.php?studenti_nuk_ekziston=true");// nqs studenti nuk ekziston e redirektojm kete faqe
    
    $kat=$student[0]["emri"]." ".$student[0]["mbiemri"];
	
	shfaq_koken_e_faqes($kat,"<link href='css/cssEprofilit.css' rel='stylesheet' type='text/css'>");
  ?>

<div class="content" ><?php if($profili_i_loguar) echo"<form method='post' action='ndrysho_student.php' enctype='multipart/form-data' id='forma_ndryshimit'>";?>
  <div class="tedhenatcontainer">

  			<div class="leftdiv">
  					<div id="profileheaderlabel">



					Fotoja e profilit<?php if($profili_i_loguar){ ?>
                        <input type='button' id='ndryshofotobtn' value='Ndrysho foton'><?php } ?> 


  					</div>

  					<div id="profpiccont">
  					<img src=<?php echo "'". $student[0]["foto"]."'"; ?> >
  					</div>
  
  					<div id="uploadprofilepic">
 					 <input type="text"  id="upload_pic_path" value="Asnje foto e perzgjedhur .." readonly="true">
 					 <input type="file"  id="ngarko" onchange="umor_foto(1)" name="f_profili">
 					 <input type="button" onclick="umor_foto(-1)" id="anulo" value="Anulo">
  					</div>
  
  
 			 </div>
  			<div class="rightdiv">
  					<div id="profileheaderlabel">
  					Te dhenat personale<?php if($profili_i_loguar) echo"<input type='submit' id='ndryshofotobtn' value='Ruaj te dhenat'>"; ?>
  					</div>
  					<input type="hidden" name="id" value=<?php echo"'".$stud_id."'"; ?>/>
  					<div id="te_dhenat_personale_div">
  						<p>Emri i plote<input type="text" class="disablettext" <?php if(!$profili_i_loguar)echo"readonly='true'"; ?> id="emriplote" value=<?php echo "'".$student[0]["emri"]." ".$student[0]["mbiemri"]."'";   ?>"></p>
 					 </div>
   					 <div id="te_dhenat_personale_div">
  					<p>Dega<input type="text" class="disablettext" <?php if(!$profili_i_loguar)echo"readonly='true'"; ?> id="dega" value=<?php echo "'".$student[0]["dega"]."'"; ?>  ></p>
  					</div>
    				<div id="te_dhenat_personale_div">
  					<p>Adresa<input type="text" class="disablettext" <?php if(!$profili_i_loguar)echo"readonly='true'"; ?> id="adresa" value=<?php echo "'".$student[0]["adresa"]."'"; ?>></p>
  					</div>
                    <div id="te_dhenat_personale_div">
  					<p>Tema e diplomes<input type="text" class="disablettext" <?php if(!$profili_i_loguar)echo"readonly='true'"; ?> id="adresa" value=<?php echo "'".$student[0]["tema_diplomes"]."'"; ?>></p>
  					</div>
                     <div id="te_dhenat_personale_div">
  					<p>Datelindja<input type="date" class="disablettext" <?php if(!$profili_i_loguar)echo"readonly='true'"; ?> id="adresa" value=<?php echo "'".$student[0]["ditelindja"]."'"; ?> ></p>
  					</div>
                    
                    <div id="ndryshofjalkalimindiv" >
                    <p id="ndryshofjalkalimintext" <?php if(!$profili_i_loguar)echo"style='display:none;'"; ?> >Ndrysho fjalkalimin</p>
                    </div>
                     <div id="ndryshofjalkalimindiv2">
  							<div id="ndryshofjalkalimin_kutite">
                   				 <p  >Fjalkalimi i vjeter</p>
                    			<input type="password"  id="old_pass">
                   					 <p>Fjalkalimi i ri</p>
                    			<input type="password"  id="new_pass">
                    			<p  >Kofirmo fjalkalimin e ri</p>
                   			    <input type="password"  id="confirm_pass">
                    
                    <input type="button" value="Ruaj"  id="ruaj">
                    <input type="button" value="Anullo"  id="anullo_pass">
                    				</div>
  					</div>
  				</div>
      
      <div class="tema_dip_container">
      <div class="tema_dip_textbox_cont">
           <p id="tema_dip_text">Tema e Diplomes<input type="text"  <?php if(!$profili_i_loguar)echo"readonly='true'"; ?> id="tema_dip_textbox" value=<?php echo "'".$student[0]["tema_diplomes"]."'"; ?> ></p>
          </div>
     <div class="tema_dip_textbox_cont">
         <p id="tema_dip_text">Pershkrimi i temes<textarea rows="3"   <?php if(!$profili_i_loguar)echo"readonly='true'"; ?> id="tema_dip_textbox"  ><?php echo "".ltrim($student[0]["pershkrimi_temes"]).""; ?></textarea></p>
          </div>
      
      </div>
  		</div>
        <?php if($profili_i_loguar) echo"</form>";?>
	</div>

<div class="footer">

<div class="copyrightdiv">

<h5>Copyright( M.Piranej , M.Curoviq ,B.Bajraktari ) 2015</h5>
</div>
</div>



</body>

</html>