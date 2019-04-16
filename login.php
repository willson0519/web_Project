<?php
    require_once 'database.php';
    
$pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";

 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = 'Please enter username.';
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST['password']))){
        $password_err = 'Please enter your password.';
    } else{
        $password = trim($_POST['password']);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        
        if($stmt = $pdo->prepare("SELECT username, password FROM tbl_stafffs_a161060_pt2 WHERE username = :username")){
            // Bind variables to the prepared statement as parameters
           $stmt->bindParam(':username', $param_username, PDO::PARAM_STR);
            
            // Set parameters 
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Check if username exists, if yes then verify password
                if($stmt->rowCount() == 1){
                    if($row = $stmt->fetch()){
                        $database_password = $row['password'];
                        if($database_password == $password){
                            /* Password is correct, so start a new session and
                            save the username to the session */
                            session_start();
                            $_SESSION['username'] = $username;      
                            header("location: index.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = 'The password you entered was not valid.';
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = 'No account found with that username.';
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        unset($stmt);
    }
    
    // Close connection
    unset($pdo);
}
?>
<!DOCTYPE html>
    <html>
    <head>
        <style type="text/css">
            button{
                width:150px;
            }
            .formlabel {
    font-weight: bold;
  }
        </style>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
        <!--<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>-->
<!--Include the above in your HEAD tag -->
<link href='https://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet'>
<script> $(document).ready(function() {
$("body, select, input, button").css({
  "font-family": "Comfortaa",
  "font-size": "22px"
});
}); </script>
        <title></title>
    </head>
    <body>
    
     
    <?php include_once 'nav_bar_login.php'; ?>

         <p style="text-align:center;" > <img src="bed.png" width="400" height="400">-Sleep Beauty- </p>
         
        


    <div class="row">
        <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
            <form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
              <fieldset>
                <div id="legend">
                  <legend class="">Login</legend>
                </div>
                <div class="control-group">
                  <!-- Username -->
                  <label class="control-label"  for="username">Username</label>
                  <div class=="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                    <input type="text" name="username" placeholder="username" class="input-xlarge" value="<?php echo $username; ?>">
                     <span class="help-block"><?php echo $username_err; ?></span>
                  </div>
                </div>
                <div class="control-group">
                  <!-- Password-->
                  <label class="control-label" for="password">Password</label>
                  <div class="controls">
                    <input type="password" name="password" placeholder="password" class="input-xlarge">
                    <span class="help-block"><?php echo $password_err; ?></span>
                  </div>
                </div>
                <div class="control-group" style="padding-top: 10px">
                  <!-- Button -->
                  <div class="controls">
                    <button type="submit" name= "btn" class="btn btn-primary btn-primary" value="Login">Login</button>
                  </div>
                </div>
              </fieldset>
            </form>
        </div>
    </div>
</div>

</body>
    </html> 