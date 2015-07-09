<?php
 session_start();
 $pageTitle = "Contact Us";
 include '../includes/header.php';//includes connect.php 
 include '../includes/nav.php';
?>
</div><!-- col-md-12 end-->
</div><!-- row end-->

<div class="row"><!--second row start -->
    <div class="col-md-1"></div>
        <div class="content col-md-10"><!-- col-md-10 start-->


    <h1>Contact Us</h1><br />
    
<article id="contactfield">
<div class="col-md-6">
   <fieldset>
       <legend><h3> &nbsp;Leave your massage&nbsp; </h3></legend>
<?php
    //user messages
    if(isset($_SESSION['error'])){ //if session error is set
     echo '<div class="error">';
     echo '<p>' . $_SESSION['error'] . '</p>'; //display error message
     echo '</div><br />';
     unset($_SESSION['error']); //unset session error
    }
    elseif(isset($_SESSION['success'])){ //if session success is set

     echo '<div class="success">';
     echo '<p>' . $_SESSION['success'] . '</p>'; //display success message
     echo '</div><br />';
     unset($_SESSION['success']); //unset session success
    }
?>
        <form  action="feedbackprocessing.php" method="post" onsubmit="return comfirm()">
            <label>First Name:*</label>
                <input type="text"
            id="firstname" name="firstname" placeholder="enter  user first name" required><br />
            <label>Last Name:*</label>
                <input type="text"  id ="lastname" name="lastname"
            placeholder="enter user last name" required><br />
            <label>Email:*</label>
                <input type="email" name="email"
            placeholder="enter your email" required><br /><br />
            <label>Mobile:*</label>
                <input type="mobile" name="mobile"
            placeholder="enter your mobile number" required><br /><br />
            <label>Comment</label>
            <textarea name="feedback"></textarea>
            <input class="submit" type="submit" name="submit" value="Submit">
        </form>
   </fieldset>
</div>
<div class="col-md-6">
    <br /><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3539.9556934206603!2d153.0240067!3d-27.470638699999984!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6b915a04f3d8c507%3A0x5bddf624fd03742e!2s35+Queen+St%2C+Travelex%2C+Brisbane+QLD+4000!5e0!3m2!1sen!2sau!4v1432007297107" width="100%" height="450" frameborder="0" style="border:0"></iframe><br /><br />
    <p>35 Queen Street, Spring Hill, Queensland, 4000</p>
    <p>Phone:(07) 1234 5678</p>
    <p>Fax:(07) 1234 5679</p>
    <p>Mobile:0411 123 456</p>
</div>
                            
</article>
</div>
<div class="col-md-1"></div>
</div><!--col-md-10 end-->  
   
<?php
    include'../includes/footer.php';
?>