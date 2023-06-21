<?php
session_start();

// database connection code
$con = mysqli_connect('localhost', 'root', '','rsms');

if(isset($_POST['btnsub'])){

    $username = mysqli_real_escape_string($con,$_POST['username']);
    $password = mysqli_real_escape_string($con,$_POST['password']);

    if ($username != "" && $password != ""){

            $sql_query = "SELECT COUNT(*) AS cntUser FROM user where username='".$username."' AND password='".$password."'";
            $result = mysqli_query($con,$sql_query);
            $row = mysqli_fetch_array($result);

            $count = $row['cntUser'];

            if($count > 0){
                $_SESSION['username'] = $username;
                header("Location: supplierindex.php");
            }else{
                echo '<script>alert("Invalid username and password")</script>';
                echo '<script>function myButton(){window.location.href = "login.php";}myButton();</script>';
            }
        
        

    }

}

?>