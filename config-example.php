<?php
    /**
     *  aqui você pode inserir os parâmetros do email que realizará o envio de mensagens
     * 
     *  a configuração que foi realizada aqui é para uso no gmail, lembrando que é necessário habilitar
     * o uso de aplicações menos seguras nas configurações de segurança do seu gmail.
     * 
     * em EMAIL_USERNAME E EMAIL_PASSWORD deve ser preenchido com o email que será usado pela aplicação.
     * 
     */
    define("DEBUG_OUTPUT", 0);                              // Enable verbose debug output
    define("HOST", 'smtp.gmail.com');                       // Specify main and backup SMTP servers
    define("ENABLE_AUTH", true);                            // Enable SMTP authentication
    define("EMAIL_USERNAME", 'example@gmail.com');        // SMTP username  
    define("EMAIL_PASSWORD", 'pass123456');                   // SMTP password  
    define("EMAIL_SECURE", 'tls');                          // Enable TLS encryption, `ssl` also accepted       
    define("EMAIL_PORT", 587);                              // Port        

    /*
    //param:
    $mail->SMTPDebug = 2;
    
    PHP
    level 1 = client; will show you messages sent by the client
    level 2  = client and server; will add server messages, it’s the recommended setting.
    level 3 = client, server, and connection; will add information about the initial information, 
    might be useful for discovering STARTTLS failures
    level 4 = low-level information. 
    Use level 3 or level 4 if you are not able to connect at all. 
    
    Setting level 0 will turn the debugging off, 
    it is usually used for production. 
    
    */
?>






