<?php
     session_start();
     $pageTitle = "Shop";
     include '../includes/header.php'; //includes connect.php 
     include '../includes/nav.php';
     include '../includes/functions.php'; //includes all the required PHP functions
?>


</div><!-- col-md-12 end-->
</div><!-- row end-->

<div class="row"><!--second row start -->
    <div class="col-md-1"></div>
        <div class="content col-md-10"><!-- col-md-10 start-->
            
<h1>The Shop</h1>
    <br />

<div class="col-md-9"><!--col-md-9 start-->
    <?php
     $sql = "SELECT * FROM product";
     $result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query
     $numrow = mysqli_num_rows($result); //retrieve the number of rows
         echo "<p>There are currently <strong>" . $numrow . "</strong>
        Products.</p>"; //echo the total number of contacts
    ?>
<br />

    <?php

         //if the $_REQUEST 'command' is 'add' than call the PHP addtocart function
         //$_REQUEST is similar to $_GET and $_POST, but it contains the contents of both

         if(isset($_REQUEST['command']) && $_REQUEST['command']=='add' && $_REQUEST['productId']>0){
             $pid=$_REQUEST['productId'];
             addtocart($pid,1);
             header("location:shoppingcart.php");
             exit();
         }
    ?>

<!-- JavaScript that creates the 'add' command if the 'Add to Cart' button is clicked  -->

    <script>

         function addtocart(pid){
             document.form1.productId.value=pid;
             document.form1.command.value='add';
             document.form1.submit();
     }

    </script>
    
 <!-- form with hidden fields to send productID and the $_REQUEST 'command' to the next page -->

     <form name="form1">
         <input type="hidden" name="productId" />
         <input type="hidden" name="command" />
     </form>

<?php
     $sql = "SELECT * FROM product";
     $result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query
     //create pagination
     $rowsperpage = 20; // number of rows to show per page
     $totalpages = ceil($numrow / $rowsperpage); // find out total pages

     // get the current page or set a default
     if (isset($_GET['currentpage']) && is_numeric($_GET['currentpage'])){
        $currentpage = (int) $_GET['currentpage']; // cast var as int
     }
     else{
        $currentpage = 1; // default page number
     }
     // if current page is greater than total pages...
     if ($currentpage > $totalpages){
        $currentpage = $totalpages; // set current page to last page
     }
     // if current page is less than first page...
     if ($currentpage < 1){
         $currentpage = 1; // set current page to first page
     }
     // the offset of the list, based on current page
     $offset = ($currentpage - 1) * $rowsperpage;
     // retrieve data from database for display
     $sql = "SELECT * FROM product ORDER BY date DESC LIMIT $offset, $rowsperpage";
     $result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query

     while ($row = mysqli_fetch_array($result)) //display the results
     {
         echo "<div class='productarea col-sm-6 col-md-3'><div class='thumbnail'><a href = 'productdetail.php?productId=" . $row['productId'] . "'><img class='productimage' src='../images/shop/" . ($row['productImage']) . "'/></a>"; 
         //display the image stored inside the images subfolder in another subfolder named shop (in your database store the image name e.g., image.jpg in the image column of your product table)

         echo "<div class='caption'><a href = 'productdetail.php?productId=" . $row['productId'] . "'><h4>" . $row['productName'] . "</h4></a><br />";
        
         echo "<p><strong>Price: $" . $row['price'] . "</strong></p>";

         echo "<p><input class='addcart' type='button' value='Add to Cart' onclick='addtocart(" .
        $row['productId'] . ")' /></p></div></div></div>"; // 'Add to Cart' button
     }

 ?>
<?php
     // build pagination links
     $range = 4; // number of links to show

     echo "<br /><div id='pagination'>";
     // if not on page 1, don't show back links
     if ($currentpage > 1){
         echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=1'><<</a>&nbsp; "; //echo link to go back to first page
         $prevpage = $currentpage - 1; // get previous page number
         echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=$prevpage'>< Prev</a>&nbsp; "; // echo link to go back to previous page
     }

     // loop to show links to range of pages around current page
     for ($x = ($currentpage - $range); $x < (($currentpage + $range) + 1);$x++){
     // if it's a valid page number...
         if (($x > 0) && ($x <= $totalpages)){
         // if we're on current page...
             if ($x == $currentpage){
                 echo "<span class='activePagination'>$x</span>&nbsp;"; // don't make a link
                } else{ // if not current page...
                        echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=$x'>$x</a>&nbsp; "; // make it a link
             }
         }
     }

     // if not on last page, show forward and last page links
     if ($currentpage != $totalpages){
         $nextpage = $currentpage + 1; // get next page
         echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=$nextpage'>Next
        ></a>&nbsp; "; // echo forward link for next page
         echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=$totalpages'>>></a>
        "; // echo forward link for last page
     }

     echo "</div><br />"; // end pagination
 ?>

</div> <!--col-md-9 end-->

<?php

    include '../includes/sidebar.php';
?>

</div><!--col-md-10 end-->  

<?php
 include '../includes/footer.php';
?>