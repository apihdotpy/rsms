<?php
session_start();
include "../utils/db_config.php";
$current_user = $_SESSION['id'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "../includes/_head.php"; ?>
    <title>Profile</title>
</head>

<body>

    <div id="app">
        <?php include "../includes/supplier_sidebar.php"; ?>
        <div id="main">
            <?php include "../includes/navbar.php"; ?>
            <div class="main-content container-fluid">
                <div class="page-title text-center mb-3">
                    <h3>My Profile</h3>
                </div>
                <section class="section">
                    <div class="d-flex justify-content-center">
                        <form action="" style="width: 50vw;">
                            <?php
                            $sql = "SELECT id, suppName, suppNum, suppEmail, suppAdd, suppusername FROM supplier  where id= '$current_user'";

                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $id = $row['id'];
                                    $name = $row['suppName'];
                                    $phone = $row['suppNum'];
                                    $email = $row['suppEmail'];
                                    $address = $row['suppAdd'];
                                    $username = $row['suppusername'];

                            ?>
                                    <div class="mb-3 row">
                                        <label for="id" class="col-sm-2 col-form-label">Supplier Id</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" value=<?php echo $id ?> disabled>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="" class="col-sm-2 form-label">Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" value=<?php echo $name ?>>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="" class="col-sm-2 form-label">Phone</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" value=<?php echo $phone ?>>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="" class="col-sm-2 form-label">Email</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" value=<?php echo $email ?>>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="" class="col-sm-2 form-label">Address</label>
                                        <div class="col-sm-10">
                                            <textarea name="address" id="address" cols="30" rows="10" class="form-control"> <?php echo $address ?></textarea>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="" class="col-sm-2 form-label">Username</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" value=<?php echo $username ?>>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
                            <?php }
                            } ?>
                        </form>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <?php include "../includes/_scripts.php"; ?>

</body>

</html>