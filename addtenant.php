<?php
    include '../include/thirdnav.php';
    include 'db.php';

    if (isset($_POST['save'])) {
        $id = $_SESSION['userinfo']['id'];
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $dob = mysqli_real_escape_string($conn, $_POST['bod']);
        $gender = mysqli_real_escape_string($conn, $_POST['gender']);
        $address = mysqli_real_escape_string($conn, $_POST['address']);
        $contact = mysqli_real_escape_string($conn, $_POST['contact']);
        $eme_name = mysqli_real_escape_string($conn, $_POST['eme_name']);
        $eme_contact = mysqli_real_escape_string($conn, $_POST['eme_contact']);
        $room = mysqli_real_escape_string($conn, $_POST['room']);
        $status = mysqli_real_escape_string($conn, $_POST['stats']);
        $comments = mysqli_real_escape_string($conn, $_POST['comments']);

        $sql = "INSERT INTO add_tenantbooks (`name`, `email`, `dob`, `gender`, `address`, `contact`, `eme_name`, `eme_contact`, `room`, `status`, `comments`, `user_id`) VALUES
         ('$name', '$email', '$dob', '$gender', '$address', '$contact', '$eme_name', '$eme_contact', '$room', '$status', '$comments', '$id')";
        $result = $conn->query($sql);

        if ($result) {
            $_SESSION['messages'] = "Successfully Add New tenant";
        } else {
            $_SESSION['messages'] = "Failed to add Tenant";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Tenant Registration</title>
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

        .container {
            max-width: 1200px;
            position: absolute;
            right: 200px;
            top: 50px;
            background: #fff;
            padding: 20px 40px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
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

        h1,
        h2 {
            text-align: left;
            margin-bottom: 20px;
            color: #333;
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

        form {
            animation: zoomIn 1s ease-in-out;
        }

        @keyframes zoomIn {
            from {
                transform: scale(0.9);
                opacity: 0;
            }
            to {
                transform: scale(1);
                opacity: 1;
            }
        }

        .form-group {
            margin-bottom: 15px;
            display: flex;
            align-items: center;
        }

        label {
            flex: 0 0 150px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        input[type="date"],
        input[type="number"],
        select,
        textarea {
            flex: 1;
            padding: 8px;
            margin: 0 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        input:focus,
        select:focus,
        textarea:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        textarea {
            resize: vertical;
        }

        .photo-group {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .photo-group button {
            padding: 8px 12px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .photo-group button:hover {
            background-color: #0056b3;
        }

        .gender-group {
            display: flex;
            gap: 20px;
        }

        .note {
            font-size: 0.9em;
            color: #666;
            margin-left: 160px;
        }

        .button-group {
            text-align: right;
            margin-top: 20px;
        }

        .button-group button {
            padding: 10px 20px;
            font-size: 1em;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-left: 10px;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .button-group button:hover {
            transform: scale(1.05);
        }

        .button-save {
            background-color: #28a745;
            color: white;
        }

        .button-save:hover {
            background-color: #218838;
        }

        .button-save-new {
            background-color: #007bff;
            color: white;
        }

        .button-save-new:hover {
            background-color: #0056b3;
        }

        .button-cancel {
            background-color: #ffc107;
            color: white;
        }

        .button-cancel:hover {
            background-color: #e0a800;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>New Tenant Registration</h1>
        <form method="POST">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" placeholder="Name" name="name">
                <label for="email">Email</label>
                <input type="email" id="email" placeholder="Email" name="email">
            </div>
            <div class="form-group">
                <div class="photo-group">
                </div>
            </div>
            <div class="form-group">
                <label for="dob">DOB</label>
                <input type="date" id="dob" name="bod">
                <label>Gender</label>
                <div class="gender-group">
                    <label><input type="radio" name="gender" value="male" checked> Male</label>
                    <label><input type="radio" name="gender" value="female"> Female</label>
                </div>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" id="address" placeholder="Address" name="address">
            </div>
            <div class="form-group">
                <label for="contact">Contact</label>
                <input type="number" id="contact" placeholder="Contact" name="contact">
            </div>

            <!-- Emergency Contact Details -->
            <h2>Emergency Contact Details:</h2>
            <div class="form-group">
                <label for="emergency-name">Name</label>
                <input type="text" id="emergency-name" placeholder="Emergency Contact Name" name="eme_name">
                <label for="emergency-contact">Contact</label>
                <input type="number" id="emergency-contact" placeholder="Emergency Contact" name="eme_contact">
                <label for="emergency-contact">Room</label>
                <input type="number" id="emergency-contact" placeholder="Room" name="room">
            </div>

            <!-- Extra Details -->
            <h2>*Extra Details:</h2>
            <div class="form-group">
                <label for="status">Status</label>
                <select id="status" name="stats">
                    <option value="inactive">Inactive</option>
                    <option value="active">Active</option>
                </select>
                <label for="comments">Comments</label>
                <textarea id="comments" rows="3" placeholder="Enter comments" name="comments"></textarea>
            </div>

            <!-- Buttons -->
            <div class="button-group">
                <button type="submit" class="button-save" name="save">Save</button>
                <button type="button" class="button-save-new">Save & New</button>
                <button type="button" class="button-cancel">Cancel</button>
            </div>
        </form>
    </div>
</body>

</html>