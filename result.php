<?php 
include_once 'database.php';
include_once 'auth.php';


define('MYHOST', 'lrgs.ftsm.ukm.my');
define('MYDATABASE', 'a161060');
define('MYUSERNAME', 'a161060');
define('MYPASSWORD', 'smallredchicken');

$mydb = new mysqli(MYHOST, MYUSERNAME, MYPASSWORD, MYDATABASE);

if ($mydb->connect_error) {

  die("Connection Error Message: ".$mydb->connect_error);
}

if (isset($_POST['search_form'])) {

  $keyword = $_POST['keyword'];
  

  $keyword=ltrim($keyword);
  $keyword=rtrim($keyword);

  $word=explode(" ",$keyword);
  $q = "";

  while(list($key,$val)=each($word)) {
    if ($val<>" " and strlen($val) > 0) {
      $q .= " Product_ID like '%$val%' or ";
   $q .= " Product_Name like '%$val%' or ";
   $q .= " Price like '%$val%' or ";

 

    }
  }
  $q=substr($q,0,(strLen($q)-3));
  $sql="select * from tbl_products_a161060_pt2 where ".$q;

}

 ?>
 <!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>List of Results</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">


</head>
<body>
  <?php include_once 'nav_bar.php' ?>
<div class="container-fluid">
      <div class="row">
      <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
      <div class="page-header">
        <h2 style="text-align: center">Search Results 
          </h2>

      </div>
</div>
</div>


    <div class="row">

  <?php 
   $per_page = 10;
      if (isset($_GET["page"]))
        $page = $_GET["page"];
      else
        $page = 1;
      $start_from = ($page-1) * $per_page; 

  $result = $mydb->query($sql);
  $count = $result->num_rows;

  if (!$result) {
    die("SQL Error Message: ".$mydb->error);
  }

  while ($readrow = $result->fetch_array()) {
  ?>    
  <div class="col-xs-12 col-sm-6 col-md-4">
      <div class="thumbnail" style="max-height: 300px;">
          <?php if ($readrow['Product_ID'] == "" ) {
        echo "No image";
      }
      else { ?>
      <img src="products/<?php echo $readrow['Product_ID'] ?>.jpg" class="img-responsive" style="height:100%;">
      <?php } ?>
      </div>  

     <div class="caption">
        <p><?php echo $readrow['Product_Name']; ?></p>
        <p>Product ID: <?php echo $readrow['Product_ID']; ?></p>
        <p>Price: RM<?php echo $readrow['Price']; ?></p>
        
        <a href="products_details.php?pid=<?php echo $readrow['Product_ID']; ?>" class="btn btn-warning btn-xs" role="button">Details</a>
          <a href="products.php?edit=<?php echo $readrow['Product_ID']; ?>" class="btn btn-success btn-xs" role="button"> Edit </a>
          <a href="products.php?delete=<?php echo $readrow['Product_ID']; ?>" onclick="return confirm('Are you sure to delete?');" class="btn btn-danger btn-xs" role="button">Delete</a>
      </div>
    
    </div>



    <?php
      }
      $conn = null;
      ?>
  </div>



  </div>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

</body>
</html>