<?php
     $pageTitle = "Update Category";
     include '../includes/connect.php';
     include '../includes/dashboardheader.php'; //includes a session_start()
     include '../includes/dashboardnav.php';
     include "../includes/logincheckadmin.php";
?>
<?php
     $categoryId = $_GET['categoryId']; //retrieve categoryID from URL

     $sql = "SELECT * FROM category WHERE categoryId = '$categoryId'";
     $result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query
     $row = mysqli_fetch_array($result);
?>

<section id="content">
    <div class="row">
     <div class="clear"></div>
        <div class="col-md-2"></div>
         <div class="col-md-8"> <!-- main content area -->
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
 <h1>Update Category</h1><br />

 <form id="categoryupdate" action="categoryupdateprocessing.php" method="post">
     <label>Category*</label> 
        <input type="text" name="category" required value="<?php echo $row['category'] ?>" /><br />
     <label>Description*</label>
     <textarea name="description" required > <?php echo $row['categoryDescription']
    ?></textarea><br />
     <input type="hidden" name="categoryId" value="<?php echo $categoryId; ?>">
     <p>
         <input class="button" type="submit" name="categoryupdate" value="Update Category" /></p>
 </form>
        </div> <!-- end col-md-8 -->
        <div class="col-md-2"></div>
    </div> <!-- second row end-->
</section> <!-- content end  -->

<?php
 include '../includes/dashboardfooter.php';
?>