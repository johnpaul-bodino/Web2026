<?php
include_once('../../config/bodinoConnection.php');
/** @var mysqli $bodino_conn */ 
//search from orders
$search = mysqli_query($bodino_conn, "SELECT * FROM `orders` ORDER by `order_id` DESC");
$record = mysqli_fetch_assoc($search);
$order_id1 = $record['order_id'];
$item_id = $record['item_id'];
$item_price = $record['total_price'];
$contact = $record['customer_contact'];
$name = $record['name'];

//search from product
$search_item = mysqli_query($bodino_conn, "SELECT * FROM `product` WHERE `product_id` = '$item_id'");
$records2 = mysqli_fetch_assoc($search_item);
$img = $records2['bodino_ImageUrl'];
$price_unit = $records2['bodino_PriceUnit'];
$unit = $records2['bodino_Unit'];

$qty = $item_price / $price_unit;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kiosk</title>
    <link rel="stylesheet" href="../../css/bodinoStyle.css">
    <link rel="stylesheet" href="../../css/bodinoCustomer.css">
    <link rel="stylesheet" href="../../css/bodinoPayment.css">
    <style>
        body{
            background-color: goldenrod;
        }
    </style>
</head>
<body>
    <form action="bodinoOrder.php" method="POST" id="bodinoOrderForm">
        <div class="middle-box">
            <h1>Your Order</h1>
            <div class="orderInfo">
                <div class="imageContainer">
                    <div class="image-container">
                        <img src="../../asset/<?= $img; ?>">
                    </div>
                </div>
                <table class="customerTableorder">
                    <tr>
                        <td> <label for="bodinoQuantity"> <h2>QUANTITY</h2> </label> </td>
                        <td> <input type="number" name="bodinoQuantity" id="bodinoQuantity" value="<?= $qty; ?>" readonly> </td>
                    </tr>

                    <tr>
                        <td> <label for="bodinoPrice"> <h2>PRICE</h2> </label> </td>
                        <td> <input type="number" name="bodinoPrice" id="bodinoPrice" value="<?= $price_unit; ?>" readonly> </td>
                    </tr>
                    <tr>
                        <td> <label for="bodinoName"> <h2>NAME OF BUYER</h2> </label> </td>
                        <td> <input type="text" name="bodinoName" id="bodinoName" value="<?= $name; ?>" readonly> </td>
                    </tr>
                    <tr>
                        <td> <label for="bodinoNumber"> <h2>MOBILE NUMBER </h2></label> </td>
                        <td> <input type="text" name="bodinoNumber" id="bodinoNumber" value="<?= $contact; ?>" readonly> </td>
                    </tr>
                    <tr>
                        <td>
                            <button type="button" id="bodinoOpenModal" class="bodinoSubmit"> SUBMIT </button>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    
        <input type="hidden" name="bodinoPaymentMethod" id="bodinoHiddenPaymentMethod">
        <input type="hidden" name="bodinoTendered" id="bodinoHiddenTendered">
        <input type="hidden" name="bodinoChange" id="bodinoHiddenChange">
        <button type="submit" name="bodinoSubmit" id="bodinoRealSubmit" style="display:none;"></button>
    </form>

    <div class="bodinoModalOverlay" id="bodinoModalOverlay">
        <div class="bodinoModalBox">
            <h1>Confirm Your Order</h1>

            <table>
                <tr>
                    <td class="label">Total Amount</td>
                    <td class="value">₱<?= number_format($item_price, 2); ?></td>
                </tr>
            </table>

            <div class="bodinoPaymentOptions">
                <label>
                    <input type="radio" name="bodinoPaymentMethod" value="cash" checked>
                    Cash
                </label>
                <label>
                    <input type="radio" name="bodinoPaymentMethod" value="gcash">
                    GCash
                </label>
            </div>

            <div class="bodinoTenderedRow show" id="bodinoTenderedRow">
                <label for="bodinoTendered">Enter Amount</label>
                <input type="number" id="bodinoTendered" step="0.01" min="0" placeholder="Enter cash amount">
            </div>

            <p class="bodinoErrorMsg" id="bodinoErrorMsg">Insufficient Amount.</p>

            <div class="bodinoChangeRow" id="bodinoChangeRow">
                Change: ₱0.00
            </div>

            <button type="button" class="bodinoConfirmB" id="bodinoConfirmOrder">CONFIRM</button>
            <button type="button" class="bodinoCancelB" id="bodinoCancelOrder">CANCEL</button>
        </div>
    </div>

    <script>
        const overlay = document.getElementById('bodinoModalOverlay');
        const totalAmount = <?= $item_price; ?>;
        const tenderedRow = document.getElementById('bodinoTenderedRow');
        const tenderedInput = document.getElementById('bodinoTendered');
        const changeRow = document.getElementById('bodinoChangeRow');
        const errorMsg = document.getElementById('bodinoErrorMsg');
        const paymentRadios = document.querySelectorAll('input[name="bodinoPaymentMethod"]');

        function updateChange(){
            const tendered = parseFloat(tenderedInput.value) || 0;
            const change = tendered - totalAmount;
            changeRow.textContent = "Change: ₱" + (change > 0 ? change.toFixed(2) : "0.00");
        }

        function togglePaymentFields(){
            const selected = document.querySelector('input[name="bodinoPaymentMethod"]:checked').value;
            if (selected === "cash"){
                tenderedRow.classList.add('show');
                changeRow.style.display = "block";
            } else {
                tenderedRow.classList.remove('show');
                changeRow.style.display = "none";
            }
            errorMsg.style.display = "none";
        }

        paymentRadios.forEach(radio => radio.addEventListener('change', togglePaymentFields));
        tenderedInput.addEventListener('input', updateChange);

        document.getElementById('bodinoOpenModal').addEventListener('click', function(){
            overlay.classList.add('active');
            togglePaymentFields();
            updateChange();
        });

        document.getElementById('bodinoCancelOrder').addEventListener('click', function(){
            overlay.classList.remove('active');
        });

        document.getElementById('bodinoConfirmOrder').addEventListener('click', function(){
            const selected = document.querySelector('input[name="bodinoPaymentMethod"]:checked').value;

            if (selected === "cash"){
                const tendered = parseFloat(tenderedInput.value) || 0;
                if (tendered < totalAmount){
                    errorMsg.style.display = "block";
                    return;
                }
                document.getElementById('bodinoHiddenTendered').value = tendered;
                document.getElementById('bodinoHiddenChange').value = (tendered - totalAmount).toFixed(2);
            } else {
                document.getElementById('bodinoHiddenTendered').value = "";
                document.getElementById('bodinoHiddenChange').value = "";
            }

            document.getElementById('bodinoHiddenPaymentMethod').value = selected;
            document.getElementById('bodinoRealSubmit').click();
        });
    </script>

    <?php
        if (isset($_POST['bodinoSubmit'])) {
            $order_id = $order_id1;
            $product_id = $item_id;
            $quantity = $_POST['bodinoQuantity'];
            $price = $_POST['bodinoPrice'];
            $new_qty = $unit - $qty;

           
            $payment_method = $_POST['bodinoPaymentMethod'];
            $tendered = $_POST['bodinoTendered'];
            $change = $_POST['bodinoChange'];

            $update = mysqli_query($bodino_conn,
                      "UPDATE product
                      SET `bodino_Unit` = '$new_qty'
                      WHERE `product_id` = '$item_id' ");

            $save = mysqli_query($bodino_conn, "INSERT INTO `order_item`(`order_item_id`
                , `order_id`, `product_id`, `quantity`, `price`) VALUES('', '$order_id'
                , '$product_id', '$qty', '$price')");

            if ($save) {
                echo "<script> alert('You have successfully ordered!')</script>";
                echo '<script>parent.location.href="../../bodinoMainPage.php"</script>';
            } else {
                echo "<script> alert('An error occurred!')</script>";
            }
        }
    ?>
</body>
</html>