<?php 
    include "../connection.php";
    $id = $_GET['id'];
    $sql = "DELETE FROM TrainingPrograms 
            WHERE TP_ID = '$id'";
    $result = sqlsrv_query($conn, $sql) or die("Query Failed");
    if($result) {
        header("Location: programs-view.php");
    }

    sqlsrv_close($conn);
?>