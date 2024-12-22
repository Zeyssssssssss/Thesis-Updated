<?php
    session_start();
    include 'db.php';
        if(isset($_POST['submit'])){
            $email = htmlspecialchars($_POST['email']);
            $password = htmlspecialchars($_POST['password']);

            $sql = "SELECT * FROM register WHERE email = '$email' AND password = '$password'";
            $result = mysqli_query($conn, $sql);

            foreach($result as $item){
                $uid = $item['id'];
                $fullname = $item['fullname'];
                $email = $item['email'];
                $Phone = $item['phone'];
                $Address = $item['address'];
                $pass = $item['password'];
                $role = $item['role'];
            }
        
            if(mysqli_num_rows($result)> 0){
                $_SESSION['auth'] = true;
                $_SESSION['role'] = $role;
                $_SESSION['userinfo'] = [
                    'id' => $uid,
                    "name" => $fullname,
                    "email" => $email,
                    "phone" => $Phone,
                    "address" => $Address
                ];
              
                if($_SESSION['role'] == 1){
                    $_SESSION['message'] = "Welcome Admin";
                    header("Location: admin.php");
                    
                }elseif($_SESSION['role'] == 2){
                    $_SESSION['message'] = "Welcome Staff";
                    header("location: staff.php");
                }
                elseif($_SESSION['role'] == 0){
                    $_SESSION['message'] = "Welcome User";
                    Header("location: ../user/dashboard.php");
                }else{
                    Header("Location:login.php");
                }
                
                
                
            }else{
                $_SESSION['message'] = "Failed to Login Please Check your Email and Password";
                header("Location: login.php");
            }
        }else{
            $_SESSION['message'] = "Your are not allowed to access this page";
            header("location: login.php");
            exit(0);
        }



?>