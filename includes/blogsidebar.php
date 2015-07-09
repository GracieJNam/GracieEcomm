<?php

    include "../includes/connect.php";

?>
<div class="col-md-3"><!-- sidebar content area -->
 <div class="side panel panel-default">
    <div class="panel-heading">
        <h3>Categories</h3>
     </div> <!-- end panel-heading -->
        <div class="panel-body">
    <br />

        <?php
             //display the categories

             $sql = "SELECT category.*, COUNT(blog.categoryId) AS catnum FROM category INNER JOIN
             blog ON category.categoryId = blog.categoryId GROUP BY blog.categoryId ORDER BY category ASC"; 
                //count the number of posts in each category

             $result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query

             while ($row = mysqli_fetch_array($result)){

                 echo "<p><a class='bloglink' href = 'blogcategories.php?categoryId=" . $row['categoryId'] . "'>" .
                $row['category'] . " (" . $row['catnum'] . ")</a></p>";

             }

        ?>
     </div><!-- panel-body end-->
 </div><!-- end first panel -->
<div class="side panel panel-default">
      <div class="panel-heading">

         <h3>Active</h3>
     </div><!-- end panel-heading -->
        <div class="panel-body">
    <br />
        <?php
             //display the archive

            $sql = "SELECT month(datePosted), monthname(datePosted), year(datePosted), COUNT(*)
            AS monthnum FROM blog GROUP BY monthname(datePosted) ORDER BY month(datePosted)";
            //select month and year from datetime field plus group by month

            $result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query

             while ($row = mysqli_fetch_array($result)) {

                 echo "<p><a class='bloglink' href = 'blogarchives.php?month=" . $row['month(datePosted)'] . "'>"
                . $row['monthname(datePosted)'] . " " . $row['year(datePosted)'] . " (" .
                $row['monthnum'] . ")</a></p>";

             }
        ?>

    </div><!-- panel body end-->
</div><!-- second panel end-->
</div><!-- col-md-3 end-->