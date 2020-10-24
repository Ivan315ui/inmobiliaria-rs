var nombre = document.getElementById('nombre');
var mail = document.getElementById('mail');
var contraseña = document.getElementById('contraseña');

function verify(nombre, mail, contraseña) {
    nombre = nombre.value;
    mail = mail.value;
    contraseña = contraseña.value;

    var verificar_nombre = document.getElementById('verificar-name');
    var verificar_mail = document.getElementById('verificar-mail');
    var verificar_contraseña = document.getElementById('verificar-pass');
    
    if(contraseña.lenght = 0){
        verificar_contraseña.innerHTML = "Debe completar el campo contraseña";
    }
    else if (contraseña.lenght < 6) {
        verificar_contraseña.innerHTML = "La contraseña debe ser mayor a 6 caracteres";
    }else if(contraseña.lenght > 16){
        verificar_contraseña.innerHTML = "La contraseña debe ser menor a 16 caracteres";
    }
    if(mail.lenght){
        verificar_mail.innerHTML = "Debe completar el campo mail";
    }
    if(nombre.lenght){
        verificar_nombre.innerHTML = "Debe completar el campo nombre";
    }
}

var boton = document.getElementById('boton');

boton.addEventListener("click", () =>{
    verify(nombre, mail, contraseña);
})