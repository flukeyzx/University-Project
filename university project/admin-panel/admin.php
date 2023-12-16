<?php
    include "../connection.php";

    $sql = "SELECT * FROM USERS";
    $result = sqlsrv_query($conn, $sql);
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
                    <h2>35</h2>
                </div>

                <div class="section-2">
                    <i class="fa-solid fa-user-nurse"></i>
                    <h4>Total Trainers</h4>
                    <h2>10</h2>
                </div>

                <div class="section-3">
                    <i class="fa-solid fa-user-tie"></i>
                    <h4>Total Employees</h4>
                    <h2>60</h2>
                </div>

                <div class="section-4">
                    <i class="fa-solid fa-list-check"></i>
                    <h4>Total Programs</h4>
                    <h2>10</h2>
                </div>
            </div>
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
                                <button class="btn-1">Update</button>
                                <button class="btn-2">Delete</button>
                            </td>     
                        </tr>
                        <?php } ?> 
                    </tbody>
                       
                </table>
            </div>
            
        </section>
        <!-- Main Section End -->

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js" integrity="sha512-GWzVrcGlo0TxTRvz9ttioyYJ+Wwk9Ck0G81D+eO63BaqHaJ3YZX9wuqjwgfcV/MrB2PhaVX9DkYVhbFpStnqpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="module" src="./scripts/admin.js"></script>
</body>
</html>