import "./bootstrap";
import AOS from "aos";
import "aos/dist/aos.css";
import Alpine from "alpinejs";
import persist from "@alpinejs/persist";

document.addEventListener("DOMContentLoaded", () => {
    AOS.init({
        duration: 1200,
    });
});

window.Alpine = Alpine;

Alpine.plugin(persist);

Alpine.start();
