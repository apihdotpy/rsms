<?php
include "config.php";
$ReqId = $_GET['ReqId'];
$id = $_GET['id'];
$sql = "DELETE FROM `reqdetails` WHERE ReqId = '$ReqId'";
$sql2 = "DELETE FROM `requeststock` WHERE ReqId = '$ReqId'";
$result = mysqli_query($conn, $sql);
$result2 = mysqli_query($conn, $sql2);
if ($result && $result2) {
    header("Location: suppRD.php?id=$id&msg=Record deleted successfully!");
} else {
    echo "Failed: " . mysql_error($conn);
}
?>
