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
    if (location.pathname === '/inmobiliaria-rs/contacto.php' && pageYOffset == 0) {
        header.classList.toggle('scrolled');
    }
}

window.addEventListener('scroll', ()=> {
    
    if (pageYOffset > 0) {
        header.classList.add('scrolled');
    } else {
        if (!button.classList.contains("touched")) {
            header.classList.remove('scrolled');
        }
    }
    
})

/*window.addEventListener('scroll', ()=> {
    
    if (pageYOffset > 0) {
        header.classList.add('scrolled');
    } else {
        header.classList.remove('scrolled');
        if (button.classList.contains("touched")) {
            header.style.background = "#440206";
        }
    }
    
}) */