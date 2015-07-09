<?php
 session_start(); //start a session
 include "../includes/connect.php"; //include the database connection
 
?>

	<?php
	 //prevent SQL injection
		 $userName = mysqli_real_escape_string($con, $_POST['userName']);
		 $password = mysqli_real_escape_string($con, $_POST['password']);
		 if ($userName == "" || $password == "") //check if all fields have data
     {
         $_SESSION['error'] = 'All fields are required.'; //if an error occursinitialise a session called 'error' with a msg
     
         header("location:login.php"); //redirect to registration.php
         exit();
     }

        elseif (strlen($password) < 8) //check if the password is a minimum of 8 characters long
     {
         $_SESSION['error'] = 'Password must be 8 characters or more.'; //if password is less than 8 characters initialise a session called 'error' with a msg
     
         header("location:login.php"); //redirect to registration.php
         exit();
     }

		 $password = hash('sha256', $password); //generate the hashed password
		 $sql = "SELECT * FROM user WHERE userName='$userName' AND password='$password'"; //SQL query
		 $result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query
		 
		 $row = mysqli_fetch_array($result); //create a variable called '$row' to store the results
		 $count=mysqli_num_rows($result); //count the number of rows returned by the query
		 
		 if($count==1) //if the number of matching records equals 1 
		 {
         $_SESSION['login'] =  $row['firstName']; //start a session called 'login' to have a value of 'FirstName'
         $_SESSION['userId'] = $row['userId'];
            header('location:index.php'); // redirect to session 2 if login is successful
		 }

		 else
		 {
            $_SESSION['error'] = "Incorrect Username or Password. Please try again."; //if an error occurs initialise a session called 'error' to have a value of the error msg
		 	header('location:login.php'); //redirect to index.php if login is unsuccessful*/
		 }
        mysqli_close($con); //close the database connection

	?>