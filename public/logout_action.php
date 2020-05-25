<?php
// session_start();


    if(isset($_POST['submit'])){
        session_start();
        session_unset();
        session_destroy();
        header("Location: ../public/index.php");
        exit();
        
    } 

