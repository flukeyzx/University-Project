// This is the code for the topUp icon.
const toTop = document.querySelector(".to-up");

window.addEventListener('scroll', () => {
    if(window.pageYOffset > 100) {
        toTop.classList.add("active");
    } else {
        toTop.classList.remove("active");
    }
});

// //See More button Code.
// const loadCourses = document.querySelector(".see-more-btn");
// const courseSection = document.querySelector(".js-course");

// loadCourses.addEventListener("click", generateCourse);

// function generateCourse(){
//     loadCourses.style.display  = "none";
//     courseSection.style.transition = 'all 0.5s';
//     let generateHTML;
//     generateHTML = `
//     <div class="container js-generated-course">
//         <section>
//             <img src="images/The Difference between Web Designer, Web Developer, and Web Programmer.jpg" alt="">
//             <h2>Web development</h1>
//             <p>
//                 As a college, we're excited to offer a cutting-edge web development course that equips students with the skills to create the digital future.
//             </p>
//         </section>
//         <section>
//             <img src="images/photo-1626785774573-4b799315345d.avif" alt="">
//             <h2>Graphics Designing</h1>
//             <p>
//                 At our college, we're proud to offer a graphics design course that sparks creativity and hones the visual storytelling skills of our students.
//             </p>
//         </section>
//         <section>
//             <img src="images/Types-of-Digital-Marketing.png" alt="">
//             <h2>Digital Marketing</h2>
//             <p>
//                 As a forward-thinking institution, we're thrilled to provide a digital marketing course that empowers students with the tools to thrive in the landscape of online business. 
//             </p>
//         </section> <br>
//     </div>
//     `;
//     courseSection.innerHTML = generateHTML;
// }

//hamburger function
// const toggle = document.querySelector('.navbar-toggler');
// const toggleSection = document.querySelector('.right-section');
// toggle.addEventListener('click', hamburger)
// function hamburger(e){
//     if(!toggleSection.classList.contains("d-flex")){
//         toggle.classList.add("d-flex");
//     }
// }