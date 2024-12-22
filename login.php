<?php
 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dormitory Management System - Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background: linear-gradient(to right, #00b4d8, #0077b6);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }
        .container {
            margin-top: 20px;
            max-width: 500px;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .card {
            border-radius: 12px;
            padding: 40px;
            background: #f9f9f9;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }
        .card h2 {
            font-size: 2.2rem;
            margin-bottom: 30px;
            font-weight: bold;
            color: #0077b6;
        }
        .form-control {
            border-radius: 8px;
            border: 1px solid #ccc;
            padding: 15px;
            margin-bottom: 20px;
            font-size: 1rem;
        }
        .btn-primary {
            background-color: #00b4d8;
            border: none;
            padding: 12px;
            font-size: 1.1rem;
            width: 100%;
            border-radius: 8px;
            transition: all 0.3s ease-in-out;
        }
        .btn-primary:hover {
            background-color: #0077b6;
        }
        .modal-dialog {
            max-width: 600px;
            margin-top: 60px;
        }
        .modal-content {
            border-radius: 10px;
        }
        .modal-footer {
            justify-content: space-between;
        }
        .forgot-password {
            color: #0077b6;
            text-decoration: none;
            font-size: 1rem;
            transition: color 0.3s;
        }
        .forgot-password:hover {
            color: #00b4d8;
        }
        .register-btn-container {
            text-align: center;
            margin-top: 30px;
        }
        .register-btn-container button {
            border-radius: 8px;
            padding: 10px 25px;
            font-size: 1rem;
            background-color: #0077b6;
            color: white;
            border: none;
            transition: background-color 0.3s;
        }
        .register-btn-container button:hover {
            background-color: #00b4d8;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="card">
        <h2>Login to Dormitory Management System</h2>
        <form method="POST" action="process.php">
            <div class="form-group">
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Login</button>
            <div class="text-center mt-3">
                <a href="#" class="forgot-password">Forgot Password?</a>
            </div>
        </form>
    </div>

    <!-- Register Button -->
    <div class="register-btn-container">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#registerModal">
            Register
        </button>
    </div>

    <!-- Registration Modal -->
    <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="registerModalLabel">Register for Dormitory</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="regiprocess.php" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" placeholder="Enter your full name" required>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" placeholder="Enter your email" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="no" placeholder="Enter your phone number" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="add" placeholder="Enter your address" required>
                        </div>
                        
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="confirmpass" placeholder="Confirm Password" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" name="submit" class="btn btn-primary">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
