<?php
  include_once 'staffs_crud.php';
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Staffs | Lee's VHS Movies Ordering System</title>
  <!-- Bootstrap -->
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<script type="text/javascript">
$(document).ready(function() {
  $('#s_password, #s_c_password').on('keyup', function () {
  if ($('#s_password').val() == $('#s_c_password').val()) {
    $('#message').html('Matching').css('color', 'green');
  } else 
    $('#message').html('Not Matching').css('color', 'red');
  });
});
</script>
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
          <label for="customerid" class="col-sm-3 control-label">Staff ID</label>
          <div class="col-sm-9">
            <input name="sid" type="text" placeholder="Staff ID start with S" required class="form-control" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_staff_num']; ?>"> 
          </div>
        </div>
        <div class="form-group">
          <label for="firstname" class="col-sm-3 control-label">First Name</label>
          <div class="col-sm-9">
            <input name="fname" type="text" placeholder="Staff's First Name" required class="form-control" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_staff_fname']; ?>"> 
          </div>
        </div>
        <div class="form-group">
          <label for="lastname" class="col-sm-3 control-label">Last Name</label>
          <div class="col-sm-9">
            <input name="lname" type="text" placeholder="Staff's Last Name" required class="form-control" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_staff_lname']; ?>">
          </div>
        </div>
        <div class="form-group">
          <label for="gender" class="col-sm-3 control-label">Gender</label>
          <div class="col-sm-9">
            <div class="radio">
            <label>
              <input id="gender" name="gender" type="radio" value="Male" <?php if(isset($_GET['edit'])) if($editrow['fld_staff_gender']=="Male") echo "checked"; ?>> Male
            </label>
          </div>
          <div class="radio">
            <label>
              <input id="gender" name="gender" type="radio" value="Female" <?php if(isset($_GET['edit'])) if($editrow['fld_staff_gender']=="Female") echo "checked"; ?>> Female
            </label>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="phonenumber" class="col-sm-3 control-label">Phone Number</label>
          <div class="col-sm-9">
            <input name="phone" type="text" pattern="^(\+?6?01)[0-46-9]-*[0-9]{7,8}$" placeholder="Staff's Phone Number" required class="form-control" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_staff_phone']; ?>"> 
          </div>
        </div>
        <div class="form-group">
          <label for="email" class="col-sm-3 control-label">Email Address</label>
          <div class="col-sm-9">
            <input name="email" type="text" placeholder="Email Address" pattern="^.+@.+$" required class="form-control" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_staff_email']; ?>"> 
          </div>
        </div>
        <div class="form-group">
          <label for="s_username" class="col-sm-3 control-label">Username</label>
          <div class="col-sm-9">
            <input name="s_username" type="text" placeholder="Username (Used to login)"  class="form-control" value="<?php if(isset($_GET['edit'])) echo $editrow['s_username']; ?>"> 
          </div>
        </div>
        <div class="form-group">
          <label for="s_password" class="col-sm-3 control-label">Password</label>
          <div class="col-sm-9">
            <input name="s_password" type="text" placeholder="Enter Password" id="s_password"  class="form-control"> 
          </div>
        </div>
        <div class="form-group">
          <label for="s_c_password" class="col-sm-3 control-label">Confirm Password</label>
          <div class="col-sm-9">
            <input name="s_c_password" id="s_c_password" placeholder="Enter Password Again" type="text"  class="form-control" value="<?php if(isset($_GET['edit'])) echo $editrow['s_c_password']; ?>">
            <span id='message'></span> 
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-3 col-sm-9">
            <?php if (isset($_GET['edit'])) { ?>
            <input type="hidden" name="oldsid" value="<?php echo $editrow['fld_staff_num']; ?>">
            <button class="btn btn-primary" type="submit" name="update"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Update</button>
            <?php } else { ?>
            <button class="btn btn-primary" type="submit" name="create"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Create</button>
            <?php } ?>
            <button class="btn btn-outline-primary" type="reset"><span class="glyphicon glyphicon-erase" aria-hidden="true"></span> Clear</button>
          </div>
        </div>
        </form>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
        <div class="page-header">
          <h2>Staff List</h2>
      </div>
    <table class="table table-striped table-bordered">
      <tr>
        <td>Staff ID</td>
        <td>First Name</td>
        <td>Last Name</td>
        <td>Gender</td>
        <td>Phone Number</td>
        <td>Email Address</td>
        <td>s_username</td>
        <td>s_c_password</td>
        <td></td>
      </tr>
      <?php
      try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $stmt = $conn->prepare("SELECT * FROM tbl_staffs_a161103_pt2");
        $stmt->execute();
        $result = $stmt->fetchAll();
      }
      catch(PDOException $e){
            echo "Error: " . $e->getMessage();
      }
      foreach($result as $readrow) {
      ?>
      <tr>
        <td><?php echo $readrow['fld_staff_num']; ?></td>
        <td><?php echo $readrow['fld_staff_fname']; ?></td>
        <td><?php echo $readrow['fld_staff_lname']; ?></td>
        <td><?php echo $readrow['fld_staff_gender']; ?></td>
        <td><?php echo $readrow['fld_staff_phone']; ?></td>
        <td><?php echo $readrow['fld_staff_email']; ?></td>
        <td><?php echo $readrow['s_username']; ?></td>
        <td><?php echo $readrow['s_c_password']; ?></td>
        <td>
          <a href="staffs.php?edit=<?php echo $readrow['fld_staff_num']; ?>" class="btn btn-success btn-xs" role="button"> Edit </a>
          <a href="staffs.php?delete=<?php echo $readrow['fld_staff_num']; ?>" onclick="return confirm('Are you sure to delete?');" class="btn btn-danger btn-xs" role="button">Delete</a>
        </td>
      </tr>
    <?php } $conn = null; ?>
  </table>
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.min.js"></script>
</body>
</html>