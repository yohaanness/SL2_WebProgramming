<?php
    $server = "localhost";
    $db_username = "root";
    $db_password = "";
    $db_name = "apkpengelolakeuangansl2";

    // Create connection
    $connection = new mysqli($server, $db_username, $db_password, $db_name);

    // Check connection
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

?>