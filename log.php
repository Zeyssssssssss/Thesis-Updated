<?php
    session_start();
    if(isset($_POST['save'])){
        unset($_SESSION['auth']);
        unset($_SESSION['role']);
        unset($_SESSION['userinfo']);
        header("location:login.php");
    }


?>