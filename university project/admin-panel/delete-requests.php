<?php 
    include "../connection.php";
    $id = $_GET['id'];
    $sql = "DELETE FROM Requests 
            WHERE RequestID = $id";
    $result = sqlsrv_query($conn, $sql) or die("Query Failed");
    if($result) {
        header("Location: requests.php");
    }

    sqlsrv_close($conn);
?>