<?php 
    include "../connection.php";
    $id = $_GET['id'];

    $sql = "DELETE FROM I_Projects WHERE ProjectID  = '$id';";
    $sql .= "DELETE FROM Interns_Projects 
            WHERE ProjectID = '$id';";
    $result = sqlsrv_query($conn, $sql) or die("Query Failed");
    if($result) {
        header("Location: projects-view.php");
    }

    sqlsrv_close($conn);
?>