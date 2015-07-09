<?php
     session_start();
     $sessionId = $_GET['sessionId'];
      require_once("../includes/connect.php");
     $sql = "SELECT * FROM session WHERE sessionId =" . $_GET['sessionId']; //select the post using the blogId
     $result = mysqli_query($con, $sql); //run the query
     $row = mysqli_fetch_array($result); // save the result in the $row variable
     $pageTitle = $row['title'];
     include '../includes/header.php';//include the database connection
     include '../includes/nav.php';
?>



        <?php
             include "../includes/logincheck.php"; 
                /*include the check to confirm if the user is logged in and can view the page 
                (if the user is not logged in they should not be able to view the page)*/
        ?>


   
        <?php

             $sql = "SELECT * FROM session WHERE sessionId =" . $sessionId;
             $result = mysqli_query($con, $sql) or die(mysqli_error($con));

              while($row = mysqli_fetch_array($result)) //use a while loop to display all the rows in the database

             {
                echo "<h1>" . $row['title'] . "</h1>";
                echo "<p class='title'>" . $row['subTitle']. "</p><br />";
                echo "<h3> Summary </h3>";
                echo "<p>" . $row['summary'] . "</p><br /><br />";
                echo "<h2> Ingredients</h2>";
                echo "<img class='session1imag' src='../images/". $row['sessionImage'] ."'/>";
                echo "<p>". str_replace('\n', '<br />', ($row['ingredients'])) . "</p> <br /><br />";
                echo "<h2> Instruction</h2>";
                echo "<p>". str_replace('\n', '<br />', ($row['sessionInstruction'])) . "</p> <br />";
             }
        ?>


     

<?php

    include'../includes/footer.php';
?>

