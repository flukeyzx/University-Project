<?php
    include "../connection.php";
    if(isset($_GET['id']) && isset($_GET['status'])){
        $programId = $_GET['id'];
        $status =  $_GET['status'];
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
        <div id="search">

            <form action="edit-program.php?id=<?php echo $programId ?>&status=<?php echo $status ?>" method="post">
                <label for="">Search Intern</label>
                <input type="text" name="name" required <?php if($status == 'Closed'){
                    echo 'disabled';
                } ?>>
                <button type="submit" name="submit">Search</button>
            </form>
            <form action="edit-program.php?id=<?php echo $programId ?>&status=<?php echo $status ?>" method="post">
                <label for="">Status</label>
                <select name="select" id="">
                    <option value="Active" <?php if($status == 'Active') echo 'selected' ?>>Active</option>
                    <option value="Closed" <?php if($status == 'Closed') echo 'selected' ?>>Closed</option>
                </select>
                <button type="submit" class="change" name="change">Change</button>
            </form>    
            

            <div id="section">
            <table>
                <?php
                    if(isset($_POST['submit'])){
                        $search = $_POST['name'];

                        $sql = "SELECT * FROM Interns WHERE InternID = '$search'
                        OR Name LIKE '%$search%'";
                        $result = sqlsrv_query($conn, $sql);

                        if($result){
                            if(sqlsrv_has_rows($result) > 0){
                                echo '<thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                    </tr>
                                </thead>';

                                while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)){

                                echo '<tbody>
                                        <tr>
                                            <td>'. $row['InternID'] .'</td>
                                            <td>'. $row['Name'] .'</td>
                                            <td>'. $row['Email'] .'</td>
                                            <td>'. $row['Phone'] .'</td>
                                            <td><a href="add-intern-program.php?id='.$row['InternID'].'&pid='.$programId.'&status='.$status.'"><button id="add">Add</button></a></td>
                                        </tr>
                                      </tbody>';
                                    }
                                 } else {
                                echo "<h2 id='error'>Data Not Found.</h2>";
                            }


                        }
                    }
                ?>
            </table> 
        </div>      
        </div>
        
    </div>

    
</body>  
</html>  

<?php
    if(isset($_POST['change'])){
        $select = $_POST['select'];
        $status = $select;

        header("Location: programs-view.php?id=$programId&status=$status");
    }
    sqlsrv_close($conn);
?>