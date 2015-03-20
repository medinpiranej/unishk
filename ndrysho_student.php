<?php
     include 'php/func.php';
     
 
     session_start();
     if(isset($_SESSION["perdorues"]))$perd=$_SESSION["perdorues"];
     else header("location: index.php?abuzim_me_te_drejtat=true"); // nqs dikush hyn ne kete faqe i paloguar

     $lidhja=lidhu();
     $perd=exec_query("Select * from student where stud_id=".$perd[0]["stud_id"], $lidhja);//
     
     $foto_e_vlefshme=1;
     $dir_e_perd = "perd".$perd[0]["stud_id"]."/foto/";
     $foto_dir = $dir_e_perd . basename($_FILES["f_profili"]["name"]);
     
     $tipi_fotos = pathinfo($foto_dir,PATHINFO_EXTENSION);

if( $tipi_fotos != "jpg" &&  $tipi_fotos != "png" && $tipi_fotos != "jpeg"&&  $tipi_fotos != "gif" ) {
     $foto_e_vlefshme=0;// kontrollojme nqs eshte e vlefshme fotoja
}
if ($foto_e_vlefshme != 0) {
    mkdir("perd".$perd[0]["stud_id"]);
    mkdir("perd".$perd[0]["stud_id"]."/foto");
    if($perd[0]["foto"]!="img/def_profile_pic.jpg")unlink($perd[0]["foto"]);// fshihet fotoja e vjeter nqs nuk eshte fotoja default
    
    move_uploaded_file($_FILES["f_profili"]["tmp_name"], $foto_dir);
}else $foto_dir=$perd[0]["foto"];

    exec_query("update student set foto='{$foto_dir}' where `stud_id`=".$perd[0]["stud_id"], $lidhja);
    $_SESSION["perdorues"]=exec_query("Select * from student where stud_id=".$perd[0]["stud_id"], $lidhja);
    header("location: student.php?student=".$perd[0]["stud_id"]);
?>