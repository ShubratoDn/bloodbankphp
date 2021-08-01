<?php

    session_start();

    session_destroy();
    
    //removing password cookie
    setcookie("password","", time()- 1000);

    header("location: ../index.php");

?>