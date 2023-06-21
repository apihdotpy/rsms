<?php
session_start();
include "../utils/db_config.php";
$curentUser = $_SESSION['id'];
$requestId = $_GET['requestId'];

if (isset($_POST['Submit'])) {
    $ReqId = $_POST['ReqId'];
    $DateReq = $_POST['DateReq'];
    $Status = $_POST['Status'];
    $Description = $_POST['Description'];

    $sql = "UPDATE requeststock SET DateReq = '$DateReq', Status = '$Status', Description = '$Description' WHERE ReqId = '$requestId'";
    $result = $conn->query($sql);

    if ($result == TRUE) {
        echo '<script> function myButton()
        {
            window.location.href="./request-stock.php?";
        }
        myButton(); </script>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
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
    <title>Edit Request Stock</title>
</head>

<body>

    <div id="app">
        <?php include "../includes/supplier_sidebar.php"; ?>
        <div id="main">
            <?php include "../includes/navbar.php"; ?>
            <div class="main-content container-fluid">
                <div class="page-title text-center">
                    <h3>Edit Request Stock</h3>
                    <p class="text-muted">Click update after changing any information</p>
                </div>
                <section class="section">
                    <div class="d-flex justify-content-center">
                        <?php
                        $con = mysqli_connect('localhost', 'root', '', 'rsms');
                        $sql = "SELECT * FROM `requeststock` WHERE ReqId = '$requestId' LIMIT 1";
                        $result = $con->query($sql);
                        while ($row = $result->fetch_assoc()) {
                        ?>
                            <form action="" method="POST" style="width: 50vw; min-width: 300px;">
                                <input type="text" name="supplierId" value="<?php echo $row['SuppName'] ?>" class="d-none">
                                <div class="mb-3">
                                    <label class="form-label">Request ID</label>
                                    <input type="text" class="form-control" name="ReqId" value="<?php echo $row['ReqId'] ?>">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Date Request</label>
                                    <input type="Date" class="form-control" name="DateReq" value="<?php echo $row['DateReq'] ?>">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Status</label>
                                    <select name="Status" class="form-control">
                                        <option value="Process">Process</option>
                                        <option value="Accept">Accept</option>
                                        <option value="Reject">Reject</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Description</label>
                                    <input type="text" class="form-control" name="Description" value="<?php echo $row['Description'] ?>">
                                </div>
                                <div class="d-flex justify-content-end">
                                    <button type="Submit" class="btn btn-success" name="Submit" style="margin-right: 8px;">Update</button>
                                    <a href="./request-stock.php" class="btn btn-danger">Cancel</a>
                                </div>
                            </form>
                        <?php } ?>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <?php include "../includes/_scripts.php"; ?>

</body>

</html>