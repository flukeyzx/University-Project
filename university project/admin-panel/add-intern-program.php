<?php
    include "../connection.php";
    if(isset($_GET['id']) && isset($_GET['pid'])){
        $id = $_GET['id'];
        $pid = $_GET['pid'];

        $error_query = "SELECT * FROM Interns_Training_Program 
                        WHERE TP_ID = '$pid' AND InternID = '$id'";

        $result_error = sqlsrv_query($conn, $error_query);
        
        if(sqlsrv_has_rows($result_error)){
            echo "<h1>This Intern is already assigned</h1>";
        } else {
            $sql = "INSERT INTO Interns_Training_Program
                    VALUES ('$pid', '$id')";
            $result  = sqlsrv_query($conn, $sql) or die("Query Failed"); 

            if($result){
                header("Location: edit-program.php");
            }
        }
        
    }
?>