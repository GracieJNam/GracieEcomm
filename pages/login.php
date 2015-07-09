<?php
 session_start();
 $pageTitle = "The Kirk Estrate Soap & Body";
 include '../includes/header.php';
 include '../includes/nav.php';

?>
        </div><!-- col-md-12 end-->
    </div><!-- row end-->
    
<div class="row"><!-- second row start-->
 <div class="col-md-1"></div><!-- col-md-1 end-->
     <div class="content col-md-10"><!-- main content start-->
     <div class="col-md-2"></div>
     <div class="col-md-8">

<div id="login">
    <h2>Welcome to The Kirk Estate Soap &amp; Body</h2>
    <br />
    <br />
    <br />

   <p>Please login to view the pages</p><br />

     <form id = "loginform" method="post" action="loginprocessing1.php" onsubmit="return checkFormLogin()">

        <p>
            <label for="userName">Username*: </label>
            <input id="userName" class="box" type="text" name="userName" placeholder=" user name" autofocus>
            <span id="userName-errortext" name = "userName-errortext" ></span>
        </p>
        <p>
            <label for="password">Password*: </label>
            <input id="password" class="box"  type="password" name="password" placeholder=" password">
            <span id="password-errortext" name = "password-errortext" ></span>
        </p>
           <input type="hidden" value="<?php echo $_GET['productId']; ?>" name="productId"
        />

        <p>
            <input class="submit" type="submit" name="commit" value="Login">
        </p>
     </form><br />

        <?php
             if(isset($_SESSION['error'])) //if session error is set
             {
                 echo '<p class="error">' . $_SESSION['error'] . '</p>'; //display error message
                 unset($_SESSION['error']); //unset session error
             }
            
            if(isset( $_SESSION['success'])) //if session error is set
             {
                 echo '<p class="error">' . $_SESSION['success'] . '</p>'; //display error message
                 unset($_SESSION['success']); //unset session error
             }
        ?>


        </div>
     </div>
<div class="col-md-2"></div>
</div><!-- col-md-10 end-->
<?php
	
    include '../includes/footer.php';
?>



