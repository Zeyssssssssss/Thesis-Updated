<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Room - Dormitory Management System</title>
    <style>
                body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
        }

        label {
            display: block;
            margin: 10px 0 5px;
        }

        input, select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Add Room</h1>
        <form id="addRoomForm">
            <label for="roomNumber">Room Number:</label>
            <input type="text" id="roomNumber" name="roomNumber" required>

            <label for="roomType">Room Type:</label>
            <select id="roomType" name="roomType" required>
                <option value="single">Single</option>
                <option value="double">Double</option>
                <option value="suite">Suite</option>
            </select>

            <label for="capacity">Capacity:</label>
            <input type="number" id="capacity" name="capacity" min="1" required>


            <label for="status">Status:</label>
            <select id="status" name="status" required>
                <option value="available">Available</option>
                <option value="occupied">Occupied</option>
                <option value="maintenance">Maintenance</option>
            </select>

            <button type="submit">Add Room</button>
        </form>
    </div>

    <script>
        document.getElementById('addRoomForm').addEventListener('submit', function(event) {
            event.preventDefault();
            // Handle form submission, e.g., send data to server
            alert('Room added successfully!');
        });
    </script>
</body>
</html>
