<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>


<?php
// database connection code
$con = mysqli_connect('localhost', 'root', '','rsms');

// get the post records
$username = $_POST['username'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];


// database insert SQL code
$sql = "INSERT INTO `user` VALUES ('$username', '$password', '$confirm_password')";

// insert in database 
$rs = mysqli_query($con, $sql);

if($rs)
{
  echo '<script>alert("Successfully add new leave!")</script>';
  //echo '<script>function myButton() {window.location.href = "manage_leave_type.php";}myButton();</script>';
}

?>