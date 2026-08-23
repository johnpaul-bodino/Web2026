<?php 
$bodino_conn = mysqli_connect("localhost","root","","bodino_kiosk")or die("connection failed");

if(!$bodino_conn){
    die("Error in connection:" . mysqli_connect_error());
}
?>