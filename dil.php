<?php   // ky thjesht shkaterron Session ne menyre qe te behet logout perdoruesi
        session_start();
		session_destroy();
        header("location: index.php");
 ?>