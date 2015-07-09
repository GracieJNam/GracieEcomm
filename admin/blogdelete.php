<?php
     session_start();
     include "../includes/connect.php";
?>

<?php
 $blogId = $_GET['blogId'];

 $sql = "DELETE blog.* FROM blog WHERE blogId = '$blogId'"; //delete the member details from both the login table and the member table
 $result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query

 //user messages
 $_SESSION['success'] = 'Blogpost deleted successfully.'; //register a session with success message
 header('location: blog.php') ;
?>