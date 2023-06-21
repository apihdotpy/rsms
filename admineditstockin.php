<?php 

include "config.php";

  if (isset($_POST['Submit'])) {

    $stockid = $_GET['stockid'];

    $stockIn= $_POST['stockIn'];

    $AvailableStock= $_POST['AvailableStock'];

     $newIn= $AvailableStock +$stockIn;

    $iqinidola = $_POST['iqinidola'];

    $tambah = $iqinidola + $stockIn;





    $sql= "UPDATE stock SET stockIn='$tambah', AvailableStock = '$newIn' WHERE  stockid='$stockid'";
    $result = $conn->query($sql);

    if ($result == TRUE) {

     echo ("<script LANGUAGE='JavaScript'>
                window.alert('Succesfully update');
                window.location.href='stocklist.php';
                </script>");;

    }else{

      //echo "Error:". $sql . "<br>". $conn->error;

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
        <title>Stock In</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!--boostrap-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

        <!--Font-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <title>Manage Stock</title>
    </head>

    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-dark">
    <div class="container-fluid">
        <a class="active" href="adminidex.html" style="color:white;"><i class="fa fa-fw fa-home" style="color:white;"></i> Home</a> 
        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
            </div>
            <div class="navbar-nav">
                <a href="login2.html" class="nav-item nav-link"style="color: white;">Logout</a>
            </div>
        </div>
    </div>
</nav>
        <div class="container" style="padding-top: 70px;">
            <div class="text-center mb-4">
                <h3>Stock In</h3>
                <p class="text-muted">Click update after changing any information</p>
            </div>
            <?php
            $stockid = $_GET['stockid'];
            $con = mysqli_connect('localhost', 'root', '', 'rsms');
            $sql ="SELECT * FROM `stock` WHERE stockid = '$stockid' LIMIT 1";
            $result= $con->query($sql);
            while($row = mysqli_fetch_assoc($result))
            {
            
            ?>

            <div class="container d-flex justify-content-center">
                <form action="" method="POST" style="width;50vw; min-width: 300px;">
                    <div class="row">
                        <div class="col">
                            <label class="form-label">Stock Id</label>
                            <input type="text" class="form-control" name="stockid" value="<?php echo $row['stockid']?>" style="cursor: not-allowed;" disabled>
                        </div>
                </div>
                <div>
                    <label class="form-label">Stock Name</label>
                    <input type="text" class="form-control" name="stockName" 
                    value="<?php echo $row['stockName']?>" style="cursor: not-allowed;" disabled>
                </div>
                  <div>
                    <label class="form-label">Stock In</label>
                    <input type="text" class="form-control" name="stockIn" 
                    value="<?php echo $row['stockIn']?>">
                </div>
                 <div>
                    <input type="hidden" class="form-control" name="AvailableStock"  value="<?php echo $row['AvailableStock']?>">
                </div>
                   <div>
                    <input type="hidden" class="form-control" name="iqinidola"  value="<?php echo $row['stockIn']?>">
                </div>
                <br>
                <br>
                <div> 
                    <button type="Submit" class="btn btn-success" name="Submit">Update</button>
                    <a href="stocklist.php" class="btn btn-danger">Cancel</a>
                </div>
<?php
}
?>
                </form>

            </div>
            
        </div>




        <!--boostrap-->
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

        
    </body>
</html>
