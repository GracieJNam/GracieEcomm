<?php
     session_start(); //start a session
     $pageTitle = "Category";
     include '../includes/header.php'; //include the database connection
     include'../includes/nav.php';
?>
 

    <?php
         include '../includes/logincheck.php';
?>
      <div class="blog col-md-9">   
         <div id="blogcontent">
            
          <?php

         $sql = "SELECT * FROM category WHERE category.categoryId=" . $_GET['categoryId']; //retrieve the category
         $result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query

         $row = mysqli_fetch_array($result);
         echo "<h2>" . $row['category'] . "</h2><br/>"; //display the category
         $sql = "SELECT blog.*, user.*, category.*, COUNT(comment.blogId) AS commentcount
        FROM blog INNER JOIN user ON blog.authorId = user.userId INNER JOIN category ON
        blog.categoryId = category.categoryId LEFT JOIN comment ON blog.blogId = comment.blogId WHERE
        category.categoryId='" . $_GET['categoryId'] . "'GROUP BY blog.blogId, comment.blogId ORDER BY
        blog.dateposted DESC"; //retrieve records that match the category and count the number of comments

         $result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query

          while ($row = mysqli_fetch_array($result)){
             
         echo "<p class='blogtitle'><a href='blogpost.php?blogId=" .$row['blogId'] . "'>" . $row['blogTitle'] .
        "</a></p><br />";
             
         echo "<p class='posttime'><em>posted on " . date("F jS Y h:ia",strtotime($row['datePosted'])) . " by
        <strong>" . $row['firstName'] . "</strong> in <strong>" . $row['category'] .
        "</strong></em></p><br />"; //display the date, author and category
             
         echo "<p>" . (substr(($row['blogContent']),0,300)) . "...&nbsp;&nbsp; " . "<a class='bloglink'
        href='blogpost.php?blogId=" . $row['blogId'] . "'>" . "read more" . "</a></p><br />"; //limit the display to 300 characters and add a 'read more' link

        echo "<p><a class='bloglink' href='blogpost.php?blogId=" . $row['blogId'] . "'>" . "Comments (" .
        $row['commentcount'] . ")</a></p><br /><br />"; //add the number of comments on the post
             
         }
     ?>

   </div>
</div><!-- col-md-9 end-->  

<?php

    include '../includes/blogsidebar.php';
    include'../includes/footer.php';

?>