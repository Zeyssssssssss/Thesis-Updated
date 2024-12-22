<?php
    $conn = mysqli_connect("localhost", "root", "", "thesis");

    if($conn != true){
        echo "Error" . mysqli_connect_error();
    }
   
?>