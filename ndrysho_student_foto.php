<?php
     include 'php/func.php';
     
 
     session_start();
     $lidhja=lidhu();
    // ndryshimi i fotos se profilit #################################################################
     //kontrollojem a eshte i loguar klienti qe don me ba nji modifikim foto
     if(isset($_POST["src"])&&(isset($_POST["s_id"]))){
         $src=$_POST["src"];
         if($_POST["src"]=="admin"){
             if(isset($_SESSION["admin"]))$admin=$_SESSION["admin"];
             else header("location: index.php?abuzim_me_te_drejtat=true"); 
             $perd=-1;
         }else if($_POST["src"]=="student") {
             if(isset($_SESSION["perdorues"]))$perd=$_SESSION["perdorues"];
             else header("location: index.php?abuzim_me_te_drejtat=true"); 
             $admin=-1;
         }
              
     if($perd!=-1)$perd=exec_query("Select * from student where stud_id=".$perd[0]["stud_id"], $lidhja);//
     else $perd=exec_query("Select * from student where stud_id=".$_POST["s_id"], $lidhja);
     
     if(empty($perd))
        if($src="admin")header("Location: admin.php?gabim_ne_nderrimin_e_fotos=".$_POST["s_id"]);
        else header("Location: index.php?gabim_ne_nderrimin_e_fotos=".$_POST["s_id"]);
     
     $foto_e_vlefshme=1;
     $dir_e_perd = "studente/".$perd[0]["stud_id"]."/foto/";
     $foto_dir = $dir_e_perd . basename($_FILES["f_profili"]["name"]);
     
     $tipi_fotos = pathinfo($foto_dir,PATHINFO_EXTENSION);

if( $tipi_fotos != "jpg" &&  $tipi_fotos != "png" && $tipi_fotos != "jpeg"&&  $tipi_fotos != "gif" ) {
     $foto_e_vlefshme=0;// kontrollojme nqs eshte e vlefshme fotoja
}
if ($foto_e_vlefshme != 0) {
    mkdir("studente");
    mkdir("studente/".$perd[0]["stud_id"]);
    mkdir("studente/".$perd[0]["stud_id"]."/foto");
    if($perd[0]["s_foto"]!="img/def_profile_pic.jpg")unlink($perd[0]["s_foto"]);// fshihet fotoja e vjeter nqs nuk eshte fotoja default
    
    move_uploaded_file($_FILES["f_profili"]["tmp_name"], $foto_dir);
}else $foto_dir=$perd[0]["foto"];

    exec_query("update student set s_foto='{$foto_dir}' where `stud_id`=".$perd[0]["stud_id"], $lidhja);
    $_SESSION["perdorues"]=exec_query("Select * from student where stud_id=".$perd[0]["stud_id"], $lidhja);
   
   if($src=="student")header("location: student.php?student=".$perd[0]["stud_id"]);
   else header("location: admin_student.php?student=".$perd[0]["stud_id"]); 
   
    }else header("location: index.php?abuzim_me_te_drejtat=true"); 
    
    // ndryshimi i fotos se profilit #################################################################
         
         

?>