<?php
     session_start();
     include "../includes/connect.php";
?>

<?php
     $userId = $_POST['userId'];

     $sql = "DELETE user.* FROM user WHERE userId = '$userId'"; //delete the member details from both the login table and the member table
     $result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query

     //user messages
     $_SESSION['success'] = 'Account deleted successfully.'; //register a session with a success message
     unset($_SESSION['login']); //unset the member session that was registered during the login process when the account is deleted
     unset($_SESSION['member']); //unset the user session that was registered during the login process when the account is deleted
     header('location: index.php') ;
?>