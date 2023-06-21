<?php
session_start();
include '../utils/db_config.php';

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
    <title>Manage Stock</title>
</head>

<body>

    <div id="app">
        <?php include "../includes/admin_sidebar.php"; ?>
        <div id="main">
            <?php include "../includes/navbar.php"; ?>
            <div class="main-content container-fluid">
                <div class="page-title">
                    <h3>Manage Stock</h3>
                </div>
                <section class="section">
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="Adminaddstock.php" class="btn btn-dark mb-3">Add New</a>
                        <form action="" method="GET" style="width: 300px;">
                            <div class="input-group mb-3">
                                <input type="text" name="search" class="form-control" placeholder="Search.." value="<?php echo $search ?>">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                        </form>
                    </div>
                    <table class="table table-hover text-center">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Stock ID</th>
                                <th scope="col">Stock name</th>
                                <th scope="col">Supplier Name</th>
                                <th scope="col">Stock Available</th>
                                <th scope="col">Stock Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($_GET['search'])) {
                                $filtervalues = $_GET['search'];
                                $query = "SELECT stock.*, supplier.suppName FROM stock INNER JOIN supplier ON supplier.id = stock.id WHERE   CONCAT(stock.stockName,stock.stockid) LIKE '%$filtervalues%'";
                            } else {
                                $query = "SELECT stock.*, supplier.suppName FROM stock INNER JOIN supplier ON supplier.id = stock.id ORDER BY stock.stockid ASC";
                            }
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                <tr>
                                    <th><?php echo $row['stockid'] ?></th>
                                    <th><?php echo $row['stockName'] ?></th>
                                    <th><?php echo $row['suppName'] ?></th>
                                    <th><?php echo $row['AvailableStock'] ?></th>
                                    <th>
                                        <?php if ($row['AvailableStock'] < 10) : ?>
                                            <span class="badge badge-danger">Low Stock</span>
                                        <?php else : ?>
                                            <span class="badge badge-success">Available</span>
                                        <?php endif; ?>
                                    </th>
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