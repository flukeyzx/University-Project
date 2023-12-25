<?php
    include "../connection.php";
    if(isset($_GET['id']) && isset($_GET['pid']) && isset($_GET['status'])){
        $id = $_GET['id'];
        $pid = $_GET['pid'];
        $status= $_GET['status'];

        $query = "SELECT TrainerID FROM TrainingPrograms WHERE TP_ID = '$pid'";
        $query_result = sqlsrv_query($conn, $query) or die("Query trainer Failed");
        if($row = sqlsrv_fetch_array($query_result, SQLSRV_FETCH_ASSOC)){
            $trainerId = $row['TrainerID'];
        }

        $error_query = "SELECT * FROM Interns_Training_Program 
                        WHERE TP_ID = '$pid' AND InternID = '$id'";

        $result_error = sqlsrv_query($conn, $error_query);
        
        if(sqlsrv_has_rows($result_error)){
            echo "<h1>This Intern is already assigned</h1>";
        } else {
            $error_2_query = "SELECT * FROM Interns_trainers WHERE TrainerID = '$trainerId' AND InternID = '$id'";
            $error_2_result = sqlsrv_query($conn, $error_2_query);
           
            if(sqlsrv_has_rows($error_2_result) === false){
                $query_2 = "INSERT INTO Interns_trainers VALUES('$trainerId', '$id')";
                $query_2_result = sqlsrv_query($conn, $query_2) or die("Query Insert Failed");
            } 

            $sql = "INSERT INTO Interns_Training_Program
                    VALUES ('$pid', '$id')";
            $result  = sqlsrv_query($conn, $sql) or die("Query Failed"); 

            if($result){
                header("Location: edit-program.php?id={$pid}&status={$status}");
            }
        }
        
    }
?>