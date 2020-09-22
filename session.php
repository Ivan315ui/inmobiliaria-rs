<?php
session_start();


if (isset($_SESSION['admin'])) {
    header('Location: admin.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
</head>
<body>
    <?php // if($_SERVER["HTTP_REFERRER"]): ?>
    <h2>Necesitas iniciar sesión antes de acceder a la sección de administrador</h2>
    <?php echo $_SERVER['HTTP_REFERER'] ?>
    <?php //endif ?>
</body>
</html>