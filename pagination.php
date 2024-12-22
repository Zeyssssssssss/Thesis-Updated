<?php
include 'db.php';

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Pagination variables
$results_per_page = 10; // Number of results per page

// Determine page number
if (!isset($_GET['page'])) {
    $page = 1; // Set default page to 1
} else {
    $page = $_GET['page'];
}

// Calculate starting point for fetching the records
$start_from = ($page - 1) * $results_per_page;

// Fetch records from database
$sql = "SELECT * FROM addroom LIMIT $start_from, $results_per_page";
$result = $conn->query($sql);

// Display fetched records

// Pagination links
$sql = "SELECT count(*) AS total FROM addroom";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$total_pages = ceil($row["total"] / $results_per_page);


echo "<div class='pagination'>";
for ($i = 1; $i <= $total_pages; $i++) {
    echo "<a href=?page=".$i."";

    if ($i == $page) {
        echo " class='active'";
    }

    echo ">".$i."</a>";
}
echo "</div>";

// Close database connection
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
