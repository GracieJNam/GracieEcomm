<?php
    session_start();
    include '../includes/connect.php';
?>

<?php
     $adminId =$_SESSION['user'];
     $password = mysqli_real_escape_string($con, $_POST['password']); //prevent SQL injection

     if (strlen($password) < 8) //check if the password is a minimum of 8 characters long
     {
         $_SESSION['error'] = 'Password must be 8 characters or more.'; //if password is less than 8 characters initialise a session called 'regoerror1' to have a value of the error msg
         header("location:adminaccount.php"); //redirect to registration.php
         exit();
     }
     else{

     $salt = md5(uniqid(rand(), true)); //create a random salt value
     $password = hash('sha256', $password.$salt); //generate the hashed password with the salt value

     $sql = "UPDATE admin SET adminPassword='$password' WHERE
    adminId='$adminId'";

     $result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query

     }

     if($result){
         $_SESSION['success'] = 'Password updated successfully'; //register a session with a success message
         header("location:adminaccount.php"); //redirect to account.php
     }
     else{
         $_SESSION['error'] = 'An error has occurred. Password not updated.'; //register a session with an error message
         header("location:adminaccount.php"); //redirect to account.php
     }
?>