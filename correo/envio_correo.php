<?php


if ((isset($_POST["MMinsert"])) && ($_POST["MMinsert"] == "runContacto")) {

    $nombre = $_POST['name'];
    $mail = $_POST['mail'];
    $mensaje = $_POST['message'];

    $mailHeader = "From: " . $mail . " \r\n";
    $mailHeader .= "X-Mailer: PHP/" . phpversion() . " \r\n";

    $mailHeader .= "Mime-Version: 1.0 \r\n";
    $mailHeader .= "Content-Type: text/html; charset=utf-8";
    //Cambiar correo dependiendo del Cliente
    $mailHeader2 = "From: contacto@vh.org \r\n";

    $mailHeader2 .= "X-Mailer: PHP/" . phpversion() . " \r\n";
    $mailHeader2 .= "Mime-Version: 1.0 \r\n"; 
    $mailHeader2 .= "Content-Type: text/html; charset=utf-8";
    // Contactos a enviar el correo
    /* $para = 'idaly.moreno@celiderh.org'; //laura@upgrade.com.mx
    // $mail->addBCC('selene@upgrade.com.mx');*/
    $para2='eduardo@upgrade.com.mx'; 
    $para3='direccion@vhverificacion.com.mx'; 
    $para='laura@upgrade.com.mx';
    
    /* echo 'pruebaaaa'; */
    // Incluir los estilos
    include_once('correo_h&f.php');
    // Contenido del mensaje enviado al usuario y al administrador
    include_once('correo_contenido.php');
    // Función que crea toda la estructura del correo
    include_once('correo.php');
    /* echo 'prueba';
 */
/*     $asunto = 'prueba';
    $mensaje = 'prueba'; */
    $mailContentAdmin  = mailContent($header,$mensaje_admin,$footer_admin);
    if(mail($para, utf8_decode("Contacto desde sitio web VH"), utf8_decode($mailContentAdmin), $mailHeader)){
         mail($para2, utf8_decode("Contacto desde sitio web"), utf8_decode($mailContentAdmin), $mailHeader);
        /*mail($para3, utf8_decode("Contacto desde sitio web"), utf8_decode($mailContentAdmin), $mailHeader); */
        echo "Correo enviado";
        $cont = 1;
    }


    // Correo al Usuario
    $mailContentUser = mailContent($header,$mensaje_usuario,$footer_user);
    if(mail($mail, utf8_decode("Contacto Verificación de Hidrocarburos"), utf8_decode($mailContentUser), $mailHeader2)){
        echo "Correo a usuario enviado";
        $cont++;
    }
}

/* if ($cont=2) {
    header("Location: ../index.php");
die();
}
 */
?>




