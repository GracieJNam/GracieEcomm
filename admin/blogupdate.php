<?php
     $pageTitle = "Dashboard - Update  blog";
     include '../includes/connect.php';
     include '../includes/dashboardheader.php'; //includes a session_start()
     include '../includes/dashboardnav.php';
     include "../includes/logincheckadmin.php";
?>

<?php
     $blogId = $_GET['blogId']; //retrieve blogId from URL

     $sql = "SELECT blog. *, category.*, admin.adminFirstName, admin.adminLastName 
     FROM blog
     JOIN admin ON admin.adminId= blog.authorId JOIN category USING (categoryId) WHERE blogId='$blogId'";
     $result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query
     $row = mysqli_fetch_array($result);
?>
   
<section id="content">
   <div class="row">
     <div class="clear"></div>
        <div class="col-md-2"></div>
         <div class="col-md-8"> <!-- main content area -->
 <div class="col-md-6"> 
    <h1>Update Blog</h1><br />

     <?php
         //user messages
         if(isset($_SESSION['error'])) //if session error is set
         {
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

     <form id="blogupdate" action="blogupdateprocessing.php" method="post">
         <label>Title*</label> 
             <input type="text" class="blogupinput" name="title" required value="<?php echo $row['blogTitle'] ?>" /><br />

         <label>Content*</label>
             <textarea rows="10" cols="60%" name="content" required > <?php echo $row['blogContent'] ?>
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
             $sql = "SELECT category.* FROM blog JOIN category USING (categoryId)
            WHERE blogId = '$blogId '"; //retrieve the selected value
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
             $sql = "SELECT blog.* FROM blog WHERE blogId = '$blogId'";
            //retrieve the selected value
             $result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query
             $row = mysqli_fetch_array($result);
     ?>
       
         <input type="hidden" name="blogId" value="<?php echo $blogId; ?>">
         <p><input class="button" type="submit" name="blogupdate" value="Update Blogpost" /></p>
     </form>

</div>
 <div class="col-md-6"> 
     <h1>Update Image</h1><br />

     <?php
         if((is_null($row['blogImage'])) || (empty($row['blogImage']))){ //if the photo field is NULL or empty

             echo "<p class='blogimg'><img src='../images/blog/default.png' alt='default photo' /></p>"; //display the default photo
         }
         else{
             echo "<p class='blogimg'><img src='../images/blog/" . ($row['blogImage']) . "'" . 'alt="blog photo"' . "/></p>"; //display the review photo
         }
     ?>

     <form id="blogupdatimage" action="blogupdateimageprocessing.php" method="post" enctype="multipart/form-data">
         <input type="hidden" name="blogId" value="<?php echo $blogId; ?>">
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