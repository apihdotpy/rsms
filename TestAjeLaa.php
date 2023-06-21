<?php
include "config.php";
$query = "SELECT * FROM supplier";
//"SELECT stock.*, supplier.suppName FROM stock INNER JOIN supplier ON supplier.id = stock.id";
$result1 = mysqli_query($conn, $query);

//$result2 = mysqli_query($conn,$query1);

// if (isset($_GET['select'])) {
//   $suppId = $_GET['select'];
//   $sql = "SELECT stock.*, supplier.suppName FROM stock INNER JOIN supplier ON supplier.id = stock.id WHERE stock.id = '$suppId'";
//   $result2 = mysqli_query($conn, $sql);
// } else {
//   // echo "NO Result";
// }
// if(isset($_POST["submit"])){
//   $stockId = $_POST['cb'];
//   $Quantity = $_POST['Quantity'];
//   $DateReq = date("Y-m-d");
//   $supid = $_POST['suppId'];


   if(isset($_POST['submit'])){
    try{
    // $Reqid = $_SESSION['ReqId'];
    $DateReq=date('y-m-d');
    $SuppName= $_POST['suppId']; 
    $StockId = $_POST['cb'];
    $Quantity= $_POST['Quantity'];  
    // $StatusItem= $_POST['Status'];
    
    for ($i=0; $i<count($StockId); $i++){
      if(!empty($_POST['cb'][$i])) {
        $statement = $conn->prepare("INSERT INTO requeststock (ReqId,DateReq,SuppName,ItemName,Quantity,Status) VALUES (?,?,?,?,?,?)");
        $statement->execute(array(null,$DateReq,$SuppName,$StockId[$i],$Quantity[$i]),'Process');
      }
    }

    }
    catch(Exception $e) {
            $error_message = $e->getMessage();
    }
  }
//}
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
          <h4>Request Stock</h4>
        </div>
        <div class="card-body">
          <form>
            <div class="form-row">
              <div class="col-4">
                <div class="form-group">
                  <label for="inputEmail4">Date Request</label>
                  <input type="Date" class="form-control" id="date" placeholder="Date"/>
                </div>
              </div>
              <!-- <div class="form-group col-6 col-md-6">
                <select id="inputState" class="form-control" hidden>
                  <option selected></option>
                  <option>...</option>
                </select>
              </div> -->
              <div class="col-4">
                <div class="form-group">
                  <label for="supplier">Supplier</label>
                  <select id="supplier" class="form-control" name="select" id="basicSelect" value="<?php if (isset($_GET['select'])) {
                    echo $_GET['select'];
                  } ?> ">
                    <option>Supplier</option>
                    <?php while ($row1 = mysqli_fetch_array($result1)):
                      ; ?>
                      <option value="<?php echo $row1['id']; ?>">
                        <?php echo $row1['suppName']; ?></option>
                    <?php endwhile; ?>
                  </select>
                </div>
              </div>
              <div class="col-4 d-flex align-items-center">
             <button type="submit" class="btn btn-primary d-block">Search</button>
              </div>
            </div>
          </form>
         <form action="" method="POST">
           <table class="table">
           <thead class="thead-dark">
           <tr>
          <th scope="col"></th>
          <th scope="col">Item Id</th>
          <th scope="col">Supp Id</th>
          <th scope="col">Item Name</th>
          <th scope="col">Quantity</th>
          </tr>
          <tbody>
    <?php 
    if (isset($_GET['select'])) {
      $suppId = $_GET['select'];
      $sql = "SELECT stock.*, supplier.suppName, supplier.id FROM stock INNER JOIN supplier ON supplier.id = stock.id WHERE stock.id = '$suppId'";
      $result2 = mysqli_query($conn, $sql);
//$result2 = mysqli_query($conn, $query);
      while ($row = mysqli_fetch_assoc($result2)) {
          ?>
              <tr>
              <th><input type="checkbox" name="cb[]" value="<?php echo $row['stockid'] ?>" aria-label="Checkbox for following input"></th>
              <th><?php echo $row['stockid']?></th>
              <th><input type="hidden" name="suppId" value="<?php echo $row['id'] ?>"><?php echo $row['id']?></th>
              <th><?php echo $row['stockName']?></th>
              <th><input type="text" class="form-control" name="Quantity" style="width:120px;" placeholder="Quantity"></th>
              
         </tr>
          <?php
      }
    }
    ?>
  </tbody>
  </thead>
  <input type="submit" name="submit" value="submit" class="btn btn-primary d-block">
  </form>
</div>
</body>
</html>