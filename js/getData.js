let propButton = document.querySelectorAll('.data.id');
let propsForm = document.getElementById('propsForm');
let propsContainer = document.getElementById('props');

let adminsButton = document.querySelectorAll('.data.id-admin');
let adminsForm = document.getElementById('adminsForm');
let adminsContainer = document.getElementById('admins');

propButton.forEach(id => {
    id.addEventListener('click', () => {
        fillForm(propsContainer, id, propsForm);
    });
});

adminsButton.forEach(mail => {
    mail.addEventListener('click', () => {
        fillForm(adminsContainer, mail, adminsForm);
    });
});

function fillForm(dataContainer, sourceButton, form) {
    
    let values = document.querySelectorAll("#" + dataContainer.id + ' .summary')[sourceButton.innerText - 1].innerText;
    values = values.split(';')
    
    let inputs = document.querySelectorAll('#' + form.id + ' .inputs');
    inputs = [].slice.call(inputs);

    inputs.forEach(input => {
        //caso de los tipos de propiedad
        switch (values[inputs.indexOf(input)]) {
            case 'Casa':
                input.value = 1;
                break;
            case 'Departamento':
                input.value = 2;
                break;
            case 'Galpón':
                input.value = 3;
                break;
            case 'Terreno':
                input.value = 4;
                break;
            case 'Lote':
                input.value = 5;
                break;
            default:
                //caso normal
                input.value = values[inputs.indexOf(input)];
                break;
        }
    });
}