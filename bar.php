<?php
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
    <title>Bar Chart</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div style="width: 60%; margin: auto;">
        <canvas id="barChart"></canvas>
    </div>

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
                        beginAtZero: true // Start the y-axis at 0
                    }
                }
            }
        });
    </script>
</body>
</html>
