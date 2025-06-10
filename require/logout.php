<?php 
    session_start();
    session_unset();
    session_destroy();
    header("location: /acadlist/login.php");
    exit();
?>