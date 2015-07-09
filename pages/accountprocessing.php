<?php
     session_start();
     include "../includes/connect.php";
?>
<?php
 $userId = $_POST['userId'];

 $firstName = mysqli_real_escape_string($con, $_POST['firstName']); //prevent SQ injection
 $lastName = mysqli_real_escape_string($con, $_POST['lastName']);
 $email = mysqli_real_escape_string($con, $_POST['email']);
 $newsletter = mysqli_real_escape_string($con, $_POST['newsletter']);

 if ($firstName == "" || $lastName == "" || $email == "" || $newsletter == "") //check if all required fields hav data
 {
     $_SESSION['error'] = 'All * fields are required.'; //if an error occurs initialise a session called 'error' with a msg
     header("location:account.php"); //redirect to registration.php
     exit();
 }
 elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) //check if email is valid
 {
     $_SESSION['error'] = 'Please enter a valid email address.'; //if an error occurs initialise a session called 'error' with a msg
     header("location:account.php"); //redirect to registration.php
     exit();
 }
 else
 {
     $sql="UPDATE user SET firstName='$firstName', lastName='$lastName', email='$email', newsletter='$newsletter' WHERE userId='$userId'";
     $result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query
     $_SESSION['success'] = 'Account updated successfully'; //if registration is successful initialise a session called 'success' with a msg
     header("location:account.php"); //redirect to login.php
 }
?>