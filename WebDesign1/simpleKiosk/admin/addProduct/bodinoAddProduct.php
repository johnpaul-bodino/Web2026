<?php require_once '../../components/bodinoAdminGuard.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/bodinoAdmin.css">
    <link rel="stylesheet" href="../../css/bodinoStyle.css">
    <style>
        body{
            background-color: goldenrod;
        }
    </style>
    <title>Add Product</title>

</head>
<body>
    <div class="middle-box">
        <form action="bodinoProductAction.php" method="POST" enctype="multipart/form-data">
            <table class="editTable">
                <tr>
                    <td> <label for="bodino_ProductName"> Product Name </label>  </td>
                    <td> <input type="text" id="bodino_ProductName" name ="bodino_ProductName" required value= ""></td>
                </tr>

                <tr>
                    <td> <label for="bodino_Unit"> Unit </label>  </td>
                    <td> <input type="number" id="bodino_Unit" name ="bodino_Unit" required value= ""></td>
                </tr>
                <tr>
                    <td> <label for="bodino_PriceUnit"> Price per Unit </label>  </td>
                    <td> <input type="number" step="0.01" id="bodino_PriceUnit" name ="bodino_PriceUnit" required value= ""></td>
                </tr>
                <tr>
                    <td> <label for="bodino_ImageUrl"> Image URL </label>  </td>
                    <td><input type="file" id="bodino_ImageUrl" name ="bodino_ImageUrl" required></td>
                </tr>
                <tr>
                    <td>
                        <button type='submit' name="bodinoSubmit" class="bodinoSubmit"> Submit </button>
                    </td>
                </tr>
            </table>
        </form>
        
    </div>
</body>
</html>