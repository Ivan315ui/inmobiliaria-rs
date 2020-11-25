let propButton = document.querySelectorAll('.data.id');
let propsForm = document.querySelector('#manage form')

let adminsButton = document.querySelectorAll('.data.email');

propButton.forEach(id => {
    id.addEventListener('click', () => {
        fillForm(id, propsForm);
    });
});

function fillForm(sourceButton, form) {
    if (form == propsForm) {
        let values = document.querySelectorAll('#manage .summary')[sourceButton.innerText - 1].innerText;
        values = values.split(';')
        console.log(values);
    }
}