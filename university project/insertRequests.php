<?php 
    include "./connection.php";
    if(isset($_POST['submit'])){
        $name = $_POST['username'];
        $email = trim($_POST['userEmail']);
        $phone = $_POST['phone'];
        $department = $_POST['department'];
        $position = $_POST['position'];

        switch($department){
            case 'Computer Science':
                $deptID  = 1;
                break;
            case 'Information Technology':
                $deptID  = 2;
                break;    
            case 'Cyber Security':
                $deptID  = 3;
                break;
            case 'Software Engineering':
                $deptID  = 4;
                break;
            case 'Data Engineering':
                $deptID  = 5;
                break;    
            case 'Machine Learning':
                $deptID  = 6;
                break;
        }

        $sql = "SELECT Email FROM Requests WHERE Email = '$email' OR Phone = $phone";
        $result = sqlsrv_query($conn, $sql);
        $sql2 = "SELECT Email FROM Interns WHERE Email = '$email' OR Phone = $phone";
        $result2 = sqlsrv_query($conn, $sql2);
        $sql3 = "SELECT Email FROM Trainer WHERE Email = '$email' OR Phone = $phone";
        $result3 = sqlsrv_query($conn, $sql3);
        $rows = sqlsrv_has_rows($result);
        $rows2 = sqlsrv_has_rows($result2);
        $rows3 = sqlsrv_has_rows($result3);

        if($rows > 0 || $rows2 > 0 || $rows3 > 0){
            echo '<script>alert("This Email or Phone is already registered")</script>';
        } else {
            $query = "INSERT INTO Requests 
                      VALUES ('$name', '$email', $phone, $deptID, '$position')";
            $result2 = sqlsrv_query($conn, $query) or die("Query Failed"); 
            
            header("Location: index.php");
        }  
    }

    sqlsrv_close($conn);
?>