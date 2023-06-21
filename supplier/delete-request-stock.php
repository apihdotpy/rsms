<?php
include "../utils/db_config.php";
$requestId = $_GET['requestId'];
$id = $_GET['id'];
$sql = "DELETE FROM `reqdetails` WHERE ReqId = '$requestId'";
$sql2 = "DELETE FROM `requeststock` WHERE ReqId = '$requestId'";
$result = mysqli_query($conn, $sql);
$result2 = mysqli_query($conn, $sql2);

if ($result && $result2) {
    header("Location: suppRD.php?id=$id&msg=Record deleted successfully!");
} else {
    echo "Failed: " . mysqli_error($conn);
}
