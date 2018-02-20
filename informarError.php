<?php
session_start();
if (isset($_SESSION['name'])) {
    $timeNow = new DateTime(date('y-m-d h:i:s'));
    $res = $_SESSION['time']->diff($timeNow);
    $res = $res->format('%I');
    if ($res >= 1) {
        session_destroy();
        header("Location: login.php");        
    }else if(isset($_POST['enviar'])) {
        $email_to = "admin@siade.eu";
        $email_subject = "Incidente";
        if (isset($_POST['email']) && isset($_POST('textarea'))){


            $headers = 'From: '.$_POST['email']."\r\n".
            'Reply-To: '.$_POST['email']."\r\n" .
            'X-Mailer: PHP/' . phpversion();

            @mail($email_to, $email_subject, $_POST('textarea'), $headers);

            echo '<script>alert("Problema notificado");</script>';
        }

    }
}else{
    header('Location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Siade</title>
    <link rel="shorcut icon" href="IMAGES/logo-siade.png">
    <link rel="stylesheet" type="text/css" href="FONT-AWESOME/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Montserrat:300">
    <!--########################## - CSS - ##########################-->
    <!--CSS de Bootstrap-->
    <link rel="stylesheet" type="text/css" href="BOOTSTRAP/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="CSS/err.css">
    <!--#############################################################-->
</head>

<body>
    <form id="formulario" method="POST">
        <figure> <img id="logo" src="IMAGES/logo-siade.png" alt=""> </figure>
        <h3 id="titulo">Informar de un problema</h3>
        <div class="form-group">
            <label for="email">Correo electrónico:</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Correo de contacto">
            <label for="textarea">Problema:</label>
            <textarea class="form-control" id="textarea" name="textarea" rows="5" placeholder="Describe el problema"></textarea>
        </div>
        <button id="boton" type="submit" class="btn btn-default" name="enviar">Enviar</button>
    </form>
</body>

</html>