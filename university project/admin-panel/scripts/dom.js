export function animation() {
  const menuButton = document.querySelector("#menu");
  const closeButton = document.querySelector(".close");
  const sideMenu = document.querySelector(".left");
  const toggle = document.querySelector(".theme-toggler");

  toggle.addEventListener("click", () => {
    document.body.classList.toggle("dark-theme");
    toggle.classList.toggle("active");
  });

  menuButton.addEventListener("click", () => {
    sideMenu.style.display = "block";
  });

  closeButton.addEventListener("click", () => {
    sideMenu.style.display = "none";
  });
}
