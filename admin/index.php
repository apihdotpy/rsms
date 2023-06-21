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
    <title>Admin Dashboard</title>
</head>

<body>
    <div id="app">
        <?php include "../includes/admin_sidebar.php"; ?>
        <div id="main">
            <?php include "../includes/navbar.php"; ?>
            <div class="main-content container-fluid">
                <div class="page-title">
                    <h3>Dashboard</h3>
                </div>
                <section class="section">
                    <div class="row mb-2">
                        <?php
                        $tables = array("staff", "supplier", "stock");
                        $icons = array(
                            "staff" => "fa-user",
                            "supplier" => "fa-truck",
                            "stock" => "fa-box"
                        );
                        $colors = array(
                            "staff" => "text-success",
                            "supplier" => "text-warning",
                            "stock" => "text-danger"
                        );

                        foreach ($tables as $table) {
                            $sql = "SELECT COUNT(*) as count FROM $table";

                            $result = $conn->query($sql);

                            if ($result && $result->num_rows > 0) {
                                $row = $result->fetch_assoc();
                                $count = $row['count'];
                            } else {
                                $count = 0;
                            }

                            $result->free_result();

                        ?>
                            <div class="col-xl-4 col-md-12 mb-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between p-md-1">
                                            <div class="d-flex flex-row">
                                                <div class="align-self-center">
                                                    <i class="fa <?php echo $icons[$table] . ' ' . $colors[$table] ?> fa-3x me-4"></i>
                                                </div>
                                                <div>
                                                    <h4>
                                                        <?php echo ucfirst($table); ?>
                                                    </h4>
                                                    <h2 class="h1 mb-0">
                                                        <?php echo $count; ?>
                                                    </h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </section>
            </div>
            <?php include "../includes/_scripts.php"; ?>
        </div>
    </div>
</body>

</html>