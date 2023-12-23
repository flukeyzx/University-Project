<?php 
    ob_start();
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
    <?php include "header.php" ?>

    <!-- Section -->
    <section class="bg-dark text-light p-5  text-center text-sm-start" id="home">
      <div class="container">
        <div class="d-sm-flex align-items-center justify-content-between">
          <div>
            <h1>Become a <span class="text-info"> Software Engineer </span></h1>
            <p class="lead my-4">
              We focus on teaching our students the fundamentals of the latest
              and greatest technologies to prepare them for their first development role.
            </p>
            <button
              class="btn btn-info btn-lg"
              data-bs-toggle="modal"
              data-bs-target="#enroll"
              onclick="<?php if(!isset($_SESSION['name'])){
                header("Location: signup.php");
              } ?>"
            >
            Start The Enrollment
            </button>
          </div>
          <img
            class="img-fluid w-50 d-none d-sm-block"
            src="images/showcase.svg"
            alt=""
          />
        </div>
      </div>
    </section>
    
    <!-- Partnered section -->
    <section  class="bg-light py-2">
        <div class="container py-3">
            <h2 class="text-dark text-center pb-4">Partnered With</h2>
            <div class="d-flex justify-content-between align-items-center pb-5">
                <svg xmlns="http://www.w3.org/2000/svg" min-width="60" height="80" fill="currentColor" class="bi bi-microsoft" viewBox="0 0 16 16">
                    <path d="M7.462 0H0v7.19h7.462zM16 0H8.538v7.19H16zM7.462 8.211H0V16h7.462zm8.538 0H8.538V16H16z"/>
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" min-width="60" height="80" fill="currentColor" class="bi bi-meta" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M8.217 5.243C9.145 3.988 10.171 3 11.483 3 13.96 3 16 6.153 16.001 9.907c0 2.29-.986 3.725-2.757 3.725-1.543 0-2.395-.866-3.924-3.424l-.667-1.123-.118-.197a54.944 54.944 0 0 0-.53-.877l-1.178 2.08c-1.673 2.925-2.615 3.541-3.923 3.541C1.086 13.632 0 12.217 0 9.973 0 6.388 1.995 3 4.598 3c.319 0 .625.039.924.122.31.086.611.22.913.407.577.359 1.154.915 1.782 1.714m1.516 2.224c-.252-.41-.494-.787-.727-1.133L9 6.326c.845-1.305 1.543-1.954 2.372-1.954 1.723 0 3.102 2.537 3.102 5.653 0 1.188-.39 1.877-1.195 1.877-.773 0-1.142-.51-2.61-2.87l-.937-1.565ZM4.846 4.756c.725.1 1.385.634 2.34 2.001A212.13 212.13 0 0 0 5.551 9.3c-1.357 2.126-1.826 2.603-2.581 2.603-.777 0-1.24-.682-1.24-1.9 0-2.602 1.298-5.264 2.846-5.264.091 0 .181.006.27.018Z"/>
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" min-width="60" height="80" fill="currentColor" class="bi bi-google" viewBox="0 0 16 16">
                    <path d="M15.545 6.558a9.42 9.42 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.689 7.689 0 0 1 5.352 2.082l-2.284 2.284A4.347 4.347 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.792 4.792 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.702 3.702 0 0 0 1.599-2.431H8v-3.08h7.545z"/>
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" min-width="60" height="80" fill="currentColor" class="bi bi-amazon" viewBox="0 0 16 16">
                    <path d="M10.813 11.968c.157.083.36.074.5-.05l.005.005a89.521 89.521 0 0 1 1.623-1.405c.173-.143.143-.372.006-.563l-.125-.17c-.345-.465-.673-.906-.673-1.791v-3.3l.001-.335c.008-1.265.014-2.421-.933-3.305C10.404.274 9.06 0 8.03 0 6.017 0 3.77.75 3.296 3.24c-.047.264.143.404.316.443l2.054.22c.19-.009.33-.196.366-.387.176-.857.896-1.271 1.703-1.271.435 0 .929.16 1.188.55.264.39.26.91.257 1.376v.432c-.199.022-.407.044-.621.065-1.113.114-2.397.246-3.36.67C3.873 5.91 2.94 7.08 2.94 8.798c0 2.2 1.387 3.298 3.168 3.298 1.506 0 2.328-.354 3.489-1.54l.167.246c.274.405.456.675 1.047 1.166ZM6.03 8.431C6.03 6.627 7.647 6.3 9.177 6.3v.57c.001.776.002 1.434-.396 2.133-.336.595-.87.961-1.465.961-.812 0-1.286-.619-1.286-1.533ZM.435 12.174c2.629 1.603 6.698 4.084 13.183.997.28-.116.475.078.199.431C13.538 13.96 11.312 16 7.57 16 3.832 16 .968 13.446.094 12.386c-.24-.275.036-.4.199-.299l.142.087Z"/>
                    <path d="M13.828 11.943c.567-.07 1.468-.027 1.645.204.135.176-.004.966-.233 1.533-.23.563-.572.961-.762 1.115-.191.154-.333.094-.23-.137.105-.23.684-1.663.455-1.963-.213-.278-1.177-.177-1.625-.13l-.09.009c-.095.008-.172.017-.233.024-.193.021-.245.027-.274-.032-.074-.209.779-.556 1.347-.623Z"/>
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" min-width="60" height="80" fill="currentColor" class="bi bi-spotify" viewBox="0 0 16 16">
                    <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0m3.669 11.538a.498.498 0 0 1-.686.165c-1.879-1.147-4.243-1.407-7.028-.77a.499.499 0 0 1-.222-.973c3.048-.696 5.662-.397 7.77.892a.5.5 0 0 1 .166.686zm.979-2.178a.624.624 0 0 1-.858.205c-2.15-1.321-5.428-1.704-7.972-.932a.625.625 0 0 1-.362-1.194c2.905-.881 6.517-.454 8.986 1.063a.624.624 0 0 1 .206.858m.084-2.268C10.154 5.56 5.9 5.419 3.438 6.166a.748.748 0 1 1-.434-1.432c2.825-.857 7.523-.692 10.492 1.07a.747.747 0 1 1-.764 1.288z"/>
                </svg>
            </div>
        </div> 
    </section>

    <!-- Courses -->
    <section class="p-5" id="courses">
        <div class="container">
            <h1 class="text-center mb-4 pb-4 text-dark font-weight-bold">Courses</h1>
            <div class="row text-center g-4">
                <div class="col-md">
                    <div class="card bg-dark text-light">
                        <div class="card-body text-center">
                            <div class="h1 font-weight-bold mb-3">
                                <i class="bi bi-code-slash"></i>
                            </div>
                            <h3 class="card-title mb-3">Software Engineering</h3>
                            <p class="card-text">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo asperiores eum est recusandae odit accusamus?
                            </p>
                            <a href="#" class="btn btn-light">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="card bg-secondary text-light">
                        <div class="card-body text-center">
                            <div class="h1 font-weight-bold mb-3">
                                <i class="bi bi-cpu"></i>
                            </div>
                            <h3 class="card-title mb-3">Machine Learning</h3>
                            <p class="card-text">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo asperiores eum est recusandae odit accusamus?
                            </p>
                            <a href="#" class="btn btn-light">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="card bg-dark text-light">
                        <div class="card-body text-center">
                            <div class="h1 font-weight-bold mb-3">
                                <i class="bi bi-clipboard-data"></i>
                            </div>
                            <h3 class="card-title mb-3">Data Engineering</h3>
                            <p class="card-text">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo asperiores eum est recusandae odit accusamus?
                            </p>
                            <a href="#" class="btn btn-light">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row text-center g-4 mt-3">
                <div class="col-md">
                    <div class="card bg-dark text-light">
                        <div class="card-body text-center">
                            <div class="h1 font-weight-bold mb-3">
                                <i class="bi bi-laptop"></i>
                            </div>
                            <h3 class="card-title mb-3">Computer Science</h3>
                            <p class="card-text">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo asperiores eum est recusandae odit accusamus?
                            </p>
                            <a href="#" class="btn btn-light">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="card bg-secondary text-light">
                        <div class="card-body text-center">
                            <div class="h1 font-weight-bold mb-3">
                                <i class="bi bi-info-circle"></i>
                            </div>
                            <h3 class="card-title mb-3">Information Technology</h3>
                            <p class="card-text">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo asperiores eum est recusandae odit accusamus?
                            </p>
                            <a href="#" class="btn btn-light">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="card bg-dark text-light">
                        <div class="card-body text-center">
                            <div class="h1 font-weight-bold mb-3">
                                <i class="bi bi-lock"></i>
                            </div>
                            <h3 class="card-title mb-3">Cyber Security</h3>
                            <p class="card-text">
                                Lorem ipsum dolor consectetur elit. Explicabo asperiores eum est recusandae odit accusamus? Lorem ipsum dolor sit
                            </p>
                            <a href="#" class="btn btn-light">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Learn Section -->
    <section class="p-5" id="learn">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-md">
                    <img src="images/Fundamentals.svg" alt="" class="img-fluid">
                </div>
                <div class="col-md p-5">
                    <h2>Learn The Fundamentals</h2>
                    <p class="lead">
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ratione voluptate impedit modi? Eum, laudantium nobis.
                    </p>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam accusantium repudiandae ea minima iste cupiditate?
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto neque libero fugit repudiandae repellat! Sit.
                    </p>
                    <a href="#" class="btn btn-light mt-3">
                        <i class="bi bi-chevron-right"></i> Read More
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="p-5 bg-dark text-light">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-md p-5">
                    <h2>Learn Modern Frameworks</h2>
                    <p class="lead">
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ratione voluptate impedit modi? Eum, laudantium nobis.
                    </p>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam accusantium repudiandae ea minima iste cupiditate?
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quaerat animi officia, pariatur natus ducimus odit.
                    </p>
                    <a href="#" class="btn btn-light mt-3">
                        <i class="bi bi-chevron-right"></i> Read More
                    </a>
                </div>
                <div class="col-md">
                    <img src="images/react.svg" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ's -->
    <section class="p-5" id="faq">
        <div class="container">
            <h2 class="text-center mb-4">Frequently Asked Questions</h2>
            <div class="accordion accordion-flush" id="faq">
                <!-- Item 1 -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#question-one">
                            Where is the main campus located?
                        </button>
                    </h2>
                    <div id="question-one" class="accordion-collapse collapse" data-bs-parent="#faq">
                        <div class="accordion-body">
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cumque accusamus, pariatur repudiandae alias optio minima blanditiis incidunt quia ipsum iste, debitis cupiditate perferendis nihil saepe beatae? Necessitatibus dignissimos hic odio, distinctio quaerat ratione id cumque reprehenderit reiciendis, laboriosam quibusdam atque qui impedit voluptatem, architecto fugiat repudiandae maiores accusamus ipsam recusandae?
                        </div>
                    </div>
                </div>
                <!-- Item 2 -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#question-two">
                            How much it cost to attend?
                        </button>
                    </h2>
                    <div id="question-two" class="accordion-collapse collapse" data-bs-parent="#faq">
                        <div class="accordion-body">
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Commodi non autem minima ullam architecto iure corporis nulla animi laudantium quia, tenetur dolorem ab porro vel blanditiis mollitia quasi eos laboriosam iusto amet id eius? Est dignissimos sunt quam quis eligendi vel obcaecati mollitia nam quas, laborum eum aliquid omnis molestias!
                        </div>
                    </div>
                </div>
                <!-- Item 3 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" >
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#question-three">
                            What do I need to do before joining infoTech?
                        </button>
                    </h2>
                    <div id="question-three" class="accordion-collapse collapse" data-bs-parent="#faq">
                        <div class="accordion-body">
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quam assumenda sed molestiae tempora dolor maiores quibusdam eaque? Provident nobis ipsa accusantium explicabo, est, numquam molestias fugit rem quidem nostrum quasi consequuntur quos ab corrupti repellat itaque tempore dolores labore, perferendis laudantium obcaecati delectus similique voluptatem! Dolorum sunt enim ullam harum?
                        </div>
                    </div>
                </div>

                <!-- Item 4 -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#question-four">
                            How do I sign up?
                        </button>
                    </h2>
                    <div id="question-four" class="accordion-collapse collapse" data-bs-parent="#faq">
                        <div class="accordion-body">
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quam assumenda sed molestiae tempora dolor maiores quibusdam eaque? Provident nobis ipsa accusantium explicabo, est, numquam molestias fugit rem quidem nostrum quasi consequuntur quos ab corrupti repellat itaque tempore dolores labore, perferendis laudantium obcaecati delectus similique voluptatem! Dolorum sunt enim ullam harum?
                        </div>
                    </div>
                </div>

                <!-- Item 5 -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#question-five">
                            Do you help me find a job?
                        </button>
                    </h2>
                    <div id="question-five" class="accordion-collapse collapse" data-bs-parent="#faq">
                        <div class="accordion-body">
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quam assumenda sed molestiae tempora dolor maiores quibusdam eaque? Provident nobis ipsa accusantium explicabo, est, numquam molestias fugit rem quidem nostrum quasi consequuntur quos ab corrupti repellat itaque tempore dolores labore, perferendis laudantium obcaecati delectus similique voluptatem! Dolorum sunt enim ullam harum?
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Instructors -->
    <section id="instructors" class="p-5 bg-info">
        <div class="container">
            <h2 class="text-center text-dark">Our Instructors</h2>
            <p class="lead text-center text-dark mb-5">
                All of our instructors have 5+ years working experience of develpment in the industry.
            </p>
            <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <div class="card bg-light">
                        <div class="card-body text-center">
                            <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="" class="rounded-circle mb-3">
                            <h3 class="card-title mb-3">John Smith</h3>
                            <p class="card-text">
                                John Smith, a seasoned software engineer, crafts elegant code, solving complex problems with innovative solutions. Diligent, adaptable, and collaborative.
                            </p>
                            <a href="#">
                                <i class="bi bi-twitter text-dark mx-1"></i>
                            </a>
                            <a href="#">
                                <i class="bi bi-facebook text-dark mx-1"></i>
                            </a>
                            <a href="#">
                                <i class="bi bi-linkedin text-dark mx-1"></i>
                            </a>
                            <a href="#">
                                <i class="bi bi-instagram text-dark mx-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="card bg-light">
                        <div class="card-body text-center">
                            <img src="https://randomuser.me/api/portraits/men/21.jpg" alt="" class="rounded-circle mb-3">
                            <h3 class="card-title mb-3">Williams Adam</h3>
                            <p class="card-text">   
                                An elegent software engineer, decent code, tackling challenges through inventive and intuition problem-solving skills. Adaptable, and collaborative.
                            </p>
                            <a href="#">
                                <i class="bi bi-twitter text-dark mx-1"></i>
                            </a>
                            <a href="#">
                                <i class="bi bi-facebook text-dark mx-1"></i>
                            </a>
                            <a href="#">
                                <i class="bi bi-linkedin text-dark mx-1"></i>
                            </a>
                            <a href="#">
                                <i class="bi bi-instagram text-dark mx-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="card bg-light">
                        <div class="card-body text-center">
                            <img src="https://randomuser.me/api/portraits/men/15.jpg" alt="" class="rounded-circle mb-3">
                            <h3 class="card-title mb-3">Mark Henry</h3>
                            <p class="card-text">
                                A great software engineer, elegent code, solving complex problems with sophisticated and inventive solutions. Diligent, ethical, collaborative and friendly.
                            </p>
                            <a href="#">
                                <i class="bi bi-twitter text-dark mx-1"></i>
                            </a>
                            <a href="#">
                                <i class="bi bi-facebook text-dark mx-1"></i>
                            </a>
                            <a href="#">
                                <i class="bi bi-linkedin text-dark mx-1"></i>
                            </a>
                            <a href="#">
                                <i class="bi bi-instagram text-dark mx-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="card bg-light">
                        <div class="card-body text-center">
                            <img src="https://randomuser.me/api/portraits/men/18.jpg" alt="" class="rounded-circle mb-3">
                            <h3 class="card-title mb-3">Johnny Smith</h3>
                            <p class="card-text">
                                John Smith, a seasoned software engineer, crafts elegant code, solving complex problems with innovative solutions. Diligent, adaptable, and collaborative.
                            </p>
                            <a href="#">
                                <i class="bi bi-twitter text-dark mx-1"></i>
                            </a>
                            <a href="#">
                                <i class="bi bi-facebook text-dark mx-1"></i>
                            </a>
                            <a href="#">
                                <i class="bi bi-linkedin text-dark mx-1"></i>
                            </a>
                            <a href="#">
                                <i class="bi bi-instagram text-dark mx-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact and Map -->
    <section class="p-5" id="contact">
        <div class="container">
            <div class="row g-4">
                <div class="col-md">
                    <h2 class="text-center mb-4">
                        Contact Info
                    </h2>
                    <ul class="list-group list-group-flush lead">
                        <li class="list-group-item">
                            <span class="fw-bold">Main Location:</span> 50 Main Bahria Town, Lahore.
                        </li>
                        <li class="list-group-item">
                            <span class="fw-bold">Phone:</span> (111) 729-156-348
                        </li>
                        <li class="list-group-item">
                            <span class="fw-bold">Email:</span> noreplyinfo@tech.net
                        </li>
                        <li class="list-group-item">
                            <span class="fw-bold">HR Phone:</span> (111) 145-729-988
                        </li>
                        <li class="list-group-item">
                            <span class="fw-bold">HR Email:</span> johnsmith@tech.net
                        </li>
                    </ul>   
                </div>
                <div class="col-md">
                    <div id="map" class="w-100 h-100">

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="p-5 bg-dark text-white text-center position-relative">
        <div class="container">
            <p class="lead">Copyright &copy; 2023 This website is made by infoTech</p>
        </div>
    </footer>
    <a href="#home" class="to-up">
        <i class="fas fa-chevron-up"></i>
    </a> 

    <!-- Modal -->
    <div
      class="modal fade"
      id="enroll"
      tabindex="-1"
      aria-labelledby="enrollLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="enrollLabel">Enrollment</h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>

          <form action="insertRequests.php" method="POST">
            <div class="modal-body">
                <p class="lead">Fill out this form and we will get back to you</p>
                
                <div class="mb-3">
                    <label for="name" class="col-form-label">
                    Name:
                    </label>
                    <input type="text" name="username" class="form-control" id="name" placeholder="Enter your name." required value="<?php echo $_SESSION['name'] ?>"/>
                </div>
                <div class="mb-3">
                    <label for="email" class="col-form-label" >Email:</label>
                    <input type="email" name="userEmail" class="form-control" id="email" placeholder="Enter your email." required value="<?php echo $_SESSION['email'] ?>"/>
                    <p class="email-error">This Email address is already in use.</p>
                </div>
                <div class="mb-3">
                    <label for="phone" class="col-form-label" >Phone:</label>
                    <input type="tel" name="phone" class="form-control" id="phone" pattern="[0-9]+" placeholder="Enter your Phone number." required/>
                </div>
                <div class="mb-3">
                    <label for="department" class="col-form-label" required>Department:</label>
                    <select class="form-control" name="department" id="department" required>
                        <option value="Select Department" disabled selected>Select Department</option>
                        <option value="Computer Science">1. Computer Science</option>
                        <option value="Information Technology">2. Information Technology</option>
                        <option value="Cyber Security">3. Cyber Security</option>
                        <option value="Software Engineering">4. Software Engineering</option>
                        <option value="Data Engineering">5. Data Engineering</option>
                        <option value="Machine Learning">6. Machine Learning</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="position" class="col-form-label" required>Position:</label>
                    <select class="form-control" name="position" id="position" required>
                        <option value="Select Position" disabled selected>Select Position</option>
                        <option value="Intern">Intern</option>
                        <option value="Trainer">Trainer</option>
                    </select>
                </div>
                
                
            </div>
            <div class="modal-footer">
                <button
                type="button"
                class="btn btn-secondary"
                data-bs-dismiss="modal"
                >
                Close
                </button>
                <button type="submit" name="submit" class="btn btn-info">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.js"></script>
    <script>
      mapboxgl.accessToken =
        'pk.eyJ1IjoiYWhhZDEiLCJhIjoiY2xwanBmOGV2MDI5cTJxbGJpNzdibW1lciJ9.7zu_-U2-_1JybdZlKIBXyA';
        var map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/streets-v11',
            center: [ 74.188583, 31.382107],
            zoom: 13,
        });
    </script>
    <script src="script.js"></script>
</body>

</html>

<?php 
    ob_end_flush();
?>