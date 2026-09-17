<?php 
include_once('../../config/bodinoConnection.php');
/** @var mysqli $bodino_conn */ 
$product_id = $_GET['product_id'];
$search = mysqli_query($bodino_conn,
                    "SELECT *
                    FROM
                    `product`
                    WHERE
                    `product_id` = '$product_id'
                    ");
$record = mysqli_fetch_assoc($search);
$product_name = $record['bodino_ProductName'];
$product_price = $record['bodino_PriceUnit'];
$product_img = $record['bodino_ImageUrl'];
$product_unit = $record['bodino_Unit'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kiosk</title>
    <link rel="stylesheet" href="../../css/bodinoStyle.css">
    <link rel="stylesheet" href="../../css/bodinoCustomer.css">
    <style>
        body{
                background-color: goldenrod;
            }
    </style>
</head>
<body>
    <div class="middle-box">
        <form action="bodinoOrderNowAction.php" method="POST">
            <h1>Order Information</h1>
            <div class="orderInfo">
                <div class="imageContainer">
                    <div class="image-container">
                        <img src="../../asset/<?= '', $product_img; ?>">
                    </div>
                    <div class="stock-container">
                        <h3> stock: <?= '', $product_unit; ?></h3>
                    </div>
                </div>
                <table>
                    <tr>
                        <td> <h2> <?= '', $product_name; ?> </h2></td>
                    </tr>
                    <tr>
                        <td> <input type="text" id="bodino_Price" name ="bodino_Price" value= "<?= '', $product_price; ?>" readonly></td>
                    </tr>
                    <tr>
                        <td> <input type="text" id="bodino_Quantity" name ="bodino_Quantity" placeholder="Enter Quantity" required value= ""></td>
                    </tr>
                    <tr>
                        <td> <input type="text" id="bodino_Name" name ="bodino_Name" placeholder="Enter Name" required value= ""></td>
                    </tr>
                    <tr>
                        <td> <input type="text" id="bodino_Number" name ="bodino_Number" placeholder="Enter Mobile Number" required value= ""></td>
                    </tr>
                    <tr>
                        <td> <input type="hidden" name ="bodino_ItemId" value= "<?= '', $product_id; ?>"></td>
                    </tr>
                </table>
                <button type='submit' name="bodinoOrder" class="bodinoOrder"> ORDER NOW </button>
            </div>
        </form>
    </div>
</body>
</html>