<?php
    session_start();
    if ($_SESSION['bodino_type'] != 1){
        header("HTTP/1.1 404 Not Found");
        exit();
    }
?>