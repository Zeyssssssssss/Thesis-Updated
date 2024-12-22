<?php
 
    include 'db.php';
    if($_SESSION['role'] == 0){
        $_SESSION['message'] =  "You are not admin you cannot access this page";
        header("location: ../admin/login.php");
    }
 

?>