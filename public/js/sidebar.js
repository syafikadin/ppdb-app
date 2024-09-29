// For sidebar
document.addEventListener("DOMContentLoaded", function () {
    var sidebar = document.getElementById("sidebar");
    var btnHamburger = document.getElementById("btn-sidebar");

    btnHamburger.addEventListener("click", function () {
        sidebar.classList.toggle("sidebar-active");
    });
});
