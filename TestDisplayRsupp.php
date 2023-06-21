

<!DOCTYPE html>
<html>
    <head>
        <title>List Request</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!--boostrap-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

        <!--Font-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    </head>

    <body>
        
       <nav class="navbar navbar-expand-lg navbar-light bg-dark">
    <div class="container-fluid">
        <a class="active" href="staffinndex.php" style="color:white;"><i class="fa fa-fw fa-home" style="color:white;"></i> Home</a> 
        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
            </div>
            <div class="navbar-nav">
                <a href="login2.html" class="nav-item nav-link"style="color: white;">Logout</a>
            </div>
        </div>
    </div>
</nav>
        <div class="container" style="padding-top: 70px;">
            <a href="addstock.php" class="btn btn-dark mb-3">New Request</a>
            <table class="table table-hover text-center">
            <form action="" method="GET">
            <div class="input-group mb-3">
            <input type="text" name="search" value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" placeholder="Search ">
           <button type="submit" class="btn btn-primary">Search</button>
           </div>
          </form>
  <thead class="thead-dark">
    <tr>
      <th scope="col">Request Id</th>
      <th scope="col">Item Name</th>
      <th scope="col">Quantity</th>
    </tr>
  </thead>
  <tbody>
    <?php 
      include "config.php";
      $ReqId = $_GET['ReqId'];
     if (isset($_GET['search']))
      {
        $filtervalues = $_GET['search'];
        $query = "SELECT reqdetails.id, requeststock.ReqId, stock.stockName, reqdetails.Quantity FROM reqdetails, requeststock, stock WHERE CONCAT(stock.stockName) LIKE '%$filtervalues %' stock.stockid = reqdetails.itemName AND requeststock.ReqId = reqdetails.ReqID AND reqdetails.ReqID = 18";
  
    } else{
      $query = "SELECT reqdetails.id, requeststock.ReqId, stock.stockName, reqdetails.Quantity FROM reqdetails, requeststock, stock WHERE stock.stockid = reqdetails.itemName AND requeststock.ReqId = reqdetails.ReqID AND reqdetails.ReqID = '$ReqId' ORDER BY requeststock.ReqId ASC";
      //SELECT reqdetails.id, requeststock.ReqId, stock.stockName, reqdetails.Quantity FROM reqdetails, requeststock, stock WHERE stock.stockid = reqdetails.itemName AND requeststock.ReqId = reqdetails.ReqID AND reqdetails.ReqID = 18;
}
$result = mysqli_query($conn, $query);
      while ($row = mysqli_fetch_assoc($result)) {
          ?>
              <tr>
              <th><?php echo $row['ReqId']?></th>
              <th><?php echo $row['stockName']?></th>
              <th><?php echo $row['Quantity']?></th>
         </tr>

          <?php
      }

    ?>
  </tbody>
</table>

</div>

    </body>
</html>
