

<!DOCTYPE html>

<html>

<body>

<!DOCTYPE html>
<html>
    <head>
        <title>List Supplier </title>
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
            <a href="addsupplier.php" class="btn btn-dark mb-3">Add New</a>
            <table class="table table-hover text-center">
  <thead class="thead-dark">
    <tr>
      <th scope="col">No</th>
      <th scope="col">Supplier name</th>
      <th scope="col">Supplier phone number</th>
      <th scope="col">Supplier E-mail</th>
      <th scope="col">Supplier address</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php 
      include "config.php";
      $sql = "SELECT id,suppName,suppNum,suppEmail,suppAdd FROM `supplier`";
      $result = mysqli_query($conn, $sql);
      while ($row = mysqli_fetch_assoc($result)) {
          ?>
              <tr>
              <th><?php echo $row['id']?></th>
              <th><?php echo $row['suppName']?></th>
              <th><?php echo $row['suppNum']?></th>
              <th><?php echo $row['suppEmail']?></th>
              <th><?php echo $row['suppAdd']?></th>
        
              <td>
                   <a href="edit.php?id=<?php echo $row['id']?>" class="link-dark"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
                  <a href="deletesupp.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure want to delete?'); " class="link-dark" ><i title ="Delete" class="fa-solid fa-trash fs-5"></i></a>
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

        
    </body>
</html>
