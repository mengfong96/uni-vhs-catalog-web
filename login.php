<?php
	include_once 'database.php';
	
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
    if($stmt = $pdo->prepare("SELECT s_username, s_c_password FROM tbl_staffs_a161103_pt2 WHERE s_username = :s_username")){
    	// Bind variables to the prepared statement as parameters
      $stmt->bindParam(':s_username', $param_username, PDO::PARAM_STR);
      // Set parameters 
      $param_username = trim($_POST["username"]);
      // Attempt to execute the prepared statement
      if($stmt->execute()){
      // Check if username exists, if yes then verify password
      if($stmt->rowCount() == 1){
        if($row = $stmt->fetch()){
        	$database_password = $row['s_c_password'];
        	if($database_password == $password){
          /* Password is correct, so start a new session and save the username to the session */
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
	<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.bundle.min.js"></script>
  <link href='https://fonts.googleapis.com/css?family=Averia Sans Libre' rel='stylesheet'>
	<title>Login Page | Lee's VHS Movies Ordering System</title>
	<!--link href="css/bootstrap.min.css" rel="stylesheet"-->
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/htm	l5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<style type="text/css">
.wrapper {    
  margin-top: 80px;
  margin-bottom: 20px;
}
.form-signin {
  max-width: 420px;
  padding: 30px 38px 66px;
  margin: 0 auto;
  background-color: #eee;
  border: 3px dotted rgba(0,0,0,0.1);  
  }
.form-signin-heading {
  text-align:center;
  margin-bottom: 30px;
}
.form-control {
  position: relative;
  font-size: 16px;
  height: auto;
  padding: 10px;
}
input[type="text"] {
  margin-bottom: 0px;
  border-bottom-left-radius: 0;
  border-bottom-right-radius: 0;
}
input[type="password"] {
  margin-bottom: 20px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
.colorgraph {
  height: 7px;
  border-top: 0;
  background: #c4e17f;
  border-radius: 5px;
  background-image: -webkit-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
  background-image: -moz-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
  background-image: -o-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
  background-image: linear-gradient(to right, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
}
</style>
<body style="background-image: url(bg.jpg); font-family: 'Averia Sans Libre';">
  <div class = "container">
  <div class="wrapper">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="form-signin">       
      <h3 class="form-signin-heading">Welcome Back! Please Sign In</h3>
      <hr class="colorgraph"><br>
      <div>
        <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?php echo $username; ?>" required="" autofocus="" />
      </div>
      <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
        <span class="help-block"><?php echo $username_err; ?></span>
      </div>
      <div>
        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required=""/> 
      </div>         
      <div class="controls">
        <span class="help-block"><?php echo $password_err; ?></span>
      </div>
      <button class="btn btn-lg btn-primary btn-block"  name="Submit" value="Login" type="submit">Login</button>        
    </form>     
    </div>
  </div>		
</body>
</html>