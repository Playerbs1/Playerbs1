function toggleMenu() {
    const nav = document.querySelector("nav");
    nav.classList.toggle("active");
}

function showDetails(category) {
    alert("You clicked on: " + category);
}

document.getElementById('main-title').addEventListener('click', function() {
    this.classList.toggle('color-change');
});

function showText() {
    const hoverText = document.getElementById("hoverText");
    hoverText.classList.toggle("visible");
}
function toggleMenu() {
    const nav = document.querySelector('nav');
    nav.classList.toggle('active'); // This will toggle the visibility of the menu
    const menuToggle = document.querySelector('.menu-toggle');
    menuToggle.classList.toggle('open'); // This toggles the color of the hamburger icon
}
function showText() {
    const hoverText = document.getElementById('hoverText');
    
    // Toggle the 'show' class to show/hide the text
    hoverText.classList.toggle('show');
}