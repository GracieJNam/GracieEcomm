<?php
 include "../includes/connect.php";
?>
<h2>Feedback</h2>
 <h3>We love hearing from you...</h3>

 <p>Please tell about your experience using our website by completing the form
below.</p>

 <form action="feedbackprocessing.php" method="post">
     <input type="text" name="firstName" size="41" placeholder="First Name*"
     required /><br />
     <input type="text" name="lastName" size="41" placeholder="Last Name" /
     /><br />
     <input type="email" name="email" size="41" placeholder="Email*" required
     /><br />
     <textarea rows="10" cols="30" name="feedback" placeholder="Feedback"
     ></textarea><br />
     <p class="spaceTop"><input type="submit" name="feedbackButton" value="Send
    Feedback" /></p>
 </form>