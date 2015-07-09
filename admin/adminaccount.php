<?php

     //session_start();
     $pageTitle = "administrator account";
     include '../includes/connect.php';
     include '../includes/dashboardheader.php'; 
     include '../includes/logincheckadmin.php';//includes a session_start()
     include '../includes/dashboardnav.php';
?>


<?php
     $adminId = $_SESSION['user'];//retrieve the adminID from the current session

     $sql = "SELECT * FROM admin WHERE adminId = '$adminId'";
     $result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query
     $row = mysqli_fetch_array($result);
?>

<section id="content">
   <div class="row">
     <div class="clear"></div>
      <div class="col-md-2"></div>
      <div class="col-md-8"> <!-- main content area -->
      <div class="col-md-6"> <!-- main content area -->
    <?php
         //user messages
         if(isset($_SESSION['error'])){ //if session error is set
             echo '<div class="error">';
             echo '<p>' . $_SESSION['error'] . '</p>'; //display error message
             echo '</div>';
             unset($_SESSION['error']); //unset session error
         }
         elseif(isset($_SESSION['success'])){ //if session success is set
         
             echo '<div class="success">';
             echo '<p>' . $_SESSION['success'] . '</p>'; //display success message
             echo '</div>';
             unset($_SESSION['success']); //unset session success
         }
    ?>
    
    <h1>My Account</h1><br />
     <p>Update your account details.</p><br />

     <form id="adminaccount" action="adminaccountprocessing.php" method="post">
         <label>Username*</label> <input type="text" name="username" required
        value="<?php echo $row['adminUserName'] ?>" readonly />
         <!--<label>&nbsp;</label>--><p>Username cannot be updated.</p><br />
         <label>First Name*</label> <input type="text" name="firstName" required
        value="<?php echo $row['adminFirstName'] ?>" /><br />
         <label>Last Name*</label> <input type="text" name="lastName" required
        value="<?php echo $row['adminLastName'] ?>" /><br />

         <label>Mobile</label> <input type="text" name="mobile" value="<?php echo
        $row['adminMobile'] ?>" /><br />
         <label>Email*</label> <input type="email" name="email" required
        value="<?php echo $row['adminEmail'] ?>" /><br />
        
     
        
         <input type="hidden" name="adminId" value="<?php echo $adminId; ?>">
         <p><input class="button" type="submit" name="accountupdate" value="Update Account" /></p>
     </form>

     <h1>Update Image</h1><br />
     
     <?php
     if((is_null($row['adminImage'])) || (empty($row['adminImage']))) //if the photo field is NULL or empty
     {
         echo "<p class='memberimg'><img src='../images/default.jpg' alt='default photo' /><br /></p>"; //display the default photo
     }
     else{
         echo "<p class='memberimg'><img src='../images/admin/" . ($row['adminImage']) . "'" . ' width=150px height=150px alt="contact photo"' . "/><br/></p>"; //display the contact photo
     }
     ?>

     <form id="updateimage" action="adminaccountimageprocessing.php" method="post"
    enctype="multipart/form-data">
         <input type="hidden" name="adminId" value="<?php echo $adminId; ?>">
         <label>New Image</label> <input type="file" name="image" /><br />
         <p>Accepted files are JPG, GIF or PNG. Maximum size is 500kb.</p><br />
         <p><input class="button" type="submit" name="imageupdate" value="Update Image" /></p>
     </form>
</div><!-- end col-md-6 -->

<div class="col-md-6">
     <h1>Update Password</h1><br />
     
     <p>Passwords must have a minimum of <strong>8</strong> characters.</p><br />
     <form id="adminupdatepassword" action="adminaccountpasswordprocessing.php" method="post">
         <label>New Password*</label> <input type="password" name="password"
        pattern=".{8,}" title= "Password must be 8 characters or more" required /><br />
         <input type="hidden" name="adminId" value="<?php echo $adminId; ?>">
         <p><input class="button" type="submit" name="passwordupdate" value="Update Password"
        /></p>
     </form>

     <h1>Delete My Account</h1><br />
     <p>We're sorry to hear you'd like to delete your account. By clicking the
    button below you will permanently delete your account.</p><br />
     <form id="accountdelete" action="accountdelete.php" method="post">
         <p><input class="button" type="submit" value="Delete My Account" onclick="return
        confirm('Are you sure you wish to permanently delete your account?');" ></p> 
        <input type="hidden" name="adminId" value="<?php echo $memberId; ?>">
     </form>
        </div><!-- end col-md-6 -->
        </div> <!-- end col-md-8 -->
    <div class="col-md-2"></div>
     </div> <!-- end row -->
</section> <!-- end #content -->

<?php

    include '../includes/dashboardfooter.php';

?>