<?php 
    include "../connection.php";
    $id = $_GET['id'];
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $sql2 = "UPDATE INTERNS
        SET Name = '$name', 
        Email = '$email', 
        Phone = $phone
        WHERE InternId = '$id'";

        $result = sqlsrv_query($conn, $sql2) or die("Query failed"); 
        if($result){
            header("Location: interns.php");
        } 
    }

    sqlsrv_close($conn);
?>