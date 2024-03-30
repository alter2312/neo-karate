const toggle = document.querySelector(".toggle");
const navMenu = document.querySelector(".nav_menu");

toggle.addEventListener("click", ()=>{
    navMenu.classList.toggle("nav_menu-active")
})