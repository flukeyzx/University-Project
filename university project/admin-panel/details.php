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

                            $query5 = "SELECT Name FROM Trainer WHERE
                                       TrainerID IN (SELECT TrainerID FROM Interns_trainers WHERE InternID = '$id')";
                            $result5 =  sqlsrv_query($conn, $query5);

                            $query6 = "SELECT Title FROM TrainingPrograms WHERE
                                       TP_ID IN (SELECT TP_ID FROM Interns_Training_Program WHERE InternID ='$id')";
                            $result6 =  sqlsrv_query($conn, $query6);

                            $query7 = "SELECT Title FROM Interns_Projects WHERE
                                       ProjectID IN (SELECT ProjectID FROM I_Projects WHERE InternID ='$id')";
                            $result7 =  sqlsrv_query($conn, $query7);

                            echo  "<div id='details-section'>";

                            if(sqlsrv_has_rows($result5) > 0){
                                echo "<div class='section'>";
                                echo "<h1>Trainers</h1>";
                                while($row5 = sqlsrv_fetch_array($result5, SQLSRV_FETCH_ASSOC)){
                                    echo"<p>{$row5['Name']}</p>";
                                }  
                                echo "</div>"; 
                            }

                            
                            if(sqlsrv_has_rows($result6) > 0){
                                echo "<div class='section'>";
                                echo "<h1>Programs</h1>";
                                while($row6 = sqlsrv_fetch_array($result6, SQLSRV_FETCH_ASSOC)){
                                    echo"<p>{$row6['Title']}</p>";
                                } 
                                echo "</div>"; 
                            }
                            
                            if(sqlsrv_has_rows($result7) > 0){
                                echo "<div class='section'>";
                                echo "<h1>Programs</h1>";
                                while($row7 = sqlsrv_fetch_array($result7, SQLSRV_FETCH_ASSOC)){
                                    echo"<p>{$row7['Title']}</p>";
                                } 
                                echo "</div>";
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

