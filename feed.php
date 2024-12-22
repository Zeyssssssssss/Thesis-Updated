<?php 
    include '../include/thirdnav.php';

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resident Satisfaction Survey</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            
        }
        .container {
            max-width: 1100px;
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin: -750px auto;
            position: relative;
            left: 150px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        label {
            display: block;
            margin: 15px 0 5px;
        }
        input[type="text"],
        input[type="email"],
        textarea {
            width: 100%;
            padding: 10px;
            margin: 5px 0 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .rating {
            display: flex;
            justify-content: space-between;
            max-width: 200px;
            margin: 10px 0;
        }
        .rating input {
            display: none;
        }
        .rating label {
            font-size: 20px;
            cursor: pointer;
            color: #ccc;
        }
        .rating input:checked ~ label {
            color: #ffcc00; 
        }
        .rating label:hover,
        .rating label:hover ~ label {
            color: #ffcc00; 
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            
            font-size: 16px;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Resident Satisfaction Survey</h1>
        <form id="feedback-form">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="satisfaction">Satisfaction Rating:</label>
            <div class="rating">
                <input type="radio" id="star1" name="rating" value="5">
                <label for="star1">&#9733;</label>
                <input type="radio" id="star2" name="rating" value="4">
                <label for="star2">&#9733;</label>
                <input type="radio" id="star3" name="rating" value="3">
                <label for="star3">&#9733;</label>
                <input type="radio" id="star4" name="rating" value="2">
                <label for="star4">&#9733;</label>
                <input type="radio" id="star5" name="rating" value="1">
                <label for="star5">&#9733;</label>
            </div>

            <label for="feedback">Comments:</label>
            <textarea id="feedback" name="feedback" rows="4" placeholder="Please share your thoughts..."></textarea>

            <button type="submit">Submit Feedback</button>
        </form>
    </div>

    <script>
        document.getElementById("feedback-form").addEventListener("submit", function(event) {
            event.preventDefault();
            alert("Thank you for your feedback!");
            this.reset(); 
        });
    </script>

</body>
</html>
