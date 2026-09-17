<?php
require_once '../../components/bodinoAdminGuard.php';
include_once('../../config/bodinoConnection.php');
/** @var mysqli $bodino_conn */ 

if (isset($_POST['bodinoUpdate'])){
    $product_id = $_POST['product_id'];
    $name = $_POST['bodino_ProductName'];
    $unit = $_POST['bodino_Unit'];
    $price_per_unit = $_POST['bodino_PriceUnit'];

    if ($_POST['bodino_ImageUrl'] != ''){
        $image_url = $_POST['bodino_ImageUrl'];
    } else {
        $image_url = $_POST['image'];
    }

    $client = mysqli_query($bodino_conn,
            "UPDATE 
            `product`
            SET 
            `bodino_ProductName` = '$name',
            `bodino_Unit` = '$unit',
            `bodino_PriceUnit` = '$price_per_unit',
            `bodino_ImageUrl` = '$image_url'
            WHERE
            `product_id` = '$product_id'");

    if ($client){
        echo '<script>alert("Product Updated Successfully")</script>';
        echo '<script>parent.location.href="../../bodinoMainPage.php"</script>';
    }   else{
        echo '<script>alert("Failed to Update Product")</script>';
    }
} else {
    echo '<script>parent.location.href="../../bodinoMainPage.php"</script>';
}
?>