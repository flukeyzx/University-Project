<?php 
    include "../connection.php";
    $id = $_GET['id'];
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $sql2 = "UPDATE TRAINER
        SET Name = '$name', 
        Email = '$email', 
        Phone = $phone
        WHERE TrainerId = '$id'";

        $result = sqlsrv_query($conn, $sql2) or die("Query failed"); 
        if($result){
            header("Location: trainers.php");
        } 
    }

    sqlsrv_close($conn);
?>