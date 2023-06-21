<?php
session_start();
include '../utils/db_config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "../includes/_head.php"; ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <title>Manage Invoice</title>
</head>

<body>

    <div id="app">
        <?php include "../includes/admin_sidebar.php"; ?>
        <div id="main">
            <?php include "../includes/navbar.php"; ?>
            <div class="main-content container-fluid">
                <div class="page-title">
                    <h3>Manage Invoice</h3>
                </div>
                <section class="section">
                    <table class="table table-hover text-center">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Invoice No</th>
                                <th scope="col">Invoice Date</th>
                                <th scope="col">Supplier Name</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT InvoiceId, DATE_FORMAT(Date, '%d-%m-%Y') AS InvoiceDate , supplier.suppName FROM `invoiceorder`,`supplier` WHERE supplier.id = invoiceorder.suppId";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $id = $row['InvoiceId'];
                            ?>
                                <tr>
                                    <th><?php echo $row['InvoiceId'] ?></th>
                                    <th><?php echo $row['InvoiceDate'] ?></th>
                                    <th><?php echo $row['suppName'] ?></th>
                                    <td>
                                        <i title="View Details" style="cursor: pointer;" class="fa fa-eye text-info" onclick="viewInvoice(<?php echo $id ?>)"></i>
                                        <i class="fa-solid fa-print" style="color: #2474ff;" title="Print" style="cursor: pointer;"></i>
                                        <i class="fa-sharp fa-solid fa-download" style="color: #1f71ff;" title="View" style="cursor: pointer;"></i>
                                        <a href="delete-invoice.php?InvoiceId=<?php echo $row['InvoiceId']; ?>" onclick="return confirm('Are you sure want to delete this invoice?'); " class="link-dark"><i title="Delete" class="fa-solid fa-trash fs-5 text-danger"></i></a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </section>
            </div>
        </div>
    </div>

    <script>
        function viewInvoice(invoiceId) {
            window.location.href = "view-invoice.php?invoiceId=" + invoiceId;
        }
    </script>

    <?php include "../includes/_scripts.php"; ?>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

</body>

</html>