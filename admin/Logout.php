<?php 
       session_start()  ;
       session_unset();    //Start session
       session_destroy();
       header('Location: index.php');
       exit();