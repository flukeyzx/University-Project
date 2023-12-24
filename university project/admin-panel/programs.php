<?php
    include "../connection.php";
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
        <h1>Create Training Program</h1>
        <div class="form-container">
            <form action="programs.php" method="post" class="training-form">
                <label>ID</label>
                <input type="text" name="id" required>
                <p id="error-2">This Id is already Taken.</p>
                <label>Title</label>
                <input type="text" name="title" required>
                <label>Trainer</label>
                <input type="text" name="trainer" required>
                <label>Status</label>
                <select name="status">
                    <option>Active</option>
                    <option>Closed</option>
                </select>
                <label>Start Date</label>
                <input type="date" name="start" class="start" required>
                <label>End Date</label>
                <input type="date" name="end" class="end" required>

                <button type="submit" name="submit">Create</button>
            </form>
        </div>
        <a href="programs-view.php"><button class="view-btn">View programs</button></a>
    </div> 
    
</body>
</html>

<?php
    if(isset($_POST['submit'])){
        $id = $_POST['id'];
        $title = $_POST['title'];
        $trainerId = $_POST['trainer'];
        $status = $_POST['status'];
        $startDate = $_POST['start'];
        $endDate = $_POST['end'];

        $sql = "SELECT * FROM TrainingPrograms WHERE TP_ID = '$id'";
        $result = sqlsrv_query($conn, $sql);

        if(sqlsrv_has_rows($result)){
            ?> <style>#error-2{ display: block;} </style> <?php
        } else {
            $query = "INSERT INTO TrainingPrograms
                      VALUES ('$id', '$title', '$startDate', '$endDate', '$trainerId', '$status')";
            $stmt = sqlsrv_query($conn, $query);
        }
    }

    sqlsrv_close($conn);
?>