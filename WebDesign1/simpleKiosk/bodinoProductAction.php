<?php
include_once('bodinoConnection.php');
if (isset($_POST['bodinoSubmit'])){

    $name = $_POST['bodino_ProductName'];
    $unit = $_POST['bodino_Unit'];
    $price_per_unit = $_POST['bodino_PriceUnit'];
    $image_url = $_POST['bodino_ImageUrl'];

    $client = mysqli_query($bodino_conn, "INSERT INTO `products` (
    `bodino_ProductName`, `bodino_Unit`, `bodino_PriceUnit`, `bodino_ImageUrl`) VALUES 
    ('$name', '$unit', '$price_per_unit', '$image_url')");

    if ($client) {
        echo '<script>alert("Product added Successfully");
                window.location.href = "bodinoProduct.php";
              </script>';
    }else {

        echo "Error: " . mysqli_error($bodino_conn);

    }
}

?>