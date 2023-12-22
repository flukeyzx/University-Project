<?php
    include "../connection.php";
    if(isset($_GET['id']) && isset($_GET['name']) && isset($_GET['email']) && isset($_GET['phone']) && isset($_GET['depart']) && isset($_GET['position'])){
        $id =   $_GET['id'];
        $position = $_GET['position'];
        if($position == 'Intern'){
            $url = "http://localhost/Project%20website/university%20project/admin-panel/accept.php?id=$id";
            header("Location: $url");
        } else if($position == 'Trainer'){
            header("Location: accept-trainer.php");
        }
    }
?>