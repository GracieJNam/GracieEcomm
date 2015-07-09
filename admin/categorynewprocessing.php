<?php
 session_start();
 include "../includes/connect.php";
?>
<?php
 $category = mysqli_real_escape_string($con, $_POST['category']); //prevent SQL injection


 $sql="INSERT INTO category (category) VALUES ('$category')";
 $result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query

 $_SESSION['success'] = 'New category successfully added.'; //if new category is added successfully intialise a session called 'success' with a msg
 header("location:categories.php"); //redirect to categories.php

?>