<?php
    session_start();
    include 'db.php';
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>User Profile</title>
</head>
<body class="container mt-5">
    <h2>User Profile</h2>
    <form method = "post">
        <div class="form-group">
            <label for="name">Full Name</label>
            <input type="text" class="form-control" id="name"  value = " <?php echo $_SESSION['userinfo']['name']?>"placeholder="Enter your name">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" value = " <?php echo $_SESSION['userinfo']['email']?>"placeholder="Enter your email">
        </div>
        <div class="form-group">
            <label for="name">PhoneNumber</label>
            <input type="text" class="form-control" id="name"value = " <?php echo $_SESSION['userinfo']['phone']?>" placeholder="Enter your name">
        </div>
        <div class="form-group">
            <label for="name">Address</label>
            <input type="text" class="form-control" id="name"value = " <?php echo $_SESSION['userinfo']['address']?>" placeholder="Enter your name">
        </div>
        
        
        <button type="submit" class="btn btn-primary">Save Changes</button>
        <a href="../admin/admin.php" class='btn btn-primary'>Back</a>
    </form>
</body>
</html>
