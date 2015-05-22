<?php
     include 'php/func.php';
     
 
     session_start();
     $lidhja=lidhu();
    // ndryshimi i fotos se profilit #################################################################
     //kontrollojem a eshte i loguar klienti qe don me ba nji modifikim foto
     
        
         
     if(isset($_SESSION["admin"]))
     $admin=$_SESSION["admin"];
     else header("location: admin.php?abuzim_me_te_drejtat=true"); 
        
     $admin=exec_query("Select * from admin where a_id=".$admin[0]["a_id"], $lidhja);
     
     $foto_e_vlefshme=1;
     $dir_e_perd = "admin/".$admin[0]["a_id"]."/foto/";
     $foto_dir = $dir_e_perd . basename($_FILES["f_profili"]["name"]);
     
     $tipi_fotos = pathinfo($foto_dir,PATHINFO_EXTENSION);

if( $tipi_fotos != "jpg" &&  $tipi_fotos != "png" && $tipi_fotos != "jpeg"&&  $tipi_fotos != "gif" ) {
     $foto_e_vlefshme=0;// kontrollojme nqs eshte e vlefshme fotoja
}
if ($foto_e_vlefshme != 0) {
    mkdir("admin");
    mkdir("admin/".$admin[0]["a_id"]);
    mkdir("admin/".$admin[0]["a_id"]."/foto");
    if($admin[0]["a_foto"]!="img/def_profile_pic.jpg")unlink($admin[0]["a_foto"]);// fshihet fotoja e vjeter nqs nuk eshte fotoja default
    
    move_uploaded_file($_FILES["f_profili"]["tmp_name"], $foto_dir);
}else $foto_dir=$admin[0]["foto"];

    exec_query("update admin set a_foto='{$foto_dir}' where `a_id`=".$admin[0]["a_id"], $lidhja);
    $_SESSION["admin"]=exec_query("Select * from admin where a_id=".$admin[0]["a_id"], $lidhja);
   
    header("location: admin.php?admin=".$admin[0]["a_id"]); 
   
   // ndryshimi i fotos se profilit #################################################################
?>