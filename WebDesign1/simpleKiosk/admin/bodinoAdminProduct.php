<?php
    require_once '../components/bodinoAdminGuard.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kiosk</title>
    <link rel="stylesheet" href="../css/bodinoStyle.css">
    <link rel="stylesheet" href="../css/bodinoAdmin.css">
    <style>
        body{
            background-color: goldenrod;
        }
    </style>
</head>
<body>
    <div class="middle-box">
        <h1>Available Products</h1>
        <table>
            <tr>
                <th><h2>PRODUCT NAME</h2></th>
                <th><h2>UNIT</h2></th>
                <th><h2>PRICE PER UNIT</h2></th>
                <th><h2>IMAGE</h2></th>
                <th><h2>ACTIONS</h2></th>
            </tr>
            <?php 
            include_once('../config/bodinoConnection.php');
            /** @var mysqli $bodino_conn */ 
            $search_product = mysqli_query($bodino_conn,
            "SELECT * FROM `product`");
            while ($row = mysqli_fetch_assoc($search_product)){ ?>
                <tr>
                    <th><h2><?= $row['bodino_ProductName'] ?></h2></th>
                    <th><h2><?= $row['bodino_Unit'] ?></h2></th>
                    <th><h2><?= $row['bodino_PriceUnit'] ?></h2></th>
                    <th><img src="../asset/<?= $row['bodino_ImageUrl'] ?>" alt="Company Logo" width="50" height="50"></th>
                    <th>
                        <a href="editProduct/bodinoEditProduct.php?product_id=<?= $row['product_id'] ?> name="bodinoEdit" class="bodinoEdit"> Edit </a>
                        <a href="bodinoDeleteProduct.php?product_id=<?= $row['product_id'] ?> name="bodinoDelete" class="bodinoDelete"
                            onclick="return confirm('Are you sure, you want to delete?')"> Delete </a>
                    </th>
                </tr>
                <?php
                }?>
        </table>
    </div>
</body>
</html>