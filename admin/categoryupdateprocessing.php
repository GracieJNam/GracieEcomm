<?php
     session_start();
     include "../includes/connect.php";
?>

<?php
     $categoryId = $_POST['categoryId']; //retrieve reviewID from hidden form field

     $category = mysqli_real_escape_string($con, $_POST['category']); //prevent SQL injection

     $sql="UPDATE category SET category='$category' WHERE categoryId ='$categoryId'";
     $result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query

     $_SESSION['success'] = 'Category updated successfully'; //if category update is successful intialise a session called 'success' with a msg
     header("location:categoryupdate.php?categoryId=" . $categoryId); //redirect to categoryupdate.php
?>