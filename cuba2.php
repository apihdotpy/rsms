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

<!DOCTYPE html>
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
        <a class="active" href="staffinndex.php" style="color:white;"><i class="fa fa-fw fa-home" style="color:white;"></i> Home</a> 
        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
            </div>
            <div class="navbar-nav">
                <a href="login2.html" class="nav-item nav-link"style="color: white;">Logout</a>
            </div>
        </div>
    </div>
</nav>       
<div class="main-content container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Request Stock</h3>
            </div>
        </div>

    </div>


    <!-- // Basic multiple Column Form section start -->
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form">
                                <div class="col-12 d-flex justify-content-end">
                                        <a href="javascript:void(0)" class="add-more-form float-end btn btn-primary">ADD MORE</a>
                                    </div>
                                     <div class="col-md-6 col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="first-name-icon">Date</label>
                                            <div class="position-relative">
                                                <input type="Date" style="width: 350px; height: 36px;" class="form-control" placeholder="Quantity" id="first-name-icon">
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
                                    <br>
                                      <div class="col-md-6 col-12">
                                        <div class="form-group has-icon-left" hidden>
                                            <label for="first-name-icon">Status</label>
                                            <div class="position-relative">
                                                <fieldset class="form-group">
                                                    <select class="form-select" id="basicSelect" value="?php <?php echo stockName; ?>">
                                                        <option>Process</option>
                                                        <option>Accept</option>
                                                        <option>Reject</option>
                                                    </select>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                          <div class="col-md-6 col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="first-name-icon">Select item </label>
                                            <div class="position-relative">
                                                <fieldset class="form-group">
                                                    <select class="form-select" required>
                                                        <?php

                                                         while($row2 = mysqli_fetch_array($result2)):;?>
                                                            <option value="stockid">
                                                         <?php echo 
                                                             $row2["stockName"];?></option>
                                                        <?php endwhile;?>

                                                        
                                                     <option>Item</option>

                                                    </select>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="first-name-icon">Quantity</label>
                                            <div class="position-relative">
                                                <input type="text" style="width: 200px; height: 36px;" class="form-control" placeholder="Quantity" id="first-name-icon">
                                                <div class="form-control-icon">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                         <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- // Basic multiple Column Form section end -->
</div>

        </div>
    </div>
    <script src="assets/js/feather-icons/feather.min.js"></script>
    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/app.js"></script>
    
    <script src="assets/js/main.js"></script>
    <script>
        $(document).ready(function () {

            $(document).on('click', '.remove-btn', function () {
                $(this).closest('.main-form').remove();
            });
            
            $(document).on('click', '.add-more-form', function () {
                $('.paste-new-forms').append('<div class="main-form mt-3 border-bottom">\
                               <div class="col-md-4 col-12">\
                                        <div class="form-group has-icon-left">\
                                            <label for="first-name-icon">Select supplier </label>\
                                            <div class="position-relative">\
                                                <fieldset class="form-group">\
                                                    <select class="form-select" name="select" id="basicSelect" value="<?php if(isset($_GET['select'])){echo $_GET['select'];} ?>"  id="basicSelect">\
                                                        <option>Supplier</option>\
                                                        <?php while($row1 = mysqli_fetch_array($result1)):;?>
                                                            <option value="<?php echo $row1['id'];?>">\
                                                         <?php echo 
                                                             $row1['suppName'];?></option>\
                                                        <?php endwhile;?>
                                                    </select>\
                                                </fieldset>\

                                            </div>\
                                        </div>\
                                    </div>\
                            </div>');
            });

        });
    </script>
</body>
</html>
