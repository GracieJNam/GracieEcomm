<!doctype html>
<html lang="en">
    <head>
     <meta charset="utf-8">
         <title><?php echo $pageTitle ?></title>

         <meta name="viewport" content="width=device-width, initial-scale=1.0">
         
          <!-- link to favicon -->
         <link href="../images/handmade.ico" rel="shortcut icon" />
         <!-- link to Bootstrap core CSS -->
         <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
         <!-- link to external CSS -->
         <?php
         $sql = "SELECT themeCss, current.themeId FROM theme INNER JOIN current USING(themeId)"; //select the stylesheet from the theme table and the themeID from the current table
         $result = mysqli_query($con, $sql) or die(mysqli_error($con)); //run the query

         $row = mysqli_fetch_array($result); //store the results in a variable named $row
         ?>

         <link rel="stylesheet" href="../css/<?php echo $row['themeCss'] ?>">
         <link rel="stylesheet" href="../font-awesome.min.css">
         
         <!--jquery -->
         <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
         <script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
        
        
        <!-- TinyMCE editor -->
        <script type="text/javascript" src="../js/tinymce/tinymce.min.js"></script>
        <script type="text/javascript">

             tinymce.init({
                 theme:"modern",
                 skin:'light',
                 selector: "textarea",
                 menubar: false,
                 plugins: "link"
             });

        </script>

         <!-- enable HTML5 in IE 8 and below -->
         <!--[if IE]>
         <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
         <![endif]-->

         <!-- the script below will ensure that media queries work in IE 6 to8 -->
         <script type='text/javascript' src='js/respond.min.js'></script>
    </head>
       
              
 <?php
    session_start();
 ?>
         
<body>
 <div class="dashboard container-fluid">
<div class="row">
 <div class="clear"></div>
  <!-- <div class="logo col-md-4">
  
 </div>
   <div class="col-md-8">
       <div class="search">
        <form class="form-wrapper cf" action="search.php" method="get" id="search">
             <input type="text" name="search"  placeholder="Enter a search term"  required />
             <button type="submit">Search</button>
        </form> 
      </div>
     </div>
</div>-->


        
