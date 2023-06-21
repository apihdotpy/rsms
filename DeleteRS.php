<?php
include "config.php";
$id = $_GET['id'];
// $ReqId = $_GET['ReqId'];
$sql ="DELETE FROM `reqdetails` WHERE id = '$id'";
$result = mysqli_query($conn, $sql);
if(result){
	header("Location: TestDisplay2.php");
}
else{
	echo "Failed: " . mysql_error($conn);
}