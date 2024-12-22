<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dormitory Check-In/Check-Out</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            padding: 30px;
            width: 300px;
            text-align: center;
        }
        h1 {
            color: #333;
        }
        .button {
            background-color: #4CAF50;
            color: white;
            padding: 15px 32px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin: 20px 0;
            width: 100%;
        }
        .button:hover {
            background-color: #45a049;
        }
        .biometric-info {
            color: #555;
            margin: 20px 0;
            font-size: 14px;
        }
        .status {
            font-weight: bold;
            color: #d9534f;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Dormitory Management</h1>
        <div class="biometric-info">
            <p>Place your finger on the scanner or use facial recognition.</p>
            <button class="button" id="checkinBtn">Check-In</button>
            <button class="button" id="checkoutBtn">Check-Out</button>
        </div>
        
        <div class="status" id="status"></div>
    </div>

    <script>
        // Automatically trigger biometric verification when the button is clicked
        document.getElementById('checkinBtn').addEventListener('click', function() {
            handleBiometricVerification('checkin');
        });

        document.getElementById('checkoutBtn').addEventListener('click', function() {
            handleBiometricVerification('checkout');
        });

        function handleBiometricVerification(action) {
            // Automatically simulate a biometric check (this would be replaced by actual hardware integration)
            const isVerified = simulateBiometricVerification();

            if (isVerified) {
                document.getElementById('status').innerText = `${capitalizeFirstLetter(action)} Successful!`;
                document.getElementById('status').style.color = "#5bc0de"; // Success color
            } else {
                document.getElementById('status').innerText = "Biometric Verification Failed. Please try again.";
                document.getElementById('status').style.color = "#d9534f"; // Error color
            }
        }

        // Placeholder function simulating biometric verification success/failure
        function simulateBiometricVerification() {
            // Here you'd connect to a biometric API or hardware to verify the user
            return Math.random() > 0.2;  // 80% chance of successful verification
        }

        // Capitalize the first letter of the action (checkin/checkout) for user-friendly message
        function capitalizeFirstLetter(string) {
            return string.charAt(0).toUpperCase() + string.slice(1);
        }
    </script>
    
         
<button type="button" data-bs-toggle="modal" data-bs-target="#myModal">Add Room</button>

<!-- Modal to Add Room -->
<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                <h3>Add Room</h3>
            </div>
            <div class="modal-body">
                <form id="addRoomForm" method="post">
                    <label for="roomNumber">Room Number:</label>
                    <input type="text" id="roomNumber" name="roomNumber" required>

                    <label for="roomType">Room Type:</label>
                    <select id="roomType" name="roomType" required>
                        <option value="single">Single</option>
                        <option value="double">Double</option>
                        <option value="suite">Suite</option>
                    </select>

                    <label for="status">Status:</label>
                    <select id="status" name="wew" required>
                        <option value="available">Available</option>
                        <option value="occupied">Occupied</option>
                        <option value="maintenance">Maintenance</option>
                    </select>

                    <label for="capacity">Capacity:</label>
                    <input type="number" id="capacity" name="capacity" min="1" required>

                    <button type="submit" name="save">Add Room</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

</body>

</html>
