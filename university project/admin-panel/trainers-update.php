<?php
    include "../connection.php";
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "SELECT * FROM Trainer WHERE TrainerID = '$id'";
        $result = sqlsrv_query($conn, $sql);
        $row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);

        if(isset($_POST['submit'])){
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $sql2 = "UPDATE Trainer
            SET Name = '$name', 
            Email = '$email', 
            Phone = $phone
            WHERE TrainerID = '$id'";
    
            $result = sqlsrv_query($conn, $sql2) or die("Query failed");  
        }
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
        <h1>Update Trainer</h1>
        <div class="form-container">
            <form action="update-trainer.php?id=<?php echo $row['TrainerID'] ?>" method="post" class="training-form">
                <label>TrainerID</label>
                <input type="text" name="id" disabled value="<?php echo $row['TrainerID'] ?>" maxlength="30">
                <label>Name</label>
                <input type="text" name="name" required value="<?php echo $row['Name'] ?>"  maxlength="50">
                <label>Email</label>
                <input type="email" name="email" required value="<?php echo $row['Email'] ?>"  maxlength="50">
                <label>Phone</label>
                <input type="number" name="phone" required value="<?php echo $row['Phone'] ?>" maxlength="16">
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