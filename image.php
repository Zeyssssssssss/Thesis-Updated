<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Image</title>
</head>
<body>
    <h2>Upload an Image</h2>
    <form action="imageprocess.php" method="post" enctype="multipart/form-data">
        <input type="file" name="image">
        <input type="submit" value="Upload Image" name="submit">
    </form>
    <?php
        include_once('db.php');
        $sql = "SELECT * FROM ex";
        $result = $conn->query($sql);
        while($row=$result->fetch_assoc()){
        ?>
              <img src = "mgs/<?php echo $row['img']?>">
        <?Php
        };
    ?>
    
</body>
</html>