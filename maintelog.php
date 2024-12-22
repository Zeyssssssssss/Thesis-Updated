<?php
   
    include '../include/thirdnav.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room Allocation Logs - Dormitory Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7fb;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 90%;
            max-width: 1100px;
            margin: -750px auto;
            position: relative;
            left: 150px;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td{
            text-transform: capitalize;
            font-family: Arial, sans-serif;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: grey;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .status {
            font-weight: bold;
        }

        .success {
            color: green;
        }

        .error {
            color: red;
        }

        .info {
            color: #17a2b8;
        }

        .action-btns {
            display: flex;
            justify-content: space-between;
        }

        .action-btns button {
            padding: 10px 15px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .action-btns button:hover {
            background-color: #0056b3;
        }
        .mini-navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            background-color: #f8f9fa;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
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
        .btns{
            margin-left: 20px;
        }


        
    </style>
</head>
<body>

<div class="container">
    <h1>Maintenance Logs</h1>

  <div class="mini-navbar">
    <div class="action-btns">
        <input type="text" id="search" placeholder = " search.."> 
        <button onclick="exportLogs()" class="btns">CLear Logs</button>
    </div>
   </div>

    <!-- Log table -->
    <table id="tabb">
        <thead>
            <tr>
                <th>ID</th>
                <th>Student Name</th>
                <th>Room Number</th>
                <th>Date</th>
                <th>Details</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                include 'db.php';
                $id = $_SESSION['userinfo']['id'];
                $sql = "SELECT * FROM  mainrequest WHERE user_id = '$id'";
                $result = $conn->query($sql);

                while($row = mysqli_fetch_assoc($result)){
                    ?>
                        <tr data-idd="<?=$row['id'] ?>" data-name="<?=$row['name']?>"  data-roomnum="<?=$row['room_num'] ?>"  data-date="<?=$row['dates'] ?>" data-description=<?=$row['description']?>>
                            <td><?= $row['id']?></td>
                            <td><?= $row['name']?></td>
                            <td><?= $row['room_num']?></td>
                            <td><?= $row['dates']?></td>
                            <td><?= $row['description']?></td>
                            <td class = "status info" style="color: <?=$row['status']==='approved'? 'green': 'red'?>"><?= $row['status']?></td>
                            
                            <td>
                                   <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#bookRoomModals">APPROVE</button>


                    <div class="modal fade" id="bookRoomModals" tabindex="-1" aria-labelledby="bookRoomModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            
                                <div class="modal-header">
                                    <h5 class="modal-title" id="bookRoomModalLabel">Update Room</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>

                                
                                <div class="modal-body">
                                    <form id="bookRoomForms" >
                                    <div class="mb-3">
                                            <label for="roomNumber" class="form-label">User Id</label>
                                            <input type="number" class="form-control" id="userid" name="idd" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="roomNumber" class="form-label">Name</label>
                                            <input type="text" class="form-control" id="name" name="names" required>
                                        </div>
                                        

                                        <div class="mb-3">
                                            <label for="roomType">Room Number:</label>
                                            <input type="text" id="roomnum" name="roomnums" class="form-control" required>
                                        </div>
                                        
                                    
                                        <div class="mb-3">
                                            <label for="capacity">Date:</label>
                                            <input type="date" id="ddate" name="date"  required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="roomType">Description:</label>
                                            <input type="text" id="Desc" name="decs" class="form-control" required>
                                        </div>

                                        <label for="approvalStatus">Approval Status:</label>
                                        <select id="approvalStatus"  name = "stats" class="form-control" required>
                                            <option value="">Select Status</option>
                                            <option value="approved">Approved</option>
                                            <option value="denied">Denied</option>
                                        </select>
                                        
                                    
                                        
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-primary" form="bookRoomForms" id="saves">Confirm</button>
                                        </div>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php
                }

            ?>
        </tbody>
    </table>
</div>
<script>
            $(document).ready(function(){
                $("#search").keyup(function(){
                    var input = $(this).val();

                    $.ajax({
                        method: "POST",
                        url: "../search/search3.php",
                        data: {inputed: input},
                        success: function(data){
                            $("#tabb").html(data);
                        }
                    });
                });
            });
    </script>
    <script>
        $(document).ready(function() {
  
                $('button[data-bs-toggle="modal"]').on('click', function() {
                    
                    var row = $(this).closest('tr'); 
                    var id = row.data('idd');
                    var name  = row.data('name')
                    var roomnum = row.data('roomnum');
                    var desc  = row.data('description')
                    var dates = row.data('date');
                
                  


                    $('#userid').val(id);
                    $('#name').val(name);
                    $('#roomnum').val(roomnum);
                    $('#Desc').val(desc);
                    $('#ddate').val(dates);

                });

            
                $('#bookRoomForms').on('submit', function(event) {
                    event.preventDefault(); 

                    $.ajax({
                        url: '../ajax/maintelog.php',  
                        type: 'POST',
                        data: $(this).serialize(),  
                        success: function(response) {
                            
                            alert('Room information updated successfully!');
                            
                        
                        
                            
                            
                            $('#bookRoomModals').modal('hide');
                        },
                        error: function(xhr, status, error) {
                            // Handle any errors
                            alert('An error occurred while updating the data: ' + error);
                        }
                    });
                });
            });

    </script>
<script>
   
    function clearLogs() {
        if (confirm('Are you sure you want to clear all logs?')) {
            alert('Logs cleared.');
        }
    }

   
    function exportLogs() {
        alert('Logs exported as CSV.');
    }
</script>

</body>
</html>
