<?php

include '../include/thirdnav.php';
include 'db.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data for the bar chart
$sql = "SELECT category,  COUNT(*) as count FROM asset GROUP BY category";
$result = $conn->query($sql);

$categories = [];
$counts = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $categories[] = $row['category'];
        $counts[] = $row['count'];
    }
}
if(isset($_POST['addAsset'])){
    $id = $_SESSION['userinfo']['id'];
    $name = htmlspecialchars($_POST['name']);
    $category = htmlspecialchars($_POST['category']);
    $value = htmlspecialchars($_POST['value']);
    $quantity = htmlspecialchars($_POST['qty']);
    $date = htmlspecialchars($_POST['acquisition_date']);

    $sql = "INSERT INTO asset (`asset_name`, `category`, `qty`, `value`, `acquisition`, `user_id`) VALUES ('$name', '$category', '$value', '$quantity', '$date', '$id')";
    $result = $conn->query($sql);


}


$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asset Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f9f9f9;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            height: 100vh;
        }

        .container {
            width: 90%;
            position: absolute;
            max-width: 1400px;
            
            right: 20px;
            background: #ffcc99;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            animation: fadeIn 1s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #444;
            animation: slideIn 1s ease-in-out;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
        }

        input[type="text"],
        input[type="number"],
        input[type="date"],
        button {
            padding: 10px;
            font-size: 16px;
            width: 100%;
            border: 1px solid #ccc;
            border-radius: 5px;
            transition: all 0.3s ease;
        }

        input:focus {
            border-color: #007bff;
            outline: none;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        button {
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            border: none;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            animation: fadeIn 1s ease-in-out;
        }

        th,
        td {
            text-align: left;
            padding: 10px;
            border: 1px solid #ddd;
            transition: background-color 0.3s ease;
        }

        th {
            background-color: #f8f9fa;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

       

        .btn-warning {
            background-color: #ffc107;
        }

        .btn-warning:hover {
            background-color: #e0a800;
        }

        .btn-danger {
            background-color: #dc3545;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }

      

        .chart-container {
            margin-top: 20px;
        }

        #barChart {
            max-height: 400px;
            width: 100%;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <div class="container">
        <h2>Asset Management System</h2>
        <div class="card p-4">
            <h4>Add New Asset</h4>
            <form method="POST">
                <div class="form-group">
                    <label for="name">Asset Name</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="category">Category</label>
                    <input type="text" id="category" name="category" required>
                </div>
                <div class="form-group">
                    <label for="value">Value</label>
                    <input type="number" id="value" name="value" step="0.01" required>
                </div>
                <div class="form-group">
                    <label for="value">Quantity</label>
                    <input type="number" id="value" name="qty"  required>
                </div>
                <div class="form-group">
                    <label for="acquisition_date">Acquisition Date</label>
                    <input type="date" id="acquisition_date" name="acquisition_date" required>
                </div>
                <button type="submit" name="addAsset" class="btn btn-primary mt-3">Add Asset</button>
            </form>
        </div>

        <div class="card p-4 chart-container">
            <canvas id="barChart"></canvas>
        </div>

        <!-- Bar Chart Script -->
        <script>
            // Data passed from PHP to JavaScript
            const categories = <?php echo json_encode($categories); ?>;
            const counts = <?php echo json_encode($counts); ?>;

            // Render the bar chart
            const ctx = document.getElementById('barChart').getContext('2d');
            const barChart = new Chart(ctx, {
                type: 'bar', // Chart type
                data: {
                    labels: categories, // Labels for the x-axis
                    datasets: [{
                        label: 'Category Count',
                        data: counts, // Data for the y-axis
                        backgroundColor: 'rgba(54, 162, 235, 0.6)', // Bar colors
                        borderColor: 'rgba(54, 162, 235, 1)', // Border color
                        borderWidth: 1 // Bar border width
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            display: true,
                            position: 'top'
                        },
                        tooltip: {
                            enabled: true
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>

        <!-- Edit Asset Modal -->
        <div class="modal" id="editAssetModal">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Edit Asset</h5>
                    <button onclick="closeModal()">&times;</button>
                </div>
                <form id="editAssetForm">
                    <div class="form-group">
                        <label for="edit_name">Asset Name</label>
                        <input type="text" id="edit_name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_category">Category</label>
                        <input type="text" id="edit_category" name="category" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_value">Value</label>
                        <input type="number" id="edit_value" name="value" step="0.01" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_acquisition_date">Acquisition Date</label>
                        <input type="date" id="edit_acquisition_date" name="acquisition_date" required>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Save Changes</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function closeModal() {
            document.getElementById('editAssetModal').classList.remove('show');
        }
    </script>
</body>

</html>