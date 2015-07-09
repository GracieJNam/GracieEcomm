<?php
     $pageTitle = "Themes";
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
             echo '</div><br />';
             unset($_SESSION['error']); //unset session error
         }
         elseif(isset($_SESSION['success'])) //if session success is set
         {
             echo '<div class="success">';
             echo '<p>' . $_SESSION['success'] . '</p>'; //display success message
             echo '</div><br />';
             unset($_SESSION['success']); //unset session success
            }
    ?>
 <h1>Themes</h1>

     <p>Select a theme for your website.</p><br />

     <?php

         $sql = "SELECT * FROM theme"; //select the data from the theme table
         $result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query

         while ($row = mysqli_fetch_array($result))
         {
         echo "<div class='theme col-sm-6 col-md-6'><div class='thumbnail'><img class='themeimg' src='../images/" . ($row['themeImage']) . "'" . ' width=300
        height=300 alt="theme"' . "/><br />"; //display the theme photo
         echo "<h2 class='theme'>" . $row['themeName'] . "</h2><br />"; //display the theme name
         echo "<p>" . $row['themeDescription'] . "</p><br />"; //display the theme description
         echo "<form action='themeprocessing.php' method='post'>";
         echo "<input type='hidden' name='themeId' value=" . $row['themeId'] . ">";
        //a hidden form field holds the themeID
         echo "<p><input id='themebutton' type='submit' value='Activate'>";
         echo "</form></div></div>";
         }
    ?>
    </div> <!-- end col-md-8 -->
    <div class="col-md-2"></div>
    </div> <!-- second row end-->
</section> <!-- content end  -->

<?php
     
     include '../includes/dashboardfooter.php';

?>