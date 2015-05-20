<?php
     include 'php/func.php';
     session_start();
     $lidhja=lidhu();
    // ndryshimi i cv-se se studentit #################################################################
     //kontrollojme a eshte i loguar klienti qe don me ba nji modifikim cv 
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
        if($src="admin")header("Location: admin.php?gabim_ne_nderrimin_e_cv=".$_POST["s_id"]);
        else header("Location: index.php?gabim_ne_nderrimin_e_cv=".$_POST["s_id"]);
     
     $cv_e_vlefshme=1;
     $dir_e_perd = "studente/".$perd[0]["stud_id"]."/cv/";
     $cv_dir = $dir_e_perd . basename($_FILES["cv_e_re"]["name"]);
     
     $tipi_cvs = pathinfo($cv_dir,PATHINFO_EXTENSION);

if( $tipi_cvs != "pdf" &&  $tipi_cvs != "docx" && $tipi_cvs != "doc" ) {
     $cv_e_vlefshme=0;// kontrollojme nqs eshte e vlefshme cvja
}
if ($cv_e_vlefshme != 0) {
    mkdir("studente/");
    mkdir("studente/".$perd[0]["stud_id"]);
    mkdir("studente/".$perd[0]["stud_id"]."/cv");
    if($perd[0]["s_cv"]!="")unlink($perd[0]["s_cv"]);// fshihet cvja e vjeter nqs nuk eshte cvja default pra bosh "" sepse do te gjeneroje gabim !!!
    
    move_uploaded_file($_FILES["cv_e_re"]["tmp_name"], $cv_dir);
}else $cv_dir=$perd[0]["cv"];

    exec_query("update student set s_cv='{$cv_dir}' where `stud_id`=".$perd[0]["stud_id"], $lidhja);
    $_SESSION["perdorues"]=exec_query("Select * from student where stud_id=".$perd[0]["stud_id"], $lidhja);
   
   if($src=="student")header("location: student.php?student=".$perd[0]["stud_id"]);
   else header("location: admin_student.php?student=".$perd[0]["stud_id"]); 
   
    }else header("location: index.php?abuzim_me_te_drejtat=true"); 
    
    // ndryshimi i cv-s se profilit #################################################################
         
         

?>