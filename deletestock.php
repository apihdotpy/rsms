<!-- to delete data  -->
<?php
include "config.php";
$stockid = $_GET['stockid'];
$sql ="DELETE FROM `stock` WHERE stockid = '$stockid'";
$result = mysqli_query($conn, $sql);
if(result){
	header("Location: stocklist.php?msg=Record deleted successfully");
}
else{
	echo "Failed: " . mysql_error($conn);
}