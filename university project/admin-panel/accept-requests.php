<?php
    include "../connection.php";

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "SELECT * FROM Requests WHERE RequestID = '$id'";
        echo "row['name']";
        $result = sqlsrv_query($conn, $sql);
        $row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);

        if(trim($row['Position']) === 'Intern'){
            echo "hi";
            $userId = $_POST['userId'];               
            $name = $row['Name'];   
            $email = $row['Email'];
            $phone = $row['Phone'];
            $dept = $row['Department'];
            $sql2 = "INSERT INTO INTERNS (InternID, Name, Email, Phone, Department)
            VALUES('$userId', '$name', '$email', $phone, $dept)";    
            $query = sqlsrv_query($conn, $sql2) or die("Query failed");
        }
    }
    sqlsrv_close($conn);
?>