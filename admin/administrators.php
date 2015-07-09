<?php
     $pageTitle = "Administrators";
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
    
 <h1>Administrators</h1><br />
 <p><a href="administratornew.php"><input id="newadminbutton" type="button" value="Add New"></a></p><br />
    
 <?php
     //retrieve total number of members
     $sql = "SELECT * FROM admin";
     $result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query

     $numrow = mysqli_num_rows($result); //retrieve the number of rows
     echo "<p>There are currently <strong>" . $numrow . "</strong>
    Administrators.</p><br />"; //echo the total number of contacts

    include "../includes/paginationcreate.php"; // include code to build pagination
     // retrieve data from database for display

     $sql = "SELECT admin.*, COUNT(product.adminId) AS productCount FROM admin
    LEFT JOIN product USING(adminId) GROUP BY admin.adminId ORDER BY adminUserName  ASC LIMIT $offset, $rowsperpage";

     $result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query

     echo "<table class='table table-striped'>"; // display records in a table format
     echo
    "<th>Username</th><th>Name</th><th>Email</th><th>Mobile</th><th>Datetime</th><th>Products</th>";
     while ($row = mysqli_fetch_array($result))
     {
     echo "<tr>";
     echo "<td>" . $row['adminUserName'] . "</td>";
     echo "<td>" . $row['adminFirstName'] . " " . $row['adminLastName'] . "</td>";
     echo "<td><a href='mailto:" . $row['adminEmail'] . "'>" . $row['adminEmail']
    . "</a></td>";
     echo "<td>" . $row['adminMobile'] . "</td>";
     echo "<td>" . date("d/m/y H:i",strtotime($row['adminJoinDate'])) . "</td>";
     echo "<td>" . $row['productCount'] . "</td>";
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