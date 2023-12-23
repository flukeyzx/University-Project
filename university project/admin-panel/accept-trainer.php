<?php
    include "../connection.php";  
    ob_start();
    $globalId = $_GET['id'];
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "SELECT * FROM Requests WHERE RequestID = $id";
        $query = sqlsrv_query($conn, $sql) or die("Query Failed");
        $row = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC);
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
        <h1>Add Trainer</h1>
        <div class="form-container">
            <form action="<?php echo $_SERVER['PHP_SELF']. '?id='. $globalId ?>" method="post" class="training-form">
                <label>TrainerID</label>
                <input type="text" name="id">
                <p id="error-3">This id is already Taken.</p>
                <input type="hidden" name="globalId" value=" <?php echo $globalId ?>">
                <input type="hidden" name="name" required value="<?php echo $row['Name'] ?>">    
                <input type="hidden" name="email" required value="<?php echo $row['Email'] ?>">
                <input type="hidden" name="phone" required value="<?php echo $row['Phone'] ?>">
                <input type="hidden" name="department" required value="<?php echo $row['Department'] ?>">
                <button type="submit" name="submit">Add Trainer</button>
            </form>
        </div>
    </div>
    <script type="module" src="./scripts/admin.js"></script>
</body>
</html>

<?php 
    if(isset($_POST['submit'])){
        $id = $_POST['id'];
        $globalId = $_POST['globalId'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $dept = $_POST['department'];

        $sql_2 = "SELECT * FROM Trainer WHERE TrainerID = '$id'";
        $result_2 = sqlsrv_query($conn, $sql_2);

        if(sqlsrv_has_rows($result_2)){
            ?> <style>#error-3{ display: block;} </style> <?php
        } else {
            $sql = "INSERT INTO Trainer 
            VALUES ('$id', '$name', '$email', $phone, $dept)";
        
            $result = sqlsrv_query($conn, $sql) or die("Query Failed");
            
            if($result){
                $query = "DELETE FROM Requests WHERE Email = '$email'";
                $delete = sqlsrv_query($conn, $query) or die("Query delete Failed");
                header("Location: ./trainers.php");
            }
         }        
    }
?>

<?php 
    sqlsrv_close($conn);
    ob_end_flush();
?>