<?php 
    include "../connection.php";
    $id = $_GET['id'];
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $query = "SELECT * FROM USERS WHERE Email = '$email'";
        $query_result = sqlsrv_query($conn, $query);

        if(sqlsrv_has_rows($query_result)){
            echo "<script>alert('This Email is already taken.')</script>";
        } else {
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
    }

    sqlsrv_close($conn);
?>