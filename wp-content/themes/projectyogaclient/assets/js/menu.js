
document.addEventListener("DOMContentLoaded", () => {
    const btn = document.querySelector(".mobile-menu-icon");
    const menuHolder = document.querySelector(".menu-holder");

    btn.addEventListener("click", () => {
        menuHolder.classList.toggle("active");
        btn.classList.toggle("active");
    });
});
