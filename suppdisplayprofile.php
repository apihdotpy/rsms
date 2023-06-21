
<?php
   session_start();
    include "config.php";
    //$iid = $_SESSION['username'];
    $id=$_GET['id'];
?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Profile</title>
      <link rel="stylesheet" href="assets/css/bootstrap.css">
      <script defer src="assets/fontawesome/js/all.min.js"></script>
      <link rel="stylesheet" href="assets/vendors/chartjs/Chart.min.css">
      <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
      <link rel="stylesheet" href="assets/css/app.css">
      <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon">
      <style type="text/css">
        .notif:hover{
          background-color: rgba(0,0,0,0.1);
                  }
      </style>
   </head>
   <body> 
  
   <nav class="navbar navbar-expand-lg navbar-light bg-dark">
    <div class="container-fluid">
    <?php $id=$_GET['id'];?>
        <a class="active" href="staffinndex.php?id=<?php echo $id;?>" style="color:white;"><i class="fa fa-fw fa-home" style="color:white;"></i> Home</a> 
        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
            </div>
            <div class="navbar-nav">
                <a href="login2.html" class="nav-item nav-link"style="color: white;">Logout</a>
            </div>
        </div>
    </div>
</nav>
         <div class="main-content container-fluid" style="margin-top:32px">
     <div class="page-title">
                  <h3>Profile</h3>
    </div>
 <section id="basic-vertical-layouts">
    <div class="row match-height">
            <div class="col-md-12 col-12">
        <div class="card">
            <div class="card-content">
            <div class="card-body">
                <form class="form form-vertical">
                <div class="form-body">
                    <div class="row">
                    <div class="col-12">
                        <table class='table' id="table1">
                               
                                <tbody>
                                      <?php
      

       $sql = "SELECT id,staffName,staffNum,stuffEmail,staffAdd,staffusername FROM staff  where id= '$id'";
       $result = $conn->query($sql);


        if ($result->num_rows > 0) {
          // output data of each row
         while($row = $result->fetch_assoc()) {
        echo "<tr>
        <td>
        <span class='fw-bold'>Name :</span>  ". $row["staffName"]. "
        </td>
        <td>
        <span class='fw-bold'>Phone Number :</span>  ". $row["staffNum"]. "
        <td>
        <span class='fw-bold'></span>
        </tr>
        <tr>
        <td>
         <span class='fw-bold'>E-mail :</span>  ". $row["stuffEmail"]. "
         <td></td><td></td>
        </tr>
        <tr>
        <td>
         <span class='fw-bold'>Address:</span>  ". $row["staffAdd"]. "
         <td></td><td></td>
        </tr>
        <td>
         <a href= 'staffUpdateprofile.php?id=".$row["staffusername"]."
            '> Update Profile</a>
         </td>

         " . "<tr>";

         }
} else {
         echo "0 results";
        }

$conn->close();

    ?>
                                  
                                </tbody>
                            </table>
                    </div>

                    <div class="col-12 d-flex justify-content-end">
                    <?php $id=$_GET['id'];?>
                        <a href="staffUpdateprofile.php?id=<?php echo $id;?>"
                         class="btn btn-primary me-1 mb-1;]">Update Profile</a>
                    </div>
                    </div>
                </div>
                </form>
            </div>
            </div>
        </div>
        </div>
    </div>
    </section>
    <!-- // Basic Vertical form layout section end -->
            </div>
         </div>
      </div>
      <script src="assets/js/feather-icons/feather.min.js"></script>
      <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
      <script src="assets/js/app.js"></script>
      <script src="assets/vendors/chartjs/Chart.min.js"></script>
      <script src="assets/vendors/apexcharts/apexcharts.min.js"></script>
      <script src="assets/js/pages/dashboard.js"></script>
      <script src="assets/js/main.js"></script>
   </body>
</html>
