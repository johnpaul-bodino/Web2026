<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bodinoStyle.css">
    <title>Kiosk</title>
</head>
<frameset rows="18%,*,7%">
    <frameset cols="70%, *">
        <frame noresize src="components/bodinoHeader.html" scrolling="NO">
            <frame noresize src="components/bodinoLoginSignup.php" scrolling="NO">
    </frameset>
    <?php 
    session_start();
    if ($_SESSION['bodino_type'] == 1){
        echo '<frame noresize src="admin/bodinoAdminProduct.php" name="mid_column" scrolling="AUTO">';
    } else{
        echo '<frame noresize src="bodinoProduct.php" name="mid_column" scrolling="AUTO">';
    }
     ?>
    <frame noresize src="components/bodinoFooter.html" scrolling="NO">
</frameset>
</html>