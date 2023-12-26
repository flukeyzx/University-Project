<?php
    include "../connection.php";
    if(isset($_GET['id']) && isset($_GET['pid']) && isset($_GET['status'])){
        $id = $_GET['id'];
        $pid = $_GET['pid'];
        $status= $_GET['status'];

        $error_query = "SELECT * FROM I_Projects
                        WHERE ProjectID = '$pid' AND InternID = '$id'";

        $result_error = sqlsrv_query($conn, $error_query);
        
        if(sqlsrv_has_rows($result_error)){
            echo "<h1>This Intern is already assigned</h1>";
        } else {
            $sql = "INSERT INTO I_Projects
                    VALUES ('$id', '$pid')";
            $result  = sqlsrv_query($conn, $sql) or die("Query Failed"); 

            if($result){
                header("Location: edit-project.php?id={$pid}&status={$status}");
            }
        }
        
    }
?>