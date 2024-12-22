<?php
 
     include '../include/thirdnav.php';
     include 'db.php';

     if (isset($_POST['save'])) {
        $id = $_SESSION['userinfo']['id'];
        $name = $_POST['name'];
        $room_number = $_POST['room_number'];
        $issue = $_POST['issue'];
        $date = $_POST['date'];
        $pending = "Pending";
        $sql = "INSERT INTO mainrequest(`name`, `room_num`, `dates`, `description` , `status`, `user_id`) 
                VALUES ('$name', '$room_number', '$date', '$issue', '$pending', '$id')";
        $result = $conn->query($sql);

        if ($result) {
            $_SESSION['message'] = "Request Successfully Submitted";
        } else {
            $_SESSION['message'] = "Request Failed";
        }
     }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maintenance Request</title>
    <style>
    html, body {
    height: 100%; /* Ensure full height of the viewport */
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center; /* Horizontally center */
    align-items: center; /* Vertically center */
    font-family: Arial, sans-serif;
}

.main-container {
  
    margin: 0 auto; /* Center horizontally */
    position: absolute;
    right: 0px;
    left: 200px;
    top: 50px;
    width: 80%; /* Full width of the viewport */
    height: 80vh; /* Full height of the viewport */
    background-color: #fdf5e6;
   
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    box-sizing: border-box; /* Make padding count towards width */
    padding: 20px;
}



input, textarea {
    width: 100%;
    padding: 15px;
    margin: 10px 0;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
}

button {
    padding: 15px;
    background-color: #28a745;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
}

button:hover {
    background-color: #218838;
}






.navbar {
    background-color: #343a40;
    color: #fff;
    position: fixed;
    top: 0;
    width: 100%;
    z-index: 1000;
}

.sidebar {
    background-color: #1a1a1a;
    color: #fff;
    height: 100vh;
    padding-top: 20px;
    position: fixed;
    top: 56px; /* Adjust for navbar height */
    left: 0;
    width: 240px;
    z-index: 1000;
}

main {
    margin-left: 260px;
    margin-top: 76px; /* Adjust for navbar height */
    padding: 20px;
}


        .sidebar a {
            color: #adb5bd;
            text-decoration: none;
            padding: 10px 15px;
            display: block;
            border-radius: 4px;
            margin: 5px 0;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background-color: #495057;
            color: #fff;
        }

    </style>
</head>
<body>

 <!-- Navbar -->
 <nav class="navbar navbar-dark">
        <a class="navbar-brand" href="admin.php">Fina's Dormitory </a>
        <button class="btn btn-outline-light d-md-none" id="sidebarToggle">
            <i class="fas fa-bars"></i>
        </button>
    </nav>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebarMenu">
        <a href="admin.php" class="active"><i class="fas fa-home"></i> Dashboard</a>

        <!-- Room Tracker Dropdown -->
        <div class="dropdown">
            <a href="#" class="dropdown-toggle" id="roomTrackerDropdown" data-bs-toggle="collapse" data-bs-target="#roomTrackerMenu" aria-expanded="false" aria-controls="roomTrackerMenu">
                <i class="fas fa-bed"></i> Room & Amenities
            </a>
            <div class="collapse" id="roomTrackerMenu">
                <a href="tracker.php" class="ms-3"><i class="fas fa-door-open"></i> Availability</a>
                <a href="roomchange.php" class="ms-3"><i class="fas fa-sync-alt"></i> Room Change Request</a>
                <a href="roomallo.php" class="ms-3"><i class="fas fa-users"></i> Room Allocation</a>
                <a href="mainte.php" class="ms-3"><i class="fas fa-wrench"></i> Maintenance Request</a>
            </div>
        </div>
        
        <a href="tenanttable.php"><i class="fas fa-user"></i> Tenant</a>

        <!-- Billing Dropdown -->
        <div class="dropdown">
            <a href="#" class="dropdown-toggle" id="billingDropdown" data-bs-toggle="collapse" data-bs-target="#billingMenu" aria-expanded="false" aria-controls="billingMenu">
                <i class="fas fa-file-invoice"></i> Billing
            </a>
            <div class="collapse" id="billingMenu">
                <a href="bill.php" class="ms-3"><i class="fas fa-check-circle"></i> Bill</a>
                <a href="invo.php" class="ms-3"><i class="fas fa-sign-out-alt"></i> Invoice</a>
                <a href="payment.php" class="ms-3"><i class="fas fa-credit-card"></i> Pay</a>
                <a href="paytrack.php" class="ms-3"><i class="fas fa-warning icon-spacing"></i> Late Payments</a>
            </div>
        </div>

        <!-- Visitor Management Dropdown -->
        <div class="dropdown">
            <a href="visitorlog.php" class="dropdown-toggle" id="visitorManagementDropdown" data-bs-toggle="collapse" data-bs-target="#visitorManagementMenu" aria-expanded="false" aria-controls="visitorManagementMenu">
                <i class="fas fa-users"></i> Visitor Management
            </a>
            <div class="collapse" id="visitorManagementMenu">
                <a href="visitorlog.php" class="ms-3"><i class="fas fa-file-alt"></i> Visitor Check-in/out logs</a>
                <a href="approval.php" class="ms-3"><i class="fas fa-chart-bar"></i> Authorization & Approval Process</a>
            </div>
        </div>

        <!-- Asset Management Dropdown -->
        <div class="dropdown">
            <a href="#" class="dropdown-toggle" id="assetManagementDropdown" data-bs-toggle="collapse" data-bs-target="#assetManagementMenu" aria-expanded="false" aria-controls="assetManagementMenu">
                <i class="fas fa-cogs"></i> Asset Management
            </a>
            <div class="collapse" id="assetManagementMenu">
                <a href="asset.php" class="ms-3"><i class="fas fa-list"></i> Asset Manage</a>
                <a href="mainteasset.php" class="ms-3"><i class="fas fa-cogs"></i> Asset Maintenance Request </a>
                <a href="schedasset.php" class="ms-3"><i class="fas fa-tools"></i> Schedule Maintenance & Cleaning</a>
                <a href="existingasset.php" class="ms-3"><i class="fas fa-search"></i> Existing Assets</a>
            </div>
        </div>

        <div class="dropdown">
        <a href="#" class="dropdown-toggle" id="reportAnalyticsDropdown" data-bs-toggle="collapse" data-bs-target="#reportAnalyticsMenu" aria-expanded="false" aria-controls="reportAnalyticsMenu">
         <i class="fas fa-pie-chart"></i> Report & Analytics
        </a>

    <div class="collapse" id="reportAnalyticsMenu">
        <a href="reports.php" class="ms-3"><i class="fas fa-chart-line"></i> Generate Reports</a>
        <a href="analytics.php" class="ms-3"><i class="fas fa-chart-bar"></i> Maintenance Logs</a>
        <a href="logs.php" class="ms-3"><i class="fas fa-file-alt"></i>Resident Feedback</a>
    </div>
</div>
       <!-- Logs Dropdown -->
<div class="dropdown">
<a href="#" class="dropdown-toggle" id="logsDropdown" data-bs-toggle="collapse" data-bs-target="#logsMenu" aria-expanded="false" aria-controls="logsMenu">
    <i class="fas fa-file"></i> Logs
</a>

    <div class="collapse" id="logsMenu">
        <a href="visitorlog.php" class="ms-3"><i class="fas fa-users"></i> Visitor Logs</a>
        <a href="maintenanceLog.php" class="ms-3"><i class="fas fa-wrench"></i> Maintenance Logs</a>
        <a href="residentfeedback.php" class="ms-3"><i class="fas fa-comments"></i> Resident Feedback</a>
    </div>
</div>

        <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </div>

                

<div class="main-container">
    <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#myModal" id="moda">
            Maintenance Request History
        </button>

       
        <div class="modal" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Room Change History</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                    <table class="table table-bordered">
            <thead>
                <tr>
                <th>Name</th>
                <th>Room Number</th>
                <th>Date</th>
                <th>Description</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $id = $_SESSION['userinfo']['id'];
                $sql = "SELECT name , room_num,  dates, description FROM mainrequest Where user_id = '$id' ";
                $res = $conn->query($sql);
                while($row = $res->fetch_assoc()){
                    ?>
                        <tr>
                            <th><?= $row['name']?></th>
                            <th><?= $row['room_num']?></th>
                            <th><?= $row['dates']?></th>
                            <th><?= $row['description']?></th>
                        </tr>
                    <?php
                }
            ?>
            </tbody>
            </table>     
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>
        <hr>

        <form>
            <?php 
                        if (isset($_SESSION['message'])) {
                            $message_type = (strpos($_SESSION['message'], 'Successfully') !== false) ? 'success' : 'error';
                            echo "<div class='message $message_type'>{$_SESSION['message']}</div>";
                            unset($_SESSION['message']);
                        }
                    ?>
        <h2>Submit Maintenance Request</h2>
        <label for="fullName">Full Name:</label>
        <input type="text" id="fullName" placeholder="Enter your full name">
        
        <label for="roomNumber">Room Number:</label>
        <input type="text" id="roomNumber" placeholder="Enter your room number">
        
        <label for="date">Date:</label>
        <input type="text" id="date" placeholder="dd/mm/yyyy">
        
        <label for="description">Issue Description:</label>
        <textarea id="description" placeholder="Describe the issue..."></textarea>
        
        <button type="submit">Submit Maintenance Request</button>
    </form>
</div>

</body>
</html>
