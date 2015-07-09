<?php
     
     $pageTitle = "Category";
     include '../includes/header.php';
     include'../includes/nav.php';
?>

<?php
     include '../includes/logincheck.php';
     $sql = "SELECT * FROM category WHERE category.categoryId=" . $_GET['categoryId']; //retrieve
    the category
     $result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query

     $row = mysqli_fetch_array($result);
     echo "<h2>" . $row['category'] . "</h2>"; //display the category
     $sql = "SELECT blog.*, user.*, category.*, COUNT(comment.blogID) AS commentcount
    FROM blog INNER JOIN user ON blog.authorId = user.userId INNER JOIN category ON
    blog.categoryId = category.categoryId LEFT JOIN comment ON blog.blogId = comment.blogId WHERE
    category.categoryId='" . $_GET['categoryId'] . "'GROUP BY blog.blogId, comment.blogId ORDER BY
    blog.dateposted DESC"; //retrieve records that match the category and count the number of comments

     $result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query

     while ($row = mysqli_fetch_array($result)){
         
         echo "<h3><a class='blogresult href='blogpost.php?blogId=" .$row['blogId'] . "'>" . $row['blogTitle']
        . "</a></h3>";
         echo "<p class='posttime><em>posted on " . date("F jS Y",strtotime($row['datePosted'])) . " by
        <strong>" . $row['firstName'] . "</strong> in <strong>" . $row['category'] .
        "</strong></em></p>"; //display the date, author and category
         echo "<p>" . (substr(($row['content']),0,300)) . "... &nbsp;&nbsp;" . "<a class='bloglink'
        href='blogpost.php?blogId=" . $row['blogId'] . "'>" . "read more" . "</a>"; //add a
        'read more' link
         echo "<p><a class='bloglink' href='blogpost.php?blogId=" . $row['blogId'] . "'>" . "Comments ("
        . $row['commentcount'] . ")</a>"; //add the number of comments on the post
     }
?>


<?php

    include '../includes/blogsidebar.php';

?>