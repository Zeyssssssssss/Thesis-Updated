<?php
    include '../include/thirdnav.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asset Management - Existing Assets</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome (Optional, for icons) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

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
            margin-top: 20px;
            position: absolute;
            width: 100%;
            max-width: 1400px;
            right: 10px;
        }

        .card-header {
            background-color: #483d8b;
            color: white;
        }

        table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
    overflow-x: auto; 
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

    </style>
</head>
<body>

<div class="container">
    <div class="card">
        <div class="card-header">
            <h4><i class="fas fa-database"></i> Existing Assets</h4>
        </div>
        <div class="card-body">
        
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Asset ID</th>
                        <th>Asset Name</th>
                        <th>Category</th>
                        <th>Quantity</th>
                        <th>Value</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                        <?php
                            include 'db.php';
                            $id = $_SESSION['userinfo']['id'];
                            $sql = "SELECT * FROM asset WHERE user_id = '$id'";
                            $result = $conn->query($sql);
                          
                            while($row = $result->fetch_assoc()){
                                ?>
                                    <tr>
                                        <td><?= $row['id']?></td>
                                        <td><?= $row['asset_name']?></td>
                                        <td><?= $row['category']?></td>
                                        <td><?= $row['qty']?></td>
                                        <td><?= $row['value']?></td>
                                        <td><?= $row['acquisition']?></td>
                                        <td>
                                            <a href=""><i class="fas fa-trash-alt"></i></a>
                                            <a href=""><i class="fas fa-edit"></i></a>
                                        </td>
                                    </tr>
                                <?php
                            }

                        ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Update Asset Modal -->
<div class="modal fade" id="updateAssetModal" tabindex="-1" aria-labelledby="updateAssetModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateAssetModalLabel">Update Asset</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="updateAssetForm">
                    <div class="mb-3">
                        <label for="assetId" class="form-label">Asset ID</label>
                        <input type="text" class="form-control" id="assetId" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="assetName" class="form-label">Asset Name</label>
                        <input type="text" class="form-control" id="assetName" required>
                    </div>
                    <div class="mb-3">
                        <label for="assetCategory" class="form-label">Category</label>
                        <input type="text" class="form-control" id="assetCategory" required>
                    </div>
                    <div class="mb-3">
                        <label for="assetValue" class="form-label">Value</label>
                        <input type="number" class="form-control" id="assetValue" required>
                    </div>
                    <div class="mb-3">
                        <label for="assetLocation" class="form-label">Location</label>
                        <input type="text" class="form-control" id="assetLocation" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Asset</button>
                </form>
            </div>
        </div>
    </div>
</div>



</body>
</html>