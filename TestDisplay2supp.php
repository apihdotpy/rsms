

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
      <th scope="col">Date Request</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
     <?php 

     
      include "config.php";
     if (isset($_GET['search']))
      {
        $filtervalues = $_GET['search'];
        $query = "SELECT requeststock.*, supplier.suppName FROM requeststock, supplier WHERE CONCAT(supplier.suppName) LIKE '%$filtervalues %' AND supplier.id = requeststock.SuppName";
    } else{
      $query = "SELECT requeststock.*, supplier.suppName FROM requeststock, supplier WHERE  supplier.id = requeststock.SuppName ORDER BY requeststock.suppName ASC";
      //SELECT reqdetails.id, requeststock.ReqId, stock.stockName, reqdetails.Quantity FROM reqdetails, requeststock, stock WHERE stock.stockid = reqdetails.itemName AND requeststock.ReqId = reqdetails.ReqID AND reqdetails.ReqID = 18;
}



$result = mysqli_query($conn, $query);
      while ($row = mysqli_fetch_assoc($result)) {
          ?>
              <tr>
              <th><?php echo $row['ReqId']?></th>
              <th><?php echo $row['DateReq']?></th>
              <th><?php echo $row['Status']?></th>
              <td>
              <i title="View Details" style="cursor: pointer;" class="fa fa-eye text-info" onclick="requeststock(<?php echo $row['ReqId'];?>)"></i>
              <a href="staffDeleteRS.php?ReqId=<?php echo $row['ReqId']; ?>" onclick="return confirm('Are you sure want to delete?'); " class="link-dark" ><i title ="Delete" class="fa-solid fa-trash fs-5"></i></a>

            </td>
         </tr>

          <?php
      }

    ?>
  </tbody>
</table>

</div>

        <!--boostrap-->
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfjcrossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
        <script type="text/javascript">
        function deletestock(stockid)
        {
           var txt = stockid;
           if(confirm('Sure To Remove This Record ?'))
          {
          window.location.href="deletestock.php?stockid="+txt;
         }
}
</script>
<script>
        function requeststock(ReqId) {
            var txt1 = ReqId;
            window.location.href = "TestDisplayRsupp.php?ReqId="+txt1;
        }
    </script>

        
    </body>
</html>