<?php
session_start();
include "../utils/db_config.php";
$curentUser = $_SESSION['id'];
$requestId = $_GET['requestId'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "../includes/_head.php"; ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <title>View Request Stock</title>
</head>

<body>

    <div id="app">
        <?php include "../includes/supplier_sidebar.php"; ?>
        <div id="main">
            <?php include "../includes/navbar.php"; ?>
            <div class="main-content container-fluid">
                <div class="page-title">
                    <h3>View Request Stock</h3>
                </div>
                <section class="section">
                    <div>
                        <table class="table table-hover text-center">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Request Id</th>
                                    <th scope="col">Item Name</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (isset($_GET['search'])) {
                                    $filtervalues = $_GET['search'];
                                    $query = "SELECT reqdetails.id, requeststock.ReqId, stock.stockName, reqdetails.Quantity FROM reqdetails, requeststock, stock WHERE CONCAT(stock.stockName) LIKE '%$filtervalues %' stock.stockid = reqdetails.itemName AND requeststock.ReqId = reqdetails.ReqID AND reqdetails.ReqID = '$requestId' ORDER BY requeststock.ReqId ASC";
                                } else {
                                    $query = "SELECT reqdetails.id, requeststock.ReqId, stock.stockName, reqdetails.Quantity FROM reqdetails, requeststock, stock WHERE stock.stockid = reqdetails.itemName AND requeststock.ReqId = reqdetails.ReqID AND reqdetails.ReqID = '$requestId' ORDER BY requeststock.ReqId ASC";
                                }
                                $result = mysqli_query($conn, $query);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $reqId = $row['ReqId'];
                                    $stockName = $row['stockName'];
                                    $quantity = $row['Quantity'];
                                    $id = $row['id'];
                                ?>
                                    <tr>
                                        <th><?php echo $reqId ?></th>
                                        <th><?php echo $stockName ?></th>
                                        <th><?php echo $quantity ?></th>
                                        <td>
                                            <a href="updateRS.php?stockid=<?php echo $id ?>" class="link-dark">
                                                <i title="Edit" class="fa-solid fa-pen-to-square fs-5 me-3 text-primary"></i>
                                            </a>
                                            <a href="DeleteRS.php?id=<?php echo $id; ?>" onclick="return confirm('Are you sure want to delete?'); " class="link-dark">
                                                <i title="Delete" class="fa-solid fa-trash fs-5 text-danger"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </section>
            </div>
        </div>
    </div>


    <script>
        function deletestock(stockid) {
            if (confirm('Sure To Remove This Record ?')) {
                window.location.href = "deletestock.php?stockId=" + stockid;
            }
        }
    </script>

    <?php include "../includes/_scripts.php"; ?>


    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

</body>

</html>