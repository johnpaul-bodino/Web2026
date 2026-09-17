<?php
require_once '../../components/bodinoAdminGuard.php';
include_once('../../config/bodinoConnection.php');
/** @var mysqli $bodino_conn */ 
$id= $_GET['user_id'];


$search_client = mysqli_query($bodino_conn, "UPDATE `register`
                            SET 
                            `bodino_status` = 1 
                            WHERE 
                            `user_id` = '$id'
                            ");


if ($search_client){
    echo '<script>alert("Client approved successfully")</script>';
    echo '<script>parent.location.href="../../bodinoMainPage.php"</script>';
}   else{
    echo '<script>alert("Failed to approved successfully")</script>';
}
?>