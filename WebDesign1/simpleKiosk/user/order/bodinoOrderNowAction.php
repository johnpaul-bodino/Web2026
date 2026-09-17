<?php

    include_once('../../config/bodinoConnection.php');
    /** @var mysqli $bodino_conn */ 
    // $product_id = $_GET['product_id'];
    if(isset($_POST['bodinoOrder'])){
        $quantity = $_POST['bodino_Quantity'];
        $total_price = $quantity * $_POST['bodino_Price'];
        $date = date('Y-m-d H:i:s');
        $customer_contact = $_POST['bodino_Number'];
        $item_id = $_POST['bodino_ItemId'];
        $name = $_POST['bodino_Name'];
        $save = '';
        $check_qty = mysqli_query($bodino_conn,
                                  "SELECT 
                                  bodino_Unit 
                                  FROM 
                                  `product` 
                                  WHERE product_id = '$item_id'");
        
        $row = mysqli_fetch_assoc($check_qty);
        $current_stock = $row['bodino_Unit'];
        
        if ($current_stock < $quantity) {
            echo "<script>alert('Cannot proceed! You requested $quantity units, but we only have $current_stock left in stock.');</script>";
            echo "<script>window.location.href='bodinoOrderAction.php?product_id=$item_id';</script>";
        }else{
            $save = mysqli_query($bodino_conn, 
                                "INSERT INTO 
                                `orders`
                                (`order_id`, 
                                `total_price`, 
                                `date_time`, 
                                `customer_contact`, 
                                `item_id`, 
                                `name`)
                                VALUES
                                ('', 
                                '$total_price', 
                                '$date', 
                                '$customer_contact', 
                                '$item_id', 
                                '$name')");
            if($save){
                echo "<script> alert('Please check your information')</script>";
                echo '<script>window.location.href="bodinoOrder.php"</script>';
            }else{
                echo "<script> alert('An error occurred!')</script>";
            };
        };
    }
?>