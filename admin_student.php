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
      <?php if(!$kam_akses_ne_profil)echo"<font style='color:red;font-size:18px;'>Nuk ke akses ne kete profil ... shiko me poshte listene e admineve te keti studenti</font>";  ?>
            
            <div class="leftdiv">
                    <?php if($kam_akses_ne_profil) echo"<form method='post' action='ndrysho_student.php' enctype='multipart/form-data'>";?>
                    <div id="profileheaderlabel">
                    Fotoja e profilit<?php if($kam_akses_ne_profil){ ?>
                        <input type='button' id='ndryshofotobtn' value='Ndrysho foton'><?php } ?> 
                    </div>

                    <div id="profpiccont">
                    <img src=<?php echo "'". $student[0]["s_foto"]."'"; ?> >
                    </div>
                    <?php if($kam_akses_ne_profil){ ?>
                    <div id="uploadprofilepic">
                     <input type="text"  id="upload_pic_path" value="Asnje foto e perzgjedhur .." readonly="true">
                     <input type="file"  id="ngarko" onchange="umor_foto(1)" name="f_profili">
                     <input type="button" onclick="umor_foto(-1)" id="anulo" value="Anulo">
                     <input type="hidden" name="src" value="admin">
                     <input type="hidden" name="s_id" value=<?php echo "'".$student[0]['stud_id']."'"; ?>>
                     <input type="submit" style="display: none;" id="konfirmo" value="konfirmo">
                    </div> } <?php } ?> 
  
  
             </div>
            <div class="rightdiv">
                    <div id="profileheaderlabel">
                    Te dhenat personale<?php if($kam_akses_ne_profil){ ?>
                        <input type='button' id='ndryshofotobtn' value='Ndrysho te dhenat personale'><?php } ?> 
                    </div>
                    <input type="hidden" name="id" value=<?php echo"'".$stud_id."'"; ?>/>
                    <div id="te_dhenat_personale_div">
                        <p>Emri i plote<input type="text" class="disablettext" <?php if(!$kam_akses_ne_profil)echo"readonly='true'"; ?> id="emriplote" value=<?php echo "'".$student[0]["s_emri"]." ".$student[0]["s_mbiemri"]."'";   ?>"></p>
                     </div>
                     <div id="te_dhenat_personale_div">
                    <p>Studion ne :<br><font style="color:black"><?php echo $student[0]["f_emri"]."<br>Dega ".$student[0]["d_emri"]; ?></font></p>
                    </div>
                    <div id="te_dhenat_personale_div">
                    <p>Adresa<input type="text" class="disablettext" <?php if(!$kam_akses_ne_profil)echo"readonly='true'"; ?> id="adresa" value=<?php echo "'".$student[0]["s_adr"]."'"; ?>></p>
                    </div>
                    <div id="te_dhenat_personale_div">
                    <p>Tema e diplomes<input type="text" class="disablettext" <?php if(!$kam_akses_ne_profil)echo"readonly='true'"; ?> id="adresa" value='tema'></p>
                    </div>
                     <div id="te_dhenat_personale_div">
                    <p>Datelindja <br><font style="color:black"><?php echo $ditelindja_formatizuar." ( ".$mosha->y." vjec )"; ?></font></p>
                    </div>
                    
                    <div id="ndryshofjalkalimindiv" >
                    <p id="ndryshofjalkalimintext" <?php if(!$kam_akses_ne_profil)echo"style='display:none;'"; ?> >Ndrysho fjalkalimin</p>
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
           <p id="tema_dip_text">Tema e Diplomes<input type="text"  <?php if(!$kam_akses_ne_profil)echo"readonly='true'"; ?> id="tema_dip_textbox" value="tema" ></p>
          </div>
     <div class="tema_dip_textbox_cont">
         <p id="tema_dip_text">Pershkrimi i temes<textarea rows="3" <?php if(!$kam_akses_ne_profil)echo"readonly='true'"; ?> id="tema_dip_textbox"  >Pershkrimi</textarea></p>
          </div>
      
      </div>
        </div>
       
    </div>

<div class="footer">

<div class="copyrightdiv">

<h5>Copyright( M.Piranej , M.Curoviq ,B.Bajraktari ) 2015</h5>
</div>
</div>



</body>

</html>