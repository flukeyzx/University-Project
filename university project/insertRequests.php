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
        $rows = sqlsrv_has_rows($result);

        if($rows > 0){
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