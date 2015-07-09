<?php
     session_start();
     include "../includes/connect.php";
?>


<?php

     $comment = mysqli_real_escape_string($con, $_POST['comment']); //prevent SQL injection
     $productId = $_POST['productId']; //retrieve the blogID from the hidden form field
     $authorId = $_SESSION['user']; //retrieve the userID from the $_SESSION created when the user logged in
     $rating = mysqli_real_escape_string($con, $_POST['rating']);

     $sql = "INSERT INTO comment (productId, authorId, datePosted, comment, rating) VALUES
    ('$productId', '$authorId', NOW(), '$comment','$rating')"; //sql query
     $result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query

     header("location:productdetail.php?productId=" . $productId); //redirect to the full blogpost page with the appropriate blogID
    
?>