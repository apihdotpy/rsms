<!-- to delete data  -->
<?php
include "config.php";
$id= $_GET['id'];
$sql ="DELETE FROM `supplier` WHERE id = '$id'";
$result = mysqli_query($conn, $sql);
if(result){
	header("Location:admitupdatesupplier.php?msg=Record deleted successfully");
}
else{
	echo "Failed: " . mysql_error($conn);
}