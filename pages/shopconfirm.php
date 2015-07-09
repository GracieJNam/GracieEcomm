<?php
     session_start();
     $pageTitle = "Confirm Order";
     include '../includes/header.php'; //includes connect.php
     include '../includes/functions.php'; //includes all the required PHP functions
     include'../includes/nav.php';
?>

 
   </div><!-- col-md-12 end-->
</div><!-- row end-->

<div class="row"><!--second row start -->
<div class="col-md-1"></div>
<div class="content col-md-10"><!-- col-md-10 start-->

<?php
      if(!isset($_SESSION['login'])){

        echo "<h1>Your Shopping Cart</h1><br /><p class='purchase'>* Please <a href='../pages/login.php'><strong>log in</strong></a> to purchase items!</p><br />";
        exit();
    }
?> 
     
    <h2>Order Total</h2><br />
    <p>Please confirm your order details</p>
    
    <?php
         $sql = "SELECT firstName, lastName FROM user WHERE userId =" . $_SESSION['user'];
        //retrieve the details for the logged in user
         $result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query
         $row = mysqli_fetch_array($result); //save the result in the $row variable
         echo "<p> Order for: <strong>" . $row['firstName'] . " " . $row['lastName'] .
        "</strong></p><br />"; // display the user name
        ?>

        <table class='table table-striped' id="shoptable" style="border-spacing:1px; font-family:Verdana, Geneva, sans-serif; background-color:#e1e1e1;
        width:100%">
        <!-- the code could be improved by removing all the inline styling and placing it in
        your external CSS file -->
         
         <?php

         if((isset($_SESSION['cart']))  &&  (isset($_SESSION['login']))){
         echo '<tr style="font-weight:bold; background-color:#fff;">
                     <td style="padding:10px; width:120px;">Image</td>
                     <td style="padding:10px">Product Name</td>
                     <td style="padding:10px">Price</td>
                     <td style="padding:10px">Qty</td>
                     <td style="padding:10px">Subtotal</td>
             </tr>';
         $max=count($_SESSION['cart']);
         for($i=0;$i<$max;$i++){ //for each product in the cart get the following
         $pid=$_SESSION['cart'][$i]['productId']; //productID
         $q=$_SESSION['cart'][$i]['quantity']; //quantity
         $pname=get_product_name($pid); //product name
         if($q==0) continue;
     ?>
     <tr style="background-color:#fff">
         <td style="padding:10px"><?php echo "<img src='../images/shop/"
        .(get_product_image($pid)) . "'" . " width=100 height=100 alt='product'" . " />"?></td>
         <td style="padding:10px"><?php echo $pname ?></td>
         <td style="padding:10px">$ <?php echo(number_format((get_price($pid)), 2, '.',
        ''))?></td>
         <td style="padding:10px"><?php echo $q ?></td>
         <td style="padding:10px">$ <?php echo(number_format((get_price($pid)*$q), 2,
        '.', ''))?></td>

         <?php
         }
         ?>

     <tr>
         <td style="padding:10px" colspan="2"><strong>Order Total: $ <?php
        echo(number_format((get_order_total()), 2, '.', ''))?></strong></td>
         <td colspan="5" style="text-align:right; padding:10px;">

         <form action="shopsuccess.php" method="post">
             <input type="hidden" name="command" />
             <input class="cartbutton" type="button" value="Return to Cart"
            onclick="window.location='shoppingcart.php'">
             <input class="cartbutton" type="submit" name="confirmorder" value="Confirm Order" />
         </form>
         </td>
     </tr>
     
     <?php
     }

      else{
            echo "<tr style='background-color:#fff'><td>There are no items in your
            shopping cart!</td><br />";
         }
     ?>
    </table><br />
    
    <p id="shippingcoment">*Free Shipping Australia-Wide</p>
    
</div><!--col-md-10 end-->

<?php
 include '../includes/footer.php';
?>