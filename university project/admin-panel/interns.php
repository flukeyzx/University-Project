<?php
    include "../connection.php";

    $limit = 12;
    
    if(isset($_GET['page'])){
        $page = $_GET['page'];
    } else {
        $page = 1;
    }
    $startRow = ($page - 1) * $limit + 1;
    $endRow = $startRow + $limit - 1;
    
    $sql = "SELECT * FROM (
        SELECT *, ROW_NUMBER() OVER (ORDER BY InternID) AS RowNum
        FROM INTERNS
     ) AS Sub
     WHERE RowNum BETWEEN $startRow AND $endRow";
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
        <?php if(sqlsrv_has_rows($result) > 0) { ?>
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
                            <?php echo $row['InternID']; ?>
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
                            <a href="interns-update.php?id=<?php echo $row['InternID'] ?>"><button class="btn-1">Update</button></a>
                            <a href="interns-delete.php?id=<?php echo $row['InternID'] ?>"><button class="btn-2">Delete</button></a>
                        </td>     
                    </tr>
                    <?php } ?> 
                </tbody>
                
            </table>
            <?php } else echo "<div id='no-data'>Data not found.</div>" ?> 
            <?php 
                    $query = "SELECT COUNT(*) AS TotalRows FROM Interns";
                    $result_query = sqlsrv_query($conn, $query);

                    if($result_query){
                        $rows = sqlsrv_fetch_array($result_query);
                        $totalRecords = $rows['TotalRows'];
                        $totalPages = ceil( $totalRecords / $limit );

                        echo '<ul id="pagination">';
                        if($page > 1){
                            echo '<li><a href="interns.php?page='.($page - 1).'"><i class="fa-solid fa-chevron-left"></i></a</li>';
                        }
                        
                        for($i = 1; $i <= $totalPages; $i++){
                            if($i == $page){
                                $active = "active";
                            } else {
                                $active = "";
                            }
                            echo '<li><a class="'.$active.'" href="interns.php?page='.$i.'">'.$i.'</a</li>';
                        }
                        if($totalPages > $page){
                            echo '<li><a href="interns.php?page='.($page + 1).'"><i class="fa-solid fa-chevron-right"></i></a</li>';
                        }
                        echo ' </ul>';
                        
                    }
                ?>
        </div>
        <a href="interns-add.php" id="add"><i class="fa-solid fa-plus"></i></a>
    </div>
    <script type="module" src="./scripts/admin.js"></script>
</body>
</html>