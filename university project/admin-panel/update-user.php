<?php 
    include "../connection.php";
    $id = $_GET['id'];
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $sql2 = "UPDATE USERS
        SET Name = '$name', 
        Email = '$email', 
        Password = '$password'
        WHERE UserId = $id";

        $result = sqlsrv_query($conn, $sql2) or die("Query failed"); 
        if($result){
            header("Location: admin.php");
        } 
    }
?>