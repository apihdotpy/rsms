<!DOCTYPE html>
<html>
<head>
    <title>Invoice Details</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-dark">
    <div class="container-fluid">
    <?php $id=$_GET['id'];?>
        <a class="active" href="supplierindex.php?id=<?php echo $id;?>" style="color:white;"><i class="fa fa-fw fa-home" style="color:white;"></i> Home</a> 
        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
            </div>
            <div class="navbar-nav">
                <a href="login2.html" class="nav-item nav-link"style="color: white;">Logout</a>
            </div>
        </div>
    </div>
</nav>

<div class="container" style="padding-top: 70px;">
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
            include "config.php";

            $chosenInvoiceId = $_GET['InvoiceId'];

            $sql = "SELECT InvoiceId, itemName, Quantity, itemPrice, TotalPrice, stock.stockName
                    FROM `invoice_item`
                    INNER JOIN `stock` ON stock.stockid = invoice_item.itemName
                    WHERE InvoiceId = $chosenInvoiceId";
            
            $result = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
                <th><?php echo $row['InvoiceId']?></th>
                <th><?php echo $row['stockName']?></th>
                <th><?php echo $row['Quantity']?></th>
                <th><?php echo $row['itemPrice']?></th>
                <th><?php echo $row['TotalPrice']?></th>
                <td>
                    <i title="View Details" style="cursor: pointer;" class="fa fa-eye text-info" onclick="requeststock(<?php echo $row['ReqId'];?>)"></i>
                    <a href="deletesupp.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure want to delete?'); " class="link-dark"><i title ="Delete" class="fa-solid fa-trash fs-5"></i></a>
                </td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>

<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfjcrossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
<script>
    function requeststock(invoiceId) {
        var txt1 = invoiceId;
        window.location.href = "suppInvoiceDetails.php?InvoiceId=" + txt1;
    }
</script>
        
</body>
</html>
