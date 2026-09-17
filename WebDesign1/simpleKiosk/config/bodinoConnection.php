<?php 
$bodino_conn = mysqli_connect("localhost","root","","bodino_kiosk")or die("connection failed");

if(!$bodino_conn){
    die("Error in connection:" . mysqli_connect_error());
}

function search_for($bodino_conn, $search_query) {
        $query = "SELECT *
                FROM product
                WHERE bodino_ProductName
                LIKE '%". $bodino_conn->real_escape_string($search_query) ."%'";
     
    return mysqli_query($bodino_conn, $query);

}

   

?>