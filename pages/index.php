<?php
 session_start();
 $pageTitle = "The Kirk Estrate Soap & Body";
 include '../includes/header.php';//includes connect.php 
 include '../includes/nav.php';
 include '../includes/functions.php'; //includes all the required PHP functions

?>
<div id="navimage">
       
   <div id="myCarousel" class="carousel slide" >
     <!-- indicators -->
     <ol class="carousel-indicators">
         <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
         <li data-target="#myCarousel" data-slide-to="1"></li>
         <li data-target="#myCarousel" data-slide-to="2"></li>

     </ol>
     <!-- wrapper for slides -->
     <div class="carousel-inner">
         <div class="item active">
         <img  src="../images/il_fullxful12.jpg" title="kirk_estrate_soap_and_body" alt="kirk_estrate_soap_and_body" />
         </div>
         <div class="item">
         <img src="../images/image1.jpg" alt="image">
         </div>
         <div class="item">
         <img src="../images/image2.png" alt="image">
         </div>
         <div class="item">
         <img src="../images/image3.png" alt="image">
         </div>
         <div class="item">
         <img src="../images/image4.png" alt="image">
         </div>
         <div class="item">
         <img src="../images/image5.jpg" alt="image">
         </div>
         <div class="item">
         <img src="../images/image6.jpg" alt="image">
         </div>
     </div>
<!-- controls -->
     <a class="left carousel-control" href="#myCarousel" data-slide="prev">
         <span class="icon-prev"></span>
     </a>
     <a class="right carousel-control" href="#myCarousel" data-slide="next">
         <span class="icon-next"></span>
     </a>
</div>        
</div><!-- nav img end-->
</div><!-- col-md-12 end-->
</div><!-- row end-->

<div class="row"><!--second row start -->
<div class="col-sm-1 col-xs-1"></div>
<div class="content col-sm-10 col-xs-10"><!-- col-sm-10 start-->
  
   <h1>New Products</h1><br />
   
   <div class="col-sm-9 col-xs-12"><!--col-sm-9 start-->
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
     $sql = "SELECT * FROM product ORDER BY date DESC LIMIT 0,8"; //sql query
     $result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query

     while ($row = mysqli_fetch_array($result)) //display the results
     {
         echo "<div class='productarea col-xs-6 col-sm-3'><div class='thumbnail'><a href = 'productdetail.php?productId=" . $row['productId'] . "'><img class='productimage' src='../images/shop/" . ($row['productImage']) . "'/></a>"; 
         //display the image stored inside the images subfolder in another subfolder named shop (in your database store the image name e.g., image.jpg in the image column of your product table)

         echo "<div class='caption'><a href = 'productdetail.php?productId=" . $row['productId'] . "'><h4>" . $row['productName'] . "</h4></a><br />";
       
         echo "<p><strong>Price: $" . $row['price'] . "</strong></p>";

         echo "<p><input class='addcart' type='button' value='Add to Cart' onclick='addtocart(" . $row['productId'] . ")' /></p></div></div></div>"; // 'Add to Cart' button
 
     }

 ?>
    </div><!--col-md-9 end-->
    
<?php

    include '../includes/sidebar.php';
?>

    </div><!--col-md-10 end-->
    
    <script type="text/javascript">
        alert(" This website is Jungeun's portfolio website. ");
    </script>
    

<?php
    include '../includes/footer.php';
?>



