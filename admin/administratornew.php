<?php
     $pageTitle = "Add New Administrator";
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
    
 <h1>Add New Administrator</h1><br />

 <form id="addadmin" action="administratornewprocessing.php" method="post">
     <label>Username*</label> 
        <input type="text" name="username" value="" required /><br />
     <label>Password*</label> 
        <input type="password" name="password" value=""required
    pattern=".{8,}" title= "Password must be 8 characters or more" /><br />
     <label>First Name*</label> 
        <input type="text" name="firstName" value="" required /><br />
     <label>Last Name*</label> 
        <input type="text" name="lastName" value="" required /><br />
    
     <label>Mobile*</label> 
        <input type="text" name="mobile" value="" required /><br />
     
     <label>Email*</label> 
        <input type="email" name="email" value="" required /><br />
     
     <p>
         <input class="button" type="submit" name="newadministrator" value="Add New Administrator" />
     </p>
 </form>
        </div> <!-- end col-md-8 -->
        <div class="col-md-2"></div>
    </div> <!-- second row end-->
</section> <!-- content end  -->
<?php

    include '../includes/dashboardfooter.php';

?>