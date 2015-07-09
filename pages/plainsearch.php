<?php 

 session_start(); //start a session
 $pageTitle = "Search Results"; 
 include "../includes/connect.php";
 include '../includes/header.php'; 
 include'../includes/nav1.php';
?> 
 
<div id="container"> 
 
<h2>Search results</h2>

<?php
 include '../includes/logincheck.php'; 
 include '../includes/searchform.php';
?>
 
<?php 
 
     $term = mysqli_real_escape_string($con, $_GET['search']); //prevent SQL injection 

     $sql = "SELECT * FROM session WHERE title LIKE '%$term%' OR subTitle LIKE '%$term%' OR summary LIKE '%$term%'"; // use LIKE to find values that match the term entered in the search field in the title, subtitle and summary columns 

     $result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query 
     $numrow = mysqli_num_rows($result); //count the number of rows returned 

     if(empty($_GET['search'])) //display if no search term entered 
     { 
         
         echo "<p>You did not enter a search term</p>"; 
     } 
        elseif($numrow == 0) //display if no matches to search 
     { 
         echo "<p>Sorry, no results match your search for <strong><i>" . $term . "</strong></i></p>"; 
     } 

     else 
     { 
        echo "<p>Your search for <strong>" . $term . "</strong> has retrieved " . 
        $numrow . " results:</p><br /><br />"; //display the search results 
        
         while ($row = mysqli_fetch_array($result)) //loop through results for each match 
       { 
            echo "<p class='searchresult'>" . "<a href='session" . $row['sessionId']. ".php'>" . 
            $row['title'] . " - " . $row['subTitle'] . "</a></p><br />"; //link to the session via the title and subtitle (the sessionID must match the session number for this code structure to work 
           
             echo "<p>" . (substr(($row['summary']),0,100)) . "..." . "</p><br />"; //limit displayed characters to 100 
        } 
     } 

     mysqli_close($con); // close the database connection 
?> 
</div> <!-- #content --> 

<?php 

    include '../includes/footer.php'; 
?>
 

 
