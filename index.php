<?php
include_once 'auth.php';
 include_once 'products_crud.php';
?>

<!DOCTYPE html>
<html>
<head>
  <style type="text/css">
   button{
                width:150px;
            }
   
  
</style>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
     <script src="js/bootstrap.min.js"></script>
       <link href="css/bootstrap.min.css" rel="stylesheet">
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link href='https://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet'>
   
    <script> $(document).ready(function() {
$("body, select, input, button").css({
  "font-family": "Comfortaa",
  "font-size": "18px"
});
});
 </script>




  <title>Sleep Beauty : Products</title>

</head>
<body>
    <?php include_once 'nav_barhome.php'; ?>

       <div>
        <p style="text-align:center;"><img src = bed.png></p>
      </div>

      <div class="container-fluid">

         <div class="page-header">
        <h2>Products</h2>
      </div>
                  <form action="search.php">
                  <button class="list-group-item" type="submit" name="search0"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>Search</button>
                  </form> 
                  <hr></>  
      <div class="row">
    
      
       <?php
      // Read
       $per_page = 9;
      if (isset($_GET["page"]))
        $page = $_GET["page"];
      else
        $page = 1;
      $start_from = ($page-1) * $per_page;

      try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("select * from tbl_products_a161060_pt2 LIMIT $start_from, $per_page");
        $stmt->execute();
        $result = $stmt->fetchAll();
      }
      catch(PDOException $e){
            echo "Error: " . $e->getMessage();
      }
       foreach($result as $readrow) {
      ?>  

      <div class="col-xs-12 col-sm-6 col-md-4" >
      <div class="thumbnail" style="border-color: #000000; border-style: solid;; border-width: 5px">
          <?php if ($readrow['Product_ID'] == "" ) {
        echo "No image";
      }
      else { ?>
      <img src="products/<?php echo $readrow['Product_ID'] ?>.jpg"  class="img-responsive">
      <?php } ?>
      </div>  
      

     <div class="caption">
        <p><?php echo $readrow['Product_Name']; ?></p>
        <p>Product ID: <?php echo $readrow['Product_ID']; ?></p>
        <p>Price: RM<?php echo $readrow['Price']; ?></p>
        <p>Brand: <?php echo $readrow['Brand']; ?></p>
       <button onclick="window.location.href='products_details.php?pid=<?php echo $readrow['Product_ID']; ?>'" class="btn btn-warning btn-xs">Detail</button>
      </div>
    
    </div>
 


    <?php
      }
      $conn = null;
      ?>
  </div>


 <div class="row">
    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
      <nav>
          <ul class="pagination">
          <?php
          try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT * FROM tbl_products_a161060_pt2");
            $stmt->execute();
            $result = $stmt->fetchAll();
            $total_records = count($result);
          }
          catch(PDOException $e){
                echo "Error: " . $e->getMessage();
          }
          $total_pages = ceil($total_records / $per_page);
          ?>
          <?php if ($page==1) { ?>
            <li class="disabled"><span aria-hidden="true">«</span></li>
          <?php } else { ?>
            <li><a href="index.php?page=<?php echo $page-1 ?>" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
          <?php
          }
          for ($i=1; $i<=$total_pages; $i++)
            if ($i == $page)
              echo "<li class=\"active\"><a href=\"index.php?page=$i\">$i</a></li>";
            else
              echo "<li><a href=\"index.php?page=$i\">$i</a></li>";
          ?>
          <?php if ($page==$total_pages) { ?>
            <li class="disabled"><span aria-hidden="true">»</span></li>
          <?php } else { ?>
            <li><a href="index.php?page=<?php echo $page+1 ?>" aria-label="Previous"><span aria-hidden="true">»</span></a></li>
          <?php } ?>
        </ul>
      </nav>
    </div>
  </div>
  </div>
   <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>