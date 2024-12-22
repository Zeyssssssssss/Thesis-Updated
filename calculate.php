<?php
        session_start();
        include '../admin/db.php';

        if (isset($_POST['save'])) {
            // Get the input values
            $room_fee = isset($_POST['room_fee']) ? floatval($_POST['room_fee']) : 0;
            $utilities = isset($_POST['utilities']) ? floatval($_POST['utilities']) : 0;
            $other_services = isset($_POST['other_services']) ? floatval($_POST['other_services']) : 0;
            $asset = isset($_POST['ass']) ? floatval($_POST['ass']) : 0;
            $user_id  = $_SESSION['userinfo']['id'];
            // Calculate the total
            $total = $room_fee + $utilities + $other_services;

            $sql = "INSERT INTO bill (`room_fee`, `utilities`, `asset`, `other_services`, `total`, `user_id`) VALUES ('$room_fee', '$utilities', '$other_services', '$asset', '$total', '$user_id')";
            $result = mysqli_query($conn, $sql); 
            // Display the result
            echo "<div style='font-family: Arial, sans-serif; max-width: 600px; margin: 20px auto; text-align: center;'>";
            echo "<h1>Billing Summary</h1>";
            echo "<p><strong>Room Fee:</strong> $" . number_format($room_fee, 2) . "</p>";
            echo "<p><strong>Utilities:</strong> $" . number_format($utilities, 2) . "</p>";
            echo "<p><strong>Other Services:</strong> $" . number_format($other_services, 2) . "</p>";
            echo "<h2><strong>Total:</strong> $" . number_format($total, 2) . "</h2>";
            echo "<a href='bill.php' style='display: inline-block; margin-top: 20px; text-decoration: none; padding: 10px 20px; background-color: #4CAF50; color: white; border-radius: 5px;'>Go Back</a>";
            echo "</div>";
        } else {
            echo "<p>Error: Invalid request method.</p>";
        }
?>
