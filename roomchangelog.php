<?php
   
    include '../include/thirdnav.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
   
    <title>Tenant Table</title>
    <style>
        body {
       
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
        }
        .container {
            max-width: 1200px;
            margin: -750px auto;
            margin-left: 350px;
            background: #fff;
            padding: 20px 30px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);

        }
        h1 {
            text-align: left;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table td{
            text-transform: capitalize;
            font-family: Arial, sans-serif;
        }
        table th, table td {
            border: 1px solid #ddd;
            text-align: left;
            padding: 8px;
            vertical-align: middle;
        }
        table th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
        .photo img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
        }
        .status-active {
            color: white;
            background-color: #28a745;
            padding: 5px 10px;
            border-radius: 4px;
            font-size: 0.9em;
        }
        .action-buttons button {
            background: none;
            border: none;
            cursor: pointer;
            margin-right: 5px;
        }
        .action-buttons button img {
            width: 20px;
            height: 20px;
        }
        .pagination {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .pagination select {
            padding: 5px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .pagination .page-nav {
            display: flex;
            gap: 10px;
        }
        .page-nav button {
            padding: 5px 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            background-color: #007bff;
            color: white;
            cursor: pointer;
        }
        .page-nav button:hover {
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
        .wide-modal-dialog {
        max-width: 50%; 
    }
    .modal-body {
        overflow-x: auto; 
    }
    
    </style>
</head>
<body>
<div class="container">
        <h2>Room Change Request</h2>
        <div class="mini-navbar">
                
            <div class="show-entries">
                <label>Show
                    <select>
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                    </select> entries
                </label>
            </div>
            <div class="search-bar">
                <label>Search: <input type="text" placeholder="Search" id="search"></label>
            </div>
        </div>
        <table id="tabb">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Room Number</th>
                    <th>Room Preference</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Remakrs</th>
                  
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php
                    include 'db.php';
                    $id = $_SESSION['userinfo']['id'];
                    $results_per_page = 6; 

                    $page = isset($_GET['page']) ? $_GET['page'] : 1;
                    $start_from = ($page - 1) * $results_per_page;

                    $sql = "SELECT * FROM roomchanges WHERE user_id = '$id' LIMIT $start_from, $results_per_page";
                    $result = $conn->query($sql);

                    while($row = mysqli_fetch_assoc($result)){
                        ?>  
                        <tr data-idd="<?=$row['id'] ?>" data-name="<?=$row['name']?>" data-roomnum="<?=$row['room_num'] ?>" data-pref="<?=$row['room_pref'] ?>" data-dates="<?=$row['created_at'] ?>">
                            <td><?= $row['id']?></td>
                            <td><?= $row['name']?></td>
                            <td><?= $row['room_num']?></td>
                            <td><?= $row['room_pref']?></td>
                            <td><?= $row['created_at']?></td>
                            <td style="color: <?= $row['status']==='approved'?'green': 'red' ?>"><?= $row['status']?></td>
                            <td><?= $row['remarks']?></td>
                            <td class="action-btns">
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#bookRoomModals">APPROVE</button>


                            <div class="modal fade" id="bookRoomModals" tabindex="-1" aria-labelledby="bookRoomModalLabel" aria-hidden="true">
                                 <div class="modal-dialog wide-modal-dialog">
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
                                                    <label for="name" class="form-label">Name</label>
                                                    <input type="text" class="form-control" id="names" name="name"  required>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="roomNumber" class="form-label">Room Number</label>
                                                    <input type="text" class="form-control" id="roomnum" name="roomnum" required>
                                                </div>
                                                

                                                <div class="mb-3">
                                                    <label for="roomNumber" class="form-label">Room Preference</label>
                                                    <input type="text" class="form-control" id="roomprefs" name="roompref"  required>
                                                </div>
                                                
                                            
                                                <div class="mb-3">
                                                    <label for="checkInDate" class="form-label"> Date</label>
                                                    <input type="date" class="form-control" id="ddate" name = "date"  required>
                                                </div>
                                                <label for="approvalStatus">Approval Status:</label>
                                                <select id="approvalStatus"  name = "stats" class="form-control" required>
                                                    <option value="">Select Status</option>
                                                    <option value="approved">Approved</option>
                                                    <option value="denied">Denied</option>
                                                </select>
                                                <div class="mb-3">
                                                    <label for="checkInDate" class="form-label"> Remarks</label>
                                                    <input type="text" class="form-control" id="checkInDate" name = "remarks"  required>
                                                </div>
                                            
                                                
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-primary" form="bookRoomForms" id="saves">Confirm</button>
                                                </div>
                                            </form>
                                        </div>
                                </div>
                               
                            </td>
                        </tr>
                    <?php
                    }

                    

                
                ?>
            </tbody>
        </table>

        <div class="pagination">
          
            <div>Showing 1  to 2 of 2 entries</div>
            <div class="page-nav">
                <?php

                      $sql = "SELECT count(*) AS total FROM roomchanges WHERE user_id = '$id'";
                      $result = $conn->query($sql);
                      $row = $result->fetch_assoc();
                      $total_pages = ceil($row["total"] / $results_per_page);
  
                      echo "<div class='pagination'>";
                      for ($i = 1; $i <= $total_pages; $i++) {
                          echo "<a href=?page=".$i."";
                          if ($i == $page) {
                              echo " class='active'";
                          }
                          echo ">".$i."</a>";
                      }
                      echo "</div>";
                      
  
                ?>
            </div>
        </div>
    
    </div>
    <script>
            $(document).ready(function(){
                $("#search").keyup(function(){
                    var input = $(this).val();

                    $.ajax({
                        method: "POST",
                        url: "../search/searchh.php",
                        data: {inputed: input},
                        success: function(data){
                            $("#tabb").html(data);
                        }
                    });
                });
            });
    </script>
    <script>
            $(document).ready(function(){
            
                $("#bookRoomForms").on("submit", function(event){
                    event.preventDefault();  

                    $.ajax({
                        url: "../ajax/roomchangelog.php",  
                        method: "POST",           
                        data: $(this).serialize(), 
                        success: function(response){
                            
                            alert("Room booked successfully!");
                            $('#bookRoomModals').modal('hide'); 
                            $("#bookRoomForms")[0].reset();  
                        },
                        error: function(xhr, status, error){
                            
                            alert("Error booking room: " + error);
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
        var dates = row.data('dates');
        var roomprefe = row.data('pref');



        $('#userid').val(id);
        $('#names').val(name);
        $('#roomnum').val(roomnum);
        $('#roomprefs').val(roomprefe);
        $('#ddate').val(dates);
    });

   
    $('#bookRoomForms').on('submit', function(event) {
        event.preventDefault(); 

        $.ajax({
            url: '../ajax/roomchangelog.php',  
            type: 'POST',
            data: $(this).serialize(),  
            success: function(response) {
                
                alert('Room information updated successfully!');
                
              
                var row = $('tr[data-id="' + $('#userid').val() + '"]');
                row.find('td:nth-child(2)').text($('#names').val());
                row.find('td:nth-child(3)').text($('#roomnumber').val());
                row.find('td:nth-child(4)').text($('#roomType').val());
                row.find('td:nth-child(5)').text($('#ddate').val());
                
              
                $('#bookRoomModals').modal('hide');
            },
            error: function(xhr, status, error) {
                
                alert('An error occurred while updating the data: ' + error);
            }
        });
    });
});

    </script>
</body>
</html>
