<?php
     session_start();
     include "../includes/connect.php";
?>
<?php
     $productId = $_POST['productId'];
     $username = mysqli_real_escape_string($con, $_POST['userName']); //prevent SQL injection
     $password = mysqli_real_escape_string($con, $_POST['password']); //prevent SQL injection
    
     if ($username == "" || $password == "") //check if all fields have data
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

         
     $sql = "SELECT user.userName, user.password
     FROM user WHERE userName='$username' 
     UNION SELECT admin.adminUserName, admin.adminPassword 
     FROM admin WHERE adminUserName='$username'";
     $result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query

     $row = mysqli_fetch_array($result); //create a variable called '$row' to store the results
     //$salt = $row['salt']; //retrieve the the random salt from the database
     $password = hash('sha256', $password); //generate the hashed password with the salt value
    // $datapassword = hash('sha256', $password );

     $sql = "SELECT userId AS user, userName, password, accountId, firstName
     FROM user WHERE user.userName='$username' 
     AND user.password='$password' 
     UNION SELECT adminId AS user, adminUserName, adminPassword, accountId, adminFirstName
     FROM admin WHERE admin.adminUserName='$username' AND admin.adminPassword='$password'"; //sql query to access to unrelated tables
 
     $result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query

     $row = mysqli_fetch_array($result); //create a variable called '$row' to store the results
     $count=mysqli_num_rows($result); //count the number of rows returned by the query
    
     if(($count==1) && ($row['accountId']==1) && ($productId > 0)) //if the number of matching records equals 1, the user type equals 1 (member user), and $reviewID > 0
     {
         $_SESSION['member'] = $row['userName']; //initialise a session called 'member' to have a value of username
         $_SESSION['user'] = $row['user']; //initialise a session called 'user' to have a value of the memberID
         $_SESSION['login'] =  $row['firstName']; //start a session called 'login' to have a value of 'FirstName'
       
            
        header('location:index.php'); //redirect to a specific review page to leave a comment on successful login
     }

     elseif(($count==1) && ($row['accountId']==2)) //if the number of matching records equals 1 and the user type equals 0 (admin user)
     {
         $_SESSION['admin'] = $row['userName']; //initialise a session called 'admin' to have a value of username
         $_SESSION['user'] = $row['user']; //initialise a session called 'user' to have a value of the adminID
         $_SESSION['login'] =  $row['adminFirstName']; //start a session called 'login' to have a value of 'FirstName'
        
           
         
        header('location:../admin/index.php'); //redirect to the entry page of the dashboard on successful login
     }

     elseif(($count==1) && ($row['accountId']==1)) //if the number of matching records equals 1 and the user type equals 1 (member user)
     {
         $_SESSION['member'] = $row['userName']; //initialise a session called 'member' to have a value of username
         $_SESSION['user'] = $row['user']; //initialise a session called 'user' to have a value of the memberID
         $_SESSION['login'] =  $row['firstName']; //start a session called 'login' to have a value of 'FirstName'
        
           
        header('location:index.php'); //redirect to index.php on successful login
     }
     else
     {
         $_SESSION['error'] = "Incorrect Username or Password."; //if an error occurs create a session called 'error'
         header('location: login.php'); //redirect to login.php on unsuccessful login
     }
?>