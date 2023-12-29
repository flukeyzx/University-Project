<?php
    include "../connection.php";

    $limit = 8;
    
    if(isset($_GET['page'])){
        $page = $_GET['page'];
    } else {
        $page = 1;
    }
    $startRow = ($page - 1) * $limit + 1;
    $endRow = $startRow + $limit - 1;
    
    $sql = "SELECT * FROM (
        SELECT *, ROW_NUMBER() OVER (ORDER BY UserID) AS RowNum
        FROM USERS
     ) AS Sub
     WHERE RowNum BETWEEN $startRow AND $endRow";
    $result = sqlsrv_query($conn, $sql);

    function rowCount($tableName){
        global $conn;
        $sql2 = "SELECT COUNT(*) AS total_rows FROM $tableName";
        $result2 = sqlsrv_query($conn, $sql2);
        $rowCount = sqlsrv_fetch_array($result2, SQLSRV_FETCH_ASSOC);
        $totalRows = $rowCount['total_rows'];
        return $totalRows;
    } 
?>

<!DOCTYPE html>
<html lang="en">
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
<body>
    <div class="container" id="home">
        <?php 
            include "sidebar.php";
        ?>
        <!-- Main Section Start -->
        <section class="main">
            <h1>Dashboard</h1>
            <div id="menu">
                <i class="fa-solid fa-bars"></i>
            </div>
            
            <div class="theme-toggler"> 
                <div class="toggle-button"></div>
            </div>
            <div class="insights">
                <div class="section-1">
                    <i class="fa-solid fa-magnifying-glass-chart"></i>
                    <h4>Total Interns</h4>
                    <h2><?php echo rowCount('INTERNS') ?></h2>
                </div>

                <div class="section-2">
                    <i class="fa-solid fa-user-nurse"></i>
                    <h4>Total Trainers</h4>
                    <h2><?php echo rowCount('TRAINER') ?></h2>
                </div>

                <div class="section-3">
                    <i class="fa-solid fa-user-tie"></i>
                    <h4>Total Users</h4>
                    <h2><?php echo rowCount('USERS') ?></h2>
                </div>

                <div class="section-4">
                    <i class="fa-solid fa-list-check"></i>
                    <h4>Total Projects</h4>
                    <h2><?php echo rowCount('TrainingPrograms') ?></h2>
                </div>

                <div class="section-5">
                    <i class="fa-solid fa-diagram-project"></i>
                    <h4>Total Programs</h4>
                    <h2><?php echo rowCount('Interns_Projects') ?></h2>
                </div>
            </div>
            <?php if(sqlsrv_has_rows($result) > 0) { ?>
            <div class="table-section">
                <table>
                    <h1>Total Users</h1>
                    <thead>
                        <tr>
                            <th>
                               User Id
                            </th>
                            <th>
                                Name
                            </th>
                            <th>
                                Email
                            </th>
                            <th>
                                Password
                            </th>
                        </tr>
                    </thead>
                      
                    <tbody>
                        <?php
                             while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
                        ?>
                        <tr>
                            <td>
                                <?php echo $row['UserID']; ?>
                            </td>
                            <td>
                                <?php echo $row['Name']; ?>
                            </td>
                            <td>
                                <?php echo $row['Email']; ?>
                            </td>
                            <td>
                                <?php echo $row['Password']; ?>
                            </td> 
                            <td>
                                <a href="user-update.php?id= <?php echo $row['UserID'] ?>"><button class="btn-1">Update</button></a>
                                <a href="user-delete.php?id= <?php echo $row['UserID'] ?>"><button class="btn-2">Delete</button></a>
                            </td>     
                        </tr>
                        <?php } ?> 
                    </tbody>
                       
                </table>
                <?php } else echo "<div id='no-data'>Data not found.</div>" ?>                
                <?php 
                    $query = "SELECT COUNT(*) AS TotalRows FROM USERS";
                    $result_query = sqlsrv_query($conn, $query);

                    if($result_query){
                        $rows = sqlsrv_fetch_array($result_query);
                        $totalRecords = $rows['TotalRows'];
                        $totalPages = ceil( $totalRecords / $limit );

                        echo '<ul id="pagination">';
                        if($page > 1){
                            echo '<li><a href="admin.php?page='.($page - 1).'"><i class="fa-solid fa-chevron-left"></i></a</li>';
                        }
                        
                        for($i = 1; $i <= $totalPages; $i++){
                            if($i == $page){
                                $active = "active";
                            } else {
                                $active = "";
                            }
                            echo '<li><a class="'.$active.'" href="admin.php?page='.$i.'">'.$i.'</a</li>';
                        }
                        if($totalPages > $page){
                            echo '<li><a href="admin.php?page='.($page + 1).'"><i class="fa-solid fa-chevron-right"></i></a</li>';
                        }
                        echo ' </ul>';
                        
                    }
                ?>
    
               
            </div>
            
        </section>
        <!-- Main Section End -->

    </div>
    <?php sqlsrv_close($conn); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js" integrity="sha512-GWzVrcGlo0TxTRvz9ttioyYJ+Wwk9Ck0G81D+eO63BaqHaJ3YZX9wuqjwgfcV/MrB2PhaVX9DkYVhbFpStnqpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="module" src="./scripts/admin.js"></script>
</body>
</html>