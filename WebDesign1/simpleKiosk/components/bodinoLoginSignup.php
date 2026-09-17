<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bodinoStyle.css">
    <link rel="stylesheet" href="../css/bodinoAdmin.css">
    <link rel="stylesheet" href="../css/bodinoCustomer.css">
    <title>Right Header</title>
    <style>
        body{
            background-color: lightsalmon;
        }
        .bodinoAddProduct {
            background-color:red; 
            border-color:green;
            color: white; 
            font-size:15px;
            width:130px; 
            height:30px;
            margin-left: 10px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <?php
    session_start();
    if(isset($_SESSION['bodino_login']) == true) {
        if ($_SESSION['bodino_type'] == 1) { //if admin
            echo '<a href="../admin/clientsApprove/bodinoClients.php" target="mid_column"><button type="submit" name="bodinoViewClient" class="bodinoViewClient"> View Customer </button></a>';
            echo '<a href="../admin/bodinoAdminProduct.php" target="mid_column"><button type="submit" name="bodinoViewProduct" class="bodinoViewProduct"> View Products </button></a>';
            echo '<a href="../admin/addProduct/bodinoAddProduct.php" target="mid_column"><button type="submit" name="bodinoAddProduct" class="bodinoAddProduct"> Add Product </button></a>';
        }
        echo '<a href="bodinoLogout.php" target="mid_column"><button type="submit" name="bodinoLogout" class="bodinoLogout"> Logout </button></a>';
     }else{
        echo '<a href="../user/register/bodinoRegister.php" target="mid_column"><button type="submit" name="bodinoRegister" class="bodinoRegister"> Register </button></a>
                <a href="../bodinoLogin.php" target="mid_column"><button type="submit" name="bodinoLogin" class="bodinoLogin"> Login </button></a>';
     }
    ?>
</body>
</html>