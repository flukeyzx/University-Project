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
    <link rel="stylesheet" href="program-view.css">
</head>
</head>
<body>
    <div class="container">
        <?php 
            include "sidebar.php";
        ?>

        <div id="search">
            <form action="details.php" method="post">
                <label for="">Search Intern</label>
                <input type="text" name="name" required />
                <button type="submit" name="submit">Search</button>
            </form>

            <div id="section">
                <?php
                    if(isset($_POST['submit'])){
                        $id = $_POST['name'];

                        $query1 = "SELECT I.Name AS Name, D.Name AS Depart FROM Interns I 
                        INNER JOIN Department D ON I.DeptID = D.DeptID WHERE I.InternID = '$id'";
                        $result1 = sqlsrv_query($conn, $query1) or die("Query failed");
                        $row = sqlsrv_fetch_array($result1, SQLSRV_FETCH_ASSOC);
                        if($row > 0) echo "<h1 id='intern-title'>{$row['Name']} from {$row['Depart']}</h1>";
                        else echo "<h1 id='intern-title'>Id not found.</h1>";
                    }
                ?>
            </div>   
        </div>

           
    </div>
</body>
</html> 

<?php

?>

