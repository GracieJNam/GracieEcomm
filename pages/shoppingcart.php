<?php
     session_start();
     $pageTitle = "Shopping Cart";
     include '../includes/header.php'; //includes connect.php 
     include '../includes/nav.php';
     include '../includes/functions.php'; //includes all the required PHP functions
?>


   </div><!-- col-md-12 end-->
</div><!-- row end-->

<div class="row"><!--second row start -->
<div class="col-md-1"></div>
<div class="content col-md-10"><!-- col-md-10 start-->
 
<?php
     //if the $_REQUEST 'command' is 'delete' then call the PHP remove_product function
     if(isset($_REQUEST['command']) && $_REQUEST['command']=='delete' && $_REQUEST['pid']>0){
     remove_product($_REQUEST['pid']);
     }
    
     //if the $_REQUEST 'command' is 'clear' then unset the 'cart' session
     else if(isset($_REQUEST['command']) && $_REQUEST['command']=='clear'){
        unset($_SESSION['cart']);
     }

     //if the $_REQUEST 'command' is 'update' then update the cart by the specified quantity
     else if(isset($_REQUEST['command']) && $_REQUEST['command']=='update'){ 
         $max=count($_SESSION['cart']);
             for($i=0;$i<$max;$i++){
             $pid=$_SESSION['cart'][$i]['productId'];
             $q=intval($_REQUEST['product'.$pid]);
                 if($q>0 && $q<=999){
                 $_SESSION['cart'][$i]['quantity']=$q;
                 }
            }
     }
    
?>

<!-- JavaScript that creates the 'delete', 'clear', and 'update' commands when the
corresponding button is clicked -->
<script>
     function del(pid){
         if(confirm('Do you really mean to delete this item?')){
             document.cart.pid.value=pid;
             document.cart.command.value='delete';
             document.cart.submit();
         }
     }
     function clear_cart(){
         if(confirm('This will empty your shopping cart, continue?')){
         document.cart.command.value='clear';
         document.cart.submit();
         }
     }
    
     function update_cart(){
         document.cart.command.value='update';
         document.cart.submit();
     }
 </script>
 
 
 <!-- the code could be improved by removing all the inline styling and placing
it in your external CSS file -->
 <form name="cart" method="post">
 <input type="hidden" name="pid" />
 <input type="hidden" name="command" />
     <div class="cart">
        <!-- <div style="margin:0px auto; width:600px;" >-->
         <div style="padding-bottom:10px">

                 <h2>Your Shopping Cart</h2><br /><br />
                 

             <table class='table table-striped' style="border-spacing:1px; font-family:Verdana, Geneva, sansserif; background-color:#e1e1e1; width:100%">

                 <?php
                     if(isset($_SESSION['cart'])){
                     echo '<tr style="font-weight:bold; background-color:#fff;">
                             <td style="padding:10px; width:120px;">Image</td>
                             <td style="padding:10px">Product Name</td><td style="padding:10px">Price</td>
                             <td style="padding:10px">Qty</td><td style="padding:10px">Subtotal</td>
                             <td style="padding:10px">Options</td>
                           </tr>';
                     $max=count($_SESSION['cart']);
                     for($i=0;$i<$max;$i++){ //for each product in the cart get the following
                     $pid=$_SESSION['cart'][$i]['productId'];
                     $q=$_SESSION['cart'][$i]['quantity'];
                     $pname=get_product_name($pid);
                     if($q==0) continue;
                 ?>

                 <tr style="background-color:#fff">
                     <td style="padding:10px"><?php echo "<img src='../images/shop/"
        .(get_product_image($pid)) . "'" . " width=100 height=100 alt='product'" . " />"?></td>
                     <td style="padding:10px"><?php echo $pname?></td>
                     <td style="padding:10px">$ <?php
                    echo(number_format((get_price($pid)), 2, '.', ''))?></td>
                     <td style="padding:10px"><input type="text"
                    name="product<?=$pid?>" value="<?=$q?>" maxlength="3" size="2" /></td>
                     <td style="padding:10px">$ <?php
                    echo(number_format((get_price($pid)*$q), 2, '.', ''))?></td>
                     <td class="removelink" style="padding:10px"><a href="javascript:del(<?=$pid?>)">Remove</a></td>
                </tr>
         <?php
         }
         ?>
                 <tr>
                     <td style="padding:10px" colspan="2"><strong>Order Total: $ <?php
                    echo(number_format((get_order_total()), 2, '.', ''))?></strong>
                    </td>
                     <td style="padding:10px" colspan="5" align="right">
                         <input class="cartbutton" type="button" value="Clear Cart" onclick="clear_cart()">
                         <input class="cartbutton" type="button" value="Update Cart"
                        onclick="update_cart()">
                         <input class="cartbutton" type="button" value="Checkout"
                        onclick="window.location='shopconfirm.php'">
                    </td>
                 </tr>
         <?php
         }

             else{

                 echo "<tr bgColor='#FFFFFF'><td>There are no items in your
                shopping cart!</td>";
             }

             ?>
             </table><br />
            
             <p><input class="shopping" type="button" value="Continue Shopping" onclick="window.location='shop.php'" /></p><br /><br />
        
             </div>
         </div> <!-- end cart -->
     </form>

   </div><!--col-md-10 end-->
       
<?php
 include '../includes/footer.php';
?>