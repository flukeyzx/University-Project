<?php
    include "../connection.php";  
    ob_start();
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
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" class="training-form">
                <label>TrainerID</label>
                <input type="text" name="id"  maxlength="30">
                <p id="error-2">This Id is already taken.</p>
                <label>Name</label>
                <input type="text" name="name" required maxlength="50">
                <label>Email</label>
                <input type="email" name="email" required maxlength="50">
                <p id="error-3">This Email is already taken.</p>
                <label>Phone</label>
                <input type="number" name="phone" required maxlength="16">
                <p id="error-4">This Phone is already taken.</p>
                <label for="department">Department</label>
                <select name="department" id="department">
                    <option selected disabled>Select Department</option>
                    <option>Computer Science</option>
                    <option>Information Technology</option>
                    <option>Cyber Security</option>
                    <option>Software Engineering</option>
                    <option>Data Science</option>
                    <option>Machine Learning</option>
                </select>
                <button type="submit" name="submit">Add Intern</button>
            </form>
        </div>
    </div>
    <script type="module" src="./scripts/admin.js"></script>
</body>
</html>

<?php 
    if(isset($_POST['submit'])){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $dept = $_POST['department'];

        switch($dept){
            case 'Computer Science':
                $deptID  = 1;
                break;
            case 'Information Technology':
                $deptID  = 2;
                break;    
            case 'Cyber Security':
                $deptID  = 3;
                break;
            case 'Software Engineering':
                $deptID  = 4;
                break;
            case 'Data Science':
                $deptID  = 5;
                break;    
            case 'Machine Learning':
                $deptID  = 6;
                break;
        }
            
        $query = "SELECT * FROM Trainer WHERE email = '$email'"; 
        $query_result = sqlsrv_query($conn, $query);
        $query_2 = "SELECT * FROM Trainer WHERE TrainerID = '$id';";
        $query_2_result = sqlsrv_query($conn, $query_2);
        $query_3 = "SELECT * FROM Trainer WHERE Phone = $phone";
        $query_3_result = sqlsrv_query($conn, $query_3);

        if(sqlsrv_has_rows($query_2_result)){
            ?> <style>#error-2{ display: block;} </style> <?php
        } else if(sqlsrv_has_rows($query_result)){
            ?> <style>#error-3{ display: block;} </style> <?php
        } else if(sqlsrv_has_rows($query_3_result)){
            ?> <style>#error-4{ display: block;} </style> <?php
        } else {
            $sql = "INSERT INTO Trainer 
            VALUES ('$id', '$name', '$email', $phone, $deptID)";
           
            $result = sqlsrv_query($conn, $sql) or die("Query Failed");
            
            if($result){
                header("Location: ./trainers.php");
            }
        }
    }
?>

<?php 
    sqlsrv_close($conn);
    ob_end_flush();
?>