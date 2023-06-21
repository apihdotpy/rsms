

<!DOCTYPE html>

<html>

<body>

<!DOCTYPE html>
<html>
    <head>
        <title>List Invoice </title>
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
            <table class="table table-hover text-center">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Invoice No</th>
      <th scope="col">Invoice Date</th>
      <th scope="col">Supplier Name</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php 
include "config.php";
$id=$_GET['id'];
$sql = "SELECT InvoiceId, DATE_FORMAT(Date, '%d-%m-%Y') AS InvoiceDate , supplier.suppName FROM `invoiceorder`,`supplier` WHERE supplier.id = invoiceorder.suppId AND supplier.id='$id'";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {
?>
    <tr>
        <th><?php echo $row['InvoiceId']?></th>
        <th><?php echo $row['InvoiceDate']?></th>
        <th><?php echo $row['suppName']?></th>
        <td>
        <i title="View Details" style="cursor: pointer;" class="fa fa-eye text-info" onclick="requeststock(<?php echo $id;?>,<?php echo $row['InvoiceId'];?>)"></i>
        <i class="fa-solid fa-print" style="color: #2474ff;" title="Print" style="cursor: pointer;"></i>
        <i class="fa-sharp fa-solid fa-download" style="color: #1f71ff;"title="View"style="cursor: pointer;" ></i>
        <a href="supdeleteInvoice.php?InvoiceId=<?php echo $row['InvoiceId']; ?>" onclick="return confirm('Are you sure want to delete?'); " class="link-dark" ><i title ="Delete" class="fa-solid fa-trash fs-5"></i></a>
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
        <script>
    function requeststock(id,invoiceId) {
        var txt1 = invoiceId;
        var txt2 = id;
        window.location.href = "suppInvoiceDetails.php?id="+txt2+"&InvoiceId="+txt1;
    }
</script>
<script type="text/javascript">
    function deletestock(InvoiceId) {
        var txt = InvoiceId;
        if (confirm('Sure To Remove This Record ?')) {
            window.location.href = "staffInvoiceD.php?InvoiceId=" + txt;
        }
    }
</script>
        
    </body>
</html>
