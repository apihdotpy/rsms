<?php
session_start();
include "../utils/db_config.php";
$currentUser = $_SESSION['id'];

$search = "";

if (isset($_GET['search'])) {
    $search = $_GET['search'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "../includes/_head.php"; ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <title>Request Stock</title>
</head>

<body>

    <div id="app">
        <?php include "../includes/supplier_sidebar.php"; ?>
        <div id="main">
            <?php include "../includes/navbar.php"; ?>
            <div class="main-content container-fluid">
                <div class="page-title">
                    <h3>Request Stock</h3>
                </div>
                <section class="section">
                    <div>
                        <table class="table table-hover text-center">
                            <form action="" method="GET">
                                <div class="input-group mb-3">
                                    <input type="text" name="search" value="<?php $search ?>" placeholder="Search..." class="form-control col-2">
                                    <button type="submit" class="btn btn-primary">Search</button>
                                </div>
                            </form>
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Request Id</th>
                                    <th scope="col">Date Request</th>
                                    <th scope="col">Supplier Name</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Action</th>
                                    <th scope="col">Invoices</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                if (isset($_GET['search'])) {
                                    $filtervalues = $_GET['search'];
                                    $query = "SELECT requeststock.*, supplier.suppName FROM requeststock, supplier WHERE CONCAT(supplier.suppName) LIKE '%$filtervalues %' AND supplier.id = requeststock.SuppName AND requeststock.SuppName = '$currentUser' ";
                                } else {
                                    $query = "SELECT requeststock.*, supplier.suppName FROM requeststock, supplier WHERE requeststock.SuppName=supplier.id AND requeststock.SuppName ='$currentUser' ORDER BY requeststock.SuppName ASC";
                                }

                                $result = mysqli_query($conn, $query);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $id = $row['ReqId'];
                                ?>
                                    <tr>
                                        <th><?php echo $row['ReqId'] ?></th>
                                        <th><?php echo $row['DateReq'] ?></th>
                                        <th><?php echo $row['suppName'] ?></th>
                                        <th><?php echo $row['Status'] ?></th>
                                        <th><?php echo $row['Description'] ?></th>
                                        <td>
                                            <i title="View Details" style="cursor: pointer;" class="fa fa-eye text-info" onclick="requeststock(<?php echo $row['ReqId']; ?>)"></i>
                                            <a href="./delete-request-stock.php?request <?php echo $id; ?>" onclick="return confirm('Are you sure want to delete?'); " class="link-dark"><i title="Delete" class="fa-solid fa-trash fs-5"></i></a>
                                            <a href="edit-request-stock.php?requestId=<?php echo $id; ?>" class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
                                        </td>
                                        <th>
                                            <a class="btn btn-primary me-1 mb-1" type="button" href="./create-invoice.php?requestId=<?php echo $id; ?>">Create</a>
                                        </th>
                                    </tr>

                                <?php
                                }

                                ?>
                            </tbody>
                        </table>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <script>
        function requeststock(requestId) {
            window.location.href = "./view-request-stock.php?requestId=" + requestId;
        }
    </script>

    <?php include "../includes/_scripts.php"; ?>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>

</html>