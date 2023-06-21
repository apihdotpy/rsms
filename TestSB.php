<?php

include "config.php";

if (isset($_POST['Submit'])) {

    $stockid = $_GET['stockid'];
    $stocName = $_POST['stockName'];

    $stockIn = $_POST['stockIn'];

    $stockOut = $_POST['stockOut'];

    $AvailableStock = $_POST['AvailableStock'];

    $id = $_POST['id'];

    $newStock = $AvailableStock + $stockIn;





    $stockAvailable = $newStock;


    $sql = "UPDATE stock SET stockid='$stockid', stockName='$stocName',stockIn='$newStock',stockOut='$stockOut', AvailableStock = $stockAvailable, id='Sid' WHERE  stockid='$stockid'";
    $result = $conn->query($sql);

    if ($result == TRUE) {

        echo ("<script LANGUAGE='JavaScript'>
                window.alert('Succesfully update');
                window.location.href='stocklist.php';
                </script>");
        ;

    } else {

        //echo "Error:". $sql . "<br>". $conn->error;

    }

    $conn->close();

}

?>

<!DOCTYPE html>

<html>

<body>

    <!DOCTYPE html>
    <html>

    <head>
        <title>Stock</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!--boostrap-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
            integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
        <!--Font-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
            integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <title>Manage Stock</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
        <script defer src="assets/fontawesome/js/all.min.js"></script>
        <link rel="stylesheet" href="assets/vendors/chartjs/Chart.min.css">
        <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
        <link rel="stylesheet" href="assets/css/app.css">
        <style type="text/css">
            .notif:hover {
                background-color: rgba(0, 0, 0, 0.1);
            }
        </style>
    </head>

    <body>
        <div id="app">
            <?php include "components/sidebar.php" ?>
            <div id="main">
                <?php include "components/navbar.php" ?>
                <div class="main-content container-fluid">
                    <div class="text-center mb-4">
                        <h3>Stock</h3>
                        <p class="text-muted">Click update after changing any information</p>
                        <div class="d-flex justify-content-center">
                            <div class="col-6">
                                <?php
                                $stockid = $_GET['stockid'];
                                $con = mysqli_connect('localhost', 'root', '', 'rsms');
                                $sql = "SELECT * FROM `stock` WHERE stockid = '$stockid' LIMIT 1";
                                $result = $con->query($sql);
                                while ($row = mysqli_fetch_assoc($result)) { ?>
                                    <form action="" method="POST" style="width;50vw; min-width: 300px;">
                                        <div class="row">
                                            <div class="col">
                                                <label class="form-label">Stock Id</label>
                                                <input type="text" class="form-control" name="stockid"
                                                    value="<?php echo $row['stockid'] ?>">
                                            </div>
                                        </div>
                                        <div>
                                            <label class="form-label">Stock Name</label>
                                            <input type="text" class="form-control" name="stockName"
                                                value="<?php echo $row['stockName'] ?>">
                                        </div>
                                        <div>
                                            <input type="hidden" class="form-control" name="AvailableStock"
                                                value="<?php echo $row['AvailableStock'] ?>">
                                        </div>
                                        <div>
                                            <label class="form-label">Supplier</label>
                                            <select type="text" class="form-control" name="id">
                                                <option>Supplier</option>
                                                <?php while ($row = mysqli_fetch_array($result1)):
                                                    ; ?>
                                                    <option value="<?php echo
                                                        $row["id"]; ?>">
                                                        <?php echo
                                                            $row["suppName"]; ?></option>
                                                <?php endwhile; ?>
                                            </select>
                                        </div>
                                        <br>
                                        <br>
                                        <div class="gap-4 d-flex justify-content-center">
                                            <button type="Submit" class="btn btn-success" name="Submit">Update</button>
                                            &nbsp;<a href="stocklist.php" class="btn btn-danger">Cancel</a>
                                        </div>
                                    <?php } ?>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>



        <!--boostrap-->
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
            crossorigin="anonymous"></script>
        <script src="assets/js/feather-icons/feather.min.js"></script>
        <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
        <script src="assets/js/app.js"></script>
        <script src="assets/vendors/chartjs/Chart.min.js"></script>
        <script src="assets/vendors/apexcharts/apexcharts.min.js"></script>
        <script src="assets/js/pages/dashboard.js"></script>
        <script src="assets/js/main.js"></script>

    </body>

    </html>