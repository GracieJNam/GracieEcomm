<?php
    // session_start();
     $pageTitle = "Dashboard - Add New Review";
     include '../includes/connect.php';
     include '../includes/dashboardheader.php'; 
     include '../includes/dashboardnav.php';
     //include "../includes/logincheckadmin.php"; //include session_start();
?>
<section id="content">
<div class="row">
   <div class="clear"></div>
        <div class="col-md-2"></div>
         <div class="col-md-8"> <!-- main content area -->

 <h1>Add New Product</h1><br />

 <?php
     //user messages
     if(isset($_SESSION['error'])){ //if session error is set
         echo '<div class="error">';
         echo '<p>' . $_SESSION['error'] . '</p>'; //display error message
         echo '</div><br />';
         unset($_SESSION['error']); //unset session error
     }
     elseif(isset($_SESSION['success'])) //if session success is set
     {
         echo '<div class="success">';
         echo '<p>' . $_SESSION['success'] . '</p>'; //display success message
         echo '</div><br />';
         unset($_SESSION['success']); //unset session success
     }
 ?>

 <form id="newproduct" action="newproductprocessing.php" method="post"
    enctype="multipart/form-data">
     <label>Title*</label> <input type="text" name="title" required /><br />

     <label>Content*</label>
     <textarea rows="10" cols="60%" name="content" ></textarea><br />


     <label>Category*</label>

     <!-- create a drop-down list populated by the categories stored in the
    database -->
     <select name='categoryId'>
         <option value="">Please select</option>

         <?php
         $sql="SELECT * FROM category";
         $result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query
         while ($row = mysqli_fetch_array($result)){

             echo "<option value=" . $row['categoryId'] . ">" . $row['category'] .
            "</option>";
         }
 ?>
 
    </select><br />
         
  <label>Price*</label> <input type="text" name="price" required /><br />
   
  <label>Author*</label>
     <!-- create a drop-down list populated by the admin details stored in the
    database -->
 <select name='adminId'>
     <option value="">Please select</option>

 <?php
     $sql="SELECT * FROM admin";
     $result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query
     
     while ($row = mysqli_fetch_array($result)){
         
         echo "<option value=" . $row['adminId'] . ">" . $row['adminFirstName'] . " "
        . $row['adminLastName'] . "</option>";
     }
 ?>

  </select><br />


     <label>Image</label> <input type="file" name="image" /><br />
     <p>Accepted files are JPG, GIF or PNG. Maximum size is 500kb.</p>
     <input type="hidden" name="productId" value="<?php echo $productId; ?>">
     <p><input class="button" type="submit" name="newproduct" value="Add New Product" /></p>
 </form>
         
         </div> <!-- end col-md-8 -->
        <div class="col-md-2"></div>
    </div> <!-- second row end-->
</section> <!-- content end  -->

<?php

    include '../includes/dashboardfooter.php';
?>