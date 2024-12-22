<?php
    session_start();
    include 'db.php';
    if(isset($_POST['submit'])){
        $fullname = htmlspecialchars($_POST['name']);
        $Email = htmlspecialchars($_POST['email']);
        $Phone = htmlspecialchars($_POST['no']);
        $Address = htmlspecialchars($_POST['add']);
        $Password = htmlspecialchars($_POST['password']);
        $Confirm = htmlspecialchars($_POST['confirmpass']);
       if($Confirm == $Password){
            $checkemail = "SELECT * FROM register where email = '$Email'";
            $result = mysqli_query($conn , $checkemail);

            if(mysqli_num_rows($result) > 0){
                echo "This email Already Exist Please Put other email";
            }
            else{
                $sql = "INSERT INTO register(`fullname`, `email`,  `phone`, `address`, `password`) Values('$fullname', '$Email', '$Phone', '$Address', '$Password')";
                $resulta = mysqli_query($conn, $sql);
                
                if($resulta){
                    $_SESSION['message'] = "Successfully Register";
                    header("location:login.php");
                }else{
                     $_SESSION['message'] = "Failed to Register";
                }
                
            }
        }
        
       } else{
            echo "Your Password Do not  match, please check your password";
            exit(0);
       }
 


?>
