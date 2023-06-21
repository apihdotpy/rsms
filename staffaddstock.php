<?php 
include "config.php";
$query = "SELECT * FROM `supplier`";
$result1 = mysqli_query($conn,$query);

include "config.php";

$stid = $_GET['id'];

if (isset($_POST['Submit'])) {
    $stockid = $_POST['stockid'];
    $stockName = $_POST['stockName'];
    $stockIn = $_POST['stockIn'];
    $id = $_POST['id'];

    // Check if the stock name already exists
    $checkStockQuery = "SELECT * FROM `stock` WHERE `stockName` = '$stockName' LIMIT 1";
    $checkStockResult = $conn->query($checkStockQuery);

    if ($checkStockResult->num_rows > 0) {
        echo ("<script LANGUAGE='JavaScript'>
                window.alert('Stock name already exists. Please choose a different stock name.');
                window.location.href='staffaddstock.php?id=$stid';
                </script>");
    } else {
        $sql = "INSERT INTO `stock`(`stockid`, `stockName`, `stockIn`, `AvailableStock`, `id`) VALUES ('$stockid','$stockName','$stockIn','$stockIn','$id')";
        $result = $conn->query($sql);

        if ($result == TRUE) {
            echo ("<script LANGUAGE='JavaScript'>
                    window.alert('Successfully updated');
                    window.location.href='staffstocklist.php?id=$stid';
                    </script>");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    $conn->close(); 
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Stock</title>
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
            <a class="active" href="staffinndex.php?id=<?php echo $id;?>" style="color:white;"><i class="fa fa-fw fa-home" style="color:white;"></i> Home</a> 
            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
            </div>
            <div class="navbar-nav">
                <a href="login2.html" class="nav-item nav-link" style="color: white;">Logout</a>
            </div>
        </div>
    </nav>
    <div class="container" style="padding-top: 70px;">
        <div class="text-center mb-4">
            <h3>New Stock</h3>
            <p class="text-muted">Complete the form below to add new stock</p>
        </div>

        <div class="container d-flex justify-content-center">
            <form action="" method="POST" style="width;50vw; min-width: 300px;">
                <div>
                    <label class="form-label">Stock Name</label>
                    <input type="text" class="form-control" name="stockName" placeholder="Stock Name" required>
                </div>
                <div>
                    <label class="form-label">Stock In</label>
                    <input type="text" class="form-control" name="stockIn" placeholder="Stock In" required>
                </div>
                <div>
                    <label class="form-label">Supplier</label>
                    <select type="text" class="form-control" name="id">
                        <option>Supplier</option>
                        <?php while($row1 = mysqli_fetch_array($result1)):;?>
                            <option value="<?php echo $row1["id"];?>">
                                <?php echo $row1["suppName"];?>
                            </option>
                        <?php endwhile;?>
                    </select>
                </div>
                <br>
                <br>
                <div class="gap-4 d-flex justify-content-center">
                    <button type="submit" class="btn btn-success" name="Submit">Save</button>
                    <?php $id=$_GET['id'];?>
                    &nbsp;<a href="staffstocklist.php?id=<?php echo $id;?>" class="btn btn-danger">Cancel</a>
                    <br>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>
