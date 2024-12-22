<?php
    session_start();
    include 'db.php';
    $id = $_GET['id'];
    $sql = "DELETE FROM addroom WHERE id = '$id' ";
    $result = $conn->query($sql);

    if($result){
        $_SESSION['message'] = "Delete Successfully";
        header("location: tracker.php");
    }else{
        $_SESSION['message'] = "Failed to delete row";
    }



?>