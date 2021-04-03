<?php
    //além de proteger os arquivos, alocando-os fora da pasta publica, este novo arquivo 
    //(processa_envio.php) acaba funcionando como um autoloader.
    
    //incluindo libs
    require "../../app_send_mail/bibliotecas/PHPMailer/Exception.php";
    require "../../app_send_mail/bibliotecas/PHPMailer/OAuth.php";
    require "../../app_send_mail/bibliotecas/PHPMailer/PHPMailer.php";
    require "../../app_send_mail/bibliotecas/PHPMailer/POP3.php";
    require "../../app_send_mail/bibliotecas/PHPMailer/SMTP.php";

    //logica restrita
    require "../../app_send_mail/processa_envio.php";

?>