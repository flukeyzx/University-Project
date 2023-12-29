<?php 
    include "../connection.php";

    if(isset($_GET['id']) && isset($_GET['status'])){
        $id = $_GET['id'];
        $status = $_GET['status'];

        $query = "UPDATE Interns_Projects SET Status = '$status' WHERE ProjectID = '$id'";
        $query_result = sqlsrv_query($conn, $query) or die("Update Failed");
    }

    $sql = "SELECT * FROM Interns_Projects";
    $result = sqlsrv_query($conn, $sql) or die("Query Failed");

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
        <?php if(sqlsrv_has_rows($result) > 0) { ?>
        <div id="wrapper">
            <?php
                while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            ?>
                <div class="section">
                    <a href="see-project.php?id=<?php echo $row['ProjectID'] ?>"><i class="fa-regular fa-pen-to-square"></i></a>
                    <a href="delete-project.php?id=<?php echo $row['ProjectID'] ?>"><i class="fa-regular fa-trash-can"></i></a>
                    <p><?php echo $row['ProjectID'] ?></p>
                    <h1> <?php echo $row['Title'] ?></h1>
                    <span>From <strong><?php echo $row['StartDate']-> format('d-m-Y') ?></strong> to <strong><?php echo $row['EndDate']-> format('d-m-Y') ?></strong></span>
                    <p>Status: <text class="<?php if($row['Status'] == 'Active'){
                        echo 'active';
                    } else {
                        echo 'closed';
                    }
                    ?>"><?php echo $row['Status'] ?></text></p>
                    <a href="edit-project.php?id=<?php echo $row['ProjectID']?>&status=<?php echo $row['Status'] ?>"><button id="button" type="submit" name="submit" >Edit</button></a>
                </div>
                </a>
            <?php
                }  
            ?>
        </div>
        <?php } else echo "<div id='no-data'>Data not found.</div>" ?> 
    </div>  
</body>
</html>