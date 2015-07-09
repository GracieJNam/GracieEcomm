<?php
     session_start();
     include "../includes/connect.php";
?>

<?php
     $blogId = $_POST['blogId']; //retrieve reviewID from hidden form field

     $title = mysqli_real_escape_string($con, $_POST['title']); //prevent SQL injection
     $content = mysqli_real_escape_string($con, $_POST['content']);
     $adminId = mysqli_real_escape_string($con, $_POST['adminId']);
     $categoryId = mysqli_real_escape_string($con, $_POST['categoryId']);

     $sql="UPDATE blog SET blogTitle ='$title', blogContent='$content', datePosted=NOW(), authorId='$adminId', categoryId='$categoryId' WHERE blogId='" . $blogId . "'";
echo ("$sql");
     $result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query

     $_SESSION['success'] = 'Blogpost updated successfully'; //if update is successful initialise a session called 'success' with a msg
     header("location:blogupdate.php?blogId=" . $blogId); //redirect to reviewupdate.php
?>