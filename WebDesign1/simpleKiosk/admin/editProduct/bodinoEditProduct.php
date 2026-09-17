<?php
    require_once '../../components/bodinoAdminGuard.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kiosk</title>
    <link rel="stylesheet" href="../../css/bodinoStyle.css">
    <link rel="stylesheet" href="../../css/bodinoAdmin.css">
</head>
<body>
    <div class="middle-box">
        <?php
        include_once('../../config/bodinoConnection.php');
        /** @var mysqli $bodino_conn */ 
        if (isset($_GET['product_id']) && !empty($_GET['product_id'])) {
            
            $product_id = mysqli_real_escape_string($bodino_conn, $_GET['product_id']);
            
            $query = "SELECT * FROM `product` WHERE `product_id` = '$product_id'";
            $search_product = mysqli_query($bodino_conn, $query);
            
            if ($search_product && $row = mysqli_fetch_assoc($search_product)) { 
        ?>
        
        <form action="bodinoEditAction.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" value="<?= $row['product_id'] ?>" name="product_id">
            <input type="hidden" value="<?= $row['bodino_ImageUrl'] ?>" name="image">
            
            <table class="editTable">
                <tr>
                    <td> <label for="bodino_ProductName"> Product Name </label>  </td>
                    <td> <input type="text" 
                            id="bodino_ProductName" 
                            name ="bodino_ProductName" 
                            required value="<?= $row['bodino_ProductName'] ?>">
                    </td>
                </tr>

                <tr>
                    <td> <label for="bodino_Unit"> Unit </label>  </td>
                    <td> <input type="text" id="bodino_Unit" name ="bodino_Unit" required value="<?= $row['bodino_Unit'] ?>"></td>
                </tr>
                <tr>
                    <td> <label for="bodino_PriceUnit"> Price per Unit </label>  </td>
                    <td> <input type="number" step="0.01" id="bodino_PriceUnit" name ="bodino_PriceUnit" required value="<?= $row['bodino_PriceUnit'] ?>"></td>
                </tr>
                <tr>
                    <td> <label for="bodino_ImageUrl"> Image Upload </label>  </td>
                    <td><input type="file" id="bodino_ImageUrl" name ="bodino_ImageUrl" accept="image/*"></td>
                </tr>
                <tr>
                    <td>
                        <button type='submit' name="bodinoUpdate" class="bodinoUpdate"> Update </button>
                    </td>
                    <td>
                        <button type='submit' name="bodinoCancel" class="bodinoCancel"> Cancel </button>
                    </td>
                </tr>
            </table>
        </form>

        <?php 
            } else {
                echo "<p>Product not found or database query failed.</p>";
            }
        } else {
            echo "<p>No product selected. Please go back and select a product to edit.</p>";
        }
        ?>
    </div>
</body>
</html>