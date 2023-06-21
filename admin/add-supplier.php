<?php
session_start();
include "../utils/db_config.php";

if (isset($_POST['Submit'])) {
    $suppName = $_POST['suppName'];
    $suppNum = $_POST['suppNum'];
    $suppEmail = $_POST['suppEmail'];
    $suppAdd = $_POST['suppAdd'];
    $suppusername = $_POST['suppusername'];
    $supppass = $_POST['supppass'];
    $confirmPassword = $_POST['confirmPassword'];

    // Check if the username already exists
    $checkUsernameQuery = "SELECT * FROM `supplier` WHERE `suppusername` = '$suppusername' LIMIT 1";
    $checkUsernameResult = $conn->query($checkUsernameQuery);

    if ($checkUsernameResult->num_rows > 0) {
        echo ("<script LANGUAGE='JavaScript'>
                window.alert('Username already exists. Please choose a different username.');
                window.location.href='add-supplier.php';
                </script>");
    } else {
        // Check if the password and confirmation password match
        if ($supppass != $confirmPassword) {
            echo ("<script LANGUAGE='JavaScript'>
                    window.alert('Password and confirmation password do not match. Please try again.');
                    window.location.href='add-supplier.php';
                    </script>");
            exit(); // Stop further execution if passwords don't match
        }

        // Insert the new supplier into the database
        $sql = "INSERT INTO `supplier`(`suppName`, `suppNum`, `suppEmail`, `suppAdd`, `suppusername`, `supppass`) VALUES ('$suppName','$suppNum','$suppEmail','$suppAdd','$suppusername','$supppass')";
        $result = $conn->query($sql);

        if ($result == TRUE) {
            echo ("<script LANGUAGE='JavaScript'>
                    window.alert('Successfully added new supplier');
                    window.location.href='manage-supplier.php';
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
    <title>Manage Supplier</title>
</head>

<body>

    <div id="app">
        <?php include "../includes/admin_sidebar.php"; ?>
        <div id="main">
            <?php include "../includes/navbar.php"; ?>
            <div class="main-content container-fluid">
                <div class="page-title text-center">
                    <h3>Manage Suplier</h3>
                    <p class="text-muted">Complete the form below to add a new supplier</p>
                </div>
                <section class="section">
                    <div class="container d-flex justify-content-center">
                        <form action="" method="POST" style="width: 50vw; min-width: 300px;">
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control" name="suppName" placeholder="Supplier Name" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Phone Number</label>
                                <input type="text" class="form-control" name="suppNum" placeholder="Supplier Phone Number" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">E-mail</label>
                                <input type="email" class="form-control" name="suppEmail" placeholder="Supplier E-mail" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Address</label>
                                <textarea class="form-control" name="suppfAdd" maxlength="250" placeholder="Supplier tafAddress" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Username</label>
                                <input type="text" class="form-control" name="suppusername" placeholder="Supplier Username" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control" name="supppass" placeholder="Supplier Password" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" name="confirmPassword" placeholder="Confirm Password" required>
                            </div>
                            <div class="d-flex justify-content-end mb-4">
                                <button type="submit" class="btn btn-success mr-2" name="Submit">Save</button>
                                <a href="manage-supplier.php" class="btn btn-danger">Cancel</a>
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