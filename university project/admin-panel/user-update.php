<?php
    include "../connection.php";
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "SELECT * FROM USERS WHERE UserID = $id";
        $result = sqlsrv_query($conn, $sql);
        $row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);

        // if(isset($_POST['submit'])){
        //     $name = $_POST['name'];
        //     $email = trim($_POST['email']);
        //     $password = $_POST['password'];

            
        //         $sql2 = "UPDATE USERS
        //         SET Name = '$name', 
        //         Email = '$email', 
        //         Password = '$password'
        //         WHERE UserId = $id";
        
        //         $result = sqlsrv_query($conn, $sql2) or die("Query failed"); 
        //     }
             
        // }
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Agbalumo&family=Gabarito&family=Hedvig+Letters+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="admin.css">
</head>
</head>
<body>
    <div class="container">
    <?php 
        include "sidebar.php";
    ?>
    <div class="training-section">
        <h1>Update User</h1>
        <div class="form-container">
            <form action="update-user.php?id=<?php echo $row['UserID'] ?>" method="post" class="training-form">
                <label>UserID</label>
                <input type="number" name="id" disabled value="<?php echo $row['UserID'] ?>">
                <label>Name</label>
                <input type="text" name="name" required value="<?php echo $row['Name'] ?>">
                <label>Email</label>
                <input type="email" name="email" required value="<?php echo $row['Email'] ?>" >
                <p id="error-3">This Email is already taken.</p>
                <label>Password</label>
                <input type="text" name="password" required value="<?php echo $row['Password'] ?>">
                <button type="submit" name="submit">Update</button>
            </form>
        </div>
    </div>
    <script type="module" src="./scripts/admin.js"></script>
</body>
</html>

<?php 
    sqlsrv_close($conn);
?>