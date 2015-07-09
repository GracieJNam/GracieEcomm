<?php
     $pageTitle = "Dashboard - Update Product";
     include '../includes/connect.php';
     include '../includes/dashboardheader.php'; //includes a session_start()
     include '../includes/dashboardnav.php';
     //include "../includes/logincheckadmin.php";
?>

<?php
     $productId = $_GET['productId']; //retrieve productId from URL

     $sql = "SELECT product.*, category.*, admin.adminFirstName, admin.adminLastName 
     FROM product
     JOIN admin USING (adminId) JOIN category USING (categoryId) WHERE productId=
    '$productId'";
     $result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query
     $row = mysqli_fetch_array($result);
?>
   
<section id="content">
   <div class="row">
     <div class="clear"></div>
        <div class="col-md-2"></div>
         <div class="col-md-8"> <!-- main content area -->
         
<div class="col-md-6">       
    <h1>Update Product</h1><br />

     <?php
         //user messages
         if(isset($_SESSION['error'])) //if session error is set
         {
             echo '<div class="error">';
             echo '<p>' . $_SESSION['error'] . '</p>'; //display error message
             echo '</div>';
             unset($_SESSION['error']); //unset session error
         }
         elseif(isset($_SESSION['success'])) //if session success is set
         {
             echo '<div class="success">';
             echo '<p>' . $_SESSION['success'] . '</p>'; //display success message
             echo '</div>';
             unset($_SESSION['success']); //unset session success
         }
    ?>
    
     <form id="productupdate" action="productupdateprocessing.php" method="post">
         <label>Title*</label> 
             <input type="text" class="productupinput" name="title" required value="<?php echo $row['productName'] ?>" /><br />

         <label>Content*</label>
             <textarea rows="10" cols="60%" name="content" required > <?php echo $row['productDescription'] ?>
             </textarea><br />

         <label>Author*</label>
         <!-- create a drop-down list populated by the admin details stored in the
        database -->
         <select name='adminId'>
             <option value="<?php echo $row['adminId'] ?>"><?php echo $row['adminFirstName']
            . " " . $row['adminLastName'] ?></option> <!-- display the selected author name -->

             <?php
                 $sql="SELECT * FROM admin";
                 $result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query
                 while ($row = mysqli_fetch_array($result))
                 {
                     echo "<option value=" . $row['adminId'] . ">" . $row['adminFirstName'] . " "
                    . $row['adminLastName'] . "</option>";
                 }
             ?>

         </select><br />

         <?php
             $sql = "SELECT category.* FROM product JOIN category USING (categoryId)
            WHERE productId = '$productId '"; //retrieve the selected value
             $result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query
             $row = mysqli_fetch_array($result);
         ?>

         <label class="productup">Category*</label>
         <!-- create a drop-down list populated by the categories stored in the
        database -->
         <select name='categoryId'>
             <option value="<?php echo $row['categoryId'] ?>"><?php echo
            $row['category'] ?></option> <!-- display the selected category name -->

             <?php
             $sql="SELECT * FROM category";
             $result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query
             while ($row = mysqli_fetch_array($result))
             {
                 echo "<option value=" . $row['categoryId'] . ">" . $row['category'] .
                "</option>";
             }
             ?>
         </select><br />
    <?php
             $sql = "SELECT product.* FROM product WHERE productId = '$productId'";
            //retrieve the selected value
             $result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query
             $row = mysqli_fetch_array($result);
         ?>
       
         <input type="hidden" name="productId" value="<?php echo $productId; ?>">
         <p><input class="button" type="submit" name="productupdate" value="Update Product" /></p>
     </form>

</div>
<div class="col-md-6"> 
     <h1>Update Product Image</h1><br />

     <?php
         if((is_null($row['productImage'])) || (empty($row['productImage']))){ //if the photo field is NULL or empty

             echo "<p><img class='productimg' src='../images/shop/default.png' width=300 height=auto
            alt='default photo' /></p>"; //display the default photo
         }
         else{
             echo "<p><img class='productimg' src='../images/shop/" . ($row['productImage']) . "'" . ' width=300 height=auto alt="product photo"' . "/></p>"; //display the product photo
         }
     ?>

     <form id="productupdatimage" action="productupdateimageprocessing.php" method="post" enctype="multipart/form-data">
         <input type="hidden" name="productId" value="<?php echo $productId; ?>">
         <label>New Image</label> 
             <input type="file" name="image" /><br />
         <p>Accepted files are JPG, GIF or PNG. Maximum size is 500kb.</p>
         <p><input class="button" type="submit" name="imageupdate" value="Update Image" /></p>
     </form>
</div>   
        </div> <!-- end col-md-8 -->
    <div class="col-md-2"></div>
    </div> <!-- second row end-->
</section> <!-- content end  -->

<?php

    include '../includes/dashboardfooter.php';
?>