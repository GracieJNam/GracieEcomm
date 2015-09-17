<?php
     session_start();
     include "../includes/connect.php";
     require_once "Mail.php";
?>
<?php

     $firstName = mysqli_real_escape_string($con, $_POST['firstname']); //prevent SQL injection
     $lastName = mysqli_real_escape_string($con, $_POST['lastname']);
     $email = mysqli_real_escape_string($con, $_POST['email']);
     $mobile = mysqli_real_escape_string($con, $_POST['mobile']);
     $feedback = mysqli_real_escape_string($con, $_POST['feedback']);

     $sql = "INSERT INTO feedback (firstName,lastName, email, mobile, feedback, dateTime) VALUES
    ('$firstName', '$lastName', '$email', '$mobile', '$feedback', NOW())"; //sql query
     $result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query

     //email a confirmation message to the email address entered into the form
     $from = "gracie.j.nam@gmail.com";
     $to = $email;
     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) //check if email is valid
     {
         $_SESSION['error'] = 'Please enter a valid email address.'; //if an error occurs initialise a session called 'error' with a msg
         header("location:contactus.php"); //redirect to index.php
         exit();
     }
     $cc = "cogito_@naver.com"; //email to include as a carbon copy
     $recipients = $to . ", " . $cc; //to use Cc or Bcc with SMTP you must list theemail addresses as both recipients and headers
     $subject = "Confirmation email";
     $message = "<html style='font-family:arial,sans-serif; font-size:14px;lineheight:25px;'><body>";
     $message .= "<h2 style='color:#9c73a0'>Hello " . $firstName . "!</h2>";
     $message .= "<p style='border-top:2px solid #000; border-bottom:2px solid #000;
    padding-top:10px; padding-bottom:10px;'>Thank you for submitting your form.<br />";
     $message .= "We will get back to you as soon as possible.</p><br />";
     $message .= "<p>Thank you,<br />";
     $message .= "The Team</p>";
     $message .= "</body></html>";
     //the SMTP host settings
     $host = "ssl://smtp.gmail.com"; //encrypted Gmail connection
     $port = 465; //Gmail port
     $username = "gracie.j.nam@gmail.com";
     $password = "evepmsdyhaxpolqf";
     //headers for the email message
     $headers = array(); //array to hold email headers
     $headers['From'] = $from; //sender email
     $headers['To'] = $to; //recipient email
     $headers['Cc'] = $cc; //carbon copy email
     $headers['Subject'] = $subject; //email subject

     //create the SMTP array
     $smtp = array();//array to hold connection to SMTP server
     $smtp['host'] = $host; //host address
     $smtp['port'] = $port; //host port
     $smtp['auth'] = true; //authentication is true for Gmail
     $smtp['username'] = $username; //username for your account with host
     $smtp['password'] = $password; //password for your account with host

     //send the email
     $mailer = Mail::factory('smtp', $smtp); //create the PEAR Mail instance
     $mail = $mailer->send($recipients, $headers, $message); //send the PEAR Mail object

     //user messages
     if (PEAR::isError($mail))
     {
   
         $_SESSION['error'] = 'An error has occurred. Email confirmation not sent.';
        //error message
     }
     else
     {
         $_SESSION['success'] = 'Email confirmation successfully sent.'; //success message
     }
     header("location:contactus.php"); //redirect to index.php
?>