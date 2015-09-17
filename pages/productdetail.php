<?php
     session_start();
     require_once("../includes/connect.php");
     $sql = "SELECT * FROM product WHERE productId =" . $_GET['productId']; //select the post using the productId
     $result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query
     $row = mysqli_fetch_array($result); // save the result in the $row variable
     $pageTitle = $row['productName']; //save the contents of $row['title'] to the $pageTitle variable
     include '../includes/header.php'; //includes connect.php 
     include '../includes/nav.php';
     include '../includes/functions.php'; //includes all the required PHP functions
?>

</div><!-- col-md-12 end-->
</div><!-- row end-->

<div class="row"><!--second row start -->
    <div class="col-sm-1 col-xs-1"></div>
        <div class="content col-sm-10 col-xs-10"><!-- col-md-10 start-->
    
    <h1>The Shop</h1>
    <br />
<div class="col-sm-9"><!--col-md-9 start-->
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

    <!-- JavaScript that creates the 'add' command if the 'Add to Cart' button is clicked 
    -->

    <script>

         function addtocart(pid){
             document.form1.productId.value=pid;
             document.form1.command.value='add';
             document.form1.submit();
     }

    </script>
     <!-- form with hidden fields to send productID and the $_REQUEST 'command' to the
    next page -->

     <form name="form1">
         <input type="hidden" name="productId" />
         <input type="hidden" name="command" />
     </form>

    <?php
         $sql = "SELECT * FROM product, category WHERE product.productId =" . $_GET['productId'] . " group by product.productId" ; //use $_GET to retrieve the productID for the full entry
         $result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query

         while ($row = mysqli_fetch_array($result)) //display the results
         {
             echo "<div class='col-sm-6 col-xs-12'><div id='productarea' <p><img class='productimage' src='../images/shop/" . ($row['productImage']) . "'/></p></div></div>"; 
             //display the image stored inside the images subfolder in another subfolder named shop (in your database store the image name e.g., image.jpg in the image column of your product table)
             
             echo "<div class='col-sm-6 col-xs-12 productdiscription'><h3>" . $row['productName'] . "</h3>" . " </strong> in <strong>" . $row['category'] . "</strong></em><br /><br />";
         }
      /* star rating */
         $sql = "SELECT productId, ROUND(AVG(rating)) as rating FROM comment WHERE productId=" . $_GET['productId'];  
         $result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query
         $row = mysqli_fetch_array($result); // save the result in the $row variable
         $rating= $row['rating']; //retrieve rating from database

         for($i=0;$i<$rating;$i++){
             echo "<img class='rating' src='../images/star.png' alt='filled star' width=10px height=auto />"; //echo filled stars
         }
         for($i=0;$i<5-$rating;$i++){
            echo "<img class='rating' src='../images/unfilledstar.png' width=10px height=auto alt='unfilled star' />"; //echo unfilled stars
         }
        $sql = "SELECT * FROM product, category WHERE product.productId =" . $_GET['productId'] . " group by product.productId" ; //use $_GET to retrieve the productID for the full entry
         $result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query

         while ($row = mysqli_fetch_array($result)) //display the results
         {

             echo "<p><br /><br />" . $row['productDescription'] . "</p><br />";
             echo "<p><strong>Price: $" . $row['price'] . "</strong></p>";
             
             echo "<p id='productbutton'><input class='addcart' type='button' value='Add to Cart' onclick='addtocart(" .
            $row['productId'] . ")' /></p></div>"; // 'Add to Cart' button
         }

     ?>
   <h3 class="comment">Comments</h3>
        
            <?php
                 $sql = "SELECT comment.*, firstName FROM comment, user WHERE comment.authorId =
                user.userId && comment.productId ='" . $_GET['productId'] . "'ORDER BY datePosted DESC ";
                //retrieve the comments for the productId
                 $result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query

                 $numrows = mysqli_num_rows($result);

                 if($numrows == 0){

                 echo "<p>No comments on this post</p><br />";

                 }

                 else{

                     while ($row = mysqli_fetch_array($result)){

                         echo "<div class='commentarea'>
                               <p class='posttime'><strong>" . $row['firstName'] . "</strong>  ". ", "   . date("F jS Y",strtotime($row['datePosted'])) . "<br />"; //display the date, author and categoryv
                         
                     /* star rating */
                         
                         $rating= $row['rating']; //retrieve rating from database

                         for($i=0;$i<$rating;$i++){
                             echo "<img class='rating' src='../images/star.png' alt='filled star' width=10px height=auto />"; //echo filled stars
                         }
                         for($i=0;$i<5-$rating;$i++){
                            echo "<img class='rating' src='../images/unfilledstar.png' width=10px height=auto alt='unfilled star' />"; //echo unfilled stars
                         }
                         echo "<br /><br /><p class='commentcontent'>" . str_replace('\n', '<br />', ($row['comment'])) . "</p></div>"; //use the PHP str_replace function to replace \n in the database with a <br />
                        }
                 }
            ?>
   <br /><br />

<h3>Leave a Comment</h3><br />
 <!-- check if user is logged in and, if so, display comment form -->
     <?php
        if(isset($_SESSION['user']))
     {
     ?>

    <form action="productprocessing.php" method="post">
        
         <textarea rows="10" cols="50%" name="comment"></textarea><br />
          <label><h3>Rating*</h3></label>

<!-- create a drop-down list populated by the rating stored in the database-->
         <select name='rating'>
             <option value="">Please select</option>

             <!-- use a for loop to create the rating options up to a maximum of 5 -->
             <?php for ($i = 1; $i <= 5; $i++) : ?>
             <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
             <?php endfor; ?>

         </select><br />
         <input type="hidden" value="<?php echo $_GET['productId']; ?>" name="productId" />
         <p><input class="submit" type="submit" name="postComment" value="Post Comment" /></p>
         
    </form>  
     <?php
     }
         else{
             echo "<p>You must <a href='login.php?productId=" . $_GET['productId'] .
            "'>login</a> to comment."; //use the GET array to send the reviewID to the next page if the user clicks the login option in the review
     }
    ?>
    
    
<br /></div> <!--col-sm-9 end-->

<?php

    include '../includes/sidebar.php';
?>

</div><!--col-sm-10 end-->  
 
 
<?php
 include '../includes/footer.php';
?>