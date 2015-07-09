<?php
     session_start();
     include "../includes/connect.php";
?>

<?php
     $productId = $_POST['productId']; //retrieve reviewID from hidden form field

     $title = mysqli_real_escape_string($con, $_POST['title']); //prevent SQL injection
     $content = mysqli_real_escape_string($con, $_POST['content']);
     $adminId = mysqli_real_escape_string($con, $_POST['adminId']);
     $categoryId = mysqli_real_escape_string($con, $_POST['categoryId']);

     $sql="UPDATE product SET productName ='$title', productDescription='$content', date=NOW(), adminId='$adminId', categoryId='$categoryId' WHERE productId='" . $productId . "'";
//echo ("$sql");
     $result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query

     $_SESSION['success'] = 'Product updated successfully'; //if update is successful initialise a session called 'success' with a msg
     header("location:productupdate.php?productId=" . $productId); //redirect to reviewupdate.php
?>