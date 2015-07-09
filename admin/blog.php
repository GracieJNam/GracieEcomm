<?php
    // session_start();
     $pageTitle = "Blog";
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

    <h1>Blogs</h1><br />

     <p><a href="blognew.php"><input id="newblogbutton" type="button" value="Add New"></a></p><br />

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
         $sql = "SELECT * FROM blog";
         $result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query
         $numrow = mysqli_num_rows($result); //retrieve the number of rows
             echo "<br /><p>There are currently <strong>" . $numrow . "</strong>
            blog posts.</p><br />"; //echo the total number of contacts
            include "../includes/paginationcreate.php"; // include code to build pagination
             // retrieve data from database for display

        $sql = "SELECT admin.adminId, admin.adminFirstName, category.*, blog. *
            FROM blog
            INNER JOIN admin ON blog.authorId = admin.adminId 
            INNER JOIN category ON blog.categoryId = category.categoryId 
            ORDER BY datePosted DESC LIMIT 
            $offset, $rowsperpage";
//var_dump();
//exit();
            $result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query


             echo "<table class='table table-striped'>"; // display records in a table format
             echo
            "<th>Title</th><th>Author</th><th>Category</th><th>Datetime</th><th colspan='3'></th>";
             while ($row = mysqli_fetch_array($result)){
                 echo "<tr>";
                 echo "<td>" . $row['blogTitle'] . "</td>";
                 echo "<td>" . $row['adminFirstName'] . "</td>";
                 echo "<td>" . $row['category'] . "</td>";
                 echo "<td>" . date("d/m/y H:i",strtotime($row['datePosted'])) . "</td>";
                 echo "<td><a href=\"blogupdate.php?blogId={$row['blogId']}\">Update</a> | <a href=\"blogdelete.php?blogId={$row['blogId']}\" onclick=\"return confirm('Are you sure you want to delete this blog post?')\">Delete</a></td>";
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