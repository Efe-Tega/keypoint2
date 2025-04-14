document.addEventListener("DOMContentLoaded", function () {
    let index = 0;
    const content = document.getElementById("scroll-content");
    const totalItems = document.querySelectorAll(
        "#scroll-content div"
    ).length;
    const visibleItems = 4;
    const itemHeight = 80;

    function scrollUp() {
        if (index >= totalItems - visibleItems) {
            index = 0;
            content.style.transition = "none";
            content.style.transform = "translateY(0px)";
            setTimeout(
                () => (content.style.transition = "transform 0.8s ease-in-out"),
                50
            );
        } else {
            index++;
            content.style.transform = `translateY(-${index * 82}px)`;
        }
    }

    setInterval(scrollUp, 2000);


    // Active Navigation Link
    const currentPage = window.location.pathname.split("/").pop();
    document.querySelectorAll(".nav-link").forEach((link) => {
        if (link.getAttribute("href") === currentPage) {
            link.classList.add("text-blue-600", "font-bold"); // Active class
        }
    });
});