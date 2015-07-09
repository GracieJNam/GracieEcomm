<?php

     //session_start();
     $pageTitle = "Dashboard-Home";
     include '../includes/connect.php';
     include '../includes/dashboardheader.php';
     //include '../includes/logincheckadmin.php';//includes a session_start()
     include '../includes/dashboardnav.php';
     include '../includes/logincheckadmin.php';//includes a session_start()
     
?>
<!-- content area -->   
<section id="content">
    <div class="row">
     <div class="clear"></div>
        <div class="col-md-2"></div>
         <div class="col-md-8"> <!-- main content area -->

         <h1>Dashboard</h1>

         <p>Welcome to your custom Content Management System.</p><br />

         <?php
             $sql = "SELECT (SELECT COUNT(*) FROM product) AS 'totalProducts', (SELECT
            COUNT(*) FROM category) AS 'totalCategories', (SELECT COUNT(*) FROM admin) AS
            totalAdministrators, (SELECT COUNT(*) FROM theme) AS totalThemes, (SELECT COUNT(*) FROM blog) AS
            totalBlogposts";
             $result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query

             while ($row = mysqli_fetch_array($result)){
                 echo "<table class='table table-striped'>";
                 echo "<th colspan='2'>At a glance</th>";
                 echo "<tr>";
                 echo "<td>" . $row['totalProducts'] . "</td><td> Total Products</td>";
                 echo "</tr>"; 
                 echo "<tr>";
                 echo "<td>" . $row['totalBlogposts'] . "</td><td> Total Blogposts</td>";
                 echo "</tr>"; 
                 echo "<tr>";
                 echo "<td>" . $row['totalCategories'] . "</td><td> Total Categories</td>";
                 echo "</tr>";
                 echo "<tr >";
                 echo "<td>" . $row['totalAdministrators'] . "</td><td> Total
                Administrators</td>";
                 echo "</tr>";
                 echo "<tr class='tableend'>";
                 echo "<td>" . $row['totalThemes'] . "</td><td> Total Themes</td>";
                 echo "</tr>";
                 echo "</table>";
             }
echo "<br />";
         ?>
         </div> <!-- end col-md-8 -->
        <div class="col-md-2"></div>
    </div> <!-- second row end-->
</section> <!-- content end  -->


<?php

    include '../includes/dashboardfooter.php';

?>