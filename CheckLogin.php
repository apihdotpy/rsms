<?php
include 'config.php';
session_start();
// database connection code
//$con = mysqli_connect('localhost', 'root', '','rsms');

if (isset($_POST['submit'])) {

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $user = mysqli_real_escape_string($conn, $_POST['userrole']);


    if ($username != "" && $password != "") {

        if ($user == '1') {
            $sql_query = "SELECT COUNT(*) AS cntUser, adminId AS adminId FROM admin WHERE username='" . $username . "' AND password='" . $password . "'";
            $result = mysqli_query($conn, $sql_query);
            $row = mysqli_fetch_array($result);

            $count = $row['cntUser'];
            $adminID = $row['adminID'];

            if ($count > 0) {
                $_SESSION['username'] = $username;
                $_SESSION['adminID'] = $adminID;
                header("Location: adminidex.php?id=$adminID");
            } else {
                echo '<script>alert("Invalid username,password and user role.Please check again.")</script>';
                echo '<script>function myButton(){window.location.href = "./";}myButton();</script>';
            }
        } else if ($user == '2') {
            $sql_query = "SELECT COUNT(*) AS cntUser, id AS id FROM staff WHERE staffusername='" . $username . "' AND staffpass='" . $password . "'";
            $result = mysqli_query($conn, $sql_query);
            $row = mysqli_fetch_array($result);

            $count = $row['cntUser'];
            $id = $row['id'];

            if ($count > 0) {
                $_SESSION['username'] = $username;
                $_SESSION['id'] = $id;
                header("Location: staffinndex.php?id=$id");
            } else {
                echo '<script>alert("Invalid username,password and user role.Please check again.")</script>';
                echo '<script>function myButton(){window.location.href = "login2.html";}myButton();</script>';
            }
        } else if ($user == '3') {

            $sql_query = "SELECT COUNT(*) AS cntUser, id AS id FROM supplier WHERE suppusername='" . $username . "' AND supppass='" . $password . "'";
            $result = mysqli_query($conn, $sql_query);
            $row = mysqli_fetch_array($result);

            $count = $row['cntUser'];

            if ($count > 0) {
                $_SESSION['username'] = $username;
                $_SESSION['id'] = $row['id'];
                header("Location: supplier");
            } else {
                echo '<script>alert("Invalid username,password and user role.Please check again.")</script>';
                echo '<script>function myButton(){window.location.href = "./";}myButton();</script>';
            }
        }
    }
}
