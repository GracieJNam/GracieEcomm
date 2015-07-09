<?php
     function get_product_name($pid){ //function to retrieve the product name
     global $con; //when using a custom function we need to give the database connection global scope (not just local)
     $sql = "SELECT productName FROM product WHERE productId=$pid";
     $result = mysqli_query($con, $sql); //run the query
     $row = mysqli_fetch_array($result);
         
        return $row['productName']; //the PHP return statement ends the current function and returns the argument
     }

     function get_product_image($pid){ //function to retrieve the product name
     global $con; //when using a custom function we need to give the database connection global scope (not just local)
     $sql = "SELECT productImage FROM product WHERE productId=$pid";
     $result = mysqli_query($con, $sql); //run the query
     $row = mysqli_fetch_array($result);
     
         return $row['productImage']; //the PHP return statement ends the current function and returns the argument
     }

     function get_price($pid){ //function to retrieve the product price
     global $con;
     $sql = "SELECT price FROM product WHERE productId=$pid";
     $result = mysqli_query($con, $sql); //run the query
     $row = mysqli_fetch_array($result);
         return $row['price'];
     }

     function remove_product($pid){ //function to remove a product from the shopping cart
     $pid=intval($pid); //returns the integer value of a variable
     $max=count($_SESSION['cart']);
         
         for($i=0;$i<$max;$i++){
             if($pid==$_SESSION['cart'][$i]['productId']){ //for each product return the productId
                 unset($_SESSION['cart'][$i]);
                 break;
             }
         }
         
     $_SESSION['cart']=array_values($_SESSION['cart']);
         
     }

     function get_order_total(){ //function to calculate the order total
         $max=count($_SESSION['cart']);
         $sum=0; //start with a total of zero
             for($i=0;$i<$max;$i++){
             $pid=$_SESSION['cart'][$i]['productId']; //for each product return the productID
             $q=$_SESSION['cart'][$i]['quantity']; //for each product return the quantity
             $price=get_price($pid); //for each product return the price
             $sum+=$price*$q; //calculate the total price
             }
         return $sum;
     }

     function addtocart($pid,$q){ //function to add a product to the shopping cart
         if($pid<1 or $q<1) return ;
         if(is_array($_SESSION['cart'])){
             if(product_exists($pid)) return;
             $max=count($_SESSION['cart']);
             $_SESSION['cart'][$max]['productId']=$pid;
             $_SESSION['cart'][$max]['quantity']=$q;
             }
         
             else{
             $_SESSION['cart']=array();
             $_SESSION['cart'][0]['productId']=$pid;
             $_SESSION['cart'][0]['quantity']=$q;
         }
     }

     function product_exists($pid){ //function to determine if a product exists in the cart already
         $pid=intval($pid);
         $max=count($_SESSION['cart']);
         $flag=0;
         for($i=0;$i<$max;$i++){
             if($pid==$_SESSION['cart'][$i]['productId']){
                 $flag=1;
                 break;
             }
         }
         return $flag;
     }
?>