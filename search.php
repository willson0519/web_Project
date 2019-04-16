
<?php
  require_once("auth.php");
  include_once 'database.php';
?>


<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <link href="css/bootstrap.min.css" rel="stylesheet">
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet'>
    <script> $(document).ready(function() {
$("body, select, input, button").css({
  "font-family": "Comfortaa",
  "font-size": "18px"
});
}); </script>
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
     <script> $(document).ready(function() {
$("body, select, input, button").css({
  "font-family": "Comfortaa",
  "font-size": "18px"
});
}); </script>
  <title>Sleep Beauty | Advance Search</title>
  <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css">
 
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

        <style type="text/css">
   .row {
  width: 100%;
  /*margin: 0 auto;*/
    text-align: center;
}
.block {
  width: 20%;
  /*float: left;*/

    display: inline-block;
    zoom: 1;
}
    </style>

   
</head>
<body>

   <?php include_once 'nav_bar.php'; ?>
   <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
 
      <p class="lead" ><h1 style="margin-left: 30px;">Search product</h1></p>

       <form class="example" action="result.php" method="post">
  <input type="text" name="keyword" placeholder="Search.."  >
  <button type="submit" name="search_form" ><i class="fa fa-search"></i></button>
</form>
       
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>

