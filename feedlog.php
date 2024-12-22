<?php
    include '../include/thirdnav.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Body and Main Layout */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        /* Header */
        header {
            background-color: #2c3e50;
            padding: 15px 0;
            text-align: center;
        }
        header nav ul {
            list-style: none;
        }
        header nav ul li {
            display: inline;
            margin: 0 15px;
        }
        header nav a {
            text-decoration: none;
            color: white;
            font-size: 18px;
        }
        header nav a:hover {
            color: #e74c3c;
        }

        /* Section Styling */
        .section {
            width: 85%;
            position: relative;
            bottom: 1900px;
            left: 250px;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        /* Table Styling */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table th, table td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }
        table th {
            background-color: #f2f2f2;
        }

        /* Button Styling */
        button {
            background-color: #e74c3c;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #c0392b;
        }

        /* Footer */
        footer {
            text-align: center;
            margin-top: 50px;
            font-size: 14px;
        }

        /* Mini Navbar Styling */
        .mini-navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            background-color: #f8f9fa;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
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

        /* Responsive Design */
        @media (max-width: 768px) {
            /* Make the section width more responsive */
            .section {
                width: 95%;
                left: 0;
                bottom: 0;
                margin: 0 auto;
                padding: 15px;
            }

            /* Adjust table and button styles */
            table th, table td {
                padding: 8px;
            }
            button {
                width: 100%;
                padding: 12px;
            }

            /* Stack navbar items for small screens */
            .mini-navbar {
                flex-direction: column;
                text-align: center;
            }

            .mini-navbar .search-bar input {
                width: 100%;
                margin-bottom: 10px;
            }

            .mini-navbar .show-entries select {
                width: 100%;
            }

            /* Adjust font sizes for small screens */
            header nav a {
                font-size: 16px;
            }

            /* Adjust for small screens (mobile-first) */
            body {
                font-size: 14px;
            }
        }

        /* Responsive for Extra Small Screens (Mobile Phones) */
        @media (max-width: 480px) {
            .mini-navbar .search-bar input {
                width: 100%;
                font-size: 14px;
            }

            .mini-navbar .show-entries select {
                width: 100%;
                font-size: 14px;
            }

            button {
                padding: 15px 20px;
            }
        }
    </style>
</head>
<body>
    <section id="schedule" class="section">
        <div class="mini-navbar">
            <h2>Cleaning and Maintenance Schedule</h2>
        </div>
        <div class="schedule">
            <table id="scheduleTable">
                <thead>
                    <tr>
                        <th>Task</th>
                        <th>Date</th>
                        <th>Assigned To</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Dynamic content will be inserted here -->
                </tbody>
            </table>
            <button onclick="scheduleTask()">Schedule Task</button>
        </div>
    </section>
</body>
</html>
