<?php 
    include "../connection.php";
    $id = $_GET['id'];
    $sql = "DELETE FROM Interns_trainers WHERE InternID = '$id'";
    $sql = "DELETE FROM I_Projects WHERE InternID = '$id'";
    $sql .= "DELETE FROM INTERNS 
            WHERE InternID = '$id'";
    $result = sqlsrv_query($conn, $sql) or die("Query Failed");
    if($result) {
        header("Location: interns.php");
    }

    sqlsrv_close($conn);
?>