<?php
    include "../connection.php";
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "SELECT * FROM INTERNS WHERE InternID = '$id'";
        $result = sqlsrv_query($conn, $sql);
        $row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);

        if(isset($_POST['submit'])){
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $sql2 = "UPDATE INTERNS
            SET Name = '$name', 
            Email = '$email', 
            Phone = $phone
            WHERE InternID = '$id'";
    
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
        <h1>Update Intern</h1>
        <div class="form-container">
            <form action="update-intern.php?id=<?php echo $row['InternID'] ?>" method="post" class="training-form">
                <label>InternID</label>
                <input type="text" name="id" disabled value="<?php echo $row['InternID'] ?>">
                <label>Name</label>
                <input type="text" name="name" required value="<?php echo $row['Name'] ?>">
                <label>Email</label>
                <input type="email" name="email" required value="<?php echo $row['Email'] ?>" >
                <label>Phone</label>
                <input type="tel" name="phone" required value="<?php echo $row['Phone'] ?>">
                <!-- <label>Department</label>
                <input type="text" name="phone" required value="<?php echo $row['department'] ?>"> -->
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