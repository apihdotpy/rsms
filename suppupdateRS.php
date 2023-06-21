<?php
$id = $_GET['id'];
include "config.php";

if (isset($_POST['Submit'])) {
    $ReqId = $_POST['ReqId'];
    $DateReq = $_POST['DateReq'];
    $Status = $_POST['Status'];
    $Description = $_POST['Description'];

    $sql = "UPDATE requeststock SET DateReq = '$DateReq', Status = '$Status', Description = '$Description' WHERE ReqId = '$ReqId'";
    $result = $conn->query($sql);

    if ($result == TRUE) {
        echo '<script> function myButton()
        {
            window.location.href="suppRD.php?id=',$id,'";
        }
        myButton(); </script>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
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
        <title>Update Request</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!--boostrap-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
            integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

        <!--Font-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
            integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>

    <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
    <div class="container-fluid">
    <?php $id=$_GET['id'];?>
        <a class="active" href="supplierindex.php?id=<?php echo $id;?>" style="color:white;"><i class="fa fa-fw fa-home" style="color:white;"></i> Home</a> 
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
                <h3>Request Stock </h3>
                <p class="text-muted">Click update after changing any information</p>
            </div>
            <?php
            $ReqId = $_GET['ReqId'];
            $con = mysqli_connect('localhost', 'root', '', 'rsms');
            $sql = "SELECT * FROM `requeststock` WHERE ReqId = '$ReqId' LIMIT 1";
            $result = $con->query($sql);
            while ($row = $result->fetch_assoc()) {

                ?>

<div class="container d-flex justify-content-center">
    <form action="" method="POST" style="width: 50vw; min-width: 300px;">
        <div class="row">
            <input type="text" name="staffusername" value="<?php echo $row['staffusername'] ?>" class="d-none">

            <div class="col">
                <label class="form-label">Request ID</label>
                <input type="text" class="form-control" name="ReqId" value="<?php echo $row['ReqId'] ?>">
            </div>
        </div>
        <div>
            <label class="form-label">Date Request</label>
            <input type="Date" class="form-control" name="DateReq" value="<?php echo $row['DateReq'] ?>">
        </div>
        <div>
            <label class="form-label">Status</label>
            <select name="Status" class="form-control">
                <option value="Process">Process</option>
                <option value="Accept">Accept</option>
                <option value="Reject">Reject</option>
            </select>
        </div>
        <!-- Remove the extra closing </div> tag here -->
        <div>
            <label class="form-label">Description</label>
            <input type="text" class="form-control" name="Description" value="<?php echo $row['Description'] ?>">
        </div>
        <div>
            <button type="Submit" class="btn btn-success" name="Submit">Update</button>
            <a href="" class="btn btn-danger">Cancel</a>
        </div>
    </form>
</div>
                        <?php
            }
            ?>
                </form>

            </div>

        </div>




        <!--boostrap-->
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
            crossorigin="anonymous"></script>


    </body>

    </html>