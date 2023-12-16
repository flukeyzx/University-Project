<?php
    session_start();
    if(isset($_SESSION['name'])){
        header("Location: index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&family=Roboto&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/fc5d61735f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/login.css">
    <title>Login Page</title>
</head>
<body>
    <div class="container">
        <input type="checkbox" id="check" aria-hidden="true">

        <div class="sign-up">
            <form action="signup.php" method="post">
                <label for="check" aria-hidden="true">Sign up</label>
                <input type="text" name="text" placeholder="Enter your Name" required>
                <input type="email" name="email" placeholder="Enter your E-mail" required>
                <input type="password" name="password" placeholder="Create your password" required>
                <button name="signup">Sign up</button>
            </form>
        </div>
        <div class="log-in">
            <form action="signup.php" method="post">
                <label for="check" aria-hidden="true">Login</label>
                <input type="email" name="log-email" placeholder="Enter your E-mail" required>
                <input type="password" name="log-password" placeholder="Create your password" required>
                <button name="login">Log in</button>
                <!-- <?php
                    if(!$result) {
                        ?>
                <div class="error">
                    Invalid Username or password    
                </div>
                <?php } ?> -->
            </form>
        </div>
    </div>    

    <?php 
        include 'connection.php';
    ?>
    <?php 
        $role = 2;
        //for sign up
        if(isset($_POST['signup'])) {
            $name = $_POST['text'];
            $email = $_POST['email'];
            $password = md5($_POST['password']);
            $roleId = 2;

            $sql = "USE Test;";
            $sql .= "INSERT INTO Users VALUES ('$name', '$email', '$password', $roleId);";
            $result = sqlsrv_query($conn, $sql) or die("SQL Query Failed.");
        }

        // for login
        if(isset($_POST['login'])) {
            $lEmail = $_POST['log-email'];
            $lPass = md5($_POST['log-password']);
            $sql = "SELECT * FROM Users
            WHERE Email = '$lEmail' AND Password = '$lPass'";
            $result = sqlsrv_query($conn, $sql);
            if ($result == FALSE)
                die(FormatErrors(sqlsrv_errors()));
            if($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)){
                if($row['RoleID'] == 2){
                    session_start();
                    $_SESSION['name'] = $row['Name'];
                    $_SESSION['email'] = $row['Email'];
                    header("Location: index.php");
                }
                if($row['RoleID'] == 1){
                    header("Location: ./admin-panel/admin.php");
                }
                    
            } 
            else 
                echo '<script>alert("Invalid username or password.")</script';
        }
    ?> 

    <?php 
        sqlsrv_close($conn);
    ?>
</body>