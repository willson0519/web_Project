<?php
  include_once 'staffs_crud.php';
  include_once 'auth.php';
?>
 
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <script src="js/bootstrap.min.js"></script>
       <link href="css/bootstrap.min.css" rel="stylesheet">
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
       
<link href='https://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet'>
    <style type="text/css">
      html {
        width:100%;
        height:100%;
        background:url(mattress.png) center center no-repeat;
        min-height:100%;
      }
    </style>
    <script> $(document).ready(function() {
$("body, select, input, button").css({
  "font-family": "Comfortaa",
  "font-size": "18px"
});
}); </script>
  <title>Sleep Beauty : Staffs</title>
  <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
 
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
  <?php include_once 'nav_bar.php'; ?>
  
  <div class="container-fluid">
  <div class="row">
    <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
      <div class="page-header">
        <h2>Create New Staff</h2>
      </div>

    <form action="staffs.php" method="post" class="form-horizontal">

    <div class="form-group">
          <label for="staffid" class="col-sm-3 control-label">STAFF ID</label>
          <div class="col-sm-9">
           <input name="sid" type="text" class="form-control" id="customerid" placeholder="Staff ID" value="<?php if(isset($_GET['edit'])) echo $editrow['Staff_ID']; ?>" required>
        </div>
        </div>
     <div class="form-group">
          <label for="nameid" class="col-sm-3 control-label">NAME</label>
          <div class="col-sm-9">
           <input name="sname" type="text" class="form-control" id="nameid" placeholder="Staff Name" value="<?php if(isset($_GET['edit'])) echo $editrow['Staff_Name']; ?>" required>
        </div>
        </div>
     <div class="form-group">
          <label for="genderid" class="col-sm-3 control-label">Gender</label>
          <div class="col-sm-9">
          <div class="radio">
              <label>
              <input name="gender" type="radio" id="genderid" value="Male" <?php if(isset($_GET['edit'])) if($editrow['Gender']=="Male") echo "checked"; ?> required> Male
            </label>
          </div>
          <div class="radio">
              <label>
                <input name="gender" type="radio" id="genderid" value="Female" <?php if(isset($_GET['edit'])) if($editrow['Gender']=="Female") echo "checked"; ?>> Female
            </label>
            </div>
          </div>
      </div>
       <div class="form-group">
          <label for="userid" class="col-sm-3 control-label">USERNAME</label>
          <div class="col-sm-9">
           <input name="uname" type="text" class="form-control" id="userid" placeholder="User Name" value="<?php if(isset($_GET['edit'])) echo $editrow['username']; ?>" required>
        </div>
        </div>
        <div class="form-group">
          <label for="passid" class="col-sm-3 control-label">PASSWORD</label>
          <div class="col-sm-9">
           <input name="password" type="text" class="form-control" id="passid" placeholder="Password" value="<?php if(isset($_GET['edit'])) echo $editrow['password']; ?>" required>
        </div>
        </div>
        <div class="form-group">
          <label for="emailid" class="col-sm-3 control-label">EMAIL</label>
          <div class="col-sm-9">
           <input name="email" type="text" class="form-control" id="emailid" placeholder="Email" value="<?php if(isset($_GET['edit'])) echo $editrow['email']; ?>" required>
        </div>
        </div>
    
       <div class="form-group">
          <div class="col-sm-offset-3 col-sm-9">
          <?php if (isset($_GET['edit'])) { ?>
      <input type="hidden" name="oldsid" value="<?php echo $editrow['Staff_ID']; ?>">
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
        <h2>Staffs List</h2>
      </div>
      <table class="table table-striped table-bordered">
      <tr>
        <td>Staff ID</td>
        <td>Name</td>
        <td>Gender</td>
        <td>Username</td>
        <td>Password</td>
        <td>Email</td>
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
          $stmt = $conn->prepare("SELECT * FROM tbl_stafffs_a161060_pt2");
           $stmt = $conn->prepare("select * from tbl_stafffs_a161060_pt2 LIMIT $start_from, $per_page");
        $stmt->execute();
        $result = $stmt->fetchAll();
      }
      catch(PDOException $e){
            echo "Error: " . $e->getMessage();
      }
      foreach($result as $readrow) {
      ?>
      <tr>
        <td><?php echo $readrow['Staff_ID']; ?></td>
        <td><?php echo $readrow['Staff_Name']; ?></td>
        <td><?php echo $readrow['Gender']; ?></td>
         <td><?php echo $readrow['username']; ?></td>
          <td><?php echo $readrow['password']; ?></td>
           <td><?php echo $readrow['email']; ?></td>
        <td>
          <a href="staffs.php?edit=<?php echo $readrow['Staff_ID']; ?>" class="btn btn-success btn-xs" role="button"> Edit </a>
          <a href="staffs.php?delete=<?php echo $readrow['Staff_ID']; ?>" onclick="return confirm('Are you sure to delete?');" class="btn btn-danger btn-xs" role="button">Delete</a>
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
            $stmt = $conn->prepare("SELECT * FROM tbl_stafffs_a161060_pt2");
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
            <li><a href="staffs.php?page=<?php echo $page-1 ?>" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
          <?php
          }
          for ($i=1; $i<=$total_pages; $i++)
            if ($i == $page)
              echo "<li class=\"active\"><a href=\"staffs.php?page=$i\">$i</a></li>";
            else
              echo "<li><a href=\"staffs.php?page=$i\">$i</a></li>";
          ?>
          <?php if ($page==$total_pages) { ?>
            <li class="disabled"><span aria-hidden="true">»</span></li>
          <?php } else { ?>
            <li><a href="staffs.php?page=<?php echo $page+1 ?>" aria-label="Previous"><span aria-hidden="true">»</span></a></li>
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