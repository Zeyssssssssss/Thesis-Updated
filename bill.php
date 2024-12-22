<?php
    include '../include/thirdnav.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dormitory Management System - Billing</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome (Optional, for icons) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <style>
       body {
            background-color: #f9f9f9; 
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center; 
            align-items: flex-start; 
            height: 91vh; 
        }

        .card-header {
            background-color: #483d8b;
            color: white;
            margin-top: 35px;
        }

        .table th, .table td {
            vertical-align: middle;
        }

        .modal-header {
            background-color: #007bff;
            color: white;
           
        }

        .cite{
            position: absolute;
            right: 0px;
            width: 100%;
            max-width: 1400px;
        }

        .total {
            font-size: 18px;
            font-weight: bold;
            margin-top: 20px;
        }
        
        .form-group {
            margin-bottom: 15px;
        }

        .button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .button:hover {
            background-color: #45a049;
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



    <!-- Main Container -->
    <div class="container my-4 cite">
        <!-- Billing Section -->
        <div class="card">
            <div class="card-header">
                <h4><i class="fas fa-file-invoice"></i> Dormitory Billing System</h4>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addBillModal">
                            <i class="fas fa-plus"></i> Add New Bill
                        </button>
                    </div>
                    <div class="col-md-6 text-end">
                        <input type="search" class="form-control" placeholder="Search by Room or Student Name">
                    </div>
                </div>
                <!-- Billing Table -->
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Room No.</th>
                            <th scope="col">Student Name</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Due Date</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>101</td>
                            <td>John Doe</td>
                            <td>$500</td>
                            <td>2024-01-10</td>
                            <td>
                                <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#editBillModal">
                                    <i class="fas fa-edit"></i> Edit
                                </button>
                                <button class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                            </td>
                        </tr>
                        <!-- Add more rows as necessary -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal for Add New Bill -->
    <div class="modal fade" id="addBillModal" tabindex="-1" aria-labelledby="addBillModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addBillModalLabel">Add New Bill</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="billingForm">
                        <div class="mb-3">
                            <label for="roomNumber" class="form-label">Room Number</label>
                            <input type="text" class="form-control" id="roomNumber" required>
                        </div>
                        <div class="mb-3">
                            <label for="studentName" class="form-label">Student Name</label>
                            <input type="text" class="form-control" id="studentName" required>
                        </div>

                        <!-- Fee Calculation Form -->
                        <div class="form-group">
                            <label for="roomFee">Room Fee ($):</label>
                            <input type="number" id="roomFee" class= "form-control" name="roomFee" value="0" min="0" oninput="calculateTotal()">
                        </div>

                        <div class="form-group">
                            <label for="utilitiesFee">Utilities Fee ($):</label>
                            <input type="number" id="utilitiesFee" class = "form-control"name="utilitiesFee" value="0" min="0" oninput="calculateTotal()">
                        </div>

                        <div class="form-group">
                            <label for="otherServicesFee">Other Services Fee ($):</label>
                            <input type="number" id="otherServicesFee" class = "form-control"name="otherServicesFee" value="0" min="0" oninput="calculateTotal()">
                        </div>

                        <!-- Total Fee Display -->
                        <div class="total" id="totalAmount">Total Fee: $0.00</div>

                        <!-- Due Date -->
                        <div class="mb-3">
                            <label for="dueDate" class="form-label">Due Date</label>
                            <input type="date" class="form-control" id="dueDate" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="saveBillBtn">Save Bill</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Edit Bill -->
    <div class="modal fade" id="editBillModal" tabindex="-1" aria-labelledby="editBillModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editBillModalLabel">Edit Bill</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="editRoomNumber" class="form-label">Room Number</label>
                            <input type="text" class="form-control" id="editRoomNumber" value="101" required>
                        </div>
                        <div class="mb-3">
                            <label for="editStudentName" class="form-label">Student Name</label>
                            <input type="text" class="form-control" id="editStudentName" value="John Doe" required>
                        </div>
                        <div class="mb-3">
                            <label for="editAmount" class="form-label">Amount</label>
                            <input type="number" class="form-control" id="editAmount" value="500" required>
                        </div>
                        <div class="mb-3">
                            <label for="editDueDate" class="form-label">Due Date</label>
                            <input type="date" class="form-control" id="editDueDate" value="2024-01-10" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update Bill</button>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        function calculateTotal() {
            const roomFee = parseFloat(document.getElementById('roomFee').value) || 0;
            const utilitiesFee = parseFloat(document.getElementById('utilitiesFee').value) || 0;
            const otherServicesFee = parseFloat(document.getElementById('otherServicesFee').value) || 0;

            const totalAmount = roomFee + utilitiesFee + otherServicesFee;

            // Update the total fee display
            document.getElementById('totalAmount').textContent = 'Total Fee: $' + totalAmount.toFixed(2);
        }
    </script>
</body>
</html>
