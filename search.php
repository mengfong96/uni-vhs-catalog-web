<?php
  include_once 'products_crud.php';
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title> FIRST TO HELP : Search</title>
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
          <h2>Search</h2>
        </div>
        <table>
          <form method="post">
            <tr>
              <td>Fields</td>
              <td>Search Term</td>
              <td>Operator</td>
            </tr>
            <tr>
              <td>
                <select name="s1" class="form-control">
                  <option value="fld_product_name">VHS Name</option>
                  <option value="fld_director">VHS Director</option>
                  <option value="fld_maincast">VHS Maincast</option>
                </select>
              </td>
              <td>
                <input name="st1" type="text" class="form-control" >
              </td>
              <td>
                <select name="so1" class="form-control">
                  <option value="or">OR</option>
                  <option value="and">AND</option>
                </select>
              </td>
            </tr>
            <tr>
              <td>
                <select name="s2" class="form-control">
                  <option value="fld_product_name">VHS Name</option>
                  <option value="fld_director">VHS Director</option>
                  <option value="fld_maincast">VHS Maincast</option>
                </select>
              </td>
              <td>
                <input name="st2" type="text" class="form-control" >
              </td>
            </tr>
            <div>
              <tr>
              <td><button class="btn btn-primary" type="submit" name="search"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Search</button></td>
              <td><button class="btn btn-primary" type="submit" name="Display All Product"><span class="glyphicon glyphicon-list" aria-hidden="true"></span> Display All Product</button></td>
              </tr>
            </div>  
          </form>
        </table>
        </div>
      </div>
    <div class="row">
      <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
        <div class="page-header">
          <h2>Products List</h2>
        </div>
        <table class="table table-striped table-bordered">
          <tr>
            <th>Product ID</th>
            <th>Name</th>
            <th>Director</th>
            <th>Maincast</th>
            <th>Length</th>
            <th>MPAA</th>
            <th>Year Released</th>
            <th>Country Released</th>
            <th>Rating</th>
            <th>Price</th>
            <th></th>
          </tr>
          <?php
            if (isset($_POST['display'])){
              try {
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $conn->prepare("SELECT * from tbl_products_a161103_pt2");;
                $stmt->execute();
                $result = $stmt->fetchAll();
              }
              catch(PDOException $e){
                echo "Error: " . $e->getMessage();
              }
              foreach($result as $readrow) {
          ?>   
            <tr>
              <td><?php echo $readrow['fld_product_id']; ?></td>
              <td><?php echo $readrow['fld_product_name']; ?></td>
              <td><?php echo $readrow['fld_director']; ?></td>
              <td><?php echo $readrow['fld_maincast']; ?></td>
              <td><?php echo $readrow['fld_length']; ?></td>
              <td><?php echo $readrow['fld_mpaa']; ?></td>
              <td><?php echo $readrow['fld_year_released']; ?></td>
              <td><?php echo $readrow['fld_country_released']; ?></td>
              <td><?php echo $readrow['fld_rating']; ?></td>
              <td><?php echo $readrow['fld_price']; ?></td>
              
              <td>
                 <a href="products_details.php?pid=<?php echo $readrow['fld_product_id']; ?>" class="btn btn-warning btn-xs" role="button">Details</a>  
              </td>
            </tr>
            <?php 
              }} 
            ?>
            <?php
      
              if (isset($_POST['search']))
              {
              try {
                $a=$_POST['s1'];
                $b=$_POST['st1'];
                $c=$_POST['so1'];
                $d=$_POST['s2'];
                $e=$_POST['st2'];
              
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $conn->prepare("select * from tbl_products_a161103_pt2 where $a like '%$b%' $c $d like '%$e%'");
                $stmt->execute();
                $result = $stmt->fetchAll();
              }
              catch(PDOException $e){
                    echo "Error: " . $e->getMessage();
              }
              foreach($result as $readrow) {
            ?> 
            <tr>
              <td><?php echo $readrow['fld_product_id']; ?></td>
              <td><?php echo $readrow['fld_product_name']; ?></td>
              <td><?php echo $readrow['fld_director']; ?></td>
              <td><?php echo $readrow['fld_maincast']; ?></td>
              <td><?php echo $readrow['fld_length']; ?></td>
              <td><?php echo $readrow['fld_mpaa']; ?></td>
              <td><?php echo $readrow['fld_year_released']; ?></td>
              <td><?php echo $readrow['fld_country_released']; ?></td>
              <td><?php echo $readrow['fld_rating']; ?></td>
              <td><?php echo $readrow['fld_price']; ?></td>
              <td>
                <a href="products_details.php?pid=<?php echo $readrow['fld_product_id']; ?>" class="btn btn-warning btn-xs" role="button">Details</a>
              </td>
            </tr>
            <?php }} ?>
          </table>
        </div>
      </div>
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>