<?php
     session_start();
     $pageTitle = "Category";
     include '../includes/header.php'; //includes connect.php 
     include '../includes/nav.php';
     include '../includes/functions.php'; //includes all the required PHP functions
?>

    </div><!--col-md-12 end-->
</div><!--first row finish -->

<div class="row"><!--second row start -->
    <div class="col-md-1"></div>
        <div class="content col-md-10"><!-- col-md-10 start-->
        
<?php
     include '../includes/logincheck.php';
?>
       
        <h1>Archives</h1><br />
<div class="col-md-9">
<?php

//if the $_REQUEST 'command' is 'add' than call the PHP addtocart function
//$_REQUEST is similar to $_GET and $_POST, but it contains the contents of both

     if(isset($_REQUEST['command']) && $_REQUEST['command']=='add' && $_REQUEST['productId']>0){
         $pid=$_REQUEST['productId'];
         addtocart($pid,1);
         header("location:shoppingcart.php");
         exit();
     }
?>

<!-- JavaScript that creates the 'add' command if the 'Add to Cart' button is clicked  -->

    <script>

         function addtocart(pid){
             document.form1.productId.value=pid;
             document.form1.command.value='add';
             document.form1.submit();
     }

    </script>
    
 <!-- form with hidden fields to send productID and the $_REQUEST 'command' to the next page -->

     <form name="form1">
         <input type="hidden" name="productId" />
         <input type="hidden" name="command" />
     </form>
     
<?php

             $sql = "SELECT monthname(date), date FROM product WHERE
            month(date)=" . $_GET['month']; //retrieve the month
             $result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query

             $row = mysqli_fetch_array($result);
             echo "<h2>" . $row['monthname(date)'] . "</h2><br />"; //display the month

             $sql = "SELECT product.*, category.*
            FROM product INNER JOIN  category ON
            product.categoryId = category.categoryId WHERE
            month(product.date) ='" . $_GET['month'] . "' ORDER BY product.date DESC"; //retrieve records that match the month and count the number of comments

            $result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query

              while ($row = mysqli_fetch_array($result)) //display the results
     {
         echo "<div class='productarea col-sm-6 col-md-3'><div class='thumbnail'><a href = 'productdetail.php?productId=" . $row['productId'] . "'><img class='productimage' src='../images/shop/" . ($row['productImage']) . "'/></a>"; 
         //display the image stored inside the images subfolder in another subfolder named shop (in your database store the image name e.g., image.jpg in the image column of your product table)

         echo "<div class='caption'><a href = 'productdetail.php?productId=" . $row['productId'] . "'><h4>" . $row['productName'] . "</h4></a><br />";
        
         echo "<p><strong>Price: $" . $row['price'] . "</strong></p>";

         echo "<p><input class='addcart' type='button' value='Add to Cart' onclick='addtocart(" .
        $row['productId'] . ")' /></p></div></div></div>"; // 'Add to Cart' button
 }

        ?>   
   
  
 


</div>

<?php

    include '../includes/sidebar.php';
?> 
  
 
 </div><!--col-md-10 end-->
    

<?php
    include '../includes/footer.php';
?>


