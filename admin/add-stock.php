<?php
include "../utils/db_config.php";

$query = "SELECT * FROM `supplier`";
$result1 = mysqli_query($conn, $query);


if (isset($_POST['Submit'])) {
    $stockName = $_POST['stockName'];

    // Check if the stock name already exists in the database
    $checkQuery = "SELECT * FROM `stock` WHERE stockName = '$stockName'";
    $checkResult = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        echo ("<script LANGUAGE='JavaScript'>
                window.alert('Stock name already exists!');
                window.location.href = 'add-stock.php';
                </script>");
    } else {
        $stockid = $_POST['stockid'];
        $stockIn = $_POST['stockIn'];
        $id = $_POST['id'];

        $sql = "INSERT INTO `stock` (`stockid`, `stockName`, `stockIn`, `AvailableStock`, `id`) VALUES ('$stockid', '$stockName', '$stockIn', '$stockIn', '$id')";
        $result = $conn->query($sql);

        if ($result == TRUE) {
            echo ("<script LANGUAGE='JavaScript'>
                window.alert('Successfully updated');
                window.location.href='manage-stock.php';
                </script>");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
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
    <title>Add Stock</title>
</head>

<body>

    <div id="app">
        <?php include "../includes/admin_sidebar.php"; ?>
        <div id="main">
            <?php include "../includes/navbar.php"; ?>
            <div class="main-content container-fluid">
                <div class="page-title text-center">
                    <h3>Add Stock</h3>
                    <p class="text-muted">Complete the form below to add new stock</p>
                </div>
                <section class="section">
                    <div class="container d-flex justify-content-center">
                        <form action="" method="POST" style="width:50vw; min-width: 300px;">
                            <div class="mb-3">
                                <label class="form-label">Stock Name</label>
                                <input type="text" class="form-control" name="stockName" placeholder="Stock Name" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Stock In</label>
                                <input type="text" class="form-control" name="stockIn" placeholder="Stock In" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Supplier</label>
                                <select type="text" class="form-control" name="id">
                                    <option>Supplier</option>
                                    <?php while ($row1 = mysqli_fetch_array($result1)) : ?>
                                        <option value="<?php echo $row1["id"]; ?>">
                                            <?php echo $row1["suppName"]; ?>
                                        </option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                            <div class="d-flex justify-content-end mb-4">
                                <button type="Submit" class="btn btn-success mr-2" name="Submit">Save</button>
                                <a href="manage-stock.php" class="btn btn-danger">Cancel</a>
                                <br>
                            </div>
                        </form>
                </section>
            </div>
        </div>
    </div>

    <?php include "../includes/_scripts.php"; ?>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

</body>

</html>