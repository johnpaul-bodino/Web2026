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
    <style>
        body{
            background-color: goldenrod;
        }
    </style>
</head>
<body>
    <div class="middle-box">
        <h1>Customer Page</h1>
        <table>
            <tr>
                <th><h2>FIRST NAME</h2></th>
                <th><h2>LAST NAME</h2></th>
                <th><h2>EMAIL</h2></th>
                <th><h2>TYPE</h2></th>
                <th><h2>STATUS</h2></th>
            </tr>
            <?php
            include_once('../../config/bodinoConnection.php');
            /** @var mysqli $bodino_conn */ 
            $search_clients = mysqli_query($bodino_conn, 
                            "SELECT * 
                            FROM 
                            `register`
                            ");
            while ($row = mysqli_fetch_assoc($search_clients)) { 
            ?>
                <tr>
                    <td>
                        <h2><?= $row['bodino_Fname'] ?></h2>
                    </td>
                    <td>
                        <h2><?= $row['bodino_Lname'] ?></h2>
                    </td>
                    <td>
                        <h2><?= $row['bodino_Email'] ?></h2>
                    </td>
                    <td>
                        <h2><?= $row['bodino_type'] === '0' ? 'Client' : 'Admin' ?></h2>
                    </td>
                    <td>
                        <?php if ($row['bodino_status'] === '0') { ?>
                            <button 
                                type='button' 
                                name="bodinoApprove" 
                                class="bodinoApprove"
                                onclick="window.location.href='bodinoClientAction.php?user_id=<?= $row['user_id'] ?>'"> 
                                Approve 
                            </button>
                        <?php } else { ?>
                            <h2><?= $row['bodino_isActive'] === '0' ? 'Inactive' : 'Active' ?></h2>
                        <?php } ?>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>