<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">SLEEP BEAUTY</a>
    </div>
 
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav">
      <li id="username"><a> <?php echo "Welcome, ".$_SESSION['username'];?></a></li>
      <li><a href="index.php">Home</a></li>
      <li><a href="products.php">Products</a></li>
            
            <li><a href="customers.php">Customers</a></li>
            <li><a href="staffs.php">Staffs</a></li>
            <li><a href="orders.php">Orders</a></li>
      
    </ul>
      <ul class="nav navbar-nav navbar-right">
       
         
          
            <li><a href="logout.php">Log Out</a></li>
        
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>