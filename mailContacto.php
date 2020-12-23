<?php

if(isset($_POST['enviar'])){
    if(!empty($_POST['nombre']) !empty($_POST['email']) && !empty($_POST['mensaje'])){
        
        $nombre = $_POST['nombre'];
        $email = $_POST['email'];
        $mensaje = $_POST['mensaje'];

        $asunto = "Consulta";
        $msg = "Nombre: ". $nombre . " <br> Mensaje: " . $mensaje;

        $para = "jereet31@gmail.com";
        $header = "From: " . $email . "\r\n";
        $header.= "Reply-To: ". $email . "\r\n";
        $header.= "X-Mailer: PHP/" . phpversion();

        $correo = mail($para, $asunto, $msg, $header); 

        echo "Mensaje enviado";
    }
}

?>