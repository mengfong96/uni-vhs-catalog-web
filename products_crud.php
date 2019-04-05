<?php
include_once 'database.php';
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//Create
if (isset($_POST['create'])) {
  try {
    $stmt = $conn->prepare("INSERT INTO tbl_products_a161103_pt2(fld_product_id,fld_product_name, fld_director, fld_maincast, fld_length, fld_mpaa, fld_genre, fld_year_released, fld_country_released, fld_rating, fld_price) VALUES(:pid, :name, :director, :maincast, :length, :mpaa, :genre, :yearr, :countryr, :rating, :price)");
    $stmt->bindParam(':pid', $pid, PDO::PARAM_STR);
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':director', $director, PDO::PARAM_STR);
    $stmt->bindParam(':maincast', $maincast, PDO::PARAM_STR);
    $stmt->bindParam(':length', $length, PDO::PARAM_STR);
    $stmt->bindParam(':mpaa', $mpaa, PDO::PARAM_STR);
    $stmt->bindParam(':genre', $genre, PDO::PARAM_STR);
    $stmt->bindParam(':yearr', $yearr, PDO::PARAM_STR);
    $stmt->bindParam(':countryr', $countryr, PDO::PARAM_STR);
    $stmt->bindParam(':rating', $rating, PDO::PARAM_STR);
    $stmt->bindParam(':price', $price, PDO::PARAM_STR); 
    $pid = $_POST['pid'];
    $name = $_POST['name'];
    $director = $_POST['director'];
    $maincast =  $_POST['maincast'];
    $length = $_POST['length'];
    $mpaa = $_POST['mpaa'];
    $genre = $_POST['genre'];
    $yearr = $_POST['yearr'];
    $countryr = $_POST['countryr'];
    $rating = $_POST['rating'];
    $price = $_POST['price'];
    $stmt->execute();
    }
  catch(PDOException $e)
  {
    echo "Error: " . $e->getMessage();
  }
}

//Update
if (isset($_POST['update'])) {
  try {
    $stmt = $conn->prepare("UPDATE tbl_products_a161103_pt2 SET fld_product_id = :pid,fld_product_name = :name, fld_director = :director, fld_maincast = :maincast,fld_length = :length, fld_mpaa = :mpaa, fld_genre = :genre, fld_year_released = :yearr, fld_country_released = :countryr, fld_rating = :rating, fld_price = :price WHERE fld_product_id = :oldpid");
    $stmt->bindParam(':pid', $pid, PDO::PARAM_STR);
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':director', $director, PDO::PARAM_STR);
    $stmt->bindParam(':maincast', $maincast, PDO::PARAM_STR);
    $stmt->bindParam(':length', $length, PDO::PARAM_STR);
    $stmt->bindParam(':mpaa', $mpaa, PDO::PARAM_STR);
    $stmt->bindParam(':genre', $genre, PDO::PARAM_STR);
    $stmt->bindParam(':yearr', $yearr, PDO::PARAM_STR);
    $stmt->bindParam(':countryr', $countryr, PDO::PARAM_STR);
    $stmt->bindParam(':rating', $rating, PDO::PARAM_STR);
    $stmt->bindParam(':price', $price, PDO::PARAM_STR);
    $stmt->bindParam(':oldpid', $oldpid, PDO::PARAM_STR);  
    $pid = $_POST['pid'];
    $name = $_POST['name'];
    $director = $_POST['director'];
    $maincast =  $_POST['maincast'];
    $length = $_POST['length'];
    $mpaa = $_POST['mpaa'];
    $genre = $_POST['genre'];
    $yearr = $_POST['yearr'];
    $countryr = $_POST['countryr'];
    $rating = $_POST['rating'];
    $price = $_POST['price'];
    $oldpid = $_POST['oldpid'];
    $stmt->execute();
    header("Location: products.php");
    }
  catch(PDOException $e){
    echo "Error: " . $e->getMessage();
  }
}

//Delete
if (isset($_GET['delete'])) {
  try {
    $stmt = $conn->prepare("DELETE FROM tbl_products_a161103_pt2 WHERE fld_product_id = :pid");
    $stmt->bindParam(':pid', $pid, PDO::PARAM_STR);  
    $pid = $_GET['delete'];
    $stmt->execute();
    header("Location: products.php");
    }
  catch(PDOException $e){
    echo "Error: " . $e->getMessage();
  }
}
 
//Edit
if (isset($_GET['edit'])) {
  try {
    $stmt = $conn->prepare("SELECT * FROM tbl_products_a161103_pt2 WHERE fld_product_id = :pid");
    $stmt->bindParam(':pid', $pid, PDO::PARAM_STR);
    $pid = $_GET['edit'];
    $stmt->execute();
    $editrow = $stmt->fetch(PDO::FETCH_ASSOC);
    }
  catch(PDOException $e){
    echo "Error: " . $e->getMessage();
  }
}
  $conn = null;
?>