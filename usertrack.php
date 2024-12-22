<?php
    include '../include/thirdnav.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registered Users Tracking</title>
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Custom CSS -->
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f6f8;
        }

        .container {
            max-width: 1100px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        /* Table styling */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            text-align: center;
            padding: 10px;
        }

        th {
            background-color: #007bff;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        /* Action Buttons */
        .track-btn {
            background-color: #28a745;
            color: #fff;
            border: none;
            padding: 6px 12px;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .track-btn:hover {
            background-color: #218838;
        }

        /* Footer */
        .footer {
            text-align: center;
            margin-top: 20px;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Page Title -->
        <h1><i class="fas fa-users"></i> Registered Users</h1>

        <!-- Users Table -->
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Example Row (Dynamic Content Placeholder) -->
                <tr>
                    <td>1</td>
                    <td>John Doe</td>
                    <td>john.doe@example.com</td>
                    <td>+1 234 567 890</td>
                    <td>
                        <button class="track-btn" onclick="startTracking(1)">Track User</button>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Jane Smith</td>
                    <td>jane.smith@example.com</td>
                    <td>+1 987 654 321</td>
                    <td>
                        <button class="track-btn" onclick="startTracking(2)">Track User</button>
                    </td>
                </tr>
                <!-- Add rows dynamically with backend -->
            </tbody>
        </table>

        <!-- Footer -->
        <div class="footer">
            <p>© 2024 User Tracking System. All rights reserved.</p>
        </div>
    </div>

    <!-- JavaScript for Tracking -->
    <script>
        function startTracking(userId) {
            alert('Tracking started for User ID: ' + userId);
            // Here you can call your backend endpoint for tracking logic
            // Example: window.location.href = `/track_user?user_id=${userId}`;
        }
    </script>
</body>
</html>
