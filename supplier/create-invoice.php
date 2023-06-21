<?php
session_start();
include "../utils/db_config.php";
$curentUser = $_SESSION['id'];
$requestId = $_GET['requestId'];


$search = "";
if (isset($_GET['search'])) {
    $search = $_GET['search'];
}

if (isset($_POST["Generate"])) {
    // $stockId = $_POST['cb'];
    // $Quantity = $_POST['quantity'];
    $counter = 0;
    $sql = "SELECT reqdetails.id, requeststock.ReqId, reqdetails.itemName, stock.stockName, reqdetails.Quantity as quantity FROM reqdetails, requeststock, stock WHERE stock.stockid = reqdetails.itemName AND requeststock.ReqId = reqdetails.ReqID AND reqdetails.ReqID = '$requestId' ORDER BY requeststock.ReqId ASC";
    $result2 = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result2)) {
        $counter++;
    }
    $Date = date("Y-m-d");
    $price = array();
    $itemPrice = array();
    $quantity = array();


    echo $TP;

    echo $counter;

    for ($i = 0; $i < $counter; $i++) {
        if ($_POST['price'][$i] !== '0' && $_POST['price'][$i] !== null  && $_POST['price'][$i] !== "") {
            array_push($price, $_POST['price'][$i]);
        }
    }

    for ($i = 0; $i < $counter; $i++) {
        if ($_POST['quantity'][$i] !== '0' && $_POST['quantity'][$i] !== null  && $_POST['quantity'][$i] !== "") {
            array_push($quantity, $_POST['quantity'][$i]);
        }
    }
    $id = $_GET['id'];

    $query1 = "INSERT INTO invoiceorder (Date,suppId) VALUES ('" . $Date . "','" . $id . "')";
    $result1 = $conn->query($query1);
    $lastInsertId = mysqli_insert_id($conn);
    for ($i = 0; $i < count($_POST['stockid']); $i++) {
        // echo sizeof($stockId);
        // $query = "INSERT INTO reqdetails (ReqID,itemName,Quantity) VALUES ('".$lastInsertId."','".$_POST['stockid'][$i]."','".$_POST['quantity'][$i]."')";
        $totalprice = $price[$i] * $quantity[$i];
        $query = "INSERT INTO invoice_item (invoiceId,itemName,Quantity,itemPrice,TotalPrice) VALUES ('" . $lastInsertId . "','" . $_POST['stockid'][$i] . "','" . $quantity[$i] . "','" . $price[$i] . "','" . $totalprice . "')";
        $result = $conn->query($query);
        if ($result == TRUE) {

            echo ("<script LANGUAGE='JavaScript'>
              window.alert('Succesfully Add New Stock');
              window.location.href='suppInvoiceD.php?id=$id';
              </script>");
        } else {
            echo "Error:" . $query . "<br>" . $conn->error;
        }
    }

    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "../includes/_head.php"; ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <title>Create Invoice</title>
</head>

<body>

    <div id="app">
        <?php include "../includes/supplier_sidebar.php"; ?>
        <div id="main">
            <?php include "../includes/navbar.php"; ?>
            <div class="main-content container-fluid">
                <div class="page-title mb-3">
                    <h3>Create Invoice</h3>
                    <p class="text-muted">Select available item to generate invoice</p>
                </div>
                <section class="section">
                    <div>
                        <form action="" method="POST">
                            <div class="d-flex align-items-center gap-2">
                                <label for="inputEmail4">Date Request</label>
                                <input type="Date" class="form-control" id="date" placeholder="Date" style="width: 200px;" />
                                <input type="submit" value="Generate" class="btn btn-primary">
                            </div>
                        </form>
                        <table class="table table-hover text-center mt-3">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">Request Id</th>
                                    <th scope="col">Item Name</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Price (RM)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (isset($_GET['search'])) {
                                    $filtervalues = $_GET['search'];
                                    $query = "SELECT reqdetails.id, requeststock.ReqId, stock.stockName, reqdetails.Quantity FROM reqdetails, requeststock, stock WHERE CONCAT(stock.stockName) LIKE '%$filtervalues %' stock.stockid = reqdetails.itemName AND requeststock.ReqId = reqdetails.ReqID AND reqdetails.ReqID = $requestId";
                                } else {
                                    $query = "SELECT reqdetails.id, requeststock.ReqId, requeststock.SuppName,reqdetails.itemName as stockid, stock.stockName, reqdetails.Quantity as quantity FROM reqdetails, requeststock, stock WHERE stock.stockid = reqdetails.itemName AND requeststock.ReqId = reqdetails.ReqID AND reqdetails.ReqID =" . $requestId . " ORDER BY requeststock.ReqId ASC";
                                }
                                $result = mysqli_query($conn, $query);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $reqId = $row['ReqId'];
                                    $quantity = $row['quantity'];
                                    $stockid = $row['stockid'];
                                    $stockName = $row['stockName'];
                                ?>
                                    <tr>
                                        <th>
                                            <input type="checkbox" name="stockid[]" id="itemRow_1" class="itemRow" value="<?php echo $stockId ?>" aria-label="Checkbox for following input">
                                        </th>
                                        <th><?php echo $reqId ?></th>
                                        <th><?php echo $stockName ?></th>
                                        <th><input type="number" name="quantity[]" min="1" max="<?php echo $quantity ?>" value="<?php echo $quantity ?>"></th>
                                        <th>
                                            <input type="text" class="form-control" name="price[]" style="width:120px;" placeholder="Price">
                                        </th>
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
        $(document).ready(function() {
            $(document).on('click', '.itemRow_1', function() {
                if ($('.itemRow_1:checked').length == $('.itemRow_1').length) {
                    $('#itemRow_1').prop('checked', true);
                } else {
                    $('#itemRow_1').prop('checked', false);
                }
            });
        });
    </script>

    <?php include "../includes/_scripts.php"; ?>

</body>

</html>