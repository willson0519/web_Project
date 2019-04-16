<?php
  include_once 'products_crud.php';
  include_once 'auth.php';
?>
 
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Sleep Beauty : Products</title>
   <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
 
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
       
<link href='https://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet'>
    
    <script> $(document).ready(function() {
$("body, select, input, button").css({
  "font-family": "Comfortaa",
  "font-size": "18px"
});
}); </script>
</head>
<body>

  <?php include_once 'nav_bar.php'; ?>

  <div class="container-fluid">
  <div class="row">
    <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
      <div class="page-header">
        <h2>Create New Product</h2>
      </div>

    <form action="products.php" method="post" class="form-horizontal">
      <div class="form-group">
          <label for="productid" class="col-sm-3 control-label">PRODUCT ID</label>
          <div class="col-sm-9">
           <input name="pid" type="text" class="form-control" id="productid" placeholder="Product ID" value="<?php if(isset($_GET['edit'])) echo $editrow['Product_ID']; ?>" required>
        </div>
        </div>
      <div class="form-group">
          <label for="productname" class="col-sm-3 control-label">PRODUCT NAME</label>
          <div class="col-sm-9">
           <input name="name" type="text" class="form-control" id="productname" placeholder="Product Name" value="<?php if(isset($_GET['edit'])) echo $editrow['Product_Name']; ?>" required>
        </div>
        </div>
       <div class="form-group">
          <label for="productprice" class="col-sm-3 control-label">PRICE</label>
          <div class="col-sm-9">
           <input name="price" type="text" class="form-control" id="productprice" placeholder="Product Price" value="<?php if(isset($_GET['edit'])) echo $editrow['Price']; ?>" required>
        </div>
        </div>
      <div class="form-group">
          <label for="productbrand" class="col-sm-3 control-label">BRAND</label>
          <div class="col-sm-9">
          <select name="brand" class="form-control" id="productbrand" required>
            <option value="">Please select</option>
        <option value="LUCID" <?php if(isset($_GET['edit'])) if($editrow['Brand']=="LUCID") echo "selected"; ?>>LUCID</option>
        <option value="Zinus" <?php if(isset($_GET['edit'])) if($editrow['Brand']=="Zinus") echo "selected"; ?>>Zinus</option>
        <option value="Cr" <?php if(isset($_GET['edit'])) if($editrow['Brand']=="Cr") echo "selected"; ?>>Cr</option>
        <option value="LINENSPA" <?php if(isset($_GET['edit'])) if($editrow['Brand']=="LINENSPA") echo "selected"; ?>>LINENSPA</option>
        <option value="Signature Sleep" <?php if(isset($_GET['edit'])) if($editrow['Brand']=="Signature Sleep") echo "selected"; ?>>Signature Sleep</option>
         <option value="South Shore" <?php if(isset($_GET['edit'])) if($editrow['Brand']=="South Shore") echo "selected"; ?>>South Shore</option>
      </select> 
    </div>
  </div>
      <div class="form-group">
          <label for="producttype" class="col-sm-3 control-label">TYPE</label>
          <div class="col-sm-9">
          <select name="type" class="form-control" id="producttype" required>
            <option value="">Please select</option>
        <option value="Micro Fiber" <?php if(isset($_GET['edit'])) if($editrow['Type']=="Micro Fiber") echo "selected"; ?>>Micro Fiber</option>
        <option value="Metal" <?php if(isset($_GET['edit'])) if($editrow['Type']=="Metal") echo "selected"; ?>>Metal</option>
        <option value="Fabric" <?php if(isset($_GET['edit'])) if($editrow['Type']=="Fabric") echo "selected"; ?>>Fabric</option>
        <option value="Cotton" <?php if(isset($_GET['edit'])) if($editrow['Type']=="Cotton") echo "selected"; ?>>Cotton</option>
        <option value="Wood" <?php if(isset($_GET['edit'])) if($editrow['Type']=="Wood") echo "selected"; ?>>Wood</option>
        <option value="Leather" <?php if(isset($_GET['edit'])) if($editrow['Type']=="Leather") echo "selected"; ?>>Leather</option>
        <option value="Gel" <?php if(isset($_GET['edit'])) if($editrow['Type']=="Gel") echo "selected"; ?>>Gel</option>
        </select>
      </div>
    </div>
    
     <div class="form-group">
          <label for="productyear" class="col-sm-3 control-label">MANUFACTURING DATE</label>
          <div class="col-sm-9">
           <input name="year" type="text" class="form-control" id="productyear" placeholder="Product Date" value="<?php if(isset($_GET['edit'])) echo $editrow['Manufacture_Date']; ?>" required>
        </div>
        </div>
       <div class="form-group">
          <label for="productrating" class="col-sm-3 control-label">RATING</label>
          <div class="col-sm-9">
           <input name="rating" type="text" class="form-control" id="productrating" placeholder="Product Rating" value="<?php if(isset($_GET['edit'])) echo $editrow['Rating']; ?>" required>
        </div>
        </div> <br>

     <div class="form-group">
          <div class="col-sm-offset-3 col-sm-9">
          <?php if (isset($_GET['edit'])) { ?>
          <input type="hidden" name="oldpid" value="<?php echo $editrow['Product_ID']; ?>">
          <button class="btn btn-default" type="submit" name="update"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Update</button>
          <?php } else { ?>
          <button class="btn btn-default" type="submit" name="create"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Create</button>
          <?php } ?>
          <button class="btn btn-default" type="reset"><span class="glyphicon glyphicon-erase" aria-hidden="true"></span> Clear</button>
        </div>
      </div>
    </form>
    </div>
  </div>

   <div class="row">
    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
      <div class="page-header">
        <h2>Products List</h2>
      </div>
      <table class="table table-striped table-bordered">
      <tr>
        <td>Product ID</td>
        <td>Name</td>
        <td>Price</td>
        <td>Brand</td>
        <td></td>
      </tr>
      <?php
      // Read
        $per_page = 5;
      if (isset($_GET["page"]))
        $page = $_GET["page"];
      else
        $page = 1;
      $start_from = ($page-1) * $per_page;
      try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $stmt = $conn->prepare("SELECT * FROM tbl_products_a161060_pt2");
           $stmt = $conn->prepare("select * from tbl_products_a161060_pt2 LIMIT $start_from, $per_page");
        $stmt->execute();
        $result = $stmt->fetchAll();
      }
      catch(PDOException $e){
            echo "Error: " . $e->getMessage();
      }
      foreach($result as $readrow) {
      ?>   
      <tr>
        <td><?php echo $readrow['Product_ID']; ?></td>
        <td><?php echo $readrow['Product_Name']; ?></td>
        <td><?php echo $readrow['Price']; ?></td>
        <td><?php echo $readrow['Brand']; ?></td>
        <td>
         <a href="products_details.php?pid=<?php echo $readrow['Product_ID']; ?>" class="btn btn-warning btn-xs" role="button">Details</a>
          <a href="products.php?edit=<?php echo $readrow['Product_ID']; ?>" class="btn btn-success btn-xs" role="button"> Edit </a>
          <a href="products.php?delete=<?php echo $readrow['Product_ID']; ?>" onclick="return confirm('Are you sure to delete?');" class="btn btn-danger btn-xs" role="button">Delete</a>
        </td>
      </tr>
       <?php } ?>
 
    </table>
     </div>
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
            <li><a href="products.php?page=<?php echo $page-1 ?>" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
          <?php
          }
          for ($i=1; $i<=$total_pages; $i++)
            if ($i == $page)
              echo "<li class=\"active\"><a href=\"products.php?page=$i\">$i</a></li>";
            else
              echo "<li><a href=\"products.php?page=$i\">$i</a></li>";
          ?>
          <?php if ($page==$total_pages) { ?>
            <li class="disabled"><span aria-hidden="true">»</span></li>
          <?php } else { ?>
            <li><a href="products.php?page=<?php echo $page+1 ?>" aria-label="Previous"><span aria-hidden="true">»</span></a></li>
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
