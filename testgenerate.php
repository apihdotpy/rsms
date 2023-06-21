<?php
include "config.php";
$id = $_GET['id'];


if (isset($_POST["Generate"])) {
  // $stockId = $_POST['cb'];
  // $Quantity = $_POST['quantity'];
  $counter = 0;
  $ReqId = $_GET['ReqId'];
  $sql = "SELECT reqdetails.id, requeststock.ReqId, reqdetails.itemName, stock.stockName, reqdetails.Quantity as quantity FROM reqdetails, requeststock, stock WHERE stock.stockid = reqdetails.itemName AND requeststock.ReqId = reqdetails.ReqID AND reqdetails.ReqID = '$ReqId' ORDER BY requeststock.ReqId ASC";
  $result2 = mysqli_query($conn, $sql);
  while ($row = mysqli_fetch_assoc($result2)) {
    $counter++;
  }
$Date = date("Y-m-d");
$price = array();
$itemPrice = array();
$quantity = array();


echo $TP;

echo $counter;

  for ($i = 0; $i < $counter; $i++) {
    if ($_POST['price'][$i] !== '0' && $_POST['price'][$i] !== null  && $_POST['price'][$i] !== "") {
      array_push($price, $_POST['price'][$i]);
    }
  }

  for ($i = 0; $i < $counter; $i++) {
    if ($_POST['quantity'][$i] !== '0' && $_POST['quantity'][$i] !== null  && $_POST['quantity'][$i] !== "") {
      array_push($quantity, $_POST['quantity'][$i]);
    }
  }
  $id = $_GET['id'];

  $query1 = "INSERT INTO invoiceorder (Date,suppId) VALUES ('" . $Date . "','" . $id ."')";
  $result1 = $conn->query($query1);
  $lastInsertId = mysqli_insert_id($conn);
  for ($i = 0; $i < count($_POST['stockid']); $i++) {
    // echo sizeof($stockId);
    // $query = "INSERT INTO reqdetails (ReqID,itemName,Quantity) VALUES ('".$lastInsertId."','".$_POST['stockid'][$i]."','".$_POST['quantity'][$i]."')";
    $totalprice = $price[$i] * $quantity[$i];
    $query = "INSERT INTO invoice_item (invoiceId,itemName,Quantity,itemPrice,TotalPrice) VALUES ('" . $lastInsertId . "','" . $_POST['stockid'][$i] . "','" . $quantity[$i] . "','" . $price[$i] . "','" . $totalprice . "')";
    $result = $conn->query($query);
    if ($result == TRUE) {

      echo ("<script LANGUAGE='JavaScript'>
            window.alert('Succesfully Add New Stock');
            window.location.href='StaffDisplayDRS.php';
            </script>");
    } else {
      echo "Error:" . $query . "<br>" . $conn->error;
    }
  }

  $conn->close();
}
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Create Invoice</title>
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
        <div class="text-center mb-4">
                <h3> Create Invoice</h3>
                <p class="text-muted">Select available item to generate invoice</p>
            </div>
            <table class="table table-hover text-center">
            <form action="" method="POST">
            <div class="form-group">
                  <label for="inputEmail4">Date Request</label>
                  <input type="Date" class="form-control" id="date" placeholder="Date" />
                </div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                <h3>From,</h3>
                <p>Nanti bubuh session nak tarik</p>
                </div>
            <div class="input-group mb-3">
           </div>
           <input type="submit" name="Generate" value="Generate" class="btn btn-primary d-block">
           <br>
          
  <thead class="thead-dark">
    <tr>
      <th scope="col"></th>
      <th scope="col">Request Id</th>
      <th scope="col">Item Name</th>
      <th scope="col">Quantity</th>
      <th scope="col">Price (RM)</th>
    </tr>
  </thead>
  <tbody>
    <?php 
      include "config.php";
      $ReqId = $_GET['ReqId'];
     if (isset($_GET['search']))
      {
        $filtervalues = $_GET['search'];
        $query = "SELECT reqdetails.id, requeststock.ReqId, stock.stockName, reqdetails.Quantity FROM reqdetails, requeststock, stock WHERE CONCAT(stock.stockName) LIKE '%$filtervalues %' stock.stockid = reqdetails.itemName AND requeststock.ReqId = reqdetails.ReqID AND reqdetails.ReqID = ReqID";
  
    } else{
      $query = "SELECT reqdetails.id, requeststock.ReqId, requeststock.SuppName,reqdetails.itemName as stockid, stock.stockName, reqdetails.Quantity as quantity FROM reqdetails, requeststock, stock WHERE stock.stockid = reqdetails.itemName AND requeststock.ReqId = reqdetails.ReqID AND reqdetails.ReqID = '$ReqId' ORDER BY requeststock.ReqId ASC";
      //SELECT reqdetails.id, requeststock.ReqId, stock.stockName, reqdetails.Quantity FROM reqdetails, requeststock, stock WHERE stock.stockid = reqdetails.itemName AND requeststock.ReqId = reqdetails.ReqID AND reqdetails.ReqID = 18;
}
$result = mysqli_query($conn, $query);
      while ($row = mysqli_fetch_assoc($result)) {
          ?>
              <tr>
              <th><input type="checkbox" name="stockid[]" id="itemRow_1" class="itemRow" value="<?php echo $row['stockid'] ?>"
              aria-label="Checkbox for following input"></th>
              <th><?php echo $row['ReqId']?></th>
              <th><?php echo $row['stockName']?></th>
              <th><input type="number" name="quantity[]" min="1" max="<?php echo $row['quantity']?>" value="<?php echo $row['quantity']?>"></th>
              <th>
                 
              <input type="text" class="form-control" name="price[]" style="width:120px;" 
                          placeholder="Price">

            </th>
         </tr>

          <?php
      }

    ?>
  </tbody>
</table>
</form>

</div>

        <!--boostrap-->
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfjcrossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
        <script>
        $(document).ready(function(){
        $(document).on('click', '.itemRow_1', function() {  	
		if ($('.itemRow_1:checked').length == $('.itemRow_1').length) {
			$('#itemRow_1').prop('checked', true);
		} else {
			$('#itemRow_1').prop('checked', false);
		}
	});  
});
</script>

        
    </body>
</html>
