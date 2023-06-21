<?php 
   session_start();
   include('header.php');
   include 'Invoice.php';
   $invoice = new Invoice();
   $invoice->checkLoggedIn();
   if(!empty($_POST['companyName']) && $_POST['companyName']) {	
   	$invoice->saveInvoice($_POST);
   	header("Location:invoice_list.php");	
   }
   ?>
<title>Create Invoice</title>
<script src="js/invoice.js"></script>
<link href="css/style.css" rel="stylesheet">
<?php include('container.php');?>
<div class="container content-invoice">
   <div class="cards">
     <div class="card-bodys">
       <form action="" id="invoice-form" method="post" class="invoice-form" role="form" novalidate="">
      <div class="load-animate animated fadeInUp">
         <div class="row">
            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
               <h2 class="title">Invoice</h2>
               <?php include('menu.php');?> 
            </div>
         </div>
         <input id="currency" type="hidden" value="RM">
         <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
               <h3>From,</h3>
               <?php echo $_SESSION['username']; ?><br> 
               <!-- <?php echo $_SESSION['address']; ?><br>  
               <?php echo $_SESSION['mobile']; ?><br>
               <?php echo $_SESSION['email']; ?><br>   -->
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
            </div>
         </div>
        
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
               <table class="table table-condensed table-striped" id="invoiceItem">
                  <tr>
                     <th width="2%">
                      <div class="custom-control custom-checkbox mb-3">
                        <input type="checkbox" class="custom-control-input" id="checkAll" name="checkAll">
                        <label class="custom-control-label" for="checkAll"></label>
                        </div>
                    </th>
                     <th width="25%">Item Name</th>
                     <th width="15%">Quantity</th>
                     <th width="15%">Price</th>
                     <th width="15%">Total</th>
                  </tr>
                  <tr>
                     <td><div class="custom-control custom-checkbox">
                        <input type="checkbox" class="row1 custom-control-input" id="row1">
                        <label class="custom-control-label" for="row1"></label>
                        </div></td>
                     <td><input type="text" name="ItemName[]" id="ItemName" class="form-control" autocomplete="off"></td>
                     <td><input type="number" name="Quantity[]" id="Quantity" class="form-control quantity" autocomplete="off"></td>
                     <td><input type="number" name="ItemPrice[]" id="ItemPrice" class="form-control price" autocomplete="off"></td>
                     <td><input type="number" name="invoiceTotal[]" id="invoiceTotal" class="form-control total" autocomplete="off"></td>
                  </tr>
               </table>
            </div>
         </div>
         <div class="row">
            <div class="col-xs-12">
               <button class="btn btn-danger delete" id="removeRows" type="button">Delete</button>
               <button class="btn btn-success" id="addRows" type="button">Add More</button>
            </div>
         </div>
         <div class="row">
          <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
            <div class="form-group mt-3 mb-3 ">
              <label>Subtotal: &nbsp;</label>
                 <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text currency">RM</span>
            </div>
            <input value="" type="number" class="form-control" name="subTotal" id="subTotal" placeholder="Subtotal">
          </div>
              </div>
          </div>
          <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
            <div class="form-group mt-3 mb-3 ">
              <label>Tax Rate: &nbsp;</label>
                 <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text currency">%</span>
            </div>
           <input value="" type="number" class="form-control" name="taxRate" id="taxRate" placeholder="Tax Rate">
          </div>
              </div>
          </div>
          <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
            <div class="form-group mt-3 mb-3 ">
              <label>Tax Amount: &nbsp;</label>
                 <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text currency">RM</span>
            </div>
            <input value="" type="number" class="form-control" name="taxAmount" id="taxAmount" placeholder="Tax Amount">
          </div>
              </div>
          </div>
          <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
            <div class="form-group mt-3 mb-3 ">
              <label>Total: &nbsp;</label>
                 <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text currency">RM</span>
            </div>
             <input value="" type="number" class="form-control" name="totalAftertax" id="totalAftertax" placeholder="Total">
          </div>
              </div>
          </div>
          <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
              </div>
          </div>
            <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
               <h3>Notes: </h3>
               <div class="form-group">
                  <textarea class="form-control txt" rows="5" name="notes" id="notes" placeholder="Your Notes"></textarea>
               </div>
               <br>
               <div class="form-group">
                  <input type="hidden" value="<?php echo $_SESSION['userid']; ?>" class="form-control" name="userId">
                  <input data-loading-text="Saving Invoice..." type="submit" name="invoice_btn" value="Save Invoice" class="btn btn-success submit_btn invoice-save-btm">           
               </div>
            </div>
         </div>
         <div class="clearfix"></div>
      </div>
   </form>
     </div>
   </div>
</div>
</div>	