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
                        if($row > 0) {
                            echo "<h1 id='intern-title'>{$row['Name']} from {$row['Depart']}</h1>";

                            $query2 = "SELECT COUNT(*) AS TotalProjects FROM Interns INNER JOIN I_Projects
                                    ON Interns.InternID = I_Projects.InternID
                                    WHERE I_Projects.InternID = '$id'";
                            $result2 = sqlsrv_query($conn, $query2);
                            $row2 = sqlsrv_fetch_array($result2, SQLSRV_FETCH_ASSOC);
                            echo "<h1 id='intern-title' class='pro-title'>Total Projects : {$row2['TotalProjects']}</h1>"; 
                            
                            $query3 = "SELECT COUNT(*) AS TotalPrograms FROM Interns INNER JOIN Interns_Training_Program
                                    ON Interns.InternID = Interns_Training_Program.InternID
                                    WHERE Interns_Training_Program.InternID = '$id'";
                            $result3 = sqlsrv_query($conn, $query3);
                            $row3 = sqlsrv_fetch_array($result3, SQLSRV_FETCH_ASSOC);
                            echo "<h1 id='intern-title' class='pro-title'>Total Programs : {$row3['TotalPrograms']}</h1>"; 

                            $query4 = "SELECT COUNT(*) AS TotalTrainers FROM Interns INNER JOIN Interns_Trainers
                                    ON Interns.InternID = Interns_Trainers.InternID
                                    WHERE Interns_Trainers.InternID = '$id'";
                            $result4 = sqlsrv_query($conn, $query4);
                            $row4 = sqlsrv_fetch_array($result4, SQLSRV_FETCH_ASSOC);
                            echo "<h1 id='intern-title' class='pro-title'>Total Trainers : {$row4['TotalTrainers']}</h1>"; 

                            $query5 = "SELECT Name FROM Trainer WHERE
                                       TrainerID IN (SELECT TrainerID FROM Interns_trainers WHERE InternID = '$id')";
                            $result5 =  sqlsrv_query($conn, $query5);
                            echo  "<div id='details-section'>";
                            while($row5 = sqlsrv_fetch_array($result5, SQLSRV_FETCH_ASSOC)){
                                
                            }  
                            echo "</div>";        
                        } 

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

