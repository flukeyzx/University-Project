<?php 
    include "../connection.php";
    $id = $_GET['id'];
    $sql = "DELETE FROM INTERNS 
            WHERE InternID = '$id'";
    $result = sqlsrv_query($conn, $sql) or die("Query Failed");
    if($result) {
        header("Location: interns.php");
    }

    sqlsrv_close($conn);
?>