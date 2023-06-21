

<!DOCTYPE html>

<html>

<body>

<!DOCTYPE html>
<html>
    <head>
        <title>List Stock </title>
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
        <div class="container" style="padding-top: 70px;">
        <?php $id=$_GET['id'];?>
            <a href="staffaddstock.php?id=<?php echo $id;?>" class="btn btn-dark mb-3">Add New</a>
            <table class="table table-hover text-center">
            <form action="" method="GET">
            <div class="input-group mb-3">
            <input type="text" name="search" value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" placeholder="Search ">
          &nbsp; <button type="submit" class="btn btn-primary">Search</button>
           </div>
          </form>
  <thead class="thead-dark">
    <tr>
      <th scope="col">Stock ID</th>
      <th scope="col">Stock name</th>
      <th scope="col">Supplier Name</th>
       <th scope="col">Stock Available</th>
      <th scope="col">Stock Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php 
      include "config.php";
     if (isset($_GET['search']))
      {
        $filtervalues = $_GET['search'];
        $query = "SELECT stock.*, supplier.suppName FROM stock INNER JOIN supplier ON supplier.id = stock.id WHERE   CONCAT(stock.stockName,stock.stockid) LIKE '%$filtervalues%'";
    } else{
      $query = "SELECT stock.*, supplier.suppName FROM stock INNER JOIN supplier ON supplier.id = stock.id ORDER BY stock.stockid ASC";
}
$result = mysqli_query($conn, $query);
      while ($row = mysqli_fetch_assoc($result)) {
          ?>
              <tr>
              <th><?php echo $row['stockid']?></th>
              <th><?php echo $row['stockName']?></th>
               <th><?php echo $row['suppName']?></th>
               <th><?php echo $row['AvailableStock']?></th>
                <th><?php 
                    if($row['AvailableStock']<10)
                    {
                        echo'Low stock';
                    }
                    else  
                    {
                         echo 'Stock Available';
                    }


                ?></th>
        
              <td>
                   <a href="editstockout.php?stockid=<?php echo $row['stockid']?>" class="link-dark"><i title ="Stock Out" class="fa-solid fa-minus fs-5"></i></a>

                   <a href="editstockin.php?stockid=<?php echo $row['stockid']?>" class="link-dark"><i title ="Stock In" class="fa-solid fa-add fs-5"></i></a>
                   <a href="updateStock.php?stockid=<?php echo $row['stockid']?>" class="link-dark"><i title ="Edit"class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
                   <a href="admindeletestock.php?stockid=<?php echo $row['stockid']; ?>" onclick="return confirm('Are you sure want to delete?'); " class="link-dark" ><i title ="Delete" class="fa-solid fa-trash fs-5"></i></a>


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
          window.location.href="admindeletestock.php?stockid="+txt;
         }
}
</script>

        
    </body>
</html>
