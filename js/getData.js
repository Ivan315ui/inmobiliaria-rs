let propButton = document.querySelectorAll('#props .data.id');
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
    
    let values = document.querySelectorAll("#" + dataContainer.id + ' .summary')[[].slice.call(document.querySelectorAll('#props .data.id')).indexOf(sourceButton)].innerText;
    values = values.split(';')
    
    let inputs = document.querySelectorAll('#' + form.id + ' .inputs');
    inputs = [].slice.call(inputs);

    inputs.forEach(input => {
        
        if (input.name == "tipo") {
            input.value = values[inputs.indexOf(input)].split('(')[1].substr(0, 1);
        } else {
            input.value = values[inputs.indexOf(input)];
        }
        
    });
}