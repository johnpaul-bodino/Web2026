<?php
include_once("bodinoConnection.php");

$get_products = mysqli_query($bodino_conn, "SELECT * FROM products");

// while ($row = mysqli_fetch_assoc($get_products))
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Accessories</title>
</head>
<body>
    <div class="top-box">
        <div class="header">
            <h1>Pet Shop Kiosk</h1>
            <h2>by John Paul P. Bodino</h2>
        </div>
        <!-- <div class="top-right-box">
            <button class="mercadoSignup">SIGN UP</button>
            <button class="mercadoLogin">LOG IN</button>
        </div> -->

    </div>
    <div class="middle-box">
        <h1>AVAILABLE PRODUCTS</h1>
        <div class="cardContainer">
            <?php
                while ($row = mysqli_fetch_assoc($get_products)) 
                    { ?>
                    <div class="card">
                        <div class="bodinoProductImgContainer">
                            <img src="asset/<?php echo $row['bodino_ImageUrl']?>" class="bodinoProductImg">
                        </div>
                        <div class="bodinoProductInfoContainer">
                            <h2 class="bodinoProductName">Product Name: <?php echo $row['bodino_ProductName']?></h2>
                            <h2 class="bodinoProductPrice">Product Price: <?php echo $row['bodino_PriceUnit']?></h2>
                            <button class="bodinoViewProduct">View Product</button>
                        </div>
                    </div>

                    <?php
                    }
                    ?>
                    
    
        </div>
    </div>
</body>
</html>