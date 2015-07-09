<?php

    include "../includes/connect.php";

?>
<div class="sidebarbody col-md-3"><!-- sidebar content area -->
<div class="side panel panel-default">
     <div class="panel-body">
        <?php include '../includes/searchform.php';?>
      </div><!-- panel-body end-->
</div><!-- end search panel -->



 <div class="side panel panel-default">
    <div class="panel-heading">
        <h3>Shop Categories</h3>
     </div> <!-- end panel-heading -->
        <div class="panel-body">
    <br />

        <?php
             //display the categories

             $sql = "SELECT category.*, COUNT(product.categoryId) AS catnum FROM category INNER JOIN
             product ON category.categoryId = product.categoryId GROUP BY product.categoryId ORDER BY category ASC"; 
                //count the number of posts in each category

             $result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query

             while ($row = mysqli_fetch_array($result)){

                 echo "<p><a class='bloglink' href = 'category.php?categoryId=" . $row['categoryId'] . "'>" .
                $row['category'] . " (" . $row['catnum'] . ")</a></p>";

             }

        ?>
     </div><!-- panel-body end-->
 </div><!-- end first panel -->
 <div class="side panel panel-default">
      <div class="panel-heading">
         <h3>Archives</h3>
     </div><!-- end panel-heading -->
        <div class="panel-body">
    <br />
        <?php
             //display the archive

            $sql = "SELECT month(date), monthname(date), year(date), COUNT(*)
            AS monthnum FROM product GROUP BY monthname(date) ORDER BY month(date)desc";
            //select month and year from datetime field plus group by month

            $result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query

             while ($row = mysqli_fetch_array($result)) {

                 echo "<p><a class='bloglink' href = 'archives.php?month=" . $row['month(date)'] . "'>"
                . $row['monthname(date)'] . " " . $row['year(date)'] . " (" .
                $row['monthnum'] . ")</a></p>";

             }
        ?>

    </div><!-- panel body end-->
</div><!-- second panel end-->
 
 <div class="side panel panel-default">
      <div class="panel-heading">

         <h3>Best Sellers!</h3>
     </div><!-- end panel-heading -->
        <div class="panel-body">
    <br />
    
        <?php
             //display the archive

            $sql = "SELECT price, productName, productImage, sum(quantity),  productinvoice.productId, ROUND(AVG(rating)) as rating 
            FROM productinvoice, product INNER JOIN comment on product.productId=comment.productId
            WHERE productinvoice.productId=product.productId
            GROUP BY productinvoice.productId order by sum(quantity) DESC limit 0,4";
            //select month and year from datetime field plus group by month

            $result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query

             while($row = mysqli_fetch_array($result)) 
             {

                 echo "<div class='bestseller'><a href = 'productdetail.php?productId=" . $row['productId'] . "'><img class='popularimg' src='../images/shop/" . $row['productImage'] . "'/></a><p><a href = 'productdetail.php?productId=" . $row['productId'] . "'><strong>"
                . $row['productName'] . "</strong></a><br />Price: $ " . $row['price'] . "<br />"; 
                 
                /* star rating */
                 $rating= $row['rating']; //retrieve rating from database

                 for($i=0;$i<$rating;$i++){
                     echo "<img class='rating' src='../images/star.png' alt='filled star' width=10px height=auto />"; //echo filled stars
                 }
                 for($i=0;$i<5-$rating;$i++){
                    echo "<img class='rating' src='../images/unfilledstar.png' width=10px height=auto alt='unfilled star' />"; //echo unfilled stars
                 }
                 echo "</p></div>";

             }
        ?>
    </div><!-- panel body end-->
</div><!--third panel end-->
</div><!-- col-md-3 end-->