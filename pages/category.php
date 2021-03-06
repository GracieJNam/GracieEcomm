<?php
     session_start();
     $pageTitle = "Category";
     include '../includes/header.php'; //includes connect.php 
     include '../includes/nav.php';
     include '../includes/functions.php'; //includes all the required PHP functions
?>

    </div><!--col-sm-12 end-->
</div><!--first row finish -->

<div class="row"><!--second row start -->
    <div class="col-sm-1 col-xs-1"></div>
        <div class="content col-sm-10 col-xs-10"><!-- col-sm-10 start-->
        
<?php
     include '../includes/logincheck.php';
?>

        <h1>Category</h1><br />
<div class="col-sm-9 col-xs-12">
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
      $sql = "SELECT * FROM category WHERE category.categoryId=" . $_GET['categoryId']; //retrieve the category
     $result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query
     $row = mysqli_fetch_array($result);
         echo "<h2>" . $row['category'] . "</h2><br/>"; //display the category
         $sql = "SELECT product.*, category.* FROM product inner join category on product.categoryId = category.categoryId WHERE category.categoryId='" . $_GET['categoryId'] . "'ORDER BY
        product.date DESC"; //retrieve records that match the category and count the number of comments

         $result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query

     while ($row = mysqli_fetch_array($result)) //display the results
     {
         echo "<div class='productarea col-xs-6 col-sm-3'><div class='thumbnail'><a href = 'productdetail.php?productId=" . $row['productId'] . "'><img class='productimage' src='../images/shop/" . ($row['productImage']) . "'/></a>"; 
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
  
 
 </div><!--col-sm-10 end-->
    

<?php
    include '../includes/footer.php';
?>


