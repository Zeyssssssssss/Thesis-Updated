<?php
  
    include '../include/thirdnav.php';
    include 'db.php';

    if (isset($_POST['save'])) {
        $id = $_SESSION['userinfo']['id'];
        $stud_id = $_POST['student_id'];
        $current = $_POST['current_room'];
        $new = $_POST['new_room'];
        $date = $_POST['date'];
        $pending = "Pending";

        $sql = "INSERT INTO roomchanges (`name`, `room_num`, `room_pref`, `created_at`, `user_id`, `status`) 
                VALUES ('$stud_id', '$current', '$new', '$date', '$id', '$pending')";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            $_SESSION['message'] = "Request Successfully Submitted";
        } else {
            $_SESSION['message'] = "Request Submission Failed";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room Change Request</title>
    <style>
    /* Base Styles */
    body {
        background-color: #f9f9f9;
        font-family: Arial, sans-serif;
    background-color: #f4f7fc;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center; /* Center horizontally */
    align-items: flex-start; /* Align to the top */
    height: 100vh; /* Full viewport height */
    
      
        min-height: 100vh;
        margin: 0;
    }

    h1, h2, h3 {
        color: #333;
        margin-bottom: 20px;
    }

    .section {
        width: 100%;
        max-width: 1200px;
        padding: 0 15px;
    }

    /* Form Container Styling */
    .form-container {
        background-color: #fdf5e6;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 1300px; /* Adjust max width for responsiveness */
        position: absolute;
        right: 100px;
        top: 30px;
        box-sizing: border-box;
    }

    .form-container label {
        font-weight: bold;
        margin-bottom: 8px;
        display: block;
    }

    .form-container input, .form-container select, .form-container textarea {
        width: 100%;
        padding: 12px;
        margin: 8px 0 20px 0;
        border: 1px solid #ddd;
        border-radius: 6px;
        box-sizing: border-box;
        font-size: 16px;
    }

    .form-container input[type="date"] {
        font-size: 16px;
    }

    /* Button Styling */
    .form-container button {
        padding: 12px 20px;
      
        color: #fff;
        font-size: 16px;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        transition: background-color 0.3s ease, transform 0.2s ease;
        width: 100%; /* Make button full width on smaller screens */
    }

    .form-container button:hover {
        background-color: #45a049;
        transform: translateY(-2px);
    }

    .form-container button:active {
        transform: translateY(2px);
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .form-container {
            padding: 20px;
            margin: 20px; /* Reduce margin on smaller screens */
        }

        .form-container label,
        .form-container input,
        .form-container button {
            font-size: 14px; /* Smaller font size for better readability */
        }

        .form-container button {
            padding: 15px 20px; /* Adjust button padding */
        }

        .form-container input, .form-container select, .form-container textarea {
            padding: 10px; /* Adjust input field padding */
        }
    }

    /* Success/ Error Message Styling */
    .message {
        padding: 10px;
        margin-bottom: 20px;
        border-radius: 5px;
        text-align: center;
        font-size: 16px;
    }

    .message.success {
        background-color: #d4edda;
        color: #155724;
    }

    .message.error {
        background-color: #f8d7da;
        color: #721c24;
    }
    .mini-navbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
        background-color: #f8f9fa;
        padding: 10px;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        height: 80px;
    }
    .mini-navbar .search-bar input {
        width: 200px;
        padding: 5px;
        font-size: 14px;
        border-radius: 5px;
        border: 1px solid #ccc;
    }
    .mini-navbar .show-entries select {
        padding: 5px;
        font-size: 14px;
        border-radius: 5px;
        border: 1px solid #ccc;
    }
    #moda{
        width: 200px;
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


    <div class="section">
       
        <div class="form-container">
        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#myModal" id= "moda">
    Room Change History
  </button>


<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">History</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                <th>Name</th>
                <th>Room Number</th>
                <th>Room Preference</th>
                <th>Date</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $id = $_SESSION['userinfo']['id'];
                $sql = "SELECT name , room_num, room_pref, created_at FROM roomchanges Where user_id = '$id' ";
                $res = $conn->query($sql);
                while($row = $res->fetch_assoc()){
                    ?>
                        <tr>
                            <th><?= $row['name']?></th>
                            <th><?= $row['room_num']?></th>
                            <th><?= $row['room_pref']?></th>
                            <th><?= $row['created_at']?></th>
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
            <form method="POST">
                <?php 
                    if (isset($_SESSION['message'])) {
                        $message_type = (strpos($_SESSION['message'], 'Successfully') !== false) ? 'success' : 'error';
                        echo "<div class='message $message_type'>{$_SESSION['message']}</div>";
                        unset($_SESSION['message']);
                    }
                ?>
                
              
                <h2>Room Change Request</h2>
                
                <label for="student-id">Full Name:</label>
                <input type="text" id="student-id" name="student_id" placeholder="Enter Your Full Name" required>

                <label for="current-room">Current Room Number:</label>
                <input type="text" id="current-room" name="current_room" placeholder="Enter current room number" required>

                <label for="new-room">New Room Preference:</label>
                <input type="text" id="new-room" name="new_room" placeholder="Enter preferred room number">

                <label for="date">Date:</label>
                <input type="date" id="date" name="date" required>

                <button type="submit" name="save" class="btn btn-success">Submit Request</button>
            </form>
        </div>
    </div>
</body>
</html>
