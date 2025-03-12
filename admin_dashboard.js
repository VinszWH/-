window.addEventListener("scroll", function () {
    const navbar = document.getElementById("navbar");
    if (window.scrollY > 50) {
        navbar.classList.remove("transparent");
        navbar.classList.add("solid");
    } else {
        navbar.classList.remove("solid");
        navbar.classList.add("transparent");
    }
});

const sidebarToggle = document.getElementById("sidebarToggle");
const closeSidebar = document.getElementById("closeSidebar");
const sidebar = document.getElementById("sidebar");
const overlay = document.createElement("div");
overlay.classList.add("sidebar-overlay");
document.body.appendChild(overlay);


sidebarToggle.addEventListener("click", () => {
    sidebar.classList.add("open");
    overlay.classList.add("active");
});


closeSidebar.addEventListener("click", closeSidebarMenu);
overlay.addEventListener("click", closeSidebarMenu);

function closeSidebarMenu() {
    sidebar.classList.remove("open");
    overlay.classList.remove("active");
}


const userText = document.getElementById("userText");
const userMenu = document.getElementById("userMenu");

if (userText && userMenu) {
    userText.addEventListener("click", () => {
        userMenu.style.display = userMenu.style.display === "flex" ? "none" : "flex";
    });

    document.addEventListener("click", (event) => {
        if (!userText.contains(event.target) && !userMenu.contains(event.target)) {
            userMenu.style.display = "none";
        }
    });
}