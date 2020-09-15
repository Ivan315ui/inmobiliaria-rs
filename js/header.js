let button = document.querySelector('#burger-icon');
let menu = document.querySelector('.mobile-menu');
let header = document.querySelector('header');

button.addEventListener('click', displayMenu);

function displayMenu() {
    button.classList.toggle('touched');
    menu.classList.toggle('displayed');
    if (button.classList.value !== "") {
        header.style.padding = "5px 0";
    } else {
        header.style.padding = 0;
    }
}