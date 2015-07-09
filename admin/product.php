<?php
    // session_start();
     $pageTitle = "Product";
     include '../includes/connect.php';
     include '../includes/dashboardheader.php'; //includes a session_start()
     include '../includes/dashboardnav.php';
     include '../includes/logincheckadmin.php';

?>


<section id="content">
    <div class="row">
     <div class="clear"></div>
        <div class="col-md-2"></div>
         <div class="col-md-8"> <!-- main content area -->

    <h1>Products</h1><br />

     <p><a href="newproduct.php"><input id="newproductbutton" type="button" value="Add New"></a></p><br />

     <?php
     //user messages
     if(isset($_SESSION['error'])){ //if session error is set
         echo '<div class="error">';
         echo '<p>' . $_SESSION['error'] . '</p>'; //display error message
         echo '</div>';
         unset($_SESSION['error']); //unset session error
     }
     elseif(isset($_SESSION['success'])){ //if session success is set

         echo '<div class="success">';
         echo '<p>' . $_SESSION['success'] . '</p>'; //display success message
         echo '</div>';
         unset($_SESSION['success']); //unset session success
     }
     ?>

     <?php
 
         //retrieve total number of reviews
         $sql = "SELECT * FROM product";
         $result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query
         $numrow = mysqli_num_rows($result); //retrieve the number of rows
             echo "<br /><p>There are currently <strong>" . $numrow . "</strong>
            products.</p><br />"; //echo the total number of contacts
            include "../includes/paginationcreate.php"; // include code to build pagination
             // retrieve data from database for display

        $sql = "SELECT admin.adminId, admin.adminFirstName, product.*, category.*, COUNT(comment.productId) AS commentCount 
            FROM product
            INNER JOIN admin ON product.adminId = admin.adminId 
            INNER JOIN category ON product.categoryId = category.categoryId 
            LEFT JOIN comment ON product.productId = comment.productId
            GROUP BY product.productId, comment.productId ORDER BY date DESC LIMIT 
            $offset, $rowsperpage";
//var_dump();
//exit();
            $result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query


             echo "<table class='table table-striped'>"; // display records in a table format
             echo
            "<th>Image</th><th>Title</th><th>Author</th><th>Category</th><th>Price</th><th>Datetime</th><th colspan='2'>Comments</th>";
             while ($row = mysqli_fetch_array($result)){
                 echo "<tr>";
                 echo "<td><img class='adminproductimg' src='../images/shop/" . $row['productImage'] . "'/></td>";
                 echo "<td>" . $row['productName'] . "</td>";
                 echo "<td>" . $row['adminFirstName'] . "</td>";
                 echo "<td>" . $row['category'] . "</td>";
                 echo "<td> &#36; " . $row['price'] . "</td>";
                 echo "<td>" . date("d/m/y H:i",strtotime($row['date'])) . "</td>";
                 echo "<td>" . $row['commentCount'] . "</td>";
                 echo "<td><a href=\"productupdate.php?productId={$row['productId']}\">Update</a> | <a href=\"productdelete.php?productId={$row['productId']}\" onclick=\"return confirm('Are you sure you want to delete this product?')\">Delete</a></td>";
                 echo "</tr>";
            }
          echo "</table>";

        include "../includes/paginationdisplay.php"; //include code to display pagination
    ?>
         </div> <!-- end col-md-8 -->
        <div class="col-md-2"></div>
    </div> <!-- second row end-->
</section> <!-- content end  -->

<?php

    include '../includes/dashboardfooter.php';

?>