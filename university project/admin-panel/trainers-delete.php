<?php 
    include "../connection.php";
    $id = $_GET['id'];
    $sql = "DELETE FROM Trainer 
            WHERE TrainerID = '$id'";
    $result = sqlsrv_query($conn, $sql) or die("Query Failed");
    if($result) {
        header("Location: trainers.php");
    }

    sqlsrv_close($conn);
?>