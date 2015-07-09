<?php
     
 session_start();
 $pageTitle = "My Account";
 include '../includes/header.php';//includes connect.php 
 include '../includes/nav.php';
 include '../includes/logincheckmember.php';
?>

<?php
     $userId = $_SESSION['user'];
     $sql = "SELECT * FROM user WHERE userId = '$userId'";
     $result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query
     $row = mysqli_fetch_array($result);
?>

</div><!-- col-md-12 end-->
</div><!-- row end-->

<div class="row"><!--second row start -->
<div class="col-md-1"></div>
<div class="col-md-10">


<div class="content col-md-6"><!-- col-md-6 start-->
  
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

    <h1>My Account</h1>
     <p>Update your account details.</p>

     <form id="myaccount" action="accountprocessing.php" method="post">
         <label>Username*</label> <input type="text" name="username" required
        value="<?php echo $row['userName'] ?>" readonly /><br />
         <label>First Name*</label> <input type="text" name="firstName" required
        value="<?php echo $row['firstName'] ?>" /><br />
         <label>Last Name*</label> <input type="text" name="lastName" required
        value="<?php echo $row['lastName'] ?>" /><br />
         <label>Email*</label> <input type="email" name="email" required
        value="<?php echo $row['email'] ?>" /><br />
         
     <p>Subscribe to weekly email newsletter?</p><br />
         <label>Yes</label><input class="checkbox" type="radio" name="newsletter" value="1" <?php
        if($row['newsletter'] == "1"){echo "checked";} ?>><br />
         <label>No</label><input class="checkbox" type="radio" name="newsletter" value="0" <?php
        if($row['newsletter'] == "0"){echo "checked";} ?>><br />
         <input type="hidden" name="userId" value="<?php echo $userId; ?>">
         <p><input class="submit" type="submit" name="accountupdate" value="Update Account" /></p>
     </form>

    </div><!--col-md-6 end-->
    <div class="content col-md-6"><!-- col-md-6 start-->
 <h1>Update Password</h1>
     
     <p>Passwords must have a minimum of <strong>8</strong> characters.</p><br />
     <form id="updatepassword" action="accountpasswordprocessing.php" method="post">
         <label>New Password*</label> 
             <input type="password" name="password"
        pattern=".{8,}" title= "Password must be 8 characters or more" required /><br />
         <input type="hidden" name="userId" value="<?php echo $userId; ?>">
         <p><input class="submit" type="submit" name="passwordupdate" value="Update Password"
        /></p>
     </form>
     
 <h1>Delete My Account</h1>
     <p>We're sorry to hear you'd like to delete your account. By clicking the
    button below you will permanently delete your account.</p><br />
     <form id="accountdelete" action="accountdelete.php" method="post">
         <p><input class="submit" type="submit" value="Delete My Account" onclick="return
        confirm('Are you sure you wish to permanently delete your account?');" ></p> 
        <input type="hidden" name="userId" value="<?php echo $userId; ?>">
     </form>
</div><!--col-md-6 end-->
</div><!--col-md-10 end-->
    

<?php
    include '../includes/footer.php';
?>