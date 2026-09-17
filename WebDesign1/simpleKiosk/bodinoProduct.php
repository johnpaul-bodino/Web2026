<?php
include_once("config/bodinoConnection.php");
/** @var mysqli $bodino_conn */ 
$get_products = mysqli_query($bodino_conn, "SELECT * FROM product");
$num_of_result = mysqli_num_rows($get_products);
session_start();

$search_query = '';

if (isset($_GET['search']) && !empty(trim(($_GET['search']))) ){
    $search_input = $_GET['search'];
    $search_query = htmlspecialchars($search_input);
    $get_products = search_for($bodino_conn, $search_query);
    $num_of_result = mysqli_num_rows($get_products);
}

?>
<script>
    function isLogin(id){
        let checkLogin = "<?= isset($_SESSION['bodino_login']) ? $_SESSION['bodino_login'] : ''?>";
        if(checkLogin == true){
            window.location.href=`user/order/bodinoOrderAction.php?product_id= ${id}`;
        }else{
            window.location.href='bodinoLogin.php';
        }
    };
</script>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bodinoStyle.css">
    <style>
        body{
            background-color: goldenrod;
        }
        .results{
            text-align: center;
            font-size: 2rem;
        }
    </style>
    <title>Pet Accessories</title>
</head>
<body>
    <div class="nothernav">
        <div class="topnav">
            <div class="search-container">
                <form action="" method="GET">
                <input type="text" placeholder="Search.." name="search" value="<?= $search_query ?>">
                <button type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <div class="middle-box">
        <h1>AVAILABLE PRODUCTS</h1>
        <div class="container-flex">
            <div class="container">
                <?php
                if($num_of_result != 0):
                    while ($row = mysqli_fetch_assoc($get_products)) 
                        { ?>
                        <div class="containers">
                            <div class="image-container">
                                <img src="asset/<?php echo $row['bodino_ImageUrl']?>" class="bodinoProductImg">
                            <?php if($row['bodino_Unit'] == 0):?>
                                <div class="product-stock">
                                   <p class="stock-p">Out of Stock</p>
                                </div>
                            <?php endif ?>
                            </div>
                            <div class="bodinoInfoContainer">
                                <h2 class="bodinoLblInline">Product Name: </h2>
                                <p><?php echo $row['bodino_ProductName']?></p>
                                <h2 class="bodinoLblInline">Product Price:  </h2>
                                <p> ₱<?php echo $row['bodino_PriceUnit']?></p>
                            </div>
                            <button 
                                type='button' 
                                name="bodinoView" 
                                class="bodinoView"
                                onclick="isLogin(<?= $row['product_id'] ?>)"> View Product 
                            </button>
                        </div>
                        <?php
                        }
                else:
                        ?>
            </div>
        </div>
        <h2 class="results"> NO RESULT </h2>
                <?php
                endif
                ?>
    </div>
</body>
</html>