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
	
    $student=exec_query("Select * from student join dege on s_dega=d_id join fakultet on d_fakultet=f_id where stud_id=$stud_id", $lidhja);
	if(empty($student))header("Location: index.php?studenti_nuk_ekziston=true");// nqs studenti nuk ekziston e redirektojm kete faqe
    
    $kat=$student[0]["s_emri"]." ".$student[0]["s_mbiemri"];
	$tema=exec_query("Select * from tema_diplome where t_id=".$student[0]["stud_id"], $lidhja);
    if(empty($tema))$tema=-1;
    
	shfaq_koken_e_faqes($kat,"<link href='css/cssEprofilit.css' rel='stylesheet' type='text/css'>");
	                //llogaritet mosha duke u bazuar ne ditelindjen dhe i jepet formati dd-mm-yyyy ditelindjes
	  				$ditelindja_orig = new DateTime($student[0]["s_ditelindja"]);
					$ditelindja_formatizuar = $ditelindja_orig->format('d-m-Y');// kthehet ne string ditelindja e formatizuar
                    $tani = new DateTime();// data aktuale
                    $mosha = $tani->diff($ditelindja_orig);
                    //*****************************************************************************************
	
  ?>

<div class="content" ><?php if($profili_i_loguar) echo"<form method='post' action='ndrysho_student.php' enctype='multipart/form-data' id='forma_ndryshimit'>";?>
  <div class="tedhenatcontainer">

  			<div class="leftdiv">
  					<div id="profileheaderlabel">



					Fotoja e profilit<?php if($profili_i_loguar){ ?>
                        <input type='button' id='ndryshofotobtn' onclick="shfaq_div_ndrysho_foto_profili()" value='Ndrysho foton'><?php } ?> 
                    </div>

                    <div id="profpiccont">
                    <img src=<?php echo "'". $student[0]["s_foto"]."'"; ?> >
                    </div>
                    <?php if($profili_i_loguar){ ?>
                    <div id="uploadprofilepic" align="middle">
                     <input type="text"  id="upload_pic_path" value="Asnje foto e perzgjedhur .." readonly="true">
                     <input type="file"  id="ngarko" onchange="umor_foto(1)" name="f_profili">
                     <input type="button" onclick="umor_foto(-1)" id="anulo" value="Anulo">
                     <input type="hidden" name="src" value="student">
                     <input type="hidden" name="s_id" value=<?php echo "'".$student[0]['stud_id']."'"; ?>>
                     <input type="submit" style="display: none;width: 60%;color:white;background-color: #207cca;" id="konfirmo" value="konfirmo">
                    </div> } <?php } ?> 
  
  
 			 </div>
  			<div class="rightdiv">
  					<div id="profileheaderlabel">
  					Te dhenat personale
  					</div>
  					<input type="hidden" name="id" value=<?php echo"'".$stud_id."'"; ?>/>
  					<div id="te_dhenat_personale_div">
  						<p>Emri i plote<br><font style="color:black"><?php echo $student[0]["s_emri"]." ".$student[0]["s_mbiemri"];   ?></font></p>
 					 </div>
   					 <div id="te_dhenat_personale_div">
  					<p>Studion ne :<br><font style="color:black"><?php echo $student[0]["f_emri"]."<br>Dega ".$student[0]["d_emri"]; ?></font></p>
  					</div>
    				<div id="te_dhenat_personale_div">
  					<p>Adresa<br><font style="color:black"><?php echo $student[0]["s_adr"]; ?>></font></p>
  					</div>
                    <div id="te_dhenat_personale_div">
  					<p>Tema e diplomes<br><font style="color:black">tema</font></p>
  					</div>
                     <div id="te_dhenat_personale_div">
  					<p>Datelindja <br><font style="color:black"><?php echo $ditelindja_formatizuar." ( ".$mosha->y." vjec )"; ?></font></p>
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
      </div>
      <div class="tema_cv" id="cv_tema">
      	  <div class="but_tema_cv" align="middle">
      	  <input type="button" value="hap temen e diplomes" />
      	  <input type="button" value="hap CV e studentit" id='but_hap_cv' onclick="hap_mbyll_cv()" />
      	  </div>
      <div class="cv_div" align="middle" style="display: none;">
      	<input type="button" value="ngarko ne cv te re" />
      	<iframe   width="95%" src="perd1/cv.pdf" height="100%"></iframe>
  	  </div>
       
      </div>
        <?php if($profili_i_loguar) echo"</form> <a href='kerko_ndryshim'>ndrysho te dhenat qe nuk aksesohen nga studentat</a><br>";?>
	</div>

<div class="footer">

<div  class="copyrightdiv">

<h5>Copyright( M.Piranej , M.Curoviq ,B.Bajraktari ) 2015</h5>
</div>
</div>



</body>

</html>