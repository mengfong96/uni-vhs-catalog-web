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
  <title>Products | Lee's VHS Movies Ordering System</title>
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
          <h2>Create New Product</h2>
        </div>
      <form action="products.php" method="post" class="form-horizontal">
        <div class="form-group">
          <label for="productid" class="col-sm-3 control-label"> Product ID</label>
          <div class="col-sm-9">
            <input type="text" name="pid" class="form-control" placeholder="VHS ID that start with V" required value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_id']; ?>">
          </div>
        </div>
        <div class="form-group">
          <label for="productname" class="col-sm-3 control-label">Product Name</label>
          <div class="col-sm-9">
            <input type="text" name="name" class="form-control" placeholder="VHS Name" required value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_name']; ?>">
          </div>
        </div>
        <div class="form-group">
          <label for="director" class="col-sm-3 control-label">Director</label>
          <div class="col-sm-9">
            <input type="text" name="director" class="form-control" placeholder="VHS Director" required value="<?php if(isset($_GET['edit'])) echo $editrow['fld_director']; ?>">
          </div>
        </div>
        <div class="form-group">
          <label for="maincast" class="col-sm-3 control-label">Maincast</label>
          <div class="col-sm-9">
            <input type="text" name="maincast" class="form-control" placeholder="VHS Maincast" required value="<?php if(isset($_GET['edit'])) echo $editrow['fld_maincast']; ?>">
          </div>
        </div>
        <div class="form-group">
          <label for="length" class="col-sm-3 control-label">Length</label>
          <div class="col-sm-9">
            <input type="text" name="length" class="form-control" placeholder="Length of VHS(in minutes) " required value="<?php if(isset($_GET['edit'])) echo $editrow['fld_length']; ?>">
          </div>
        </div>
        <div class="form-group">
          <label for="mpaa" class="col-sm-3 control-label">MPAA</label>
          <div class="col-sm-9">
            <select name="mpaa" class="form-control">
              <option value="" selected>Select</option>
              <option value="G" <?php if(isset($_GET['edit'])) if($editrow['fld_mpaa']=="G") echo "selected"; ?>>G- General Audiences</option>
              <option value="PG" <?php if(isset($_GET['edit'])) if($editrow['fld_mpaa']=="PG") echo "selected"; ?>>PG- Parental Guidance Suggested</option>
              <option value="PG-13" <?php if(isset($_GET['edit'])) if($editrow['fld_mpaa']=="PG-13") echo "selected"; ?>>PG-13 - Parents Strongly Cautioned</option>
              <option value="R" <?php if(isset($_GET['edit'])) if($editrow['fld_mpaa']=="R") echo "selected"; ?>>R- Restricted</option>
              <option value="NR" <?php if(isset($_GET['edit'])) if($editrow['fld_mpaa']=="NR") echo "selected"; ?>>NR- Not Rated</option>
              <option value="UR" <?php if(isset($_GET['edit'])) if($editrow['fld_mpaa']=="UR") echo "selected"; ?>>Unrated </option>
            </select>
          </div>
        </div> 
        <div class="form-group">
          <label for="genre" class="col-sm-3 control-label">Genre</label>
          <div class="col-sm-9">
          <input name="genre" type="text" class="form-control" placeholder="VHS Genre" required value="<?php if(isset($_GET['edit'])) echo $editrow['fld_genre']; ?>">
        </div>
        </div>
        <div class="form-group">
          <label for="yearr" class="col-sm-3 control-label">Year Release</label>
          <div class="col-sm-9">
          <input type="date" name="yearr" class="form-control" required value="<?php if(isset($_GET['edit'])) echo $editrow['fld_year_released']; ?>">
        </div>
        </div>

        <div class="form-group">
          <label for="countryr" class="col-sm-3 control-label">Country Released</label>
          <div class="col-sm-9">
            <select name="countryr" class="form-control">
              <option value="" selected>Select</option>
              <option value="USA" <?php if(isset($_GET['edit'])) if($editrow['fld_country_released']=="USA") echo "selected"; ?>>America</option>
              <option value="RU" <?php if(isset($_GET['edit'])) if($editrow['fld_country_released']=="RU") echo "selected"; ?>>Russia</option>
              <option value="AR" <?php if(isset($_GET['edit'])) if($editrow['fld_country_released']=="AR") echo "selected"; ?>>Argentina</option>
              <option value="NW" <?php if(isset($_GET['edit'])) if($editrow['fld_country_released']=="NW") echo "selected"; ?>>Norway</option>
           </select>
          </div>
        </div>
        <div class="form-group">
          <label for="rating" class="col-sm-3 control-label">Rating</label>
          <div class="col-sm-9">
            <input type="text" name="rating" class="form-control" placeholder="VHS Rating (0 to 10)" required value="<?php if(isset($_GET['edit'])) echo $editrow['fld_rating']; ?>">
          </div>
        </div>
        <div class="form-group">
          <label for="price" class="col-sm-3 control-label">Price</label>
          <div class="col-sm-9">
            <input type="text" name="price" class="form-control" placeholder="VHS Price in RM" required value="<?php if(isset($_GET['edit'])) echo $editrow['fld_price']; ?>">
          </div>
        </div> 
        <div class="form-group">
          <div class="col-sm-offset-3 col-sm-9">
            <?php if (isset($_GET['edit'])) { ?>
            <input type="hidden" name="oldpid" value="<?php echo $editrow['fld_product_id']; ?>">
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
          <h2>Products List</h2>
        </div>
      <table class="table table-striped table-bordered">
        <tr>
          <td>Product ID</td>
          <td>Name</td>
          <td>Director</td>
          <td>Maincast</td>
          <td>Length</td>
          <td>MPAA</td>
          <td>Genre</td>
          <td>Year Released</td>
          <td>Country Released</td>
          <td>Rating</td>
          <td>Price (RM)</td>
          <td></td>
        </tr>
        <?php // Read
          $per_page = 5;
          if (isset($_GET["page"]))
            $page = $_GET["page"];
          else
            $page = 1;
          $start_from = ($page-1) * $per_page;
          try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("select * from tbl_products_a161103_pt2 LIMIT $start_from, $per_page");
            $stmt->execute();
            $result = $stmt->fetchAll();
          }
          catch(PDOException $e){
            echo "Error: " . $e->getMessage();
          }
          foreach($result as $readrow) { ?>
        <tr>
          <td><?php echo $readrow['fld_product_id']; ?></td>
          <td><?php echo $readrow['fld_product_name']; ?></td>
          <td><?php echo $readrow['fld_director']; ?></td>
          <td><?php echo $readrow['fld_maincast']; ?></td>
          <td><?php echo $readrow['fld_length']; ?></td>
          <td><?php echo $readrow['fld_mpaa']; ?></td>
          <td><?php echo $readrow['fld_genre']; ?></td>
          <td><?php echo $readrow['fld_year_released']; ?></td>
          <td><?php echo $readrow['fld_country_released']; ?></td>
          <td><?php echo $readrow['fld_rating']; ?></td>
          <td><?php echo $readrow['fld_price']; ?></td>
          <td>
            <a href="products_details.php?pid=<?php echo $readrow['fld_product_id']; ?>" class="btn btn-info" role="button">Details</a>
            <a href="products.php?edit=<?php echo $readrow['fld_product_id']; ?>" class="btn btn-success btn-xs" role="button"> Edit </a>
            <a href="products.php?delete=<?php echo $readrow['fld_product_id']; ?>" onclick="return confirm('Are you sure to delete?');" class="btn btn-danger btn-xs" role="button">Delete</a>
          </td>
        </tr>
        <?php } $conn = null; ?>
      </table>
    </div> 
    <div class="row">
      <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
        <nav>
          <ul class="pagination">
          <?php
            try {
              $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
              $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              $stmt = $conn->prepare("SELECT * FROM tbl_products_a161103_pt2");
              $stmt->execute();
              $result = $stmt->fetchAll();
              $total_records = count($result);
            }
            catch(PDOException $e){
              echo "Error: " . $e->getMessage();
            }
            $total_pages = ceil($total_records / $per_page); ?>
            <?php if ($page==1) { ?>
            <li class="disabled"><span aria-hidden="true">«</span></li>
            <?php } else { ?>
            <li><a href="products.php?page=<?php echo $page-1 ?>" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
            <?php }
              for ($i=1; $i<=$total_pages; $i++)
                if ($i == $page)
                  echo "<li class=\"active\"><a href=\"products.php?page=$i\">$i</a></li>";
                else
                  echo "<li><a href=\"products.php?page=$i\">$i</a></li>"; ?>
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