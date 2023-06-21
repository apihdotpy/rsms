<?php
   session_start();
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Restaurant Stock Management System</title>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
      <script defer src="assets/fontawesome/js/all.min.js"></script>
      <link rel="stylesheet" href="assets/vendors/chartjs/Chart.min.css">
      <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
      <link rel="stylesheet" href="assets/css/app.css">
      <style type="text/css">
        .notif:hover{
          background-color: rgba(0,0,0,0.1);
                  }
      </style>
   </head>
   <body>
      <div id="app">
         <div id="sidebar" class='active'>
            <div class="sidebar-wrapper active">
               <div class="sidebar-header" style="height: 50px;margin-top: -30px">
                      <i class=" text-success me-4"></i>
                        <span>RSMS</span>
                </div>
               <div class="sidebar-menu">
                  <ul class="menu">
               
                     </li>
                        <li class="sidebar-item  has-sub">
                        <a href="#" class='sidebar-link'>
                        <i class="fa fa-user text-success"></i>
                        <span>Profile</span>
                        </a>
                        <ul class="submenu ">
                           <li>
                           <?php $id=$_GET['id'];?>
                           <a href="staffdisplayprofile.php?id=<?php echo $id;?>">Manage profile</a>
                           </li>
                        </ul>
                     </li>
                     <li class="sidebar-item  has-sub">
                        <a href="#" class='sidebar-link'>
                        <i class="fa fa-users text-success"></i>
                        <span>Supplier</span>
                        </a>
                        <ul class="submenu ">
                           <li>
                           <?php $id=$_GET['id'];?>
                              <a href="addsupplier.php?id=<?php echo $id;?>">Add Supplier</a>
                           </li>
                           <li>
                           <?php $id=$_GET['id'];?>
                              <a href="staffDisSupp.php?id=<?php echo $id;?>">Manage Supplier</a>
                           </li>
                        </ul>
                     </li>
                     <li class="sidebar-item  has-sub">
                        <a href="#" class='sidebar-link'>
                        <i class="fa fa-cubes text-success"></i>
                        <span>Stock</span>
                        </a>
                        <ul class="submenu ">
                           <li>
                           <?php $id=$_GET['id'];?>
                              <a href="staffaddstock.php?id=<?php echo $id;?>">Add stock</a>
                           </li>
                           <li>
                           <?php $id=$_GET['id'];?>
                              <a href="staffstocklist.php?id=<?php echo $id;?>">Manage stock</a>
                           </li>
                        </ul>
                     </li>
                     <li class="sidebar-item  has-sub">
                        <a href="#" class='sidebar-link'>
                        <i class="fa fa-hourglass text-success"></i>
                        <span>Request stock</span>
                        </a>
                        <ul class="submenu ">
                           <li>
                           <?php $id=$_GET['id'];?>
                           <a href="staffRS.php?id=<?php echo $id;?>">New Request Stock</a>
                           </li>
                           <li>
                           <?php $id=$_GET['id'];?>
                              <a href="StaffDisplayDRS.php?id=<?php echo $id;?>">View Request Stock</a>
                           </li>
                        </ul>
                     </li>
                     <li class="sidebar-item  has-sub">
                        <a href="#" class='sidebar-link'>
                        <i class="fa fa-paperclip text-success"></i>
                        <span>Invoice</span>
                        </a>
                        <ul class="submenu ">
                           <li>
                              <?php $id=$_GET['id'];?>
                              <a href="staffInvoiceD.php?id=<?php echo $id;?>">View Invoice</a>
                              

                           </li>
                        </ul>
                     </li>
                    
                        <ul class="submenu ">
                           <li>
                              <a href="all_leave.html">All Leaves</a>
                           </li>
                           <li>
                              <a href="pending_leave.html">Pending Leaves</a>
                           </li>
                           <li>
                              <a href="approve_leave.html">Approve Leaves</a>
                           </li>
                           <li>
                              <a href="not_approve_leave.html">Not Approve Leaves</a>
                           </li>
                        </ul>
                     </li>
            </div>
         </div>
         <div id="main">
            <nav class="navbar navbar-header navbar-expand navbar-light">
               <a class="sidebar-toggler" href="#"><span class="navbar-toggler-icon"></span></a>
               <button class="btn navbar-toggler" type="button" data-bs-toggle="collapse"
                  data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                  aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
               </button>
               <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav d-flex align-items-center navbar-light ms-auto">
                    <li class="dropdown nav-icon">
                            <a href="#" data-bs-toggle="dropdown"
                                class="nav-link  dropdown-toggle nav-link-lg nav-link-user">
                                <div class="d-lg-inline-block">
                                    <i data-feather="bell"></i><span class="badge bg-info">2</span>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-large">
                                <h6 class='py-2 px-4'>Notifications</h6>
                                <ul class="list-group rounded-none">
                                    <li class="list-group-item border-0 align-items-start">
                                    <div class="row mb-2">
                                    <div class="col-md-12 notif">
                                            <a href="leave_details.html"><h6 class='text-bold'>John Doe</h6>
                                            <p class='text-xs'>
                                                applied for leave at 05-21-2021
                                            </p></a>
                                        </div>
                                    <div class="col-md-12 notif">
                                            <a href="leave_details.html"><h6 class='text-bold'>Jane Doe</h6>
                                            <p class='text-xs'>
                                                applied for leave at 05-21-2021
                                            </p></a>
                                        </div>
                                      </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                     <li class="dropdown">
                        <a href="#" data-bs-toggle="dropdown"
                           class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                           <div class="avatar me-1">
                              <img src="assets/images/admin.png" alt="" srcset="">
                           </div>
                           <div class="d-none d-md-block d-lg-inline-block">Hi,<?php echo $_SESSION['username'];?></div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                           <div class="dropdown-item" ></div>
                           <a class="dropdown-item" href="login2.html"><i data-feather="log-out"></i> Logout</a>
                        </div>
                     </li>
                  </ul>
               </div>
            </nav>
            <div class="main-content container-fluid">
               <div class="page-title">
                  <h3>Dashboard</h3>
               </div>
               <section class="section">
                  <div class="row mb-2">
                               <div class="col-xl-4 col-md-12 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between p-md-1">
                  <div class="d-flex flex-row">
                    <div class="align-self-center">
                      <i class="fa fa-hourglass-start text-warning fa-2x me-4"></i>
                    </div>
                    <div>
                      <h4>Request Stock</h4>
                      <?php 
                       include 'config.php';
                       $query = "Select ReqId from requeststock order by ReqId";
                       $query_run = mysqli_query($conn, $query);
                       $row = mysqli_num_rows($query_run);
                       echo '<h1>' .$row.'</h1>'

                      ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
                    <div class="col-xl-4 col-md-12 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between p-md-1">
                  <div class="d-flex flex-row">
                    <div class="align-self-center">
                      <i class="fa fa-users text-success fa-2x me-4"></i>
                    </div>
                    <div>
                      <h4>Supplier</h4>
                       <?php 
                       include 'config.php';
                       $query = "Select id from supplier order by id";
                       $query_run = mysqli_query($conn, $query);
                       $row = mysqli_num_rows($query_run);
                       echo '<h1>' .$row.'</h1>'

                      ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>          <div class="col-xl-4 col-md-12 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between p-md-1">
                  <div class="d-flex flex-row">
                    <div class="align-self-center">
                      <i class="fa fa-cubes text-info fa-2x me-4"></i>
                    </div>
                    <div>
                      <h4>Available stock</h4>
                       <?php 
                       include 'config.php';
                       $query = "Select stockid from stock order by stockid";
                       $query_run = mysqli_query($conn, $query);
                       $row = mysqli_num_rows($query_run);
                       echo '<h1>' .$row.'</h1>'

                      ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
                    <div>
                  </div>
               </section>
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