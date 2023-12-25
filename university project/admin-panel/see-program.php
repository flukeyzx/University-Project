<?php 
    include "../connection.php";

    if(isset($_GET['id']) && isset($_GET['tid'])){
        $id = $_GET['id'];
        $tid = $_GET['tid'];
        $sql = "SELECT TP.Title, T.Name FROM TrainingPrograms TP INNER JOIN Trainer T
                ON TP.TrainerID = T.TrainerID
                WHERE TP_ID  = '$id'";
        $result = sqlsrv_query($conn, $sql) or die("Query Failed");
        $row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
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
    <link rel="stylesheet" href="program-view.css">
</head>
</head>
<body>
    <div class="container">
        <?php 
            include "sidebar.php";
        ?>
        <div id="table-section">
            <h1><?php echo  $row['Title'] ?> by <?php echo  $row['Name'] ?></h1>
            <table id="program-table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Department</th>
                    </tr>
                </thead>

                <?php 
                    $query = "SELECT *, Interns.Name IntName FROM Interns_Training_Program INNER JOIN Interns
                              ON Interns_Training_Program.InternID  = Interns.InternID
                              INNER JOIN Department ON Interns.DeptID = Department.DeptID 
                              WHERE TP_ID = '$id' ORDER BY Interns.InternID";
                    $query_result = sqlsrv_query($conn, $query);

                    while($row = sqlsrv_fetch_array($query_result, SQLSRV_FETCH_ASSOC)) {
                ?>

                <tbody>
                    <tr>
                        <td><?php echo $row['InternID'] ?></td>
                        <td><?php echo $row['IntName'] ?></td>
                        <td><?php echo $row['Email'] ?></td>
                        <td><?php echo $row['Phone'] ?></td>
                        <td><?php echo $row['Name'] ?></td>
                    </tr>
                </tbody>

                <?php } ?>
            </table>
        </div>
    </div> 
</body>
</html>       