<?php
 $pageTitle = "Categories";
 include '../includes/connect.php';
 include '../includes/dashboardheader.php'; //includes a session_start()
 include '../includes/dashboardnav.php';
 include "../includes/logincheckadmin.php";
?>

<section id="content">
    <div class="row">
     <div class="clear"></div>
        <div class="col-md-2"></div>
         <div class="col-md-8"> <!-- main content area -->
 <?php
     //user messages
     if(isset($_SESSION['error'])) //if session error is set
     {
     echo '<div class="error">';
     echo '<p>' . $_SESSION['error'] . '</p>'; //display error message
     echo '</div>';
     unset($_SESSION['error']); //unset session error
     }
     elseif(isset($_SESSION['success'])) //if session success is set
     {
     echo '<div class="success">';
     echo '<p>' . $_SESSION['success'] . '</p>'; //display success message
     echo '</div>';
     unset($_SESSION['success']); //unset session success
     }
 ?>
 <h1>Categories</h1><br />

 <p><a href="categorynew.php"><input id="newcategorybutton" type="button" value="Add New"></a></p><br />

 <?php
     //retrieve total number of categories
     $sql = "SELECT * FROM category";
     $result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query

     $numrow = mysqli_num_rows($result); //retrieve the number of rows
     echo "<p>There are currently <strong>" . $numrow . "</strong>
    Categories.</p><br />"; //echo the total number of contacts
    include "../includes/paginationcreate.php"; // include code to build pagination
     // retrieve data from database for display
     $sql = "SELECT category.*, COUNT(product.categoryId) AS categoryCount FROM
    category LEFT JOIN product ON category.categoryId = product.categoryId GROUP BY
    category.categoryId ORDER BY categoryId ASC LIMIT $offset, $rowsperpage"; //count thenumber of posts in each category
     $result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query

     echo "<table class='table table-striped'>"; // display records in a table format
     echo "<th>Category</th><th>Products</th><th></th>";
     while ($row = mysqli_fetch_array($result))
     {
         echo "<tr>";
         echo "<td>" . $row['category'] . "</td>";
         echo "<td>" . $row['categoryCount'] . "</td>";
         echo "<td><a
        href=\"categoryupdate.php?categoryId={$row['categoryId']}\">Update</a> | <a
        href=\"categorydelete.php?categoryId={$row['categoryId']}\" onclick=\"return
        confirm('Are you sure you want to delete this category?')\">Delete</a></td>";
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