<?php
session_start();
include 'authetication.php';
include 'auth.php';

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "thesis";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data for the bar chart
$sql = "SELECT category, COUNT(*) as count FROM bar GROUP BY category";
$result = $conn->query($sql);

$categories = [];
$counts = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $categories[] = $row['category'];
        $counts[] = $row['count'];
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Dormitory Management System</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
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

        main {
            margin-left: 260px;
            padding: 20px;
        }

        .card {
            border-radius: 10px;
            transition: transform 0.2s;
            margin: 10px; /* Adds 10px spacing around each card */
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
        }

        @media (max-width: 768px) {
            .sidebar {
                position: absolute;
                left: -260px;
                transition: all 0.3s ease;
            }

            .sidebar.show {
                left: 0;
            }

            main {
                margin-left: 0;
            }
        }

        .icon-spacing {
            margin-right: 4px;
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
        <a href="genreport.php" class="dropdown-toggle" id="reportAnalyticsDropdown" data-bs-toggle="collapse" data-bs-target="#reportAnalyticsMenu" aria-expanded="false" aria-controls="reportAnalyticsMenu">
         <i class="fas fa-pie-chart"></i> Report & Analytics
        </a>

    <div class="collapse" id="reportAnalyticsMenu">
        <a href="genreport.php" class="ms-3"><i class="fas fa-chart-line"></i> Generate Reports</a>
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

    <!-- Main Content -->
    <main>
        <div class="container-fluid">
            <div class="row mb-4">
                <!-- Existing cards -->
                <div class="col-md-3">
                    <div class="card bg-info text-white">
                        <div class="card-body">
                            <h5 class="card-title">10</h5>
                            <p class="card-text">Total Tenants</p>
                            <a href="#" class="btn btn-light btn-sm">View More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card bg-success text-white">
                        <div class="card-body">
                            <h5 class="card-title">5</h5>
                            <p class="card-text">Total Rooms</p>
                            <a href="tracker.php" class="btn btn-light btn-sm">View More</a>
                        </div>
                    </div>
                </div>

                <!-- New cards (8 cards total now) -->
                <div class="col-md-3">
                    <div class="card bg-warning text-white">
                        <div class="card-body">
                            <h5 class="card-title">8</h5> <!-- Example value -->
                            <p class="card-text">Total Categories</p> <!-- Example description -->
                            <a href="#" class="btn btn-light btn-sm">View More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card bg-primary text-white">
                        <div class="card-body">
                            <h5 class="card-title">20</h5>
                            <p class="card-text">Available Rooms</p>
                            <a href="tracker.php" class="btn btn-light btn-sm">View More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card bg-danger text-white">
                        <div class="card-body">
                            <h5 class="card-title">3</h5>
                            <p class="card-text">Maintenance Requests</p>
                            <a href="#" class="btn btn-light btn-sm">View More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card bg-secondary text-white">
                        <div class="card-body">
                            <h5 class="card-title">15</h5>
                            <p class="card-text">Active Visitors</p>
                            <a href="#" class="btn btn-light btn-sm">View More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card bg-dark text-white">
                        <div class="card-body">
                            <h5 class="card-title">8</h5>
                            <p class="card-text">Total Assets</p>
                            <a href="#" class="btn btn-light btn-sm">View More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card bg-light text-dark">
                        <div class="card-body">
                            <h5 class="card-title">30</h5>
                            <p class="card-text">Total Bills</p>
                            <a href="#" class="btn btn-dark btn-sm">View More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const categories = <?php echo json_encode($categories); ?>;
        const counts = <?php echo json_encode($counts); ?>;

        const ctx = document.getElementById('barChart').getContext('2d');
        const barChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: categories,
                datasets: [{
                    label: 'Category Count',
                    data: counts,
                    backgroundColor: 'rgba(75, 192, 192, 0.6)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        document.getElementById('sidebarToggle').addEventListener('click', function() {
            document.getElementById('sidebarMenu').classList.toggle('show');
        });
    </script>
</body>
</html>
