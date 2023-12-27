<?php 
    include "../connection.php";
    $id = $_GET['id'];

    $sql2 = "SELECT TP_ID FROM TrainingPrograms WHERE TrainerID = '$id'";
    $result2 = sqlsrv_query($conn, $sql2);;

    while($row = sqlsrv_fetch_array($result2, SQLSRV_FETCH_ASSOC)){
        $tpid = $row['TP_ID'];
        $query = "DELETE FROM Interns_Training_program WHERE TP_ID = '$tpid';";
        $query .= "DELETE FROM TrainingPrograms WHERE TP_ID = '$tpid';";
        $result3 = sqlsrv_query($conn, $query);
    }

    
    $sql = "DELETE FROM Interns_trainers WHERE TrainerID = '$id';";
    $sql .= "DELETE FROM Trainer 
            WHERE TrainerID = '$id'";
    $result = sqlsrv_query($conn, $sql) or die("Query Failed");
    if($result) {
        header("Location: trainers.php");
    }

    sqlsrv_close($conn);
?>