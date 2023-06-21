<?php
include "config.php";
$InvoiceId = $_GET['InvoiceId'];
// $InvoiceId = $_GET['InvoiceId'];
$sql ="DELETE FROM `invoiceorder` WHERE InvoiceId = '$InvoiceId'";
$result = mysqli_query($conn, $sql);
if(result){
	header("Location: suppInvoiceD.php");
}
else{
	echo "Failed: " . mysql_error($conn);
}