<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="modal fade" id="addInvoiceModal" tabindex="-1" aria-labelledby="addInvoiceModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addInvoiceModalLabel">Add New Invoice</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addInvoiceForm">
                        <div class="mb-3">
                            <label for="tenantName" class="form-label">Tenant Name</label>
                            <input type="text" class="form-control" id="tenantName" required>
                        </div>
                        <div class="mb-3">
                            <label for="amount" class="form-label">Amount</label>
                            <input type="number" class="form-control" id="amount" required>
                        </div>
                        <div class="mb-3">
                            <label for="invoiceDate" class="form-label">Date Issued</label>
                            <input type="date" class="form-control" id="invoiceDate" required>
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" id="status" required>
                                <option value="Unpaid">Unpaid</option>
                                <option value="Paid">Paid</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Invoice</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Invoice Details Modal -->
    <div class="modal fade" id="invoiceDetailModal" tabindex="-1" aria-labelledby="invoiceDetailModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="invoiceDetailModalLabel">Invoice Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p><strong>Invoice Number:</strong> <span id="invoiceNumber"></span></p>
                    <p><strong>Tenant Name:</strong> <span id="tenantDetails"></span></p>
                    <p><strong>Amount:</strong> $<span id="invoiceAmount"></span></p>
                    <p><strong>Date Issued:</strong> <span id="invoiceDateDetails"></span></p>
                    <p><strong>Status:</strong> <span id="invoiceStatus"></span></p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <script>
        // Function to view invoice details
        function viewInvoiceDetails(invoiceId) {
            // In a real-world app, data should be fetched from the database (AJAX request)
            const invoices = [
                { id: '#INV001', tenant: 'John Doe', amount: 500, date: '2024-12-10', status: 'Unpaid' },
                { id: '#INV002', tenant: 'Jane Smith', amount: 450, date: '2024-12-09', status: 'Paid' },
            ];

            const invoice = invoices.find(invoice => invoice.id === invoiceId);

            // Set modal content based on invoice details
            document.getElementById('invoiceNumber').textContent = invoice.id;
            document.getElementById('tenantDetails').textContent = invoice.tenant;
            document.getElementById('invoiceAmount').textContent = invoice.amount;
            document.getElementById('invoiceDateDetails').textContent = invoice.date;
            document.getElementById('invoiceStatus').textContent = invoice.status;
        }
    </script>
</body>
</html>