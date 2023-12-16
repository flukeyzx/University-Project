<?php
    include "../connection.php";

    $sql = "SELECT * FROM TRAINER";
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
    <div class="table-section">
        <table>
            <h1>Total Interns</h1>
            <thead>
                <tr>
                    <th>
                        Intern Id
                    </th>
                    <th>
                        Name
                    </th>
                    <th>
                        Email
                    </th>
                    <th>
                        Phone
                    </th>
                </tr>
            </thead>
            
            <tbody>
                <?php
                        while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
                ?>
                <tr>
                    <td>
                        <?php echo $row['TrainerID']; ?>
                    </td>
                    <td>
                        <?php echo $row['Name']; ?>
                    </td>
                    <td>
                        <?php echo $row['Email']; ?>
                    </td>
                    <td>
                        <?php echo $row['Phone']; ?>
                    </td> 
                    <td>
                        <button class="btn-1">Update</button>
                        <button class="btn-2">Delete</button>
                    </td>     
                </tr>
                <?php } ?> 
            </tbody>
            
        </table>
    </div>
    </div>
    
</body>
</html>