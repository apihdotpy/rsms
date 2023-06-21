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
    <title>Manage Staff</title>
</head>

<body>

    <div id="app">
        <?php include "../includes/admin_sidebar.php"; ?>
        <div id="main">
            <?php include "../includes/navbar.php"; ?>
            <div class="main-content container-fluid">
                <div class="page-title">
                    <h3>Manage Staff</h3>
                </div>
                <section class="section">
                    <div class="d-flex justify-content-between">
                        <a href="add-staff.php" class="btn btn-dark mb-3">Add New</a>
                        <form action="" method="GET" style="width: 300px;">
                            <div class="input-group mb-3">
                                <input type="text" name="search" class="form-control" placeholder="Search.." value="<?php echo $search ?>">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                        </form>
                    </div>
                    <table class="table table-hover text-center px-4">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Staff name</th>
                                <th scope="col">Staff phone number</th>
                                <th scope="col">Staff E-mail</th>
                                <th scope="col">Staff address</th>
                                <th scope="col">Staff Username</th>
                                <th scope="col">Staff Password</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($_GET['search'])) {
                                $filtervalues = $_GET['search'];
                                $query = "SELECT * FROM staff WHERE CONCAT(staffName) LIKE '%$filtervalues%'";
                            } else {
                                $query = "SELECT * FROM `staff`";
                            }
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                <tr>
                                    <th><?php echo $row['id'] ?></th>
                                    <th><?php echo $row['staffName'] ?></th>
                                    <th><?php echo $row['staffNum'] ?></th>
                                    <th><?php echo $row['stuffEmail'] ?></th>
                                    <th><?php echo $row['staffAdd'] ?></th>
                                    <th><?php echo $row['staffusername'] ?></th>
                                    <th><?php echo $row['staffpass'] ?></th>
                                </tr>

                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </section>
            </div>
        </div>
    </div>


    <?php include "../includes/_scripts.php"; ?>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js integrity=" sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfjcrossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

</body>

</html>