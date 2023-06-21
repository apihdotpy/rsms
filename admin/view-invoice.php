<?php
session_start();
include "../utils/db_config.php";

$invoiceId = $_GET['invoiceId'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "../includes/_head.php"; ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <title>View Invoice</title>
</head>

<body>

    <div id="app">
        <?php include "../includes/admin_sidebar.php"; ?>
        <div id="main">
            <?php include "../includes/navbar.php"; ?>
            <div class="main-content container-fluid">
                <div class="page-title">
                    <h3>View Invoice</h3>
                </div>
                <section class="section">
                    <table class="table table-hover text-center">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Invoice No</th>
                                <th scope="col">Item Name</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Item Price(RM)</th>
                                <th scope="col">Total Price (RM)</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM `invoice_item` "
                                . "INNER JOIN `stock` ON stock.stockid = invoice_item.itemName WHERE InvoiceId = $invoiceId";
                            $result = mysqli_query($conn, $sql);

                            while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                <tr>
                                    <th><?php echo $row['invoiceId'] ?></th>
                                    <th><?php echo $row['stockName'] ?></th>
                                    <th><?php echo $row['Quantity'] ?></th>
                                    <th><?php echo $row['itemPrice'] ?></th>
                                    <th><?php echo $row['TotalPrice'] ?></th>
                                    <td>
                                        <i class="fa fa-info-circle text-info" onclick="viewInvoice(<?php echo $row['invoiceId'] ?>)"></i>
                                        <a href="delete-supplier.php?supplierId=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure want to delete?'); " class="link-dark"><i title="Delete" class="fa-solid fa-trash fs-5"></i></a>
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

    <?php include "../includes/_scripts.php"; ?>

    <script>
        function viewInvoice() {
            window.location.href = "../supplier/view-invoice.php";
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

</body>

</html>