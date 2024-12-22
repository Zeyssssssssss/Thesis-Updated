<?php

include 'db.php';
if(!isset($_SESSION['auth'])){
    $_SESSION['message'] = "Please Login First Before you access the dashboard";
    header("location:login.php");
}

?>