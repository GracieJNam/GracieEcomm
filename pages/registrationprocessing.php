<?php
     session_start();
     include "../includes/connect.php";
?>
<?php
     $firstName = mysqli_real_escape_string($con, $_POST['firstName']); //prevent SQL injection
     $lastName =mysqli_real_escape_string($con, $_POST['lastName']);
     $userName = mysqli_real_escape_string($con, $_POST['userName']);
     $password = mysqli_real_escape_string($con, $_POST['password']);
     $email = mysqli_real_escape_string($con, $_POST['email']);
     $newsletter = mysqli_real_escape_string($con, $_POST['newsletter']);

    if ($firstName == "" || $lastName == "" || $userName == "" || $password == "" || $email == "" || $newsletter =="") //check if all fields have data
     {
         $_SESSION['error'] = 'All fields are required.'; //if an error occursinitialise a session called 'error' with a msg
     
         header("location:registration.php"); //redirect to registration.php
         exit();
     }

    
 elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {// invalid emailaddress
         
        $_SESSION['error'] = 'Invalid email format.';
        header("location:registration.php"); //redirect to registration.php
        exit();
    }
     
     $sql = "SELECT * FROM user WHERE email='$email'"; //check if the email is taken
     $result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query
     $numrow = mysqli_num_rows($result); //count how many rows are returned

 if($numrow > 0) //if count greater than 0
     {
         $_SESSION['error'] = 'The Email is already taken. Please retry.'; //if an username is taken initialise a session called 'error' with a msg
     
         header("location:registration.php"); //redirect to registration.php
         exit();
     }


if (strlen($password) < 8) //check if the password is a minimum of 8 characters long
     {
         $_SESSION['error'] = 'Password must be 8 characters or more.'; //if password is less than 8 characters initialise a session called 'error' with a msg
     
         header("location:registration.php"); //redirect to registration.php
         exit();
     }

     $password = hash('sha256', $password); //encrypt the password

     $sql = "SELECT * FROM user WHERE userName='$userName'"; //check if the username is taken
     $result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query
     $numrow = mysqli_num_rows($result); //count how many rows are returned

 if($numrow > 0) //if count greater than 0
     {
         $_SESSION['error'] = 'Username is already taken. Please retry.'; //if an username is taken initialise a session called 'error' with a msg
     
         header("location:registration.php"); //redirect to registration.php
         exit();
     }

     
 else
     {
         $sql="INSERT INTO user (firstName, lastName, userName, password, email,newsletter,accountId)
        VALUES('$firstName', '$lastName', '$userName', '$password', '$email', ' $newsletter','1')";
         $result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query
var_dump("$sql");
         $_SESSION['success'] = 'You created a new account. Please login'; //if registration is successful initialise a session called 'success' with a msg
         header("location:login.php"); //redirect to index.php
     }


        mysqli_close($con); // close the database connection
?>