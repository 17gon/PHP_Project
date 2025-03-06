const darkTheme = {
"--bg-color": "#5a0079", 
"--nav-bg-color": "#4d0066", 
"--link-hover-bg-color": "#39004d", 
"--button-color": "#431553", 
"--button-hover-color": "#39004d", 
"--header-bg-color": "#600080", 
"--main-content-bg-color": "#6b0091", 
"--footer-bg-color": "#600080", 
"--mobile-links-bg-color": "#700099"
};
const lightTheme = {
    "--bg-color":"#2196f3",
    "--nav-bg-color":"#005ce6",
    "--link-hover-bg-color":"#0047b3",
    "--button-color":"#062486",
    "--button-hover-color":"#041b66",
    "--header-bg-color":"#2183f3",
    "--main-content-bg-color":"#48b4e6",
    "--footer-bg-color":"#2183f3",
    "--mobile-links-bg-color":"#0080ff"
};

document.addEventListener("DOMContentLoaded", () => {
    let mode = localStorage.getItem("lightMode");
    if (mode === "false") {
        applyTheme(darkTheme);
    } else {
        applyTheme(lightTheme);
    }
});
function applyTheme(theme) {
    let root = document.documentElement;
    for (let key in theme) {
        root.style.setProperty(key, theme[key]);
    }
}
function changeTheme() {
    let mode = localStorage.getItem("lightMode");
    if (mode === "true") {
        applyTheme(darkTheme);
        localStorage.setItem("lightMode", "false");
    } else {
        applyTheme(lightTheme);
        localStorage.setItem("lightMode", "true");
    }
}