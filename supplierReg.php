<?php 

include "config.php";

  if (isset($_POST['Submit'])) {

    $suppName = $_POST['suppName'];

    $suppNum= $_POST['suppNum'];

    $suppEmail = $_POST['suppEmail'];

    $suppAdd = $_POST['suppAdd'];

    $suppusername = $_POST['suppusername'];

    $supppass = $_POST['supppass'];

    $sql = "INSERT INTO `supplier`( `suppName`, `suppNum`,`suppEmail`, `suppAdd`,`suppusername`,
        `supppass`) VALUES ('$suppName','$suppNum','$suppEmail','$suppAdd','$suppusername','$supppass')";

    $result = $conn->query($sql);

    if ($result == TRUE) {

        echo ("<script LANGUAGE='JavaScript'>
                window.alert('Succesfully Register. Please login.');
                window.location.href='login2.html';
                </script>");

    }else{

      echo "Error:". $sql . "<br>". $conn->error;

    } 

    $conn->close(); 

  }

?>

<!DOCTYPE html>

<html>

<body>

<!DOCTYPE html>
<html>
    <head>
        <title> Supplier </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!--boostrap-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

        <!--Font-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <title>Register</title>
    </head>

    <body>
       <nav class="navbar navbar-expand-lg navbar-light bg-dark">
    <div class="container-fluid">
        <a class="active" href="login2.html" style="color:white;"><i class="fa fa-fw fa-home" style="color:white;"></i> Home</a> 
        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
            </div>
            <div class="navbar-nav">
            </div>
        </div>
    </div>
</nav>
        <div class="container"  style="padding-top: 70px;">
            <div class="text-center mb-4">
                <h3> Supplier</h3>
                <p class="text-muted">Complete the form below to add new supplier</p>
            </div>

            <div class="container d-flex justify-content-center">
                <form action="" method="POST" style="width;50vw; min-width: 300px;">
                    <div class="row">
                        <div class="col">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" name="suppName" placeholder=" Name" required>
                        </div>
                </div>
                <div>
                    <label class="form-label">Phone Number</label>
                    <input type="text" class="form-control" name="suppNum"  placeholder="Phone Number" required>
                </div>
                  <div>
                    <label class="form-label"> E-mail</label>
                    <input type="email" class="form-control" name="suppEmail" placeholder=" E-mail" required>
                </div>
                 <div>
                    <label class="form-label"> Address</label>
                    <input type="text" class="form-control" name="suppAdd" maxlength="250" placeholder=" Address" required>
                </div>
                 <div>
                    <label class="form-label">Username</label>
                    <input type="text" class="form-control" name="suppusername" placeholder="Username" required>
                </div>
                 <div>
                    <label class="form-label">Password</label>
                    <input type="text" class="form-control" name="supppass" placeholder=" Password" required>
                </div>
                <br>
                <br>
                <div class="gap-4 d-flex justify-content-center" > 
                    <button type="Submit" class="btn btn-success" name="Submit">Save</button>
                    &nbsp;
                    <a href="index.php" class="btn btn-danger">Cancel</a>
                    <br>
                </div>
                </form>

            </div>
            
        </div>




        <!--boostrap-->
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

        
    </body>
</html>
