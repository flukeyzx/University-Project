<?php
    $serverName = "DESKTOP-FUGQNF4";

    $connectionInfo = array( "Database"=>"Test");
    $conn = sqlsrv_connect( $serverName, $connectionInfo);

    if(!$conn){
        echo "Connection Failed";
    } else {
        // echo "Connection Successfully";
    }
?>