
<?php 
    include "config.php";
    $query = "SELECT * FROM supplier";
    //"SELECT stock.*, supplier.suppName FROM stock INNER JOIN supplier ON supplier.id = stock.id";
    $result1 = mysqli_query($conn,$query);
    //$result2 = mysqli_query($conn,$query1);

    if(isset($_GET['select'])){
        $suppId = $_GET['select'];
        $sql = "SELECT stock.*, supplier.suppName FROM stock INNER JOIN supplier ON supplier.id = stock.id WHERE stock.id = '$suppId'";
        $result2 = mysqli_query($conn,$sql);
    } else {
        // echo "NO Result";
    }

?>
              
<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request Stock</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
     <script defer src="assets/fontawesome/js/all.min.js"></script>
    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/css/app.css">
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

    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <div class="card mt-4">
                    <div class="card-header">
                        <h4>Request Stock
                            <a href="javascript:void(0)" class="add-more-form float-end btn btn-primary">ADD MORE</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <form action="" method="">
                            <div class="col-md-6 col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="first-name-icon">Date</label>
                                            <div class="position-relative">
                                                <input type="Date" style="width: 150px;height: 360px;" class="form-control" placeholder="Quantity" id="first-name-icon">
                                                <div class="form-control-icon">
                                                </div>
                                            </div>
                                            <div class="row">
                                    <div class="col-md-4 col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="first-name-icon">Select supplier </label>
                                            <div class="position-relative">
                                                <fieldset class="form-group">
                                                    <select class="form-select" name="select" id="basicSelect" value="<?php if(isset($_GET['select'])){echo $_GET['select'];} ?>"  id="basicSelect">
                                                        <option>Supplier</option>
                                                        <?php while($row1 = mysqli_fetch_array($result1)):;?>
                                                            <option value="<?php echo $row1['id'];?>">
                                                         <?php echo 
                                                             $row1['suppName'];?></option>
                                                        <?php endwhile;?>
                                                    </select>
                                                </fieldset>   
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="first-name-icon"> </label>
                                            <div class="position-relative">
                                                <fieldset class="form-group">

                                                    <button type="submit" class="btn btn-primary">Search</button>
                                                </fieldset> 
                                            </div>
                                        </div>
                                    </div>

                        
                            <div class="main-form mt-3 border-bottom">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group mb-2">
                                                <select class="form-select" required>
                                                        <?php

                                                         while($row2 = mysqli_fetch_array($result2)):;?>
                                                            <option value="stockid">
                                                         <?php echo 
                                                             $row2["stockName"];?></option>
                                                        <?php endwhile;?>

                                                        
                                                     <option>Item</option>

                                                    </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                          <div class="form-group mb-2">
                                       <input type="text" style="width: 200px; height: 36px;" class="form-control" placeholder="Quantity" id="first-name-icon">
                                                <div class="form-control-icon">
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="paste-new-forms"></div>

                            <button type="submit" name="save_multiple_data" class="btn btn-primary">Save Multiple Data</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function () {

            $(document).on('click', '.remove-btn', function () {
                $(this).closest('.main-form').remove();
            });
            
            $(document).on('click', '.add-more-form', function () {
                $('.paste-new-forms').append('<div class="main-form mt-3 border-bottom">\
                                <div class="row">\
                                    <div class="col-md-4">\
                                        <div class="form-group mb-2">\
                                            <select class="form-select" name="">\
                                             </select>\
                                        </div>\
                                    </div>\
                                    <div class="col-md-4">\
                                        <div class="form-group mb-2">\
                                            <input type="text" style="width: 200px; height: 36px;" class="form-control" placeholder="Quantity" id="first-name-icon">\
                                                <div class="form-control-icon">\
                                                </div>\
                                        </div>\
                                    </div>\
                                    <div class="col-md-4">\
                                        <div class="form-group mb-2">\
                                            <br>\
                                            <button type="button" class="remove-btn btn btn-danger">Remove</button>\
                                        </div>\
                                    </div>\
                                </div>\
                            </div>');
            });

        });
    </script>
    <fieldset class="form-group">

</body>
</html>