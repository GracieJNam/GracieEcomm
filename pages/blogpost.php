<?php
     session_start();
     require_once("../includes/connect.php");
     //display HTML title tag for each blog entry
     $sql = "SELECT * FROM blog WHERE blogId =" . $_GET['blogId']; //select the post using the blogId
     $result = mysqli_query($con, $sql); //run the query
     $row = mysqli_fetch_array($result); // save the result in the $row variable
     $pageTitle = $row['blogTitle']; //save the contents of $row['title'] to the $pageTitle variable
     include '../includes/header.php'; //include the database connection
     include'../includes/nav.php';
     
     
?>

 </div><!-- col-md-12 end-->
</div><!-- row end-->

<div class="row"><!--second row start -->
    <div class="col-md-1"></div>
        <div class="content col-md-10"><!-- col-md-10 start-->

    <h1>The Blog Post</h1><br />
   <div class="col-md-9"><!--col-md-9 start-->

<?php
     $sql = "SELECT * FROM blog, admin, category WHERE blog.authorId = admin.adminId &&
    blog.categoryId  = category.categoryId && blog.blogId = " . $_GET['blogId']; //use $_GET to retrieve the blogID for the full entry
     $result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query
        
     while ($row = mysqli_fetch_array($result)){
        
     echo "<h3>" . $row['blogTitle'] . "</h3>";
     echo "<p class='posttime'><em>posted on " . date("F jS Y h:ia",strtotime($row['datePosted'])) . " by
    <strong>" . $row['adminFirstName'] . "</strong> in <strong>" . $row['category'] .
    "</strong></em></p><br /><br />"; //display the date, author and category
         echo "<img class='blogimg' src='../images/blog/" . $row['blogImage'] . "'><br />";
     echo "<p>" . str_replace('\n', '<br />', ($row['blogContent'])) . "</p><br /><br />"; //use the PHP str_replace function to replace \n in the database with a <br />
        
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