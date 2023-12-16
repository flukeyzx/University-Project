<?php
    include "../connection.php";

    $sql = "SELECT * FROM INTERNS";
    $result = sqlsrv_query($conn, $sql);
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
        <h1>Create Project</h1>
        <div class="form-container">
            <form action="" method="" class="training-form">
                <label>Name</label>
                <input type="text" name="name" required>
                <label>Description</label>
                <textarea cols="40" rows="6"></textarea>
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
        <button class="view-btn">View projects</button>
    </div> 
    
</body>
</html>