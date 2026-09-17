<?php
require_once '../components/bodinoAdminGuard.php';
include_once('../config/bodinoConnection.php');
/** @var mysqli $bodino_conn */ 
$product_id = $_GET['product_id'];

$search_product = mysqli_query($bodino_conn, "SELECT * 
                                FROM `product`
                                WHERE `product_id` = '$product_id'");
$row = mysqli_fetch_assoc($search_product);

$name = $row['bodino_ProductName'];
$unit = $row['bodino_Unit'];
$unit_per_price = $row['bodino_PriceUnit'];
$image = $row['bodino_ImageUrl'];

//save data to acrchive table
$product = mysqli_query($bodino_conn,
                        "INSERT INTO `archive` (`name`,`unit`,`price_per_unit`, `image_url`) 
                        VALUES('$name', '$unit', '$unit_per_price', '$image')");
                        
$delete = mysqli_query($bodino_conn,
                    "DELETE FROM `product`
                    WHERE `product_id` = '$product_id'
                    ");

if ($delete){
    echo'<script>alert("Product deleted successfully");</script>';
    echo'<script>parent.location.href="../bodinoMainPage.php"</script>';
}   else {
    echo'<script>alert("Product deleted failed")</script>';
}

?>