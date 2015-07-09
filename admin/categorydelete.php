<?php
     session_start();
     include "../includes/connect.php";
?>
<?php
     $categoryId = $_GET['categoryId'];

     $sql = "DELETE category.* FROM category WHERE categoryId = '$categoryId'"; //delete the category from the category table
     $result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query

     //user messages
     $_SESSION['success'] = 'Category deleted successfully.'; //register a session with a success message
     header('location: categories.php') ;
?>