<?php

 session_start(); //start a session
 $pageTitle = "Search Results";
 include '../includes/header.php';//include the database connection
 include'../includes/nav.php';
?> 
 
 
</div><!-- col-md-12 end-->
</div><!-- row end-->

<div class="row"><!--second row start -->
    <div class="col-md-1"></div>
        <div class="content col-md-10"><!-- col-md-10 start-->
<?php
         include '../includes/logincheck.php';
?>
<h1>Search results</h1><br />

<div class='col-md-9'><!--col-md-9 start-->  

<?php

     $term = mysqli_real_escape_string($con, $_GET['search']); //prevent SQL injection

     $punctuation = array(", ", ". ", ",", "."); //create an array containing possible punctuation between words
     $term = str_replace($punctuation, " ", $term); //replace punctuation with a space

     $commonWords = array('and', 'or'); //create an array containing common words that you don't want to search for
   

    foreach($commonWords as $word) {
        
         $term = preg_replace("/\b\s$word\b/i",'',$term); //make the common words case insensitive and replace with no space
     }


     $term = explode(" ", ($term)); //split the search terms into separate word

     $sql = "SELECT * FROM product WHERE (productName LIKE '%" . $term[0] . "%' OR productDescription LIKE '%" . $term[0] . "%')"; //searches for matches to first search term

     for($i=1; $i < count($term); $i++){
         
         $sql = $sql . " OR (productName LIKE '%" . $term[$i] . "%' OR productDescription LIKE '%" . $term[$i] . "%')"; //searches for matches to subsequent search terms by looping through each term
            
     }

     $result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query
     $numrow = mysqli_num_rows($result); //count the number of rows returned

     if(empty($_GET['search'])){ //display if no search term entered
        echo "<p>You did not enter a search term</p>";
     }

     else if($numrow == 0) { //display if no matches to search 
     
         
        echo "<p>Sorry, no results match your search for ";
     
         foreach($term as $key){ //loop through each search term
     
             echo "<strong>" . $key . "</strong> "; //echo each search term
        }
     }

     else {
         
            $term = implode(", ", $term); //join the search terms into one string separated by commas
    
         echo "<p>Your search for " . $term . " has <strong>" . $numrow . "</strong>
    results</p><br /><br />"; //display the number of results for the search

             while ($row = mysqli_fetch_array($result))//loop through results for each match
             { 
                 echo "<div class='searchresult'><img src='../images/shop/" . $row['productImage'] . "'/><div class='search'><a href='productdetail.php?productId=" . $row['productId'] . "'>" . $row['productName'] . "</a>"; //link to the session via the title and subtitle (the sessionID must match the session number for this code structure to work

                 echo "<p>" . (substr(($row['productDescription']),0,100)) . "..." . "</p></div></div><br /><br />"; //limit displayed characters to 100
            }
     }

     mysqli_close($con); // close the database connection
?>

</div> <!--col-md-9 end-->

<?php

    include '../includes/sidebar.php';
?>

</div><!--col-md-10 end-->  


<?php

    include '../includes/footer.php';
?>