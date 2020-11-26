let selects = document.querySelectorAll('select');
let gets = document.querySelectorAll('.gets');

//rellenar los campos con los valores que se buscaron
for (let i = 0; i < selects.length; i++) {
    selects[i].value = gets[i].innerText;
}