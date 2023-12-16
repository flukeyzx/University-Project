<?php 
    session_start();
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&family=Roboto&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/fc5d61735f.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link
      href="https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container left-section">
            <div class="logo mt-2">
                <span class="logo-1">info</span><span class="logo-2">Tech.</span></span>
            </div>
            
            
            <button 
                class="navbar-toggler" type="button"
                data-bs-toggle="collapse"
                data-bs-target = "#navmenu"
            >
                <i class="fa-solid fa-bars"></i>
            </button>        
            <div class="collapse navbar-collapse right-section text-center" id="navmenu">
                <ul class="navbar-nav ms-auto h5 mt-2 align-middle" >
                    <li class="nav-item mt-2"><a href="#learn" class="nav-link">Explore</a></li>
                    <li class="nav-item mt-2"><a href="#faq" class="nav-link">FAQ's</a></li>
                    <li class="nav-item mt-2"><a href="#contact" class="nav-link">Contact</a></li>
                    <?php 
                        if(isset($_SESSION['name']) && isset($_SESSION['email'])){
                            echo "<li class='nav-item align-top'><a href='logout.php' class='nav-link'><button class='btn btn-info'>Logout</button></a></li>";
                        } else {
                            echo "<li class='nav-item align-top'><a href='signup.php' class='nav-link'><button class='btn btn-outline-info'>Login</button></a></li>";
                        }
                    ?>
                    
                </ul>
            </div>    
        </div>
    </nav>