<?php
     session_start();
     $pageTitle="Registration";
     include '../includes/header.php';
     include '../includes/nav.php';

?>
        </div><!-- col-md-12 end-->
    </div><!-- first row end-->
    
<div class="row"><!-- second row start-->
 <div class="col-md-1"></div><!-- col-md-1 end-->
     <div class="content col-md-10"><!-- main content start-->
     <div class="col-md-2"></div>
     <div class="col-md-8">
     <h1>New User</h1>
     <br />
          <br />
          <p>Sign up for updates about new products, sales and giveaways.</p><br />

       <form class="regi"  action="registrationprocessing.php" method = "post" onsubmit="return checkForm()">
           
            <p>
            <label>User Name*</label>
            <input type="text" id="userName" class="box" name="userName" placeholder=" user name" autofocus />
            <span id="userName-errortext" name = "userName-errortext" ></span>
                    
            </p>
            <p>
            <label>First Name*</label>
            <input type="text" id="firstname" class="box" name="firstName" placeholder=" Firsr name"/>
            <span id="firstname-errortext" name = "firstname-errortext" ></span>
            </p>
            <p>
            <label>Last Name*</label>
            <input type="text" id="lastname" class="box" name="lastName" placeholder=" Last name"/>
            <span id="lastname-errortext" name = "lastname-errortext" ></span>
            </p>
            <p>
            <label>Email*</label>
            <input type="emailaddress" id="email" class="box" name="email" placeholder=" E-mail"/>
            <span id="email-errortext" name = "email-errortext" ></span>
            </p>
            <p>
            <label>Password*</label>
            <input type="password" id="password" class="box" name="password" placeholder=" Password"/>
            <span id="password-errortext" name = "password-errortext" ></span>
            </p><br />

   <p>Subscribe to weekly email newsletter?</p><br />
         <label>Yes</label><input class="checkbox" type="radio" name="newsletter" value="1" checked /><br />
         <label>No</label><input class="checkbox" type="radio" name="newsletter" value="0" /><br /
           <p>
                <input class="submit" type="submit" name="registration" value="Create New Account" />
           </p>
        </form><br />

            <?php
                 if(isset($_SESSION['error'])) //if session error is set
                 {
                     echo '<p class="error">' . $_SESSION['error'] . '</p>'; //display error message
                     unset($_SESSION['error']); //unset session error
                 }
            ?>
    </div>
<div class="col-md-2"></div>
</div><!-- col-md-10 end-->

		
<?php
	
    include '../includes/footer.php';
?>



