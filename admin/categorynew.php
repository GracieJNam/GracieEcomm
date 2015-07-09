<?php
 $pageTitle = "New Category";
 include '../includes/connect.php';
 include '../includes/dashboardheader.php'; //includes a session_start()
 include '../includes/dashboardnav.php';
 include "../includes/logincheckadmin.php";
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
 <h1>Add New Category</h1><br />

 <form id="newcategory" action="categorynewprocessing.php" method="post">
     <label>Category*</label> 
     <input type="text" name="category" required /><br />
     
     <label>Description*</label>
     <textarea name="description" required ></textarea><br />
     <p><input class="button" type="submit" name="categorynew" value="Add New Category" /></p>
 </form>
        </div> <!-- end col-md-8 -->
      <div class="col-md-2"></div>
    </div> <!-- second row end-->
</section> <!-- content end  -->

<?php
    include '../includes/dashboardfooter.php';
?>