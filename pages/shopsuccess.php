<?php
     session_start();
     $pageTitle = "Successful Purchase";
     include '../includes/header.php'; //contains connect.php 
     include '../includes/functions.php';
     include '../includes/nav.php';
?>

  </div><!-- col-sm-12 end-->
</div><!-- row end-->

<div class="row"><!--second row start -->
<div class="col-sm-1 col-xs-1"></div>
<div class="content content col-sm-10 col-xs-10"><!-- col-md-10 start-->

<?php
     if(isset($_REQUEST['command']) && $_REQUEST['command']==''){ //if the $_REQUEST variable has a value of 'nothing' do the following

     $userId=$_SESSION['user']; //get the userID stored in the userID session
     $sql = "INSERT INTO invoice (userId, invoiceDate) VALUES('$userId', NOW())";
    //insert data into the invoice table
     $result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query
     $invoiceId=mysqli_insert_id($con); //retrieve the last generated automatic ID

     $max=count($_SESSION['cart']);
     for($i=0;$i<$max;$i++){
     $pid=$_SESSION['cart'][$i]['productId']; // for each product retrieve the productID
     $q=$_SESSION['cart'][$i]['quantity']; //for each product retrieve the quantity

     $sql = "INSERT into productinvoice (invoiceId, productId, quantity) VALUES('$invoiceId', '$pid', '$q')"; //insert data into the product_invoice table
     $result = mysqli_query($con, $sql) or die(mysqli_error($con));//run the query
     }

     }
     $sql= "SELECT * FROM invoice WHERE invoiceId =" . $invoiceId; //query to select theinvoiceID
     $result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query
     $row = mysqli_fetch_array($result); // store the result in the variable $row and in the code below display the invoiceID that is stored in the $row variable

?>
    
     <h2>Your Order Invoice #<?php echo $row['invoiceId'] ?> Has Been Processed!</h2>
     <br />
<?php
     $sql= "SELECT product.productName, product.productImage, productinvoice.invoiceId, productinvoice.quantity, product.price
     FROM product, productinvoice WHERE product.productId = productinvoice.productId AND invoiceId =" . $invoiceId; //query to select theinvoiceID
     $result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query
     //$row = mysqli_fetch_array($result); // store the result in the variable $row and in the code below display the invoiceID that is stored in the $row variable
    
        echo "<table class='table table-striped'id='shoptable' style='border-spacing:1px; font-family:Verdana, Geneva, sans-serif; background-color:#e1e1e1;
        width:100%'>"; // display records in a table format
        echo "<th style='padding:10px; width:120px;'>Image</th><th style='padding:10px'>Product</th><th style='padding:10px'> Quantity</th><th style='padding:10px'>Price</th><th style='padding:10px'>Subtotal</th>";

    while ($row = mysqli_fetch_array($result)){
        echo "<tr style='background-color:#fff;'>";
        echo "<td style='padding:10px'><img src='../images/shop/" . $row['productImage'] . "'></td>";
        echo "<td style='padding:10px'>" . $row['productName'] . "</td>";
        echo "<td style='padding:10px'>" . $row['quantity'] . "</td>";
        echo "<td style='padding:10px'>" . $row['price'] . "</td>";
        echo " <td style='padding:10px'>$ ";
        echo(number_format((get_price($pid)*$q), 2, '.', '')) . "</td>";
    }
?>
     <tr>
        <td style="padding:10px" colspan="4"><strong>Order Total: $ <?php
        echo(number_format((get_order_total()), 2, '.', ''))?></strong></td>
    </tr>
    
<?php
    
    echo "</table>";
    unset($_SESSION['cart']); //unset the 'cart' session when the order is completed
?>
     <p>Your order has been successfully processed. You will receive your product within
    <strong>10 working days</strong>.</p>
     <p><em>Thank you for shopping with us online!</em></p><br />
     
   <!-- JavaScript to add a print window button -->
     <script>
         function printOrder()
         {
         window.print();
         }
     </script>
    <p><input class="printbutton" type="button" value="Print Order" onClick="printOrder()">
  

     
</div><!--col-sm-10 end--> 
 
<?php
    include '../includes/footer.php';
?>