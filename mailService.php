<?php



if(isset($_POST['enviar'])){
    if(!empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['email']) && !empty($_POST['telefono']) && !empty($_POST['comentarios'])){
        
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $email = $_POST['email'];
        $telefono = $_POST['telefono'];
        $comentario = $_POST['comentarios'];

        $asunto = "Tasaciones";
        $msg = "Nombre: ". $nombre . " " . $apellido . " <br> Comentario: " . $comentario ." <br> Telefono:" . $telefono;

        $para = "jereet31@gmail.com";
        $header = "From: " . $email . "\r\n";
        $header.= "Reply-To: ". $email . "\r\n";
        $header.= "X-Mailer: PHP/" . phpversion();

        $correo = mail($para, $asunto, $msg, $header); 
        if($correo){
            echo "Mail enviado exitosamente";
        }
    }
}

?>