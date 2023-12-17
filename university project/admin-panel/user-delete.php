<?php 
    include "../connection.php";
    $id = $_GET['id'];
    $sql = "DELETE FROM USERS 
            WHERE UserID = $id";
    $result = sqlsrv_query($conn, $sql) or die("Query Failed");
    if($result) {
        header("Location: admin.php");
    }

    sqlsrv_close($conn);
?>