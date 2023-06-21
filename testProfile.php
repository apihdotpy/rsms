<?php
   session_start();
    include "config.php";
    $iid = $_SESSION['username'];
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Request Stock</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
    integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

  <script defer src="assets/fontawesome/js/all.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-dark">
    <div class="container-fluid">
      <a class="active" href="staffinndex.php" style="color:white;"><i class="fa fa-fw fa-home"
          style="color:white;"></i> Home</a>
      <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
      </div>
      <div class="navbar-nav">
        <a href="login2.html" class="nav-item nav-link" style="color: white;">Logout</a>
      </div>
    </div>
    </div>
  </nav>
  <div class="container">
    <div class="col-md-12">
      <div class="card mt-4">
        <div class="card-header">
          <h4>User Profile</h4>
        </div>
        <div class="card-body">

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
      

       $sql = "SELECT id,staffName,staffNum,stuffEmail,staffAdd,staffusername FROM staff  where staffusername = '$iid'";
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
         <td>
        </tr>
        <td>
         <span class='fw-bold'>Address:</span>  ". $row["staffAdd"]. "
        <tr>
        <td>
        <br>
        <div class='d-flex justify-content-end'>
        <a class='btn btn-primary' href='staffUpdateprofile.php?id=".$row["staffusername"]."'>Update Profile</a>
         </td>
        </tr>
        </div>
<tr>";

         }
} else {
         echo "0 results";
        }

$conn->close();

    ?>
                                  
</tbody>
</table>
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