<?php
    include '../include/thirdnav.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tenant Contract - Dormitory Management System</title>

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

        .card-header {
            background-color: #007bff;
            color: white;
        }

        .card-body {
            padding: 20px;
        }

        .form-label {
            font-weight: bold;
        }

        .contract-section {
            margin-top: 30px;
        }

        .signature-section {
            margin-top: 40px;
        }

        .signature-box {
            border: 1px dashed #007bff;
            width: 200px;
            height: 60px;
            text-align: center;
            padding-top: 20px;
            margin-top: 20px;
        }
        
        .signature-box input {
            border: none;
            text-align: center;
            width: 100%;
            font-size: 18px;
            padding: 10px;
        }
        .container{
            position: absolute;
            right: 30px;
            width: 100%;
            max-width: 1400px;
        }
    </style>
</head>
<body>

    <div class="container">
        <!-- Contract Form Section -->
        <div class="card">
            <div class="card-header">
                <h4><i class="fas fa-file-signature"></i> Tenant Contract</h4>
            </div>
            <div class="card-body">
                <form id="tenantContractForm">
                    <!-- Tenant Details -->
                    <div class="contract-section">
                        <h5>Tenant Information</h5>
                        <div class="mb-3">
                            <label for="tenantName" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="tenantName" required>
                        </div>
                        <div class="mb-3">
                            <label for="tenantEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="tenantEmail" required>
                        </div>
                        <div class="mb-3">
                            <label for="tenantPhone" class="form-label">Phone Number</label>
                            <input type="text" class="form-control" id="tenantPhone" required>
                        </div>
                        <div class="mb-3">
                            <label for="tenantId" class="form-label">Tenant ID / Passport</label>
                            <input type="text" class="form-control" id="tenantId" required>
                        </div>
                    </div>

                    <!-- Room Details -->
                    <div class="contract-section">
                        <h5>Room Allocation</h5>
                        <div class="mb-3">
                            <label for="roomNumber" class="form-label">Room Number</label>
                            <input type="text" class="form-control" id="roomNumber" required>
                        </div>
                        <div class="mb-3">
                            <label for="roomType" class="form-label">Room Type</label>
                            <select class="form-select" id="roomType" required>
                                <option value="single">Single</option>
                                <option value="double">Double</option>
                                <option value="suite">Suite</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="roomRent" class="form-label">Monthly Rent ($)</label>
                            <input type="number" class="form-control" id="roomRent" required>
                        </div>
                    </div>

                    <!-- Rental Terms -->
                    <div class="contract-section">
                        <h5>Rental Terms</h5>
                        <div class="mb-3">
                            <label for="startDate" class="form-label">Contract Start Date</label>
                            <input type="date" class="form-control" id="startDate" required>
                        </div>
                        <div class="mb-3">
                            <label for="endDate" class="form-label">Contract End Date</label>
                            <input type="date" class="form-control" id="endDate" required>
                        </div>
                        <div class="mb-3">
                            <label for="paymentFrequency" class="form-label">Payment Frequency</label>
                            <select class="form-select" id="paymentFrequency" required>
                                <option value="monthly">Monthly</option>
                                <option value="quarterly">Quarterly</option>
                                <option value="annually">Annually</option>
                            </select>
                        </div>
                    </div>

                    <!-- Signature Section -->
                    <div class="signature-section">
                        <h5>Signatures</h5>
                        <p>Please provide your signature below to confirm your agreement with the terms of this contract.</p>
                        <div class="signature-box">
                            <input type="text" id="tenantSignature" placeholder="Tenant Signature" required>
                        </div>
                        <div class="mt-3">
                            <label for="managerSignature" class="form-label">Manager Signature</label>
                            <input type="text" class="form-control" id="managerSignature" required>
                        </div>
                    </div>

                    <!-- Buttons -->
                    <div class="mt-4 text-center">
                        <button type="submit" class="btn btn-primary">Generate Contract</button>
                        <button type="reset" class="btn btn-secondary">Reset Form</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        // This is just a sample script for form validation and submission.
        document.getElementById('tenantContractForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const tenantName = document.getElementById('tenantName').value;
            const tenantEmail = document.getElementById('tenantEmail').value;
            const roomNumber = document.getElementById('roomNumber').value;
            const roomRent = document.getElementById('roomRent').value;
            const startDate = document.getElementById('startDate').value;
            const endDate = document.getElementById('endDate').value;
            const tenantSignature = document.getElementById('tenantSignature').value;

            // Simulate contract generation (for now just log to console)
            alert('Contract Generated for ' + tenantName);
            console.log({
                tenantName,
                tenantEmail,
                roomNumber,
                roomRent,
                startDate,
                endDate,
                tenantSignature
            });
        });
    </script>

</body>
</html>
