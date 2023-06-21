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
    <title>Manage Supplier</title>
</head>

<body>

    <div id="app">
        <?php include "../includes/admin_sidebar.php"; ?>
        <div id="main">
            <?php include "../includes/navbar.php"; ?>
            <div class="main-content container-fluid">
                <div class="page-title">
                    <h3>Manage Supplier</h3>
                </div>
                <section class="section">
                    <div class="d-flex">
                        <a href="add-supplier.php" class="btn btn-dark mb-3">Add Supplier</a>
                    </div>
                    <table class="table table-hover text-center">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Supplier name</th>
                                <th scope="col">Supplier phone number</th>
                                <th scope="col">Supplier E-mail</th>
                                <th scope="col">Supplier address</th>
                                <th scope="col">Supplier Username</th>
                                <th scope="col">Supplier Password</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM `supplier`";
                            $result = mysqli_query($conn, $sql);

                            while ($row = mysqli_fetch_assoc($result)) { ?>
                                <tr>
                                    <th><?php echo $row['id'] ?></th>
                                    <th><?php echo $row['suppName'] ?></th>
                                    <th><?php echo $row['suppNum'] ?></th>
                                    <th><?php echo $row['suppEmail'] ?></th>
                                    <th><?php echo $row['suppAdd'] ?></th>
                                    <th><?php echo $row['suppusername'] ?></th>
                                    <th><?php echo $row['supppass'] ?></th>
                                </tr>

                            <?php } ?>
                        </tbody>
                    </table>
                </section>
            </div>
        </div>
    </div>

    <?php include "../includes/_scripts.php"; ?>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>


</body>

</html>