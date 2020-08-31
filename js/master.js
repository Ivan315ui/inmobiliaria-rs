const menu = document.getElementById('burger-icon');
let currentState = "";
const list = document.getElementsByClassName('mobile-menu')[0];
const initHeight = list.offsetHeight;

//ocultarlo después de almacenar la altura que debería tener al abrirse
window.onload = () => {
    list.style.height = 0;
    list.style.display = "none";
    // también cambiar el alto de los elementos de lista (por alguna razón no se puede por css)
    document.getElementsByClassName('md-menu')[0].style.height = document.getElementsByClassName('container')[0].offsetHeight + "px";
};
// asignar el evento ícono del menú desplegable
menu.addEventListener('click', displayMobileMenu);
// cambiar los estilos del header al bajar en la ventana
window.addEventListener('scroll', () => {
    document.querySelector('header').classList.toggle("scrolled", window.scrollY > 0);
});

//cada 100ms tratar de ocultar el menú si el tamaño de pantalla creció
// tambien cambiar otro par de cosas para hacerlos más responsive
let map = setInterval(() => {
    if (document.querySelector('body').offsetWidth >= 768 && currentState) {
        displayMobileMenu();
    }
}, 100);

function displayMobileMenu() {
    const spans = menu.children;
    if (currentState) {
        spans[0].style.opacity = 1;
        spans[1].style.transform = "none";
        spans[2].style.transform = "none";
        spans[3].style.opacity = 1;
        list.style.opacity = 0;
        setTimeout(() => {
            list.style.height = 0;
        }, 300);
        setTimeout(() => {
            list.style.display = "none";
        }, 600);
        document.querySelector('header').style.padding = 0;
        //limpiar el intérvalo (menú cerrado)
        clearInterval(map);
        currentState = "";
    } else {
        spans[0].style.opacity = 0;
        spans[1].style.transform = "rotate(45deg)";
        spans[2].style.transform = "rotate(-45deg)";
        spans[3].style.opacity = 0;
        list.style.display = "block";
        setTimeout(() => {
            list.style.height = initHeight + "px";
        }, 20);
        setTimeout(() => {
            list.style.opacity = 1;
        }, 320);
        document.querySelector('header').style.padding = "5px 0";
        // resumir el intérvalo (menú abierto)
        map = setInterval(() => {
            if (document.querySelector('body').offsetWidth >= 768 && currentState) {
                displayMobileMenu();
            } 
        }, 100);
        currentState = "displayed";
    }
}

setInterval(() => {
    let gridItems = document.getElementsByClassName('grid-item');
    gridItems = [].slice.call(gridItems);
    let height = gridItems[4].offsetWidth;
    if (document.querySelector('html').offsetWidth >= 768) {
        document.querySelector('div.grid-container').style.gridTemplateRows = `repeat(2, ${height + "px"})`;
    } else {
        document.querySelector('div.grid-container').style.gridTemplateRows = `repeat(5, ${height / 2 + "px"})`;
    }
}, 500);