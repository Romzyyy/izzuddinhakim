// On page load or when changing themes, best to add inline in `head` to avoid FOUC
if (
    localStorage.theme === "dark" ||
    (!("theme" in localStorage) &&
        window.matchMedia("(prefers-color-scheme: dark)").matches)
) {
    document.documentElement.classList.add("dark");
    toggleIcons("dark");
} else {
    document.documentElement.classList.remove("dark");
    toggleIcons("light");
}

// Function to toggle icons based on the theme
function toggleIcons(theme) {
    const sunIcons = document.querySelectorAll(".sun-icon");
    const moonIcons = document.querySelectorAll(".moon-icon");

    if (theme === "dark") {
        sunIcons.forEach((icon) => icon.classList.add("hidden"));
        moonIcons.forEach((icon) => icon.classList.remove("hidden"));
    } else {
        sunIcons.forEach((icon) => icon.classList.remove("hidden"));
        moonIcons.forEach((icon) => icon.classList.add("hidden"));
    }
}

// Event listener for desktop toggle
document.getElementById("mode-toggle-desktop").addEventListener("click", () => {
    if (document.documentElement.classList.contains("dark")) {
        document.documentElement.classList.remove("dark");
        localStorage.theme = "light";
        toggleIcons("light");
    } else {
        document.documentElement.classList.add("dark");
        localStorage.theme = "dark";
        toggleIcons("dark");
    }
});

// Event listener for mobile toggle
document.getElementById("mode-toggle-mobile").addEventListener("click", () => {
    if (document.documentElement.classList.contains("dark")) {
        document.documentElement.classList.remove("dark");
        localStorage.theme = "light";
        toggleIcons("light");
    } else {
        document.documentElement.classList.add("dark");
        localStorage.theme = "dark";
        toggleIcons("dark");
    }
});
