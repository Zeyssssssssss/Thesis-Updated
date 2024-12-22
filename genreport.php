<?php
    include '../include/thirdnav.php';


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dormitory Management System Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 20px;
        }
        header, footer {
            text-align: center;
            padding: 10px;
            background-color: #333;
            color: white;
        }
        .container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1, h2 {
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        .status {
            font-weight: bold;
        }
        .occupied {
            color: red;
        }
        .vacant {
            color: green;
        }
    </style>
</head>
<body>

<header>
    <h1>Dormitory Management System Report</h1>
    <p>Monthly Report: December 2024</p>
</header>

<div class="container">
    <section>
        <h2>1. Dormitory Overview</h2>
        <p><strong>Dormitory Name:</strong> Alpha Dormitory</p>
        <p><strong>Location:</strong> 123 University St., City</p>
        <p><strong>Total Rooms:</strong> 50</p>
        <p><strong>Total Capacity:</strong> 200 students</p>
    </section>

    <section>
        <h2>2. Room Allocation Summary</h2>
        <table>
            <thead>
                <tr>
                    <th>Room Number</th>
                    <th>Capacity</th>
                    <th>Status</th>
                    <th>Occupied By</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>101</td>
                    <td>4</td>
                    <td class="status occupied">Occupied</td>
                    <td>John Doe, Jane Smith, Mark Lee, Lisa Ray</td>
                </tr>
                <tr>
                    <td>102</td>
                    <td>4</td>
                    <td class="status vacant">Vacant</td>
                    <td>N/A</td>
                </tr>
                <tr>
                    <td>103</td>
                    <td>2</td>
                    <td class="status occupied">Occupied</td>
                    <td>Tom Hanks, Emily Davis</td>
                </tr>
                <!-- Add more rows as necessary -->
            </tbody>
        </table>
    </section>

    <section>
        <h2>3. Student Details</h2>
        <table>
            <thead>
                <tr>
                    <th>Student ID</th>
                    <th>Name</th>
                    <th>Room Number</th>
                    <th>Gender</th>
                    <th>Contact</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>101</td>
                    <td>John Doe</td>
                    <td>101</td>
                    <td>Male</td>
                    <td>(123) 456-7890</td>
                </tr>
                <tr>
                    <td>102</td>
                    <td>Jane Smith</td>
                    <td>101</td>
                    <td>Female</td>
                    <td>(234) 567-8901</td>
                </tr>
                <tr>
                    <td>103</td>
                    <td>Mark Lee</td>
                    <td>101</td>
                    <td>Male</td>
                    <td>(345) 678-9012</td>
                </tr>
                <tr>
                    <td>104</td>
                    <td>Lisa Ray</td>
                    <td>101</td>
                    <td>Female</td>
                    <td>(456) 789-0123</td>
                </tr>
                <!-- Add more student rows as necessary -->
            </tbody>
        </table>
    </section>

    <section>
        <h2>4. Dormitory Status</h2>
        <p><strong>Total Students Occupied:</strong> 12</p>
        <p><strong>Total Vacancies:</strong> 38</p>
        <p><strong>Room Occupancy Rate:</strong> 24%</p>
        <p><strong>Maintenance Issues:</strong> No major issues reported.</p>
    </section>
</div>

<footer>
    <p>Alpha Dormitory Management System | Report Generated on: December 23, 2024</p>
</footer>

</body>
</html>
