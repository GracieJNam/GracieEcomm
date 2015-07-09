<?php
 session_start();
 $pageTitle = "Blog";
 include '../includes/header.php';//include the database connection
 include'../includes/nav.php';
?>
 
</div><!-- col-md-12 end-->
</div><!-- row end-->

<div class="row"><!--second row start -->
    <div class="col-md-1"></div>
        <div class="content col-md-10"><!-- col-md-10 start-->

    <h1>The Blog</h1><br />
<div class="col-md-9"><!--col-md-9 start-->
    
    <?php
         $sql = "SELECT blog.*, user.*, category.*
        FROM blog INNER JOIN user ON blog.authorId = user.userId INNER JOIN category ON
        blog.categoryId = category.categoryId GROUP BY
        blog.blogId  ORDER BY dateposted DESC LIMIT 0,3"; //display the last 3 blog entries and count the number of comments for each blog entry

         $result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query

         while ($row = mysqli_fetch_array($result)){
             
         echo "<p class='blogtitle'><a href='blogpost.php?blogId=" .$row['blogId'] . "'>" . $row['blogTitle'] .
        "</a></p><br />";
             
         echo "<p class='posttime'><em>posted on " . date("F jS Y h:ia",strtotime($row['datePosted'])) . " by
        <strong>" . $row['firstName'] . "</strong> in <strong>" . $row['category'] .
        "</strong></em></p><br />"; //display the date, author and category
             
         echo "<p>" . (substr(($row['blogContent']),0,300)) . "...&nbsp;&nbsp; " . "<a class='bloglink'
        href='blogpost.php?blogId=" . $row['blogId'] . "'>" . "read more" . "</a></p><br /><br /><br /><br />"; //limit the display to 300 characters and add a 'read more' link
             
         }
    ?>
 </div> <!--col-md-9 end-->

<?php

    include '../includes/sidebar.php';
?>

</div><!--col-md-10 end-->  
   
<?php
    include'../includes/footer.php';
?>