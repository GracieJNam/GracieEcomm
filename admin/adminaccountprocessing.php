<?php
     session_start();
     include "../includes/connect.php";
?>
<?php
 $adminId = $_POST['adminId']; //retrieve the adminID from the hidden form field
 $firstName = mysqli_real_escape_string($con, $_POST['firstName']); //prevent SQ injection
 $lastName = mysqli_real_escape_string($con, $_POST['lastName']);
 $mobile = mysqli_real_escape_string($con, $_POST['mobile']);
 $email = mysqli_real_escape_string($con, $_POST['email']);


 if ($firstName == "" || $lastName == "" ||  $mobile == "" || $email == "") //check if all required fields hav data
 {
     $_SESSION['error'] = 'All * fields are required.'; //if an error occurs initialise a session called 'error' with a msg
     header("location:adminaccount.php"); //redirect to registration.php
     exit();
 }
 elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) //check if email is valid
 {
     $_SESSION['error'] = 'Please enter a valid email address.'; //if an error occurs initialise a session called 'error' with a msg
     header("location:adminaccount.php"); //redirect to registration.php
     exit();
 }
 else
 {
     $sql="UPDATE admin SET adminFirstName='$firstName', adminLastName='$lastName',
   adminMobile='$mobile', adminEmail='$email' WHERE adminId='$adminId'";
     $result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query
     $_SESSION['success'] = 'Account updated successfully'; //if registration is successful initialise a session called 'success' with a msg
     header("location:adminaccount.php"); //redirect to login.php
 }
?>